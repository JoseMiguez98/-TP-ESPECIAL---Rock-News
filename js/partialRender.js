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

  //Fracciono la data traida con AJAX y la inyecto
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

  //Borrar elemento/Cambiar permisos usuario de las tablas con partial render
  $(".innerMain").on('click','.modifyButton', function(){
    event.preventDefault();
    let id = $(this).attr('id');
    let action = $(this).data('target');
    console.log(action+'/'+id);
    $.ajax({
      'url' : action + '/' + id,
      "contentType" : "application/json; charset=utf-8",
      "dataType" : "HTML",
      'success' : function(data){
        if (data == 'same_user'){
          window.location.href = '';
        }
        else{
          console.log("Entro");
          console.log(data);
          let table = $(data).find()['prevObject'][0];
          $('.innerMain').html(table);
        }
      }
    });
  });

  //Inserto/Actualizo datos en las tablas mediante AJAX
  $('.innerFooter').on('submit', '.refreshForm',  function(event){
    event.preventDefault();
    let serializedData = $(this).serialize();
    console.log(serializedData);
    let action = $(this).data('target');
    $.post(action, serializedData, function(data) {
      let table = $(data).find()['prevObject'][0];
      console.log(table);
      $('.innerMain').html(table);
    });
  });

  //Disparo el submit de los formularios/ Alta y Modificación
  $('.innerFooter').on('click', '.btn-submitForm', function(event){
    let formToSubmit = $(this).data('target');
    $('#'+formToSubmit).submit();
  });

  //Filtrado de albums traidos con AJAX
  $('.innerMain').on('click','.genreFilter', function(){
    let filter = $(this).data('target');
    console.log(filter);
    $.ajax({
      'url' : 'filterGenre/'+filter,
      "contentType" : "application/json; charset=utf-8",
      "dataType" : "HTML",
      'success' : function(data){
        console.log(data);
        inyect(data);
      }
    });
  });

  //Traigo la info extra de cada album con AJAX
  $('.innerMain').on('click','.albumInfo', function(){
    event.preventDefault();
    let id = $(this).attr('id');
    // console.log(id);
    $.ajax({
      'url' : 'albumInfo/'+id,
      "contentType" : "application/json; charset=utf-8",
      "dataType" : "HTML",
      'success' : function(data){
        $('.innerModal').html(data);
        $('#infoModal').modal('toggle');
      }
    });
  });

  //Login de usuario con AJAX
  $('.innerMain').on('submit', '.sessionForm', function(event){
    event.preventDefault();
    let serializedData = $(this).serialize();
    console.log(serializedData);
    let action = $(this).data('target');
    console.log(action);
    // console.log(serializedData);
    //|===========================|//
    $.ajax({
      'url' : action,
      'data' : serializedData,
      'dataType' : 'HTML',
      'method' : 'POST',
      'success' : function(data){
        //En caso de recibir respuesta AJAX evalua si se loggeo o se creo un usuario.
        if(data == 'success_logged'){
          window.location.href = '';
        }
        else if(data == 'success_registered'){
          //===//
          //Si un nuevo user fue creado AJAX lo loggea automaticamente
          $.post('verifyUser', serializedData, function() {
            window.location.href = '';
          });
          //===//
        }
        else{
          inyect(data);
        }
      }
    });
  });

  //Mostrar modals de alta y baja usando AJAX
  $('.innerMain').on('click', '.toggle-modal-btn',  function(){
    event.preventDefault();
    let id_element = $(this).attr('id');
    console.log(id_element);
    let element = $(this).data('target');
    console.log(element);
    $.ajax({
      'url' : 'showModal'+'/'+element+'/'+id_element,
      'contentType' : 'application/json; charset=utf-8',
      'success' : function(data, action){
        $('.innerModal').html(data);
        $('.modal').modal('toggle');
      }
    })
  });


  //AJAX trae la HOME cuando se carga el documento
  $.ajax({
    'url' : 'home',
    "contentType" : "application/json; charset=utf-8",
    "dataType" : "HTML",
    'success' : inyect
  });
});
