Instalando o Symfony

# php composer.phar create-project symfony/skeleten:"6.1.*" api-symfony

    - subindo servidor web

# php -S localhost:8000 -t public

    - yaml e uma linguagem de marcação

# instalando a extensão do symfony para trabalahar com html
 - php composer.phar require webapp

# instalar a extensao do vs conde twig language

# ir no arquivo .ENV e comentar a linha do postgree e descomentar a do mysql, colocar o login e senha
 - DATABASE_URL="mysql://root:max1983@127.0.0.1:3306/da_api_symfony?serverVersion=8&charset=utf8mb4"

# acessando comandos do synfony 
    -  php bin/console

# criando o bando de dados com doctrin
    - php bin/console doctrine:database:create
    * se não existir o banco ele cria.   
# criando crud de maneira rapida

 -php bin/console make:entity
     php bin/console doctrine:schema:update --force
    -php bin/console make:crud (não deu certo)

#colocar o bootstrap no arquiv base.html.twig em template    

#alimentando o banco com dados falsos
    php composer.phar require --dev orm-fixtures

    php bin/console doctrine:fixtures:load
    php bin/console doctrine:fixtures:load --APPEND


   
