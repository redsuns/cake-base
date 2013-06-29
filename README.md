#Cake Base

Base de features comuns em diversos projetos


###Instalação

* Crie um projeto baseado no CakePHP com a versão mais recente
* atualize este repositório em seu localhost `git pull`
* a partir do shell entre na pasta deste projeto
* Execute: ` php init.php /caminho/completo/ate/seu/projeto/recem/criado `


###Configuração

Após a instalação suponho que ao criar seu projeto do CakePHP já tenha configurado o banco de dados default,
caso não tenha configure-o agora e siga os passos abaixo:

* a partir do shell entre na pasta raiz de seu novo projeto e em seguida entre na pasta ` app/Console ` 
e rode o cake schema ` ./cake schema create ` para que seu banco de dados seja inicializado. 

* Caso o shell do cake não possa ser executado importe o arquivo schema.sql de ` app/Config/Schema ` através de 
seu gerenciador de banco de dados.



Para mais opções execute o init.php sem parâmetro que um menu de ajuda será exibido.

