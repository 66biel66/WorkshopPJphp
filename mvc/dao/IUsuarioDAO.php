<?php
namespace dao;

interface IUsuarioDAO{
    public function listar();
    public function inserir($nome, $email, $senha);
    public function listarId($id);
    public function alterar($id, $nome, $email, $senha);
}