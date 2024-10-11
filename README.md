# complan
Curso de PHP-8 utilizando somente COMPOSER. 
Sem framework. 
Para criação de um sistema administrativo com nível de acesso.

# Requisitos

* PHP 8.3 ou superior
* Mysql 8.0 ou superior
* Composer 

## Como rodar o projeto baixado 

Instalar dependências
```
composer install
```


## Sequência para criar o projeto

Criar o arquivo composer.json com a instrução básica
```
composer init
```
Criar o Alias para o endereço de url
Eliminar o caminho antigo 
"Franklin\\Complan\\": "/src" (antigo)
"App\\": "app" (novo)

```
composer dump-autoload
```

