<?php
namespace generic;

use ReflectionMethod;

class Acao{
    const POST = "POST";
    const PATCH = "PATCH";
    const GET = "GET";
    const PUT = "PUT";
    const DELETE = "DELETE";

    private $endpoint;

    public function __construct($endpoint = [])
    {
        $this->endpoint = $endpoint;
    }

    public function executar(){
        $end = $this->endpointMetodo();

        if ($end) {
            if($end->autenticar){
                $jwt = new JWTAuth();
                $decode = $jwt->verificar();
                if(!$decode) {
                    http_response_code(401);
                    return;
                }
            }
            $reflectMetodo = new ReflectionMethod($end->classe, $end->execucao);
            $parametros = $reflectMetodo->getParameters();
            $returnParam = $this->getParam();
            if ($parametros){
                $para=[];
                foreach($parametros as $v){
                    $name = $v->getName();

                    if(!isset($returnParam[$name])){
                        return false;
                    }
                    $para[$name] = $returnParam[$name];
                }
                return $reflectMetodo->invokeArgs(new $end->classe(), $para);
            }
            return $reflectMetodo->invoke(new $end->classe());
        }
        return null;
    }

    private function endpointMetodo(){
        return isset($this->endpoint[$_SERVER["REQUEST_METHOD"]]) ? $this->endpoint[$_SERVER["REQUEST_METHOD"]] : null;
    }

    private function getPost(){
        if($_POST){
            return $_POST;
        }
        return [];
    }

    private function getGet(){
        if($_GET){
            $get = $_GET;
            unset($get["param"]);
            return $get;
        }
        return [];
    }

    private function getInput(){
        $input = file_get_contents("php://input");

        if($input){
            return json_decode($input, true);
        }
        return [];
    }

    public function getParam(){
        return array_merge($this->getGet(), $this->getPost(), $this->getInput());
    }
}
/*class Acao{
    private $classe;
    private $metodo;

    public function __construct($classe, $metodo){
       $this->classe = "controller\\".$classe;
       $this->metodo = $metodo;
    }

    public function executar(){
        $obj = new $this->classe();
        $obj->{$this->metodo}();
    }
}*/