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
    $.ajax('api/albums/'+id_album+'/comentarios')
    .done(function (data) {
      data['id_album'] = id_album;
      console.log(data);
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

  //Crear un nuevo comentario desde la API usando AJAX
  $('.innerMain').on('submit', '#postCommentForm',  function(e){
    e.preventDefault();
    let date = new Date();
    let year = date.getFullYear();
    let month = date.getMonth()+1;
    let day = date.getDate();
    let fecha_actual = year+"/"+month+"/"+day;
    let comentario ={
      "id_album": $('#id_album').val(),
      "comentario": $('#commentBox').val(),
      "puntaje" : $('input[name=rate]:checked').val(),
      "fecha" : fecha_actual
    };
    $.ajax({
      'url' : 'api/comentarios',
      'method' : 'POST',
      'data' : JSON.stringify(comentario),
      'statusCode' : {
        400: function(){
          alert("El campo comentario esta vacio!");
        },
        401: function(){
          alert("Inicia sesión para comentar!");
        },
      }
    })
    .done(function(data) {
      //Luego de cargar el nuevo comentario en la BBDD traigo de nuevo la lista para refrescarlos
      let id_album = $('#id_album').val();
      $.ajax('api/albums/'+id_album+'/comentarios')
      .done(function(data){
        //Le asigno la key id_album a la data para pasarsela a Mustache.
        data['id_album'] = id_album;
        let renderedTemplate = Mustache.render(templateComments, {comentarios:data});
        $('.innerMain #innerComments').html(renderedTemplate);
      })
      .fail(function(){
        alert("Se produjo un error al traer lo comentarios!")
      })
    })
    .fail(function() {
      alert('Hubo un error al postear su comentario!');
    });
  });

  //Borro un comentario desde la API con AJAX
  $('.innerMain').on('click', '.deleteComentarioAncor',  function(e){
    let id_comentario = $(this).attr('id');
    let id_album = $(this).data('target');
    $.ajax({
      'url':'api/comentarios/'+id_comentario,
      'method':'DELETE',
      'statusCode': {
        401 : function(){
          alert("No tienes permisos para borrar comentarios!");
        }
      }
    })
    //Si se elimina el comentario con exito vuelvo a traerlos para refrescar la lista
    .done(function(){
      $.ajax('api/albums/'+id_album+'/comentarios')
      .done(function(data){
        data['id_album'] = id_album;
        let renderedTemplate = Mustache.render(templateComments, {comentarios:data});
        $('.innerMain #innerComments').html(renderedTemplate);
      })
      .fail(function(){
        alert("Se produjo un error al refrescar los comentarios")
      })
    })
    .fail(function(){
      alert("Se produjo un error al intentar eliminar el comentario!")
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
