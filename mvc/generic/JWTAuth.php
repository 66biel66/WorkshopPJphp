<?php
namespace generic;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTAuth{
    private string $key = "bb3762cf3277cd774be9907ff520fb4eda1e6f912d01f68c45edfe1d33239b43";
    
    public function criarChave($dados){
        $hora = time();
        $payload = [
            'iat' => $hora,
            'exp' => $hora + 180000,
            'uid' => $dados
        ];

        $jwt = JWT::encode($payload, $this->key, 'HS256');
        return $jwt;
    }

    public function verificar(){
        try {
            if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
                http_response_code(406);
                return false;
            }
            $autorizacao = $_SERVER['HTTP_AUTHORIZATION'];
            $token = str_replace('Bearer ', '', $autorizacao);
            $decodificar = JWT::decode($token, new Key($this->key, 'HS256'));
            $hora = time();
            if ($hora > $decodificar->exp) {
                http_response_code(408);
                return false;
            }
            return $decodificar;
        } catch (Exception $e) {
            http_response_code(401);
            return false;
        }
    }
}