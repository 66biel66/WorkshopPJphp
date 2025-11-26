<?php 
namespace generic;

class Rotas{
    private $endpoints = [];

    public function __construct(){
        $this->endpoints = [
            "mvc/usuario" => new Acao([
                Acao::GET => new Endpoint("Usuario", "listar", true),
                Acao::POST => new Endpoint("Usuario", "inserir", true),
                Acao::PUT => new Endpoint("Usuario", "alterar", true),
                Acao::DELETE => new Endpoint("Usuario", "excluir", true)
            ]),

            "mvc/usuarioAutenticar" => new Acao([
                Acao::POST => new Endpoint("Usuario", "autenticar"),
            ]),

            "mvc/inscricao" => new Acao([
                Acao::GET => new Endpoint("Inscricao", "listarInscricao", true),
                Acao::POST => new Endpoint("Inscricao", "inscrever", true),
                Acao::DELETE => new Endpoint("Inscricao", "sair", true)
            ]),

            "mvc/workshop" => new Acao([
                Acao::GET => new Endpoint("Workshops", "listarWorkshop", true),
                Acao::POST => new Endpoint("Workshops", "adicionar", true),
                Acao::PUT => new Endpoint("Workshops", "alterar", true),
                Acao::DELETE => new Endpoint("Workshops", "excluir", true)
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
            if (http_response_code() == 401) {
                $retorno-> erro = "Acesso não autorizado!";
            }
            return $retorno;
        } else {
            $retorno = new Retorno();
            http_response_code(404);
            $retorno-> erro = "Rota não encontrada!";
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