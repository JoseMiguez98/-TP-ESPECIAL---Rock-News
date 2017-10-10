$(document).ready(function(){
  "use strict";

  //Función que parsea la data de AJAX y retorna un elemento del DOM
  function parseData(_data ,_content){
    let dataReturn;
    if(_content == '.dataMain'){
      dataReturn = 0;
    }
    else{
      dataReturn = 2;
    }
    return $(_data).find(_content)['prevObject'][dataReturn];
  }

  function inyect(data,textStatus, jqXHR){
    let dataMain = parseData(data, '.dataMain');
    let dataFooter = parseData(data, '.dataFooter');
    // let dataFooter = $(data).find(".dataFooter")['prevObject'];
    // console.log(dataMain);
    // console.log(dataFooter);
    $('.innerMain').html(dataMain);
    $('.innerFooter').html(dataFooter);
  };

  // Evento que dispara el pedido a AJAX al cliquear un link de la navbar
  $(".navLink").on("click", function(){
    event.preventDefault();
    let action = $(this).data('target');
    console.log(action);
    $.ajax({
      'url' : action,
      "contentType" : "application/json; charset=utf-8",
      "dataType" : "HTML",
      'success' : inyect
    });
  });

  $('form').on("submit", function(event) {
      let action = $(this).attr('action'); //wrap this in jQuery

      alert(action);
  });

  $.ajax({
    'url' : 'home',
    "contentType" : "application/json; charset=utf-8",
    "dataType" : "HTML",
    'success' : inyect
  });

});
