function recharger(uidClient, nomClient) {
    swal({
        title: 'Montant ',
        input: 'text',
        showCancelButton: true,
        inputValidator: function (value) {
            return new Promise(function (resolve, reject) {
                if (value) {
                    resolve()
                } else {
                    reject('Saisissez le montant!')
                }
            })
        }
    }).then(function (montant) {
        // on recupère le montant et on appel l'api
        var data = {};
        data._token = $('#token').val();
        data.uid = uidClient;
        data.montant = montant;
        data.nom = nomClient;
        var url = $('#url').val();
        $.ajax({
            type: "POST",
            data: data,
            url: url
            , success: function (retour) {
                var rechargesclient = [];
                if(localStorage.getItem('rechargesclient')){
                    var rechargesclient = JSON.parse(localStorage.getItem('rechargesclient'));
                }
                console.log(retour);
                rechargesclient.push(retour.data);
                localStorage.setItem('rechargesclient', JSON.stringify(rechargesclient));
                console.log(JSON.parse(localStorage.getItem('rechargesclient')));
                if(retour.message == 'OK'){
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
        /*
        swal({
            type: 'success',
            html: 'You entered: ' + result
        }) */
    })
}