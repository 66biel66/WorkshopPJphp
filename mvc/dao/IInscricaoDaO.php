<?php
namespace dao;

interface IInscricaoDAO {
    public function listarInscricao();
    public function inscrever($usuario_id, $workshop_id);
    public function sair($id);
}