function viderForm() {
    $('#telephone').val('');
    $('#montant').val('');
    $('#notif_number').val('');
    $('#notif_email').val('');
    $('#devise').val('');
}

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

function validateEmailAddress(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function momo(action) {
    //alert(type);
    var data = {};
    var envoi = true;
        var notif_number = $('#notif_number').val();

    var tel = $('#telephone').val();
    var montant = $('#montant').val();

    var notif_email = $('#notif_email').val();
    var devise = $('#devise').val();
    data._token = $('#token').val();
    if (tel == '' || montant == '' || montant <= 0 || devise == '' ) {
        envoi = false;
        //alert('Renseignez le montant, le telephone et la devise');
        swal(
            'Oops...',
            'Renseignez le montant, le telephone et la devise',
            'error'
        );
    } else {
        if ((!validatePhoneNumber(tel)) || (notif_number != '' && !validatePhoneNumber(notif_number)) ) {
            envoi = false;
            swal(
                'Oops...',
                'Numero de telephone invalide',
                'error'
            );
        } else {
            if (notif_email != '' && (!validateEmailAddress(notif_email))) {
                envoi = false;
                swal(
                    'Oops...',
                    'Email invalide',
                    'error'
                );
            } else {
                data.numero = tel;
                data.montant = montant;
                //data.notif_number = notif_number;
                data.notif_email = notif_email;
                data.devise = devise;

                if(document.getElementById('notif_number')){
                    data.notif_number = $('#notif_number').val();
                }
                else{
                    data.numerodst = $('#numerodst').val();

                }
            }

        }
        if (envoi) {
            var url = $('#url').val();
            data._token = $('#token').val();
            $.ajax({
                type: "POST",
                data: data,
                url: url
                , success: function (retour) {
                    console.log(retour);
                    var momo = [];
                    if (localStorage.getItem('momo')) {
                        var momo = JSON.parse(localStorage.getItem('momo'));
                    }
                    momo.push(retour.data);
                    localStorage.setItem('momo', JSON.stringify(momo));
                    console.log(JSON.parse(localStorage.getItem('momo')));
                    if (retour.message == 'OK') {
                        viderForm();
                        swal(
                            'OK!',
                            action + ' effectué',
                            'success'
                        );
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

        }


    }
}