<?php

namespace App\adms\Controllers\Services;

use App\adms\Helpers\ClearUrl;
use App\adms\Helpers\SlugController;

/**
 * Recebe a URL e manipula a mesma
 * 
 * @author Franklin <frsbatist@gmail.com>
 */
class PageController
{
    /**
     * @var string $url Recebe a URL do .htaccess 
     */
    private string $url;
    /**
     * Undocumented variable
     *
     * @var array $urlArray Converte a URL para um array
     */
    private array $urlArray;

    /**
     * $urlController Recebe a controller dentro da URL
     *
     * @var string
     */
    private string $urlController = '';

    /**
     * $urlMethod Recebe o parametro na URL
     *
     * @var string
     */
    private string $urlParameter = '';

    /**
     *Recebe a URL do .htaccess 
     */
    public function __construct()
    {
        echo "Carregou!<br><br>";    

        // Verificar se existe valor na variavel url enviada pelo .htaccess 
        if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
            // Recebe o valorda variavel url enviada pelo .htaccess
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            echo "Acessar o endereço: " . $this->url . "<br><br>";

            //Chamar a classe helper que limpa a URL
            $this->url = ClearUrl::clearUrl($this->url);
            var_dump($this->url);

            // Converte a string da URL em um array
            $this->urlArray = explode("/", $this->url);
            var_dump($this->urlArray);

            // Verificar se existe a Controller na URL 
            if(isset($this->urlArray[0])){
                // Chamar a classe helper para converter o formato enviado na URL para o fomato da classe
                $this->urlController = SlugController::slugController($this->urlArray[0]);
                // $this->urlController = $this->urlArray[0];
            }else{
                 $this->urlController = SlugController::slugController("Login");
            }

            // Verificar se existe o parametro na URL 
            if(isset($this->urlArray[1])){
                $this->urlParameter = $this->urlArray[1];
            }

        }else{
            $this->urlController = SlugController::slugController("Login");
        }
        var_dump($this->urlController);
        var_dump($this->urlParameter);
    }
    
}