<?php
namespace controller;

use service\WorkshopsService;
use template\WorkshopsTemp;
use template\Itemplate;

class Workshops{
    private Itemplate $template;
    public function __construct(){
        $this-> template = new WorkshopsTemp();
    }

    public function listarWorkshop(){
    $workshop_id = $_GET['workshop_id'] ?? null;
    if (!$workshop_id) {
        echo "Workshop não informado!";
        return;
    }
    $service = new WorkshopsService();
    $workshop = $service->listarWorkshop($workshop_id); // Dados do workshop
    $usuarios = $service->listarUsuarios($workshop_id); // Inscritos

    // Monta um array com os dados do workshop e dos inscritos
    $dados = [
        'workshop' => $workshop[0] ?? [],
        'usuarios' => $usuarios
    ];
    $this->template->layout("workshopsListar.php", $dados);
}
}