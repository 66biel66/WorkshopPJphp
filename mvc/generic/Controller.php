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

