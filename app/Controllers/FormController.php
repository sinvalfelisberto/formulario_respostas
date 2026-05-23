<?php
require_once __DIR__ . '/../Models/Feedback.php';

class FormController {
    public function processar() {
        header('Content-Type: application/json; charset=utf-8');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Método inválido.']);
            return;
        }

        // Sanitização
        $nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
        $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);
        $consent  = filter_input(INPUT_POST, 'lgpd_consent', FILTER_VALIDATE_BOOLEAN);

        // Regras de Negócio e LGPD
        if (!$nome || strlen(trim($nome)) < 3) {
            echo json_encode(['success' => false, 'message' => 'Nome inválido.']); return;
        }
        if (!$email) {
            echo json_encode(['success' => false, 'message' => 'E-mail corporativo inválido.']); return;
        }
        if (!$consent) {
            echo json_encode(['success' => false, 'message' => 'O consentimento LGPD é obrigatório.']); return;
        }

        // Executa a gravação via Model
        try {
            $feedbackModel = new Feedback();
            $feedbackModel->salvar($nome, $email, $telefone, $mensagem, $consent);
            echo json_encode(['success' => true, 'message' => 'Sucesso: Registro auditado e salvo com segurança!']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Erro interno ao comunicar com o banco de dados.']);
        }
    }
}