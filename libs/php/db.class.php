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
 * @name        db.class.php
 * @version     1.0.0
 * @license     http://www.gnu.org/licenses/gpl.html GNU/GPL v.3
 * @author      Joao Paulo Bastos L. <jpbl.bastos at gmail dot com>
 * @date        10-Nov-2015
 * @description Está classe é responsavel por manipular o acesso ao banco de dados da aplicação
 *
 */
     
class DB {
    // propriedades da classe
    
    /**
    * raizDir
    * Diretorio raiz da App
    * @var string
    */
    private $raizDir='';

    /**
    * con
    * Conexao com o db
    * @var object
    */
    private $con;

    /**
    * nomeUser
    * usuario do bando de dados
    * @var string
    */
    private $nomeUser='';

    /**
    * passWd
    * Senha do Usuario do db
    * @var string
    */
    private $passWd='';

    /**
    * nomeDb
    * nome da base e ser selecionada
    * @var string
    */
    private $nomeDb='';

    /**
    * hostCon
    * host da conexão
    * @var string
    */
    private $hostCon='';

    /**
    * erroMsg
    * messagens
    * @var string
    */
    public $erroMsg='';

    /**
    * resultQuery
    * resultado da pesquisa
    * @var array
    */
    public $resultQuery='';

    /**
    * result
    * @var string
    */
    public $result='';

    // Construção dos Metodos 
    /**
    * __construct
    * Método construtor da classe
    * Este método utiliza o arquivo de configuração localizado no diretorio config
    * 
    * @author  joao paulo bastos <jpbl.bastos at gmail dot com>
    * @return  boolean 
    * 
    */
    function __construct( ) {
        //obtem o path da aplicação
        $this->raizDir = dirname(dirname(dirname( __FILE__ ))) . DIRECTORY_SEPARATOR;
        //testa a existencia do arquivo de configuração
        if ( is_file($this->raizDir . 'config' . DIRECTORY_SEPARATOR . 'config.php') ){
            //carrega o arquivo de configuração
            include($this->raizDir . 'config' . DIRECTORY_SEPARATOR . 'config.php');
            // carrega propriedades da classe com os dados de configuração
            $this->nomeUser = $nomeUser;
            $this->passWd   = $passWd;
            $this->nomeDb   = $nomeDb;
            $this->hostCon  = $hostCon;
        } else {
            // caso não exista arquivo de configuração retorna erro
            echo "OPS, não foi localizado o arquivo de configuração :( ";
            exit();
        }
        return true;
    } //fim __construct
  
    /**
    * open
    * Conectar ao banco de dados
    *
    * @author    joao paulo bastos <jpbl.bastos at gmail dot com>
    * @return    boolean true sucesso false Erro
    * 
    */
    public function open() {
         /* conecta com o bd com as variáveis prédefinidas */
         $this->con = mysql_connect($this->hostCon, $this->nomeUser, $this->passWd);
         if (!$this->con) {
             $this->erroMsg="OPS, erro em se conectar com o Db :(";
	         return false;
         }
         /* seleciona base de dados */
         if (!mysql_select_db($this->nomeDb)) {
             $this->erroMsg="OPS, erro em selecionar a base de dados :(";
             return false;
         }
         mysql_query("SET NAMES 'utf8'");
         mysql_query('SET character_set_connection=utf8');
         mysql_query('SET character_set_client=utf8');
         mysql_query('SET character_set_results=utf8');
	     return true;
    }
     
    /**
    * close
    * Fecha conexao com banco de dados
    *
    * @author    joao paulo bastos <jpbl.bastos at gmail dot com>
    * 
    */
    public function close(){
         mysql_close($this->con);
    }
     
    /**
    * query
    * Execulta o sql
    *
    * @author    joao paulo bastos <jpbl.bastos at gmail dot com>
    * @param     string  $sql   - Comado a ser execultado no db
    * @return    resultQuery    - Resultado da Pesquisa
    * 
    */ 
    public function query($sql){
        if (!$this->resultQuery = mysql_query($sql)){
           $this->erroMsg="OPS, erro na execulcao do sql: ".$sql.". Verifique a sintaxe :(";
        }
        else{
           return $this->resultQuery;
        } 
    }

    /**
    * fetch
    * Pega proximo dado do array da consulta armazenada em resultQuery
    *
    * @author    joao paulo bastos <jpbl.bastos at gmail dot com>
    * @return    rows   - Linha da consulta
    * 
    */ 
    public function fetch(){
        $this->result = mysql_fetch_array($this->resultQuery);
        return $this->result;
    } 

    /**
    * fetch_field
    * Pega o nome da coluna
    *
    * @author    joao paulo bastos <jpbl.bastos at gmail dot com>
    * @param     int indice  - Indice da coluna
    * @return    nome da coluna   - Linha da consulta
    * 
    */ 
    public function fetch_field($indice){
        return mysql_fetch_field($this->resultQuery, $indice);
    } 

    /**
    * num_rows
    * Pega numero de linhas da consulta
    *
    * @author    joao paulo bastos <jpbl.bastos at gmail dot com>
    * @return    num_rows  - Quantidade de linhas
    * 
    */ 
    public function num_rows(){
        return mysql_num_rows($this->resultQuery);
    }      

    /**
    * num_rows
    * Pega numero de campos da consulta
    *
    * @author    joao paulo bastos <jpbl.bastos at gmail dot com>
    * @return    num_fields  - Quantidade de campos
    * 
    */ 
    public function num_fields(){
        return mysql_num_fields($this->resultQuery);
    }      

}//fim da classe

?>