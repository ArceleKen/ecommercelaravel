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

function payer() {
    //var mode = $("input[name='mode']:checked").val();
    var data = {};
    //data.mode = mode;
    data.contrat = $('#contrat').val();
    data.numero = $('#numero').val();
    data.email = $('#email').val();
    data.facture = $('#facture').val();
    data._token = $('#token').val();
    var url = $('#url').val();
/*
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
            $('#comptemomo').val(result);
            $.ajax({
                type: "POST",
                data: data,
                url: url
                , success: function (retour) {
                    console.log(retour);
                    var eneo = [];
                    if (localStorage.getItem('eneo')) {
                        var eneo = JSON.parse(localStorage.getItem('eneo'));
                    }
                    eneo.push(retour.data);
                    localStorage.setItem('eneo', JSON.stringify(eneo));
                    console.log(JSON.parse(localStorage.getItem('eneo')));
                    if (retour.message == 'OK') {
                        swal(
                            'OK!',
                            'Paiement effectué',
                            'success'
                        );
                        setTimeout(function () {
                            window.location.href = $('#urlhome').val();
                        }, 2000);
                    } else {
                        swal(
                            'Oops...',
                            'Veuillez réessayer!',
                            'error'
                        );
                    }
                }
                , error: function (resultat, statut, erreur) {
                    console.log('erreur :  ' + erreur)
                }
            });



        })
    }
    else { */


        $.ajax({
            type: "POST",
            data: data,
            url: url
            , success: function (retour) {
                console.log(retour);
                var eneo = [];
                if (localStorage.getItem('eneo')) {
                    var eneo = JSON.parse(localStorage.getItem('eneo'));
                }
                eneo.push(retour.data);
                localStorage.setItem('eneo', JSON.stringify(eneo));
                console.log(JSON.parse(localStorage.getItem('eneo')));
                if (retour.message == 'OK') {
                    swal(
                        'OK!',
                        'Paiement effectué',
                        'success'
                    );
                    setTimeout(function () {
                        window.location.href = $('#urlhome').val();
                    }, 2000);
                } else {
                    swal(
                        'Oops...',
                        'Veuillez réessayer!',
                        'error'
                    );
                }
            }
            , error: function (resultat, statut, erreur) {
                console.log('erreur :  ' + erreur)
            }
        });
   // }
}
