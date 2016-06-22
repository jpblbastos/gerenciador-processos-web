<?php
 /**
 * Este arquivo é parte do projeto gerenciador de processos web
 *
 * Este programa é um software livre: você pode redistribuir e/ou modificá-lo
 * sob os termos da Licença Pública Geral GNU (GPL)como é publicada pela Fundação
 * para o Software Livre, na versão 3 da licença, ou qualquer versão posterior
 * e/ou 
 * sob os termos da Licença Pública Geral Menor GNU (LGPL) como é publicada pela Fundação
 * para o Software Livre, na versão 3 da licença, ou qualquer versão posterior.
 *  
 * Você deve ter recebido uma cópia da Licença Publica GNU e da 
 * Licença Pública Geral Menor GNU (LGPL) junto com este programa.
 * Caso contrário consulte <http://www.fsfla.org/svnwiki/trad/GPLv3> ou
 * <http://www.fsfla.org/svnwiki/trad/LGPLv3>. 
 *
 * @package     GPW
 * @name        gerenciador.class.php
 * @version     1.0.0
 * @license     http://www.gnu.org/licenses/gpl.html GNU/GPL v.3
 * @author      Joao Paulo Bastos L. <jpbl.bastos at gmail dot com>
 * @date        10-Nov-2015
 * @description Está classe é responsavel por manipular os processos 
 *
 */

 class GPW {
 	  // propriedades da classe

 	  /**
 	  * raizDir
 	  * Diretorio raiz da aplicação
 	  * @var string
 	  */
    private $raizDir='';
   
    /**
    * dirJson
    * Diretorio para gravas os uploads json
    * @var string
    */
    private $dirJson='';

    /**
    * dirDiagramas
    * Diretorio para gravas os uploads dos diagramas
    * @var string
    */
    private $dirDiagramas='';
    
    /**
    * dirAttachments
    * Diretorio para gravas os uploads dos anexos
    * @var string
    */
    private $dirAttachments='';

    /**
    * db
    * Define obj db
    * @var objeto
    */
    private $db=null;

    /**
     * sql
     * Define sql
     * @var string 
     */
    private $sql='';

    /**
     * erro_msg
     * Define menssagens de erros
     * @var string 
     */
    public $erro_msg='';

    /**
    * oProcesso
    * Define os dados de um processo
    * @var array
    */
    /*private $oProcesso=array('idprocesso'=>'',
                             'nome'=>'',
                             'descricao'=>'',
                             'versao'=>'',
                             'dd_modificado' => '',
                             'autor' => '',
                             'contador' => '',
                             'path_config' => '',
                             'categoria' => ''
                       );*/

    // Construção dos Metodos 

    /**
    * __construct
    * Método construtor da classe
    * Este método define a inicialização da classe
    * 
    * @author  joao paulo bastos <jpbl.bastos at gmail dot com>
    * @return  boolean 
    * 
    */
    function __construct( ) {
        //obtem o path da aplicação
         $this->raizDir = dirname(dirname(dirname( __FILE__ ))) . DIRECTORY_SEPARATOR;
        //testa a existencia da classe db.class.php
        if ( is_file($this->raizDir . 'libs/php' . DIRECTORY_SEPARATOR . 'db.class.php') ){
            //carrega a biblioteca
            include($this->raizDir . 'libs/php' . DIRECTORY_SEPARATOR . 'db.class.php');
            // instancia classe db
            $this->db = new DB();
        } else {
            // caso não localizado retorna erro & sai
            echo "OPS, erro não localizamos a biblioteca do banco de dados. Impossivel prosseguir ! :( ";
            exit();
        }
        //testa a existencia do arquivo de configuração
        if ( is_file($this->raizDir . 'config' . DIRECTORY_SEPARATOR . 'config.php') ){
            //carrega o arquivo de configuração
            include($this->raizDir . 'config' . DIRECTORY_SEPARATOR . 'config.php');
            // carrega propriedades da classe com os dados de configuração
            $this->dirJson        = $dirJson;
            $this->dirDiagramas   = $dirDiagramas;
            $this->dirAttachments = $dirAttachments;
        } else {
            // caso não exista arquivo de configuração retorna erro
            echo "OPS, não foi localizado o arquivo de configuração :( ";
            exit();
        }
        return true;
    } //fim __construct

    /**
    * getTotalProcessos
    * Pega o numero total de processos gerenciados 
    *
    * @author joao paulo bastos <jpbl.bastos at gmail dot com>
    * @return integer [total de processos]
    * 
    */
    public function getTotalProcessos(){
    	/* inicializa sql */
    	$this->sql='';

    	/* armazena o resultado */
    	$data='';

    	/* prepara sql */
    	$this->sql="SELECT COUNT(idprocesso) FROM processo;";

    	/* Trabalhando com a base de dados */
        if (!$this->db->open()) {   
           $this->erro_msg = $this->db->erroMsg;
           return false;
        }
        if (! $this->db->query($this->sql)) {
           $this->erro_msg = $this->db->erroMsg;
           return false;
        }
        
        $data =  $this->db->fetch();

        return $data['0'];

        $this->db->close();

    } // fim_getTotalProcessos

    /**
    * incrementaProcesso 
    * Incrementa contador do processo para o filtro dos mais acessados
    *
    * @author joao paulo bastos <jpbl.bastos at gmail dot com>
    * @param  interger idprocesso [processo para incementação]
    * @return booblean
    * 
    */
    public function incrementaProcesso($idprocesso=0){
        /* inicializa sql */
        $this->sql='';

        /* Verifica se foi passado o parametro */
        if (!empty($idprocesso)) {
            /* prepara sql */
            $this->sql="UPDATE processo SET contador=contador + 1 WHERE idprocesso='".$idprocesso."';";
            /* Trabalhando com a base de dados */
            if (!$this->db->open()) {   
                $this->erro_msg = $this->db->erroMsg;
                return false;
            }
            if (! $this->db->query($this->sql)) {
                $this->erro_msg = $this->db->erroMsg;
                return false;
            }
            $this->db->close();
        }
    } //fim_incrementaProcesso

    /**
    * addProcesso 
    * Adicionar um novo processo
    *
    * @author joao paulo bastos <jpbl.bastos at gmail dot com>
    * @param  string nome_processo 
    * @param  string autor         
    * @param  string versao
    * @param  string descricao
    * @param  array  config_json
    * @param  array  diagramas
    * @param  array  anexos
    * @return booblean
    * 
    */
    public function addProcesso($nome_processo='', $autor='', $versao='', $descricao='', $config_json='', $diagramas='', $anexos=''){
      /* inicializa sql */
      $this->sql='';

      if ( (!empty($nome_processo)) && (!empty($autor)) && (!empty($versao)) && (!empty($descricao)) && (!empty($config_json)) && (!empty($diagramas)) ) {
          /* Faz o upload do arquivo json */
          // cria um novo nome para o arquivo json para não haver duplicidade, pois o bizagi sempre o cria com o mesmo nome
          $novo_nome_json=preg_replace('/\s/', '', $nome_processo).".json.js";
          if (!$this->__uploadJson($novo_nome_json,$config_json,$this->dirJson)) {
              return false;
          }
          /* Faz o upload dos diagramas */
          if (!$this->__uploadDiagramas($diagramas,$this->dirDiagramas)) {
              return false;
          }
          /* Faz o upload dos anexos */
          if (!$this->__uploadAttachments($anexos,$this->dirAttachments)) {
              return false;
          }
          /* monta sql */
          $this->sql="INSERT INTO `processo`
                        VALUES (NULL, '".$nome_processo."', '".$descricao."', '".$versao."', NOW(), '".$autor."', 0, '".$this->dirJson."".$novo_nome_json."', 1);";
      }

      /* Trabalhando com a base de dados */
      if (!$this->db->open()) {   
          $this->erro_msg = $this->db->erroMsg;
          return false;
      }
      if (! $this->db->query($this->sql)) {
          $this->erro_msg = $this->db->erroMsg;
          return false;
      }
      return true;
    } // fim_addProcesso

    /**
    * showHtmlProcessos
    * Mostra os processos já em html
    *
    * @author joao paulo bastos <jpbl.bastos at gmail dot com>
    * @param  string $search [tipo de pesquisa]
    * @return string [ html processado ]
    * 
    */
    public function showHtmlProcessos($search){
    	/* inicializa sql */
    	$this->sql='';

    	/* armazena o resultado */
    	$data='';

        /* verifica o tipo de pesquisa selecionado e monta sql*/
        if ($search == "todos") { // todos processos forma aleatoria
            $this->sql="SELECT processo.idprocesso,
                           processo.nome,
                           processo.descricao,
                           processo.versao,
                           processo.dd_modificado,
                           processo.autor,
                           processo.contador,
                           processo.path_config,
                           categoria.nome
                    FROM   (processo
                            INNER JOIN categoria
                                    ON processo.idcategoria_categoria = categoria.idcategoria)
                    ORDER BY RAND();";
        }elseif ($search == "novos") { // organiza do novo ao antigo
            $this->sql="SELECT processo.idprocesso,
                           processo.nome,
                           processo.descricao,
                           processo.versao,
                           processo.dd_modificado,
                           processo.autor,
                           processo.contador,
                           processo.path_config,
                           categoria.nome
                    FROM   (processo
                            INNER JOIN categoria
                                    ON processo.idcategoria_categoria = categoria.idcategoria)
                    ORDER BY dd_modificado DESC;";
        }elseif ($search == "top10") { // os mais acessados
            $this->sql="SELECT processo.idprocesso,
                           processo.nome,
                           processo.descricao,
                           processo.versao,
                           processo.dd_modificado,
                           processo.autor,
                           processo.contador,
                           processo.path_config,
                           categoria.nome
                    FROM   (processo
                            INNER JOIN categoria
                                    ON processo.idcategoria_categoria = categoria.idcategoria)
                    ORDER BY contador DESC;";
        }else{ // pesquisa por palavra desejada
            $this->sql="SELECT processo.idprocesso,
                           processo.nome,
                           processo.descricao,
                           processo.versao,
                           processo.dd_modificado,
                           processo.autor,
                           processo.contador,
                           processo.path_config,
                           categoria.nome
                    FROM   (processo
                            INNER JOIN categoria
                                    ON processo.idcategoria_categoria = categoria.idcategoria)
                    WHERE processo.nome LIKE '%".$search."%';";
        }

        /* Trabalhando com a base de dados */
        if (!$this->db->open()) {   
           $this->erro_msg = $this->db->erroMsg;
           return false;
        }
        if (! $this->db->query($this->sql)) {
           $this->erro_msg = $this->db->erroMsg;
           return false;
        }

        /* faz loop percorrendo toda a consulta e escrevendo o resultado */
        while($data = $this->db->fetch()){
        	  echo "<li class='tutorial'> ";
        	  echo "	<div class='feedable-details'>";
        	  echo "		<h3><a href='view.php?id=".$data['0']."&path=".$data['7']."' title='".$data['2']."'>".$data['1']." - v ".$data['3']."</a></h3>";
              echo "		<div class='meta'>";
          	  echo "  		<div class='points'><span class='icon icon-share-square'></span></div>";
           	  echo "			<span class='author'>Por ";
           	  echo "                       ".$data['5']." ";
           	  echo "          </span>";
              echo " 			<span class='inline-feedable-time timeago' title='".date('d-m-Y H:i:s',strtotime($data['4']))."'>".date('d M y',strtotime($data['4']))."</span>";
              echo "		</div><!-- /meta -->";
              echo "  </div> <!-- / feedable-details --> ";
              echo "	<span class='feedable-time timeago' title='".date('d-m-Y H:i:s',strtotime($data['4']))."'>".date('d M y',strtotime($data['4']))."</span>";
          	  echo "</li> <!-- / li>tutorial -->";
        } 
    } // fim_showHtmlProcessos

    /**
    * __uploadJson
    * Faz o upload de arquivos 
    *
    * @author joao paulo bastos <jpbl.bastos at gmail dot com>
    * @param  string novo_nome 
    * @param  array  $files
    * @param  string $target
    * @return boolean
    * 
    */
    private function __uploadJson($novo_nome='', $files='',$target=''){
      if (count($files['name']) == 1) {
         if (!move_uploaded_file($files['tmp_name'], $target.$novo_nome )) {
            echo "<h1> Erro ao fazer upload do arquivo ".$files['name'].". Verifique permissões !</h1>\n";
            return false;
         }
      }
      return true; 
    } // fim__uploadJson

    /**
    * __uploadDiagramas
    * Faz o upload dos diagramas
    *
    * @author joao paulo bastos <jpbl.bastos at gmail dot com>
    * @param  array  $files
    * @param  string $target
    * @return boolean
    * 
    */
    private function __uploadDiagramas($files='',$target=''){
        for ($k = 0; $k < count($files['name']); $k++){
            if (!move_uploaded_file($files['tmp_name'][$k], $target.$files['name'][$k]) ) {
                echo "<h1> Erro ao fazer upload do arquivo ".$files['name'][$k].". Verifique permissões !</h1>\n";
                return false;
            }
        }
      return true; 
    } // fim__uploadDiagramas
    
    /**
    * __uploadAttachments
    * Faz o upload dos anexos
    *
    * @author joao paulo bastos <jpbl.bastos at gmail dot com>
    * @param  array  $files
    * @param  string $target
    * @return boolean
    * 
    */
    private function __uploadAttachments($files='',$target=''){
        for ($k = 0; $k < count($files['name']); $k++){
            if (!move_uploaded_file($files['tmp_name'][$k], $target.$files['name'][$k]) ) {
                echo "<h1> Erro ao fazer upload do arquivo ".$files['name'][$k].". Verifique permissões !</h1>\n";
                return false;
            }
        }
      return true; 
    } // fim__uploadAttachments
 }// fim da classe
