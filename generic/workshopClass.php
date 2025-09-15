<?php

namespace generic;

use Conexao;

class msqlfactory{


    public Conexao $banco;
    public function __construct(){
        $this-> banco = Conexao::getInstance();
  
  
    }
  


}




?>