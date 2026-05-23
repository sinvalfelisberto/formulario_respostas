<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Corporativo</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Novo caminho do CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <header class="form-header">
                <h2>Registro de Atendimento</h2>
                <p>Gerencie feedbacks em conformidade com a LGPD.</p>
            </header>

            <div id="alert-container" class="alert-hidden"></div>

            <!-- O action agora aponta para a nossa API -->
            <form id="customerForm" action="api.php" method="POST" novalidate>
                <div class="form-group">
                    <label>Nome Completo <span class="required">*</span></label>
                    <input type="text" id="nome" name="nome" required>
                    <span class="error-message" id="error-nome"></span>
                </div>
                <div class="form-group">
                    <label>E-mail <span class="required">*</span></label>
                    <input type="email" id="email" name="email" required>
                    <span class="error-message" id="error-email"></span>
                </div>
                <div class="form-group">
                    <label>Telefone <span class="required">*</span></label>
                    <input type="tel" id="telefone" name="telefone" required>
                    <span class="error-message" id="error-telefone"></span>
                </div>
                <div class="form-group">
                    <label>Feedback <span class="required">*</span></label>
                    <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
                    <span class="error-message" id="error-mensagem"></span>
                </div>
                <div class="lgpd-box">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="lgpd_consent" name="lgpd_consent" value="1" required>
                        <label for="lgpd_consent" class="lgpd-label">Declaro consentimento explícito (LGPD).</label>
                    </div>
                    <span class="error-message" id="error-lgpd_consent"></span>
                </div>
                <button type="submit" id="btnSubmit" class="btn-primary">Salvar Registro</button>
            </form>
        </div>
    </div>
    <!-- Novo caminho do JS -->
    <script src="assets/js/script.js"></script>
</body>
</html>