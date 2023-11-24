<?php
class empresaDAO{
    public function cadastrar(empresa $empresa){
        try {
            $sql = "INSERT INTO testeempre (nome, email, senha) VALUES (:nome, :email, :senha)";

            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":nome", $empresa->getNome());
            $stmt->bindValue(":email", $empresa->getEmail());
            $stmt->bindvalue(":senha", $empresa->getSenha());

            return $stmt->execute();
        } catch (Exception $e) {
            echo "erro ao cadastrar".$e;
        }
    }
}