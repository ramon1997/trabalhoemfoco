<?php
class candidatoDAO{
    public function cadastrar(candidato $candidato){
        try {
            $sql = "INSERT INTO candidato (nome, email, senha) VALUES (:nome, :email, :senha)";

            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":nome", $candidato->getNome());
            $stmt->bindValue(":email", $candidato->getEmail());
            $stmt->bindvalue(":senha", $candidato->getSenha());

            return $stmt->execute();
        } catch (Exception $e) {
            echo "erro ao cadastrar".$e;
        }
    }

    public function atualizar(candidato $candidato)
    {
        try {
            $sql = "UPDATE candidato set nome = :nome, email = :email, xp = :xp, habilidades = :habilidades, formacao = :formacao, cargo = :cargo WHERE id = :id";

            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindvalue(":id", $candidato->getId());
            $stmt->bindValue(":nome", $candidato->getNome());
            $stmt->bindValue(":email", $candidato->getEmail());
            $stmt->bindvalue(":xp", $candidato->getXp());
            $stmt->bindValue(":habilidades", $candidato->getHabilidades());
            $stmt->bindValue(":formacao", $candidato->getFormacao());
            $stmt->bindValue(":cargo", $candidato->getCargo());

            return $stmt->execute();
        } catch (\Throwable $th) {
            echo "erro ao atualizar" . $th;
        }
    }

    public function infoCandidato($id)
    {
        try {
            $sql = "SELECT * FROM candidato WHERE id = :id";
            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $candidato = new candidato();
                $candidato->setId($result['id']);
                $candidato->setNome($result['nome']);
                $candidato->setEmail($result['email']);
                $candidato->setXp($result['xp']);
                $candidato->setFormacao($result['formacao']);
                $candidato->setHabilidades($result['habilidades']);
                $candidato->setCargo($result['cargo']);
                

                return $candidato;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            echo "erro " . $th;
            return false;
        }
    }
}