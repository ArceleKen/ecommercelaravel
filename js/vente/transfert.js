// Validation du formulaire
function displayMessage(message, info) {
    errorMessageSelector = $('#error');
    if (errorMessageSelector) {
        errorMessageSelector.remove();
    }

    informationMessageSelector = $('#info');
    if (informationMessageSelector) {
        informationMessageSelector.remove();
    }
    messageParent = $('.panel-heading');
    if (info && (info === 'info')) {
        messageParent.append('<div id="info" class="row btn-success" style="border-radius: 5px; margin-left: 5px; margin-right: 5px; padding: 5px;">' + message + '</div>');
    } else {
        messageParent.append('<div id="error" class="row btn-danger" style="border-radius: 5px; margin-left: 5px; margin-right: 5px; padding: 5px;">' + message + '</div>');
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

function numInter(phoneNumber) {
    str = phoneNumber.replace(/\s/g, '');
    // Check if all char are digit
    if (!/^\d+$/.test(str)) {
        return false;
    }

    if (str.length !== 12) {
        return false;
    }

    return true;
}

function getOperateur(numero) {
    if (numero.startsWith('23769')
        || numero.startsWith('237655')
        || numero.startsWith('237656')
        || numero.startsWith('237657')
        || numero.startsWith('237658')
        || numero.startsWith('237659')) {
        return 'orange';
    } else if (numero.startsWith('23767')
        || numero.startsWith('237650')
        || numero.startsWith('237651')
        || numero.startsWith('237652')
        || numero.startsWith('237653')
        || numero.startsWith('237654')) {
        return 'mtn';
    } else if (numero.startsWith('23766')) {
        return 'nexttel';
    } else if (numero.startsWith('237243')) {
        return 'camtel';
    } else {
        return 'vodafone';
    }
}

function validateEmailAddress(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function send() {
    numero = $('#numero').val();
    montant = $('#montant').val();
    email = $('#email').val();
    texte = $('#texte').val();
    operateur = '' + $('#operateur').val();

    if ((!numero) || (operateur!=='INT' && !validatePhoneNumber(numero)) || (operateur === 'INT' && !numInter(numero))) {
        // displayMessage('Veuillez saisir un numéro au format 237XXXXXXXXX', 'error');
        swal(
            'Oops...',
            'Veuillez saisir un numéro au format internationnal',
           // "{!! Lang::get('messages.msgtrans') !!}",
            'error'
        );
        return;
    }

    if (operateur !== 'INT' && getOperateur(numero) !== operateur) {
        // displayMessage('Ce numéro n\'est pas celui de l\'opérateur ' + operateur.toUpperCase());
        swal(
            'Oops...',
            'Ce numéro n\'est pas celui de l\'opérateur ' + operateur.toUpperCase(),
            'error'
        );
        return;
    }

    if (!montant || isNaN(montant) || (montant <= 0)) {
        // displayMessage('Le montant doit être plus grand que zéro', 'error');
        swal(
            'Oops...',
            'Le montant doit être plus grand que zéro',
            'error'
        );
        return;
    }

    if (!email || !validateEmailAddress(email)) {
        // displayMessage('Adresse email incorrecte', 'error');
        swal(
            'Oops...',
            'Adresse email incorrecte',
            'error'
        );
        return;
    }

    formulaire = {
        'numero': numero,
        'montant': montant,
        'email': email,
        'texte': texte,
        '_token': $('#_token').val()
    };

    //var url =
    //$.post('http://localhost/digipos/transfert/' + operateur, formulaire, function (data, status) {
    $.post($('#urltransfert').val()+'/' + operateur, formulaire, function (data, status) {
        console.log(status);

        transferts = localStorage.getItem('transferts');
        if (!transferts) {
            transferts = [];
        } else {
            transferts = JSON.parse(localStorage.getItem('transferts'));
        }

        formulaire['operateur'] = operateur;
        formulaire['status'] = data['data'] === true ? 'OK' : 'KO';
        transferts.push(formulaire);

        localStorage.setItem('transferts', JSON.stringify(transferts));
        if (data['data'] === true) {
            $('#numero').val('');
            $('#montant').val('');
            $('#texte').val('');

            // displayMessage(data['message'], 'info');
            swal(
                'Transfert',
                data['message'],
                'success'
            );
        } else {
            // displayMessage(data['message'], 'error');
            swal(
                'Oops...',
                data['message'],
                'error'
            );
        }
    }).done(function (data) {
    }).fail(function () {
        // displayMessage('Une erreur est survenue lors du tranfert', 'error');
        swal(
            'Oops...',
            'Une erreur est survenue lors du tranfert',
            'error'
        );
    });
}

$(document).ready(function () {
    $('#numero').keypress(function () {
    });

    $('#send').click(function () {
        send();
    });
});