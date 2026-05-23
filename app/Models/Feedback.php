<?php
require_once __DIR__ . '/../Config/Database.php';

class Feedback {
    public function salvar($nome, $email, $telefone, $mensagem, $consentimento) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO feedbacks (nome, email, telefone, mensagem, consentimento_lgpd, data_registro) VALUES (?, ?, ?, ?, ?, NOW())");
        
        return $stmt->execute([
            $nome, 
            $email, 
            $telefone, 
            $mensagem, 
            $consentimento ? 1 : 0
        ]);
    }
}