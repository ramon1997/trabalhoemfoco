<?php
class empresaDAO
{
    public function cadastrar(empresa $empresa)
    {
        try {
            $sql = "INSERT INTO empresa (nome_empresa, email_empresa, senha) VALUES (:nome, :email, :senha)";

            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":nome", $empresa->getNome());
            $stmt->bindValue(":email", $empresa->getEmail());
            $stmt->bindvalue(":senha", $empresa->getSenha());

            return $stmt->execute();
        } catch (Exception $e) {
            echo "erro ao cadastrar" . $e;
        }
    }

    public function atualizar(empresa $empresa)
    {
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
            echo "erro ao atualizar" . $th;
        }
    }

    public function infoEmpresa($id)
    {
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
            echo "erro " . $th;
            return false;
        }
    }
}

//dao das vagas, preguiça de criar novos arquivos pra pouca coisa

class VagasDAO
{
    public function listarVagas()
    {
        try {
            $sql = "SELECT * FROM vaga";

            $stmt = conexao::getConexao()->query($sql);

            $vagas = $stmt->fetchAll(PDO::FETCH_CLASS, 'Vagas');

            return $vagas;
        } catch (\Throwable $th) {
            echo "erro";
            return [];
        }
    }

    public function minhasVagas($idEmpresa){
        try {
            $sql = "SELECT v.* FROM vaga v JOIN empresa_vaga ev ON v.id = ev.id_vaga WHERE ev.id_empresa = :idEmpresa";
    
            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":idEmpresa", $idEmpresa);
            $stmt->execute();  // Executar a consulta antes de buscar os resultados
            $vagas = $stmt->fetchAll(PDO::FETCH_CLASS, 'Vagas');
    
            return $vagas;
        } catch (\Throwable $th) {
            echo "erro";
            return [];
        }
    }
    

    public function infoVaga($id)
    {
        try {
            $sql = "SELECT * FROM vaga WHERE id = :id";
            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $vaga = new Vagas();
                $vaga->setId($result['id']);
                $vaga->setTitulo($result['titulo']);
                $vaga->setDescricao($result['descricao']);
                $vaga->setNomedaempresa($result['nome_empresa']);
                $vaga->setDescricaodaempresa($result['descricao_empresa']);

                return $vaga;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            echo "erro " . $th;
            return false;
        }
    }


    public function criarVaga(vagas $vagas, $idEmpresa)
    {
        try {
            // Inserir dados da vaga
            $sql = "INSERT INTO vaga (titulo, descricao, nome_empresa, descricao_empresa) VALUES (:titulo, :descricao, :nomedaempresa, :descricaodaempresa)";

            $stmt = conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":titulo", $vagas->getTitulo());
            $stmt->bindValue(":descricao", $vagas->getDescricao());
            $stmt->bindValue(":nomedaempresa", $vagas->getNomedaempresa());
            $stmt->bindValue(":descricaodaempresa", $vagas->getDescricaodaempresa());

            $stmt->execute();

            // Obter o ID da vaga recém-inserida
            $idVaga = conexao::getConexao()->lastInsertId();

            // Associar a vaga à empresa na tabela vaga_empresa
            $sqlAssociacao = "INSERT INTO empresa_vaga (id_empresa, id_vaga) VALUES (:idEmpresa, :idVaga)";
            $stmtAssociacao = conexao::getConexao()->prepare($sqlAssociacao);
            $stmtAssociacao->bindParam(":idEmpresa", $idEmpresa);
            $stmtAssociacao->bindParam(":idVaga", $idVaga);
            $stmtAssociacao->execute();

            return true;
        } catch (Exception $e) {
            echo "Erro ao cadastrar a vaga: " . $e;
            return false;
        }
    }

    public function apagarVaga(vagas $vagas){
        $sqlAssociacao = "DELETE FROM empresa_vaga WHERE id_vaga = :id";
        $stmtAssociacao = conexao::getConexao()->prepare($sqlAssociacao);
        $stmtAssociacao->bindValue(":id", $vagas->getId());
        $stmtAssociacao->execute();

        $sql = "DELETE FROM vaga WHERE id = :id";
        $stmt = conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":id", $vagas->getId());
        $stmt->execute();
    }

    public function atualizarVaga(vagas $vagas){
        $sql = "UPDATE vaga set titulo = :titulo, descricao = :descricao WHERE id = :id";

        $stmt = conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":titulo", $vagas->getTitulo());
        $stmt->bindValue(":descricao", $vagas->getDescricao());
        $stmt->bindValue(":id", $vagas->getId());
        $stmt->execute();
    }
}
