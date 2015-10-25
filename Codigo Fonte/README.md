Farma Loka System
=======================

Sobre
------------
Utilizaremos PHP, Zend Framework 2, Doctrine 2, jQuery e Bootstrap.

Para gerar entidades do doctrine utilize os seguintes comandos:

> ./vendor/doctrine/doctrine-module/bin/doctrine-module orm:generate-entities ./module/Album/src/ --generate-annotations=true
> ./vendor/doctrine/doctrine-module/bin/doctrine-module orm:generate-entities ./module/Application/src/ --generate-annotations=true


Para subir a aplicação é necessário apontar o apache para a pasta public, rodar o composer, e configurar a conexão de banco de dados.