function viderForm(type) {
    switch (type) {
        case  'voucher' :
            $('#numero').val('');
            break;
        case 'sofort':
            $('#montant').val('');

            break;

        case 'paypal':
            $('#montant').val('');

            break;

        case 'momo':
            $('#telephone').val('');
            $('#montant').val('');
            $('#notif_number').val('');
            $('#notif_email').val('');
            $('#devise').val('');
            break;
    }

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

function recharger(type) {
    //alert(type);
    var data = {};
    var envoi = true;
    switch (type){
        case  'voucher' :
            var  numero = $('#numero').val();
            if(numero == ''){
                envoi = false;
                //alert('Renseignez le numero du voucher');
                swal(
                    'Oops...',
                    'Renseignez le numero du voucher',
                    'error'
                );
             }else{
                data.numero = numero
            }
            break;

        //case ('paypal' || 'sofort'):
        case 'sofort':
            //alert('in case');
            var  montant = $('#montant').val();
            if(montant == '' || montant <= 0){
                envoi = false;
                //alert('Renseignez un montant positif');
                swal(
                    'Oops...',
                    'Renseignez un montant positif',
                    'error'
                );
            }else{
                data.montant = montant
            }
            break;

        case 'paypal':
            //alert('in case');
            var  montant = $('#montant').val();
            if(montant == '' || montant <= 0){
                envoi = false;
                //alert('Renseignez un montant positif');
                swal(
                    'Oops...',
                    'Renseignez un montant positif',
                    'error'
                );
            }else{
                data.montant = montant
            }
            break;



        case 'momo':
            var tel = $('#telephone').val();
            var montant = $('#montant').val();
            var notif_number = $('#notif_number').val();
            var notif_email = $('#notif_email').val();
            var devise = $('#devise').val();
            if(tel == '' || montant == '' || montant <= 0 || devise == ''){
                envoi = false;
                //alert('Renseignez le montant, le telephone et la devise');
                swal(
                    'Oops...',
                    'Renseignez le montant, le telephone et la devise',
                    'error'
                );
            }else{
                if((!validatePhoneNumber(tel)) || (notif_number != '' && !validatePhoneNumber(notif_number))){
                    envoi = false;
                    swal(
                        'Oops...',
                        'Numero de telephone invalide',
                        'error'
                    );
                }else{
                    if(notif_email != '' && (!validateEmailAddress(notif_email))){
                        envoi = false;
                        swal(
                            'Oops...',
                            'Email invalide',
                            'error'
                        );
                    }else{
                        data.telephone = tel;
                        data.montant = montant;
                        data.notif_number = notif_number;
                        data.notif_email = notif_email;
                        data.devise = devise;
                    }

                }

            }
            break;

        default:
            envoi = false;
            break;
      }

    if(envoi){
        var recharges = [];
        if(localStorage.getItem('recharges')){
            var recharges = JSON.parse(localStorage.getItem('recharges'));
        }
        var url = $('#url').val();
        data._token = $('#token').val();
        $.ajax({
            type: "POST",
            data: data,
            url: url
            , success: function (retour) {
                console.log(retour);
                recharges.push(retour.data);
                localStorage.setItem('recharges', JSON.stringify(recharges));
                console.log(JSON.parse(localStorage.getItem('recharges')));
                if(retour.message == 'OK'){
                    viderForm(type);
                    swal(
                        'OK!',
                        'Recharge effectuée',
                        'success'
                    );
                }else{
                    swal(
                        'Oops...',
                        'Veuillez réessayer!',
                        'error'
                    );
                }
            }
            , error: function (resultat, statut, erreur) {
                console.log('erreur :  '+ erreur)
            }
        });

    }


}