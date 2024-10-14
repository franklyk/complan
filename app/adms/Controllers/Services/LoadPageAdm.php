<?php

namespace App\adms\Controllers\Services;

use App\adms\Controllers\login\Login;
use Directory;

class LoadPageAdm
{
    /** @var string $urlController Recebe da URL o nome da controller */
    private string|null $urlController;

    /** @var string $urlParameter Recebe da URL o parâmetro */
    private string|null $urlParameter;

    /** @var string  $classLoad Controller que deve ser carregada  */
    private string $classLoad;


    /** @var array $listPgPublic Recebe a lista de páginas públicas */
    private array $listPgPublic = ["Login"];

    /** @var array $listPgPrivate Recebe a lista de páginas privadas */
    private array $listPgPrivate = ["Dashboard", "ListUsers"];

    /** @var array $listdirectory Recebe a lista de diretórios */
    private array $listdirectory = ["login", "dashboard", "users"];

    /** @var array $listPackages Recebe a lista de pacotes */
    private array $listPackages = ["adms"];

    /**
     * Verificar se existe a página com o método checkPageExists
     * Verificar se existe a classe com o método checkControllersExists
     *
     * @param string|null $urlController Recebe da URL o nome da Controller.
     * @param string|null $urlParameter Recebe da URL  o parametro.
     * @return void 
     */
    public function loadPageAdm(string|null $urlController, string|null $urlParameter): void
    {
        $this->urlController = $urlController;
        $this->urlParameter = $urlParameter;

        // Verificar se existe a página 

        if (!$this->checkPageExists()) {
            die("Pagina não encontrada!");
        }
        // echo "Página Encontrada ";

        if (!$this->checkControllerExists()) {
            die("Controller não encontrada!");
        }
    }

    /**
     * Verificar se a página existe no array de páginas públicas e privadas
     * 
     * @return boll 
     */
    private function checkPageExists(): bool
    {

        // Verificar se a página existe no array de páginas públicas e privadas
        if (in_array($this->urlController, $this->listPgPublic)) {
            return true;
        }

        // Verificar se a página existe no array de páginas públicas e privadas
        if (in_array($this->urlController, $this->listPgPrivate)) {
            return true;
        }
        return false;
    }

    /**
     * Verificar se existe a Controller 
     * Cnamer o método de verificar se existe o método dentro da Controller
     *
     * @return bool 
     */
    private function checkControllerExists(): bool
    {
        // Percorrer o array de pacotes
        foreach ($this->listPackages as $package) {

            // Percorrer o array de diretórios
            foreach ($this->listdirectory as $directory) {
                // Criar o caminho da controller/classe
                $this->classLoad = "\\App\\$package\\Controllers\\$directory\\" . $this->urlController;

                // Verificar se a classe existe
                if(class_exists($this->classLoad)){
                    
                    // Chamar o método para validar o método chamado
                    $this->loadMethode();

                    return true;
                }

            }
        }

        return false;
    }

    /**
     * Verificar se existe o método e carrega a Controller
     * 
     * @return void
     */

     private function loadMethode()
     {
        // instanciar a classe da página que deve ser carregada
        $classLoad = new $this->classLoad();

        if(method_exists($classLoad, "index")){
            $classLoad->{"index"}($this->urlParameter);
        }else{
            die("Método não encontrado");
        }
     }
}
