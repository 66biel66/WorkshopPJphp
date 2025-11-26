<?php
namespace dao;

interface IUsuarioDAO{
    public function listar();
    public function inserir($nome, $email, $senha);
    public function alterar($id, $nome, $email, $senha);
    public function excluir($id);
    public function autenticar($email, $senha);
}