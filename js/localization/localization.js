
window.contextPath = "digicareweb";
window.urlbase = 'http://' + window.location.host + '/' + window.contextPath;

 zoomMap = 12;
var divForm = "div.box-body";
var errorLocalisation = "#errorLocalisation";

function splitMethod(localization) {
    var tableau=localization.split("/");
    return tableau;
}

function callAPIforMap(suffixUrl, param) {
  
            // https://esptpa.worldvoice.eu/digicoreapp/sav/gettransactionlocate     
            $.ajax({
               url : window.urlbase+suffixUrl,
               type : 'POST',
               data : param,
               dataType : 'JSON', // On désire recevoir du JSON
               success : function(apiResponse, statut){ // apiResponse contient le JSON renvoyé
                    $(errorLocalisation).hide();

                    var dataLength = apiResponse.length;
                    // la variable global zoomMap est definit dans le fichier app.blade.php
                    
                    if (dataLength > 0) { // on se rassure qu'il ya au moins un élément dans le tableau
                                              
                        // on split pour obtenir la latitude et la longitude
                        var localization = splitMethod(apiResponse[0].localization);
                        var zone = {lat: parseFloat(localization[0]), lng: parseFloat(localization[1])};

                        var map = new google.maps.Map(
                              document.getElementById('map'), {zoom: zoomMap, center: zone});
                        var title = "";
                        for(var key in apiResponse[0]){
                                  if (key!= "localization") {
                                     title += "\n"+key+" : " +apiResponse[0][key];
                                  }
                        }

                        var marker = new google.maps.Marker({position: zone, map: map, title: title});
                        
                        if(dataLength > 1){
                            epsilon = 0.0006;// on defini ceci pour faire un decalage entre les signet confondu
                            
                            //dès qu'on affiche un signet, on fait un decalage de epsilon aux signets de memes coordonnées restant 
                            for (var i = 0; i < dataLength; i++) {
                              
                                if (i>0) { // car la map est dejà initialisé avec le signet en position 0 
                                  var localization = splitMethod(apiResponse[i].localization);
                                  var zone = {lat: parseFloat(localization[0]), lng: parseFloat(localization[1])};
                                  var title = "";
                                  for(var key in apiResponse[i]){
                                      if (key!= "localization") {
                                            title += "\n"+key+" : " +apiResponse[i][key];
                                      }
                                  }
                                     
                                  var marker = new google.maps.Marker({position: zone, map: map, title: title});
                                }

                                for (var j = i+1; j < dataLength; j++) {
                                  //si les coordonnées se repètent on fait un decalage des coordonnées de "epsilon"
                                  if(apiResponse[i].localization == apiResponse[j].localization){
                                    var localization = splitMethod(apiResponse[j].localization);
                                    var lat = parseFloat(localization[0]) + epsilon;
                                    var lng = parseFloat(localization[1]) + epsilon;
                                    apiResponse[j].localization = lat+"/"+lng;
                  
                                  }
                                }
                            }
                        }

                    }
                    else{
                        $("#map").empty();
                        $(errorLocalisation).show();
                    }


                    //alert( "success call : " + apiResponse.length);
               },
               error : function(resultat, statut, erreur){
                    //alert( "fail call : " + statut);
                    $("#map").empty();
                    $(errorLocalisation).show();
               }
            }); 
                         
}