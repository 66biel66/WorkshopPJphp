<?php    
namespace generic;

class Controller{
    private $arrChamadas = [];
    public function __construct()
    {
        $this->arrChamadas = [
            "mvc/usuario/lista" => new Acao("Usuario", "listar"),
            "mvc/usuario/formulario" => new Acao("Usuario", "formulario"),
            "mvc/usuario/formularioalterar" => new Acao("Usuario", "alterarform"),
            "mvc/usuario/inserir" => new Acao("Usuario", "inserir"),
            "mvc/usuario/login" => new Acao ("Usuario", "login"),
            "mvc/usuario/fazerLogin" => new Acao ("Usuario", "fazerLogin"),
            "mvc/usuario/principal" => new Acao ("Usuario", "principal"),
            "mvc/usuario/excluir" => new Acao("Usuario", "excluir"),
            "mvc/inscricao/inscrever" => new Acao("Inscricao", "inscrever"),
            "mvc/inscricao/sair" => new Acao("Inscricao", "sair"),
            "mvc/workshops/lista" => new Acao("Workshops", "listarWorkshop")
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
