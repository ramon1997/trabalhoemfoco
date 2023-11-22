<?php
class candidatoDAO{
    public function login(candidato $candidato){
        try {
            
            $sql = "SELECT * FROM testecandi WHERE email = :email";
            $stmt = conexao::getConexao()->prepare($sql);
            $email = $candidato->getEmail();
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $senha = $candidato->getSenha();
                if (password_verify($senha, $user['senha'])) {
                    header("Location:../../candidato/index.php");
                } else {
                    header("Location: ../../index.php");
                }
            } else {
                return false; // Usuário não encontrado
            }
        } catch (PDOException $e) {
            echo "Erro ao autenticar o usuário: " . $e->getMessage();
            return false;
        }
    
    }
}