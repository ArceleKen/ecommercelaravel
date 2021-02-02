/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $('#fen').click(function(){
        $('#Time').modal('show');
    });
    
    $('#lprefix').click(function(){
        $('#prefix').modal('show');
    });
    
    
//    $(function(){
//        $("#table").sort({ sortList: [[0,0], [1,0]] });
//      });

$('.fermer').click(function(){
    $('#Time').modal('hide');
    $('#prefix').modal('hide');
});

$('#table').tablesorter();
$('#table').DataTable();
   
      
      
});

