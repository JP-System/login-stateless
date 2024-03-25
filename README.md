# 📌 Login Stateless

Este pacote foi criado por uma necessidade dentro dos produtos da nossa empresa. Temos alguns servidores back-end totalmente stateless utilizando o Laravel, e temos instalado alguns serviços como Laravel Horizon, Laravel Pulse e Log Viewer. E para acessar esses serviços precisamos que o usuários esteje logado. Visando essa correção, criamos esse pacote para suprir essa demanda.

### 🔧 Instalação

Para fazer a instalação do pacote, rode o comando:

```bash
    composer require jp-system/login-stateless
```

### 📦 Customização

Esse pacote não visa muita customização, visto que o objetivo é atender uma demanda da própria empresa.

### 📋 Utilização

Após a instalação, você terá as rotas **/login** e **/dashboard** disponíveis na aplicação. Para poder logar, o e-mail deverá ter autorização, e na rota **/dashboard** fazemos a verificação se o usuário ter a permissão de **admin**.

Qualquer melhoria ou correção, poderá abrir um PR ou Issue.

## 🚀 Obrigado!
