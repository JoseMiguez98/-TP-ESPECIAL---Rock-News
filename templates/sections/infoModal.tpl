<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="infoLabel">{$album['nombre']}</h4>
      </div>
      <div class="modal-body" id="infoModalBody">
        <div class="row">
          <!-- Imagenes del album -->
          <div class="col-lg-4 col-md-4">
            {if isset($album['imagenes'])}
            <div id="carousel-album" class="carousel slide" data-ride="carousel">

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                {foreach from=$album['imagenes'] item=imagen}
                {if $first}
                <div class="item active">
                  <img class="album-cover" src="{$imagen['ruta']}" alt="{$album['nombre']}">
                </div>
                {$first = !$first}
                {else}
                <div class="item">
                  <img class="album-cover" src="{$imagen['ruta']}" alt="{$album['nombre']}">
                </div>
                {/if}
                {/foreach}
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-album" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-album" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            {else}
            <img class="img-responsive" src="images/defaultcover.jpg" alt="album-cover">
            {/if}
          </div>
          <!-- Info del album -->
          <div class="col-lg-8 col-md-8">
            {$album['descripcion']}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a id="showCommentsAncor" class="pull-right" href="#" data-target="{$album['id_album']}">Ver Comentarios</a>
        {if $user_permissions eq 1}
        {if isset($album['imagenes'])}
        <a href="" id="deleteImagesForm-btn" class="pull-left" data-target="{$album['id_album']}">Borrar Imagenes</a>
        {/if}
        {/if}
        <div id="innerComments"><!--Seran inyectados los comentarios traidos desde la API--></div>

        <!--Formulario para publicar un comentario-->
        <form id="postCommentForm" method="post">
          <div class="form-group">
            <input type="hidden" id="id_album" name="id_album" value="{$album['id_album']}">
          </div>
          <div class="form-group">
            <textarea id="commentBox" class="form-control" name="commentBox" rows="5" cols="80" placeholder="Deja tu comentario aca!"></textarea>
          </div>
          <div class="form-group">
            <label class="pull-left">Puntuación:&nbsp</label>
            <label class="radio-inline pull-left"><input type="radio" name="rate" value="1" checked="checked">1</label>
            <label class="radio-inline pull-left"><input type="radio" name="rate" value="2">2</label>
            <label class="radio-inline pull-left"><input type="radio" name="rate" value="3">3</label>
            <label class="radio-inline pull-left"><input type="radio" name="rate" value="4">4</label>
            <label class="radio-inline pull-left"><input type="radio" name="rate" value="5">5</label>
          </div>
          <div class="form-group">
            <label>Comprueba que eres humano:</label>
            <input type="text" name="captcha">
            <img src="captcha/captcha.php">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success" name="submitComments-btn">Publicar</button>
          </div>
        </form>
      </div>
      <!---Cierra formulario-->
    </div>
  </div>
</div>
