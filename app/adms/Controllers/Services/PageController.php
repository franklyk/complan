<?php

namespace App\adms\Controllers\Services;

use App\adms\Helpers\ClearUrl;

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
        }else{
            echo "Acessar a página principal <br><br>";
        }
    }
    
}