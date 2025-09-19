<?php

namespace template;

class UsuarioTemp implements Itemplate{
    public function cabecalho()
    {
        echo "<div>Cabeçalho</div>";
    }
    public function rodape()
    {
        echo "<div>Rodapé</div>";
    }
    public function layout($caminho, $parametro = null)
    {
        $this->cabecalho();
        if ($parametro !== null) {
            // Torna $parametro disponível no arquivo incluído
            // Se quiser tornar cada chave de $parametro[0] como variável, use extract($parametro[0]);
        }
        include $_SERVER["DOCUMENT_ROOT"] . "/Workshop/mvc/public/" . ltrim($caminho, "\\/");
        $this->rodape();
    }
}