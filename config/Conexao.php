<?php
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
            $this->conexao = new PDO($this->dsn, $this->usuario, $this->senha, $this->options);
        }
    }

    public static function getInstace(){
        if(self::$instance == null){
            self::$instance = new Conexao();
        }
        return self::$instance;
    }

    public function query($sql){
        $stm = $this->conexao->prepare($sql);

        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>