<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="infoLabel">{$album['nombre']}</h4>
      </div>
      <div class="modal-body">
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
