/**
 * Validação de Formulário Corporativo e Tratamento de Dados (LGPD)
 * Atualizado para a arquitetura MVC (Envia dados para a API pública)
 */
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('customerForm');
    const alertContainer = document.getElementById('alert-container');

    // Configurações de campos
    const fields = [
        { id: 'nome', label: 'Nome Completo', validator: val => val.trim().split(' ').length >= 2, errorMsg: 'Insira o nome completo do cliente (Nome e Sobrenome).' },
        { id: 'email', label: 'E-mail', validator: val => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val), errorMsg: 'Insira um endereço de e-mail corporativo ou pessoal válido.' },
        { id: 'telefone', label: 'Telefone', validator: val => val.replace(/\D/g, '').length >= 10, errorMsg: 'Insira um telefone válido com DDD (mínimo 10 dígitos).' },
        { id: 'mensagem', label: 'Relato do Cliente', validator: val => val.trim().length >= 10, errorMsg: 'O relato deve conter pelo menos 10 caracteres explicativos.' },
        { id: 'lgpd_consent', label: 'Consentimento LGPD', validator: (val, element) => element.checked, errorMsg: 'É obrigatório confirmar o consentimento da LGPD para registrar os dados.' }
    ];

    // Formatação de telefone dinâmica em tempo de digitação
    const inputTelefone = document.getElementById('telefone');
    inputTelefone.addEventListener('input', (e) => {
        let x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });

    // Limpa erro ao digitar/interagir
    fields.forEach(field => {
        const el = document.getElementById(field.id);
        const eventType = el.type === 'checkbox' ? 'change' : 'input';

        el.addEventListener(eventType, () => {
            el.classList.remove('input-error');
            document.getElementById(`error-${field.id}`).textContent = '';
        });
    });

    // Submissão assíncrona controlada via Fetch API
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        let isValid = true;
        hideAlert();

        // Validação campo a campo
        fields.forEach(field => {
            const el = document.getElementById(field.id);
            const value = el.value;
            const errorEl = document.getElementById(`error-${field.id}`);

            if (!field.validator(value, el)) {
                el.classList.add('input-error');
                errorEl.textContent = field.errorMsg;
                isValid = false;
            } else {
                el.classList.remove('input-error');
                errorEl.textContent = '';
            }
        });

        if (!isValid) {
            showAlert('Por favor, corrija os erros sinalizados no formulário antes de prosseguir.', 'error');
            return;
        }

        // Envio seguro dos dados via POST assíncrono
        const formData = new FormData(form);
        const submitButton = document.getElementById('btnSubmit');

        try {
            submitButton.disabled = true;
            submitButton.innerHTML = '<span>Processando requisição...</span>';

            // Agora o fetch lê diretamente o form.action (que definimos como api.php no HTML)
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                showAlert(result.message, 'success');
                form.reset();
            } else {
                showAlert(result.message || 'Erro ao processar requisição.', 'error');
            }
        } catch (error) {
            showAlert('Ocorreu uma falha crítica de comunicação com a API.', 'error');
        } finally {
            submitButton.disabled = false;
            submitButton.innerHTML = '<span>Salvar Registro</span>';
        }
    });

    function showAlert(message, type) {
        alertContainer.className = `alert-visible alert-${type}`;
        alertContainer.textContent = message;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function hideAlert() {
        alertContainer.className = 'alert-hidden';
        alertContainer.textContent = '';
    }
});