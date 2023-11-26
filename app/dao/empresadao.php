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

//dao das vagas, preguiça de criar novos arquivos pra pouca coisa

class VagasDAO {
    public function listarVagas() {
        try {
            $sql = "SELECT * FROM testevaga";

            $stmt = conexao::getConexao()->query($sql);

            $vagas = $stmt->fetchAll(PDO::FETCH_CLASS, 'Vagas');

            return $vagas;
        } catch (\Throwable $th) {
            echo "erro";
            return [];
        }
    }

    public function infoVaga($id) {
        try {
            $sql = "SELECT * FROM testevaga WHERE id = :id";
            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                $vaga = new Vagas();
                $vaga->setId($result['id']);
                $vaga->setTitulo($result['titulo']);
                $vaga->setDescricao($result['descricao']);
    
                return $vaga;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            echo "erro ".$th;
            return false;
        }
    }
    
    
    
    
}
