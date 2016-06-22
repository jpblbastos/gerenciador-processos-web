<?php
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
    // recebe post 
    if ( (!empty($_POST['nome_processo'])) && (!empty($_POST['autor'])) && (!empty($_POST['versao'])) && (!empty($_POST['descricao'])) && (!empty($_FILES['config_json'])) && (!empty($_FILES['diagramas']))  ) {
    	if ($oGPW->addProcesso($_POST['nome_processo'],$_POST['autor'],$_POST['versao'],$_POST['descricao'], $_FILES['config_json'], $_FILES['diagramas'], $_FILES['anexos'] ) ){
    		 header("location: index.php");
    	}else{
    		 echo "<h1>Desculpe o constrangimento mas não foi possivel adicionar um novo processo á sua base verifique permissões </h1><i class='fa fa-meh-o fa-4x'></i>";
    	}	
    }else{
    	header("location: index.php");
    }
    
    //carrega arquivo footer
   	if ( is_file('includes/footer.inc') ){
   		require_once('includes/footer.inc');
	}else{
   		echo "<h1>OPS, arquivo footer.inc nao encontrado, impossivel de prosseguir!!</h1>";
   		exit;
	}   
?>
