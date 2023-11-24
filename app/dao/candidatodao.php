<?php
class candidatoDAO{
    public function cadastrar(candidato $candidato){
        try {
            $sql = "INSERT INTO testecandi (nome, email, senha) VALUES (:nome, :email, :senha)";

            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":nome", $candidato->getNome());
            $stmt->bindValue(":email", $candidato->getEmail());
            $stmt->bindvalue(":senha", $candidato->getSenha());

            return $stmt->execute();
        } catch (Exception $e) {
            echo "erro ao cadastrar".$e;
        }
    }
}