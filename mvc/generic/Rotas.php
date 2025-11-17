<?php 

namespace generic;

class Rotas{
    private $endpoints = [];

    public function __construct(){
        $this->endpoints = [
            "mvc/usuario" => new Acao([
                Acao::GET => new Endpoint("Usuario", "listar"),
                Acao::POST => new Endpoint("Usuario", "inserir"),
                Acao::PUT => new Endpoint("Usuario", "alterar"),
                aCAO::DELETE => new Endpoint("Usuario", "excluir")
            ])
        ];
    }

    public function executar($rota){
        // verifica o array associativo se a rota existe
        if (isset($this->endpoints[$rota])) {

            $endpoint = $this->endpoints[$rota];
            $dados = $endpoint->executar();
            $retorno = new Retorno();
            $retorno-> dados = $dados;
            return $retorno;
        }
        return null;
    }
}
/*
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
*/