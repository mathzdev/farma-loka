Farma Loka System
=======================

Sobre
------------
Utilizaremos PHP, Zend Framework 2, Doctrine 2, jQuery e Bootstrap.

Para gerar entidades do doctrine utilize os seguintes comandos:

> ./vendor/doctrine/doctrine-module/bin/doctrine-module orm:convert-mapping --namespace="Application\\Entity\\" --force  --from-database annotation ./module/Application/src/

> ./vendor/doctrine/doctrine-module/bin/doctrine-module orm:generate-entities ./module/Application/src/ --generate-annotations=true


Para subir a aplicação é necessário apontar o apache para a pasta public, rodar o composer, e configurar a conexão de banco de dados.

Para gerar a documentação phpDocumentor utilize o comando:

> ./vendor/bin/phpdoc --template="responsive-twig" -d ./module -t ./public/api