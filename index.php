<?php


use App\adms\Controllers\Services\PageController;


// Carregar o composer
require './vendor/autoload.php';


// Instanciar a classe PageController, responsavel em tratar URL

$url = new PageController();

// Chamar o método para carregar a página/controller
$url->loadPage();
