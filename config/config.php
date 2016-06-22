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
 * @description Contém as configurações da aplicação
 *
 */

/**
 * 
 * Configurações de parametros acesso ao banco de dados
 * 
 * @author  joao paulo bastos <jpbl.bastos at gmail dot com>
 * 
 */
 
//Nome do Usuario
$nomeUser="root";

//Senha do usuario
$passWd="@@N@sa90sul##";

//Nome da Base de Dados
$nomeDb="gerenciador_processos";

//Host da Conexao
$hostCon="localhost";

/**
 * 
 * Configurações gerais
 * 
 * @author  joao paulo bastos <jpbl.bastos at gmail dot com>
 * 
 */

// diretorio para gravar os uploads json
$dirJson="json/";

// diretorio para gravar os uploads png ref. aos diagramas 
$dirDiagramas="files/diagrams/";

// diretorio para gravar os uploads anexos
$dirAttachments="files/attachments/";
?>
