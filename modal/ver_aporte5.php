<?php
include 'connect.php';
  if (isset($conn))
  { 
?>
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" id="miModalObjEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document" style="width:1250px;">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Aporte del curso a los objetivos de aprendizaje</h4>
        </div>
        <div class="modal-body">

        <div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->

        <div class="resul_div2"></div><!-- Datos ajax Final -->
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      </div>
    </div>
<?php
  }
?>
