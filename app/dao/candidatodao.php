<?php
class candidatoDAO{
    public function login(candidato $candidato){
        try {
            
            $sql = "SELECT * FROM testecandi WHERE email = :email AND senha = :senha";
            $stmt = conexao::getConexao()->prepare($sql);
            $email = $candidato->getEmail();
            $senha = $candidato->getSenha();
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header("Location:../../candidato");
                exit();
            }
        } catch (PDOException $e) {
            echo "Erro ao autenticar o usuário: " . $e->getMessage();
            return false;
        }
    
    }
}