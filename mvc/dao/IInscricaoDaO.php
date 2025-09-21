<?php
namespace dao;

interface IInscricaoDAO {
    public function inscrever($usuario_id, $workshop_id);
    public function sair($usuario_id);
    public function jaInscrito($usuario_id, $workshop_id);
    public function sairDoWorkshop($usuario_id, $workshop_id);
}