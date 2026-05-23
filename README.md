# Formulário de Respostas

Sistema simples para captura e gerenciamento de respostas de formulários, desenvolvido com foco em organização, praticidade e aprendizado de desenvolvimento web.

---

## 📌 Sobre o projeto

O **Formulario Respostas** é um projeto criado para praticar conceitos de desenvolvimento de aplicações web, manipulação de formulários e armazenamento de dados enviados pelos usuários.

O projeto permite:

- Criar e enviar respostas de formulários
- Validar entradas de dados
- Organizar informações recebidas
- Simular um fluxo básico de coleta de dados

---

## 🚀 Tecnologias utilizadas

As principais tecnologias utilizadas no projeto:

- HTML5
- CSS3
- JavaScript
- Git e GitHub

---

## 📂 Estrutura do projeto

```bash
formulario_respostas/
├── .env                  (Suas senhas - Adicione suas senhas aqui)
├── .env.example          (Modelo - Vai para o Git)
├── .gitignore            (Regras do Git)
├── app/                  (Núcleo do Sistema - Protegido)
│   ├── Config/
│   │   └── Database.php  (Conexão com o banco)
│   ├── Controllers/
│   │   └── FormController.php (Validação LGPD)
│   ├── Models/
│   │   └── Feedback.php  (Salva no MySql)
│   └── Views/
│       └── home.php      (O seu HTML)
└── public/               (Pasta exposta na web)
    ├── index.php         (Carrega a View)
    ├── api.php           (Recebe os dados do JS)
    └── assets/
        ├── css/
        │   └── style.css (O seu CSS)
        └── js/
            └── script.js (O seu JS)
```

---

## ⚙️ Como executar o projeto

### 1. Clone o repositório

```bash
git clone https://github.com/sinvalfelisberto/formulario_respostas.git
```

### 2. Acesse a pasta do projeto

```bash
cd formulario_respostas
```

### 3. Execute o projeto

Abra o arquivo `index.html` no navegador.

---

## 💡 Funcionalidades

- [x] Envio de formulário
- [x] Captura de dados do usuário
- [x] Validação básica de campos
- [x] Integração com banco de dados
- [ ] Sistema de autenticação
- [ ] Exportação de respostas

---

## 📖 Objetivos de aprendizado

Este projeto foi desenvolvido para praticar:

- Manipulação de formulários HTML
- Eventos em JavaScript
- Organização de código front-end
- Estruturação de projetos no GitHub

---

## 🤝 Contribuições

Contribuições são bem-vindas!

Se quiser contribuir:

1. Faça um fork do projeto
2. Crie uma branch para sua feature

```bash
git checkout -b minha-feature
```

3. Commit suas alterações

```bash
git commit -m "feat: minha nova feature"
```

4. Envie para o GitHub

```bash
git push origin minha-feature
```

5. Abra um Pull Request

---

## 📄 Licença

Este projeto está sob a licença MIT.

---

## 👨‍💻 Autor

Desenvolvido por [Sinval Felisberto](https://github.com/sinvalfelisberto)

Repositório do projeto:  
[formulario_respostas](https://github.com/sinvalfelisberto/formulario_respostas)
