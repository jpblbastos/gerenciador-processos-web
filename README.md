## Gerenciador de Processos Web

Este software é um gerenciador de processos elaborados apartir do [Bizagi - Business Process Management](http://www.bizagi.com/). Foi projetado para ser simples, dinâmico e com uma instalação rápida (apenas uma linha de código). 

![screenshot](https://github.com/jpblbastos/gerenciador-processos-web/blob/master/libs/img/tela-principal.png)

## Os recursos 

#### Pesquisa de processos 
Com este recurso pode-se fazer uma pesquisa em todos os processos cadastrados, basta apenas digitar o desejado e dar um simples enter para submeter a pesquisa. 
![screenshot](https://github.com/jpblbastos/gerenciador-processos-web/blob/master/libs/img/pesquisar.png)

#### Filtros
Você pode também ordenar os resultados com os filtros `Todos|Novos|Top10`. 
![screenshot](https://github.com/jpblbastos/gerenciador-processos-web/blob/master/libs/img/filtros.png)

#### Upload 
Este é um recurso legal :) para ser bem dinâmico ele foi projetado. Uma vez feito o modelamento do processo no BizAgi e exportado para página web, basta clicar em upload digitar dados de indêntificação do processo (nome, descrição, etc) e selecionar os arquivos `json` e os `diagramas` do processo e enviá-lo. Pronto \o/ seu novo processo está disponível em sua rede de trabalho. 
![screenshot](https://github.com/jpblbastos/gerenciador-processos-web/blob/master/libs/img/upload-form.png)

#### Voltar ao gerenciador
Quando um processo é escolhido, o usuário é então direcionado ao visualizador do processo, que nada mais é a página gerada pelo bizagi, porém modificada internamente para atender as necessidades da aplicação. Uma modificação útil foi o `voltar ao gerenciador`, que redireciona o usuário para a página inicial da aplicação. 
![screenshot](https://github.com/jpblbastos/gerenciador-processos-web/blob/master/libs/img/view-modif.png)

## A instalação
É considerado que um ambiente web LAMP ou LEMP esteja instalado e configurado corretamente, mas aqui vai uma ajudinha caso ainda não tenha feito o seu: 
  * LAMP - [Debian e derivados](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu)
  * LAMP - [RedHat e derivados](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-centos-6)
  
  * LEMP - [Debian e derivados](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-12-04)
  * LEMP - [RedHat e derivador](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-centos-7)

#### Depois basta fazer

``` bash
sudo git clone https://github.com/jpblbastos/gerenciador-processos-web.git /var/www/html/gpw && sudo chown www-data:www-data /var/www/html/gpw -Rf && sudo mysql -u root -p < /var/www/html/gpw/sql/create.sql
```

**Nota:** Lembre-se de mudar o comando chown caso esteja usando um S.O da família RedHat, pois neles o usuário web é o apache.

#### Ajustando as coisas
Agora com a plicação baixada e instalada, basta alterar a senha do mysql no arquivo de configuração `config.php` para começar a usar, isso também é simples.
``` bash
sudo vim /var/www/html/gpw/config/config.php
```

#### Acessando 
Se você sabe o ip do seu servidor basta digitar ele no seu browser e a aplicação:
``` bash
http://seu_ip/gpw
```

Agora se não sabe o seu ip e quer saber é muito fácil com o linux, em um terminal digite: 
```bash
ifconfig eth0 | grep inet | awk '{ print $3 }'
```

## Concluindo 
Cada dia mais empresas buscam a modelagem de processos para organizar e melhorar seus procedimentos de trabalho. Este é um simples software que permite o gerencimento dos processos via web , concentrando em um único lugar e com poucos cliques o que se torna bem mais legal. 
