<?php
namespace generic;
use PDO;
use PDOException;

class Conexao{
    private static $instance = null;

    private $conexao;
    private $dsn = "mysql:host=localhost;dbname=workshop;";
    private $usuario = "root";
    private $senha = "";
    private $options = null;
    
    private function __construct()
    {
        if ($this ->conexao == null){
            try {
            $this->conexao = new PDO($this->dsn, $this->usuario, $this->senha, $this->options);
            } catch (PDOException $e) {
            $msg = array('erro' => "Conexão não estabelecida!");
            $jmsg = json_encode($msg);
            header("Content-Type: application/json");
            echo $jmsg;
            exit;
            }
        }
    } 

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new Conexao();
        }
        return self::$instance;
    }

    public function executar( $query, $param = array()){
        if($this -> conexao){
            try {
            $this->conexao->beginTransaction();
            $sth = $this -> conexao -> prepare($query);
            foreach($param as $k => $v){
                $sth -> bindValue($k,$v);
            }
            $sth -> execute();
            $this->conexao->commit();
            return $sth -> fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            if($this->conexao->inTransaction()){
                $this->conexao->rollBack();
            }
            $codigo_erro = $e->getCode();
            if ($codigo_erro == '23000') {
            $msg = array('erro' => "Instancia duplicada!");
            $jmsg = json_encode($msg);
            http_response_code(500);
            header("Content-Type: application/json");
            echo $jmsg;
            exit;
            } else {
                http_response_code(500);
                header("Content-Type: application/json");
                echo json_encode($e->getMessage());
                exit;
            }
        }
        }
    }
}
?>