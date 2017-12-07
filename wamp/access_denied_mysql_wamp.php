Trata-se do: #1045 ' Access denied for user 'root'@'localhost' (using password: NO)

Percebi que esse erro ocorre porque antes de instalar o pacote wamp (que dentre outros aplicativos instala o MySQL) eu j' havia instalado e configurado o MySQL manualmente, inclusive definindo senhas e permis'es para usu'rios.

E o wamp quando instala o phpMyAdmin gera um arquivo de configura'o com o usu'rio master do MySQL (o root), por'm n'o define uma senha para ele. E para resolver o problema #1045 teremos de ir nesse arquivo e alter'-lo manualmente.

Encontre o diret'rio onde est' os arquivos do phpMyAdmin (Geralmente em C:\wamp\apps\). Abra o arquivo config.inc.php e procure a linha com o seguinte comando:

73

$cfg['Servers'][$i]['password']      = '';

Preencha dentro das aspas a senha do seu usu'rio 'root'. Salve o arquivo e tente novamente.