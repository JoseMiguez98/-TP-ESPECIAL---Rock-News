$(document).ready(function(){
  "use strict";

  $('.genreFilter').on('click', function(){
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
});
