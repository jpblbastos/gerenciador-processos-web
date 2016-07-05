<?php
  // Verifica se foi passado o parametro de pesquisa
  if (!empty($_POST["search"])){
      $search=$_POST["search"];
  }elseif (empty($_GET["search"])) {
      $search='todos';
  }else{
      $search=$_GET["search"];
  }
   
	//carrega arquivo header
	if ( is_file('includes/header.inc') ){
   		require_once('includes/header.inc');
	}else{
   		echo "<h1>OPS, arquivo header.inc nao encontrado, impossivel de prosseguir!!</h1>";
   		exit;
	}   
    
    // invoca a classe gerenciadora 
    if (is_file('libs/php/gerenciador.class.php') ){
   		require_once('libs/php/gerenciador.class.php');
    }else{
    	echo "<h1>OPS, classe gerenciadora nao encontrado, impossivel de prosseguir!!</h1>";
        exit;
    }
    // instancia o objeto gerenciador
    if (!$oGPW = new GPW()){
       echo "<h1>OPS, classe gerenciadora com erro, impossivel de prosseguir!!</h1>";
       exit;
    }
   
    // exibe filtros 
    echo "\n	<div class='filter-bar'>
             		<div id='fadeable'>
               			<a class='feedable-cta' href='#form-content' id='enviar-processo' data-toggle='modal'><span class='icon icon-share-square'></span> Upload</a>
               			<div class='feed-filter-results-count'><span class='results-number'>".$oGPW->getTotalProcessos()."</span> <span class='feed-filter-results-type'>Processos Disponíveis</span></div>
               			<ul class='filters'>\n";
                        if ($search == "todos") {
                           echo "<li>
                                   <a class='series feed-filter-link active'  href='index.php?search=todos'>Todos \o/</a>
                                </li>
                                <li>
                                   <a class='newest feed-filter-link' href='index.php?search=comercial'>Comercial</a>
                                </li>
                                <li>
                                  <a class='popular feed-filter-link' href='index.php?search=backoffice'>Back Office</a>
                                </li>\n";
                        }elseif($search == "comercial") {
                           echo "<li>
                                   <a class='series feed-filter-link'  href='index.php?search=todos'>Todos</a>
                                </li>
                                <li>
                                   <a class='newest feed-filter-link active' href='index.php?search=comercial'>Comercial \o/</a> 
                                </li>
                                <li>
                                  <a class='popular feed-filter-link' href='index.php?search=backoffice'>Back Office</a>
                                </li>\n";
                        }elseif($search == "backoffice") {
                           echo "<li>
                                   <a class='series feed-filter-link'  href='index.php?search=todos'>Todos</a>
                                </li>
                                <li>
                                   <a class='newest feed-filter-link' href='index.php?search=comercial'>Comercial</a> 
                                </li>
                                <li>
                                  <a class='popular feed-filter-link active' href='index.php?search=backoffice'>Back Office \o/</a>
                                </li>\n";
                        }else{ //pesquisa por palavra desejada
                           echo "<li>
                                   <a class='series feed-filter-link'  href='index.php?search=todos'>Todos</a>
                                </li>
                                <li>
                                   <a class='newest feed-filter-link' href='index.php?search=comercial'>Comercial</a>
                                </li>
                                <li>
                                  <a class='popular feed-filter-link' href='index.php?search=backoffice'>Back Office</a>
                                </li>\n";
                        }
      echo "   			</ul>
             		</div> <!-- /fadeable -->
           		</div> <!-- filter-bar -->\n
           		
           		<div class='filter-objects'>
                	<ul class='feedable-list'>\n";

    //exibe os processos
    echo $oGPW->showHtmlProcessos($search);

   	//carrega arquivo footer
   	if ( is_file('includes/footer.inc') ){
   		require_once('includes/footer.inc');
	  }else{
   		echo "<h1>OPS, arquivo footer.inc nao encontrado, impossivel de prosseguir!!</h1>";
   		exit;
	  }   

?>
