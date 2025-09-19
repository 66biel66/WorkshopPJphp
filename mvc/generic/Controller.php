<?php    
namespace generic;

class Controller{
    private $arrChamadas = [];
    public function __construct()
    {
        $this->arrChamadas = [
            "usuario/lista" => new Acao("Usuario", "listar"),
            "usuario/formulario" => new Acao("Usuario", "formulario"),
            "usuario/formularioalterar" => new Acao("Usuario", "alterarform"),
            "usuario/inserir" => new Acao("Usuario", "inserir"),
            
        ];
    }

    public function verificarChamadas($rota){
       if(isset($this->arrChamadas[$rota])){
        $acao = $this->arrChamadas[$rota];
        $acao->executar();
        return ; 
       } 

       echo "Rota não existe";
    }
}

/*
<?php

namespace generic;

class Controller {

    private $arrChamadas=[];


    public function __construct() {
        $this->arrChamadas = [
            'Login' => 'view/login.php',
            'Conectando' => 'controller/login.php',
            'Menu' => 'controller/Principal.php',
            'Sair' => 'controller/sair.php'
        ];
    }
    
    // verifica se a rota existe
    public function verificarchamada ($rota) {

        if(isset) ($this->arrChamadas[$rota]) {
$acao = $this arrChamadas[$rota];
            //ação da rota 

            $acao = $this->arrChamadas[$rota];
            $acao -> executar();
            return;
        } 

        echo "Página não encontrada";
        }


}


*/
?>
