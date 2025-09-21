<?php

namespace service;

use dao\mysql\InscricaoDAO;

class InscricaoService extends InscricaoDAO
{
     public function inscrever($usuario_id, $workshop_id)
     {
          return parent::inscrever($usuario_id, $workshop_id);
     }
     public function sair($usuario_id)
     {
          return parent::sair($usuario_id);
     }
     public function jaInscrito($usuario_id, $workshop_id)
     {
          return parent::jaInscrito($usuario_id, $workshop_id);
     }
     public function sairDoWorkshop($usuario_id, $workshop_id)
     {
          return parent::sairDoWorkshop($usuario_id, $workshop_id);
     }
}
