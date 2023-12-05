<?php
class empresaDAO{
    public function cadastrar(empresa $empresa){
        try {
            $sql = "INSERT INTO empresa (nome_empresa, email_empresa, senha) VALUES (:nome, :email, :senha)";

            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":nome", $empresa->getNome());
            $stmt->bindValue(":email", $empresa->getEmail());
            $stmt->bindvalue(":senha", $empresa->getSenha());

            return $stmt->execute();
        } catch (Exception $e) {
            echo "erro ao cadastrar".$e;
        }
    }

    public function atualizar(empresa $empresa){
        try {
            $sql = "UPDATE empresa set nome_empresa = :nome, email_empresa = :email, area = :area, cidade = :cidade, descricao = :descricao WHERE id_empresa = :id";

            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindvalue(":id", $empresa->getId());
            $stmt->bindValue(":nome", $empresa->getNome());
            $stmt->bindValue(":email", $empresa->getEmail());
            $stmt->bindvalue(":area", $empresa->getArea());
            $stmt->bindValue(":cidade", $empresa->getCidade());
            $stmt->bindValue(":descricao", $empresa->getDescricao());

            return $stmt->execute();
        } catch (\Throwable $th) {
            echo "erro ao atualizar".$th;
        }
    }

    public function infoEmpresa($id){
        try {
            $sql = "SELECT * FROM empresa WHERE id_empresa = :id";
            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                $empresa = new empresa();
                $empresa->setId($result['id_empresa']);
                $empresa->setNome($result['nome_empresa']);
                $empresa->setEmail($result['email_empresa']);
                $empresa->setArea($result['area']);
                $empresa->setCidade($result['cidade']);
                $empresa->setDescricao($result['descricao']);
    
                return $empresa;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            echo "erro ".$th;
            return false;
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

    public function criarVaga(vagas $vagas){
        try {
            $sql = "INSERT INTO testevaga (titulo, descricao) VALUES (:titulo, :descricao)";

            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":titulo", $vagas->getTitulo());
            $stmt->bindValue(":descricao", $vagas->getDescricao());

            return $stmt->execute();
        } catch (Exception $e) {
            echo "erro ao cadastrar".$e;
        }
    }
}
