/**
 * Created by FONG on 05/06/2018.
 */

// This function check whether a radio button is selected
function itemSelected(){
    var div_nature = document.getElementById("div_nature");

    if(div_nature.style.display == "none"){
        div_nature.style.display = "block";
    }
}

// This function hide the select field associated to Nature when another radio button than Nature is selected
function otherItem(){
    var div_nature = document.getElementById("div_nature");
    div_nature.style.display = "none";
}
