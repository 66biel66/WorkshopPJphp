<?php 

namespace generic;

class Rotas{
    private $endpoints = [];

    public function __construct(){
        $this->endpoints = [
            "mvc/usuario/listar" => new Acao([
                Acao::GET => new Endpoint("Usuario", "listar")
            ]),
            "mvc/usuario/formulario" => new Acao([
                Acao::GET => new Endpoint("Usuario", "formulario", false)
            ]),
            "mvc/usuario/formularioalterar" => new Acao([
                Acao::GET => new Endpoint("Usuario", "alterarForm", false)
            ]),
            "mvc/usuario/inserir" => new Acao([
                Acao::POST => new Endpoint("Usuario", "inserir", false)
            ]),
            "mvc/usuario/login" => new Acao([
                Acao::GET => new Endpoint("Usuario", "login", false)
            ]),
            "mvc/usuario/fazerLogin" => new Acao([
                Acao::POST => new Endpoint("Usuario", "fazerLogin", false)
            ]),
            "mvc/usuario/principal" => new Acao([
                Acao::GET => new Endpoint("Usuario", "principal", false)
            ]),
            "mvc/usuario/excluir" => new Acao([
                Acao::POST => new Endpoint("Usuario", "excluir", false)
            ]),
            "mvc/inscricao/inscrever" => new Acao([
                Acao::GET => new Endpoint("Inscricao", "inscrever", false)
            ]),
            "mvc/inscricao/sair" => new Acao([
                Acao::POST => new Endpoint("Inscricao", "sair", false)
            ]),
            "mvc/workshops/lista" => new Acao([
                Acao::GET => new Endpoint("Workshops", "listarWorkshop", false)
            ]),
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