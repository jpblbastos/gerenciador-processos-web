<!DOCTYPE html>
<html>
	<head>
    <!-- Title --> 
    <title>Gerenciador de Processos Web</title>	
       
		<!-- Basic -->
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<meta name="description" content="Gerencia os processos desenvolvidos em bizagi">
    <meta http-equiv="content-language" content="pt-br" />
		<meta name="author" content="João Paulo Bastos <jpbl.bastos at gmail dot com>">

		<!-- Favicon
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">-->

    <!-- Estilos externos -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet" />

		<!-- Estilos customizados -->
		<link rel="stylesheet" media="all" href="libs/css/custom.css">
    <link rel="stylesheet" media="all" href="libs/css/bootstrap-modal-bs3patch.css" />
    <link rel="stylesheet" media="all" href="libs/css/bootstrap-modal.css" />

    <!-- Script de Customização -->
    <SCRIPT TYPE="text/javascript"> 
    <!-- function submitenter(myfield,e) { 
          var keycode; 
          if (window.event) 
            keycode = window.event.keyCode; 
          else if (e) keycode = e.which; 
          else return true; 

          if (keycode == 13) { 
            myfield.form.submit(); 
            return false; 
          } else 
            return true; 
          } //--> 
   </SCRIPT>
   
	</head>
	<body class="tutorials-controller tutorials" >

	<header>

    <div class='clearfix'></div>

    <div class='wrapper'>
         <div class='bucket-header tutorials-header'>
           <h1>Gerenciador de Processos Web</h1>
           <div class='content-filter' data-content-filter-type='tutorials' data-use-content-filter-type='true'>
             <form class="content-filter-form" action="index.php" accept-charset="UTF-8" method="post">
                 <div class='query-input-container'>
                   <input type="text" name="search" id="" value="" placeholder="Pesquise por setor, palavra chave, bem aqui :)" autocomplete="off" spellcheck="off" class="content-filter-query-input" onKeyPress="return submitenter(this,event)" />
                    <span class='icon icon-new-search query-icon'></span>
                 </div>
               </form>
           </div>
         </div>
     </div>

    </header> <!-- /header -->

    <div class='wrapper layout-wrapper'>
  
    	<div class='feed-container'>
        	<div class='feed'>
