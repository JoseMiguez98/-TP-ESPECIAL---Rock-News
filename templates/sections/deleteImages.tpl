<form id='deleteImagesForm'  method="post" data-target="{$images[0]['id_album']}">
  <div class="form-group">
    <div class="row">
        {foreach from=$images item=image}
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <img src="{$image['ruta']}" class="img-responsive">
          <input type="checkbox" name="imageCheck[]" value="{$image['id_imagen']}">
        </div>
        {/foreach}
    </div>
  </div>
  <div class="form-group">
    <center><button type="submit" class="btn btn-success" name="submit-btn">Borrar imagenes</button></center>
  </div>
</form>
<a href="#" id="backToInfoAncor" class="glyphicon glyphicon-menu-left" data-target="{$id_album}">Atras</a>
