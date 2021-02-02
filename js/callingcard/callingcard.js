function validateEmailAddress(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

/**
 * Vide le panier
 */
function viderPanier() {
    localStorage.removeItem('panier');
}

/**
 * Affiche le contenu du panier
 */
function afficherPanier() {
    var panier = [];
    if (localStorage.getItem('panier')) {
        panier = JSON.parse(localStorage.getItem('panier'));
    }

    $.post($('#urlpanier').val(), {
        'panier': panier,
        '_token': $('#_token').val()
    }, function (data, status) {
        window.location.href = $('#urlpanier').val();
    }).done(function (data) {

    }).fail(function () {
        swal('Oops...', 'Une erreur est survenue lors de l\'affichage du panier', 'error');
    });
}

/**
 * Ajoute le coupon sélectionné au panier, ou met sa quantité à jour.
 */
function ajouterCoupon() {
    alert('ajouter');
    var id_operateur = $('#id_operateur').val();
    var nom_operateur = $('#nom_operateur').val();
    var coupon = $('[name="coupon"]:checked').val();

    if (!coupon) {
        swal('Oops....', 'Vous devez sélectionner un coupon', 'error');
        return;
    }

    var panier = [];
    if (localStorage.getItem('panier')) {
        panier = JSON.parse(localStorage.getItem('panier'));
    }

    var message = 'Coupon ajouté au panier!';
    var found = false;
    panier.forEach(function (element) {
        console.log(element);
        if ((parseInt(element['id_operateur']) === parseInt(id_operateur)) && (parseInt(element['coupon']) === parseInt(coupon))) {
            element['quantite'] = parseInt(element['quantite']) + 1;
            found = true;
            message = 'Coupon mis à jour dans le panier';
        }
    });

    if (!found) {
        panier.push({'id_operateur': id_operateur, 'nom_operateur': nom_operateur, 'coupon': coupon, 'quantite': 1});
    }

    localStorage.setItem('panier', JSON.stringify(panier));

    swal('Panier', message, 'success');
}

function updateQuantite(id_operateur, coupon) {
    var selecteur = $('#' + id_operateur + '-' + coupon);
    var panier = [];
    if (localStorage.getItem('panier')) {
        panier = JSON.parse(localStorage.getItem('panier'));
    }

    panier.forEach(function (element) {
        if ((parseInt(element['id_operateur']) === parseInt(id_operateur)) && (parseInt(element['coupon']) === parseInt(coupon))) {
            element['quantite'] = selecteur.val();
        }
    });
    localStorage.setItem('panier', JSON.stringify(panier));
}

function retirer(id_operateur, coupon) {
    var panier = [];
    if (localStorage.getItem('panier')) {
        panier = JSON.parse(localStorage.getItem('panier'));
    }
    var nouveauPanier = [];

    panier.forEach(function (element) {
        if ((parseInt(element['id_operateur']) !== parseInt(id_operateur)) || (parseInt(element['coupon']) !== parseInt(coupon))) {
            nouveauPanier.push(element);
        }
    });

    localStorage.setItem('panier', JSON.stringify(nouveauPanier));

    afficherPanier();
}

function acheter() {
    var panier = [];
    if (localStorage.getItem('panier')) {
        panier = JSON.parse(localStorage.getItem('panier'));
    }

    if (panier.length === 0) {
        swal('Oops', 'Votre panier est vide', 'error');
        return;
    }

    window.location.href = $('#urlacheter').val();
}

function valider() {
    var telephone = $('#telephone').val();
    var email = $('#email').val();

    if (!telephone) {
        swal('Oops...', 'Vous devez indiquer votre numéro de téléphone', 'error');

        return;
    }

    if (!email) {
        swal('Oops...', 'Vous devez indiquer votre adresse email', 'error');

        return;
    }

    if (!validateEmailAddress(email)) {
        swal('Oops...', 'Adresse email incorrecte', 'error');

        return;
    }

    var panier = [];
    if (localStorage.getItem('panier')) {
        panier = JSON.parse(localStorage.getItem('panier'));
    }

    if (panier.length === 0) {
        swal('Oops...', 'Votre panier est vide', 'error');
        return;
    }

    $.post($('#urlvalider').val(), {
        'panier': panier,
        'telephone': telephone,
        'email': email,
        '_token': $('#_token').val()
    }, function (data, status) {
        console.log(status);
        if (data['data'] === true) {
            localStorage.removeItem('panier');

            afficherPanier();

            swal('Achat effectué', 'Votre transaction a bien été enregistrée: ' + data['message'], 'success');
        } else {
            swal('Oops...', 'Une erreur est survenue lors de la transaction: ' + data['message'], 'error');
        }
    }).done(function (data) {
    }).fail(function () {
        swal('Oops...', 'Une erreur est survenue lors de la transaction', 'error');
    });
}

$(document).ready(function () {
    $('#add').click(function () {
        ajouterCoupon();
    });

    $('#panier').click(function () {
        afficherPanier();
    });

    $('#acheter').click(function () {
        acheter();
    });

    $('#valider').click(function () {
        valider();
    });
});

function validatePhoneNumber(phoneNumber) {
    str = phoneNumber.replace(/\s/g, '');

    // Check if all char are digit
    if (!/^\d+$/.test(str)) {
        return false;
    }

    if (str.length !== 12) {
        return false;
    }

    if (str.indexOf('237') !== 0) {
        return false;
    }

    return true;
}

function achat(mode) {
    if (mode == 'momo') {
        swal({
            title: 'Numero MOMO',
            input: 'text',
            showCancelButton: true,
            inputValidator: function (value) {
                return new Promise(function (resolve, reject) {
                    if (value && validatePhoneNumber(value)) {
                        resolve()
                    } else {
                        reject('Numero invalide!')
                    }
                })
            }
        }).then(function (result) {
            var numero = result;
            valider();


        })
    }else{
        valider();
    }
}