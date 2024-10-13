<?php 


namespace App\adms\Helpers;

/**
 * Converter a Controller Enviada na URL para o formato de classe;
 * 
 * @author Franklin <frsbatist@gmail.com>
 */


class SlugController
{

    /**
     * Methodo estático pode ser chamado diretamente na classe, sem a necessidate de criar uma instância da classe
     * Converter o valor obtido da URL, por exemplo "sobre-empresa" Convertido para o name da classe SobreEmpresa.
     * Utilizamos as funções para converter tudo para minúsculo, converter o traço pelo espaço, converter a promeira letra de cada palavra para maiúscula e remover os espaços em branco.
     * 
     * @param string $slugController Nome da classe
     * 
     * @return string Retorna a controller, por exemplo "sobre-empresa" convertido pelo nome da classe SobreEmpresa.  
     * 
     * 
     * 
     */

    public static function slugController(string $slugController): string
    {
        // // Converter para minúsculo
        // $slugController = strtolower($slugController);
        // // Converter o traço para espaço em branco
        // $slugController = str_replace("-", " ", $slugController);
        // // Converter a primeira letra de cada palavra para maiúsculo
        // $slugController = ucwords($slugController);
        // // Retirar o espaço em branco
        // $slugController = str_replace(" ", '', $slugController);

        $slugController = str_replace(" ", '', ucwords(str_replace("-", " ", strtolower($slugController))));
        // var_dump($slugController);

        // Retorna a controller convertida
        return $slugController;
    }

}

?>