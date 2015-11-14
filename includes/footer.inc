					</ul> <!-- / ul>feedable-list -->
    			</div> <!-- / filter-objects -->
			<div class='clearfix'></div>
			</div> <!-- / feed -->
		</div> <!-- feed-container -->
	</div> <!-- /wrapper layout-wrapper-->
	
	<footer class='footer'>
  		<!--<div class='footer-icon'>
    		<span class='icon icon-sammy'></span>
  		</div>-->

 		<!-- <div class='copyright'>
    		Copyright &copy; 2015 DigitalOcean&trade; Inc.
  		</div>-->
	</footer> <!-- / footer -->

<!-- Formulario modal -->
<div id="form-content" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Enviar Processo <i class="fa fa-rocket"></i></h4>
  </div>
  <div class="modal-body">
    <form enctype="multipart/form-data" action="checkout.php" accept-charset="UTF-8" method="post">
      <div class="row">
        <div class="col-md-5">
          <h4>Nome Processo:</h4>
          <p><input class="form-control" type="text" name="nome_processo"  placeholder="Ex: Fluxo trabalho Git/GitHub" required="required" maxlength="60"/></p>
       </div>
      <div class="col-md-5">
        <h4>Autor:</h4>
        <p><input class="form-control" type="text" name="autor"  placeholder="Ex: João Fulano"  required="required" maxlength="60"/></p>
      </div>
      <div class="col-md-2">
        <h4>Versão:</h4>
        <p><input class="form-control" type="text" name="versao" placeholder="Ex: 1.0.0"  required="required" maxlength="6"/></p>
      </div>
      <div class="col-md-12">
        <h4>Descrição:</h4>
        <p><input class="form-control" type="text" name="descricao" placeholder="Ex: Este processo é um fluxo de trabalho completo usando Git/GitHub" required="required" required="required" maxlength="120"/></p>
      </div>
      <div class="col-md-6">
        <h4>Configuração Json:</h4>
        <p><input class="form-control" type="file" name="config_json" required="required"/></p>
      </div>
      <div class="col-md-6">
        <h4>Diagramas:</h4>
        <p><input class="form-control" type="file" multiple="multiple" name="diagramas[]" required="required"/></p>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" data-dismiss="modal" class="btn btn-default">Desistir <i class="fa fa-ban"></i></button>
      <button type="submit" class="btn btn-primary">Enviar <i class="fa fa-paper-plane-o"></i></button>
    </div> <!-- /modal-footer -->
  </form>
  </div> <!-- /modal-body -->
</div> <!-- /formulario-modal -->
 
<!-- Scripts Automatizadores -->  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.js"></script>
<script src="libs/js/bootstrap-modalmanager.js"></script>
<script src="libs/js/bootstrap-modal.js"></script>
	</body>
</html>