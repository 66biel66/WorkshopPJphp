<?php
namespace service;

use dao\mysql\InscricaoDAO;

class InscricaoService extends InscricaoDAO
{
     public function listarInscricao()
     {
          return parent::listarInscricao();
     }
     public function inscrever($usuario_id, $workshop_id)
     {
          return parent::inscrever($usuario_id, $workshop_id);
     }
     public function sair($id)
     {
          return parent::sair($id);
     }
}
