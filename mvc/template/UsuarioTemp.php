<?php

namespace template;

class UsuarioTemp implements Itemplate{
    public function cabecalho()
    {
        echo "<div>cabecalho</div>";

    }
    public function rodape()
    {
        echo "<div>rodape</div>";
    }
    public function layout($caminho, $parametro = null)
    {
        $this->cabecalho();
        if ($parametro !== null) {
            // Torna $parametro disponível no include
            $GLOBALS['parametro'] = $parametro;
        }
        include $_SERVER["DOCUMENT_ROOT"]."\\Workshop".$caminho;
        $this->rodape();
    }
}