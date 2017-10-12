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
    return $(_data).find()['prevObject'][dataReturn];
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

  //Borrar elemento de las tablas con partial render
  $(".innerMain").on('click','.deleteButton', function(){
    event.preventDefault();
    let id = $(this).attr('id');
    let action = $(this).data('target');
    console.log(action+'/'+id);
    $.ajax({
      'url' : action + '/' + id,
      "contentType" : "application/json; charset=utf-8",
      "dataType" : "HTML",
      'success' : function(data){
        let table = $(data).find()['prevObject'][0];
        $('.innerMain').html(table);
      }
    });
  });

  //Inserto/Actualizo datos en las tablas mediante AJAX
  $('.innerFooter').on('submit', '.refreshForm', function(event){
    event.preventDefault();
    let serializedData = $(this).serialize();
    // console.log(serializedData);
    let action = $(this).data('target');
    $.post(action, serializedData, function(data) {
      let table = $(data).find()['prevObject'][0];
      console.log(table);
      $('.innerMain').html(table);
    });
  });

  $('.innerMain').on('click','.genreFilter', function(){
    let filter = $(this).data('target');
    $.ajax({
      'url' : 'filterGenre/'+filter,
      "contentType" : "application/json; charset=utf-8",
      "dataType" : "HTML",
      'success' : function(data){
        $('.innerMain').html(data);
      }
    });
  });

  // $('.innerMain').on('submit', '.loginForm', function(event){
  //   event.preventDefault();
  //   let serializedData = $(this).serialize();
  //   console.log(serializedData);
  //   $.post('verifyUser', serializedData, function(data) {
  //     inyect(data);
  //   });
  // });

  //AJAX trae la HOME cuando se carga el documento
  $.ajax({
    'url' : 'home',
    "contentType" : "application/json; charset=utf-8",
    "dataType" : "HTML",
    'success' : inyect
  });
});
