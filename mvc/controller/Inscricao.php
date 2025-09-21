<?php
namespace controller;

use service\InscricaoService;
use template\InscricaoTemp;
use template\Itemplate;

class Inscricao{
    private Itemplate $template;
    public function __construct(){
        $this->template = new InscricaoTemp();
    }

    public function inscrever(){
    session_start();
    if (!isset($_SESSION['id'])) {
        echo "Você precisa estar logado para se inscrever.";
        return;
    }
    $usuario_id = $_SESSION['id'];
    $workshop_id = $_GET['workshop_id'] ?? null;
    if (!$workshop_id) {
        echo "Workshop não informado!";
        return;
    }
    $service = new InscricaoService();
    if ($service->jaInscrito($usuario_id, $workshop_id)) {
        session_start();
        $_SESSION['jaEnscrito'] = "Inscrito!";
        $_SESSION['teste'] = $workshop_id;
        header("location: /Workshop/mvc/usuario/principal");
        return;
    } else {
    $service->inscrever($usuario_id, $workshop_id);
    header("location: /Workshop/mvc/workshops/lista?workshop_id=" . $workshop_id);
    }
    }

    public function sair(){
    session_start();
    $usuario_id = $_POST["usuario_id"] ?? null;
    $workshop_id = $_POST["workshop_id"] ?? null;
    if ($usuario_id && $workshop_id) {
        $service = new \service\InscricaoService();
        $service->sairDoWorkshop($usuario_id, $workshop_id);
        header("location: /Workshop/mvc/usuario/principal");
    } else {
        echo "Dados não informados!";
    }
}
}