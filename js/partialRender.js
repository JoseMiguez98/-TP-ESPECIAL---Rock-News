$(document).ready(function(){
  "use strict";

  //AJAX Trae el template de comentarios y lo deja disponible para su posterior uso
  let templateComments;
  $.ajax({ 'url': 'js/templates/comments.mst'})
  .done( template => templateComments = template);

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
    // let serializedData =
    // console.log(serializedData);
    let action = $(this).data('target');
    $.ajax({
      'url' : action,
      'data' : new FormData(this),
      'contentType': false,
      'processData': false,
      'method' : 'POST',
      'success' : function(data){
        let table = $(data).find()['prevObject'][0];
        console.log(table);
        $('.innerMain').html(table);
      }
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
        $('.innerInfo').html(data);
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
        $('#abmModal').modal('toggle');
      }
    })
  });

  //Traigo el formulario para borrar imagenes de un album con AJAX
  $('.innerMain').on('click', '#deleteImagesForm-btn',  function(){
    event.preventDefault();
    let id_album = $(this).data('target');
    $.ajax({
      'url' : 'showImages/'+id_album,
      'method' : 'GET',
      'success' : function(data){
        $('#infoModalBody').html(data);
      }
    });
    $('#deleteImagesForm-btn').hide();
    $('.innerMain #showCommentsAncor').hide();
  });

  //Borra imagenes de un album con AJAX
  $('.innerMain').on('submit', '#deleteImagesForm',  function(){
    event.preventDefault();
    let id_album = $(this).data('target');
    $.ajax({
      'url' : 'deleteImages/'+id_album,
      'data' : new FormData(this),
      'contentType': false,
      'processData': false,
      'method' : 'POST',
      'success' : function(data){
        if(data == 'no_image_selected'){
          alert("Por favor seleccione una imagen!");
        }
        else{
          $('#infoModalBody').html(data);
        }
      }
    });
  });

  //Trae la lista de comentarios para un album especifico con AJAX
  $('.innerMain').on('click', '#showCommentsAncor',  function(e){
    e.preventDefault();
    let id_album = $(this).data('target');
    $.ajax('api/comentarios/'+id_album)
    .done(function (data) {
      let renderedTemplate = Mustache.render(templateComments, {comentarios:data})
      $('.innerMain #deleteImagesForm-btn').hide();
      $('.innerMain #showCommentsAncor').hide();
      $('.innerMain #innerComments').html(renderedTemplate);
    })
  });

  //Oculta la lista de comentarios
  $('.innerMain').on('click', '#closeCommentsAncor',  function(e){
    $('.innerMain #comments').remove();
    $('.innerMain #deleteImagesForm-btn').show();
    $('.innerMain #showCommentsAncor').show();
  });

  //Volver a la info del album desde la lista de imagenes con AJAX
  $('.innerMain').on('click', '#backToInfoAncor',  function(e){
    let id_album = $(this).data('target');
    $.ajax('albumInfo/'+id_album)
    .done(function(data){
      //Obtengo solo el cuerpo del modal para no crearlo de nuevo
      let body = $(data).find('#infoModalBody');
      $('#infoModalBody').html(body.html());
      $('#deleteImagesForm-btn').show();
      $('.innerMain #showCommentsAncor').show();
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
