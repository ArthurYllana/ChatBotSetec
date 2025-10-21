# 🤖 ChatBot SETEC

Um assistente educacional interativo voltado para alunos da área de tecnologia, com foco em **Programação**, **Banco de Dados**, **Redes de Computadores**, **Engenharia de Software** e **Desenvolvimento Web**.  
O ChatBot SETEC foi desenvolvido para gerar **conteúdos técnicos e educativos** de forma **clara, organizada e didática**, simulando o comportamento de um **tutor universitário virtual**.

---

## 🚀 1. Acessando o Repositório

Clone o repositório base do projeto diretamente do GitHub:

🔗 **Repositório:** [https://github.com/VitorHugoBelorio/ChatBotSETEC](https://github.com/VitorHugoBelorio/ChatBotSETEC)

> 💡 Caso ainda não tenha uma conta no GitHub, você pode criar uma rapidamente usando sua conta do Google.

---

## 🧩 2. Clonando e Abrindo o Projeto

### 2.1 Clonar o repositório
Abra o **Git Bash** ou o **PowerShell** e execute:

```bash
git clone https://github.com/VitorHugoBelorio/ChatBotSETEC
```

### 2.2 Entrar na pasta do projeto
```bash
cd ChatBotSETEC
```

### 2.3 Abrir o projeto no VS Code
```bash
code .
```

---

## ⚙️ 3. Configurando o Ambiente

### 3.1 Instalar dependências do Laravel
Com o terminal aberto no VS Code, execute:

```bash
composer install
```

### 3.2 Criar o arquivo `.env`
Copie o modelo de configuração:

```bash
cp .env.example .env
```

### 3.3 Preencher o `.env`

#### 3.3.1 Gerar a API Key do Gemini

1. Faça login com sua conta Google.  
2. Acesse: [https://aistudio.google.com/app/api-keys](https://aistudio.google.com/app/api-keys)  
3. Crie uma nova **API Key**.  
4. Copie a chave e cole no campo `GEMINI_API_KEY` do arquivo `.env`  
   (sem aspas e sem espaços).

---

## 🗄️ 4. Banco de Dados

### 4.1 Criar o banco no MySQL
Abra o **XAMPP**, ligue o servidor **MySQL** e conecte-se pelo **MySQL Workbench**.  
Em seguida, execute:

```sql
create database chat_ia;
```

### 4.2 Rodar as migrations do Laravel
```bash
php artisan migrate
```

---

## 🔑 5. Gerar chave da aplicação

```bash
php artisan key:generate
```

---

## ▶️ 6. Executando o Projeto

Para iniciar o servidor local:

```bash
php artisan serve
```

Acesse o projeto em:  
👉 [http://localhost:8000](http://localhost:8000)

---

## 🧠 7. Estrutura do Assistente

O chatbot segue o seguinte **formato de resposta**:

1. **Explicação resumida (até 5 linhas)**  
   Uma explicação clara e direta sobre o tema solicitado.

2. **Questões de estudo (3 a 5 perguntas)**  
   Perguntas mistas (múltipla escolha e dissertativas) para fixar o conteúdo.

3. **Exemplo prático**  
   Um trecho de código ou caso aplicado que demonstre o conceito.

4. **Dica de estudo**  
   Uma orientação rápida para revisão e memorização.

---

## 👨‍🏫 8. Objetivo Educacional

O **ChatBot SETEC** tem como propósito **auxiliar alunos de cursos técnicos e superiores** na área de tecnologia, promovendo **aprendizado autônomo** com **conteúdo técnico e linguagem acessível**.

---

## 🧰 Tecnologias Utilizadas

- **Laravel** (Framework PHP)
- **Composer** (Gerenciador de dependências)
- **MySQL** (Banco de dados)
- **XAMPP** (Servidor local)
- **Gemini API** (IA Educacional)

---

## ✨ Desenvolvido por

**Vitor Hugo Belório**  
Projeto desenvolvido como material de apoio para a **Semana de Educação, Tecnologia e Ciência (SETEC)**.
