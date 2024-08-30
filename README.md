# Projeto WE

Este projeto é uma aplicação web desenvolvida para a gestão de pacotes e campanhas de marketing em uma empresa. A aplicação permite que os usuários criem, gerenciem e acompanhem pacotes de marketing, oferecendo uma interface intuitiva para administrar todas as etapas do processo, desde a criação do pacote até o acompanhamento das campanhas associadas.

## Funcionalidades

- **Criação de Pacotes:** Interface para criação de pacotes de marketing, com informações detalhadas como tipo de serviço, objetivos e cronograma.
- **Gestão de Campanhas:** Ferramentas para gerenciar campanhas de marketing associadas a cada pacote, incluindo planejamento, execução e monitoramento.

## Tecnologias Utilizadas

- **Linguagem:** PHP
- **Banco de Dados:** MySQL
- **Frontend:** HTML, CSS, JavaScript
- **Frameworks:** Bootstrap (para estilização) e JQuery (para manipulação DOM e AJAX)
- **Serviços:** PHPMailer (para envio de e-mails)

## Como Usar

1. **Instalação:**
   - Clone este repositório: `git clone https://github.com/JGsilvaDev/Projeto-WE.git`
   - Navegue até o diretório do projeto: `cd Projeto-WE`
   - Instale as dependências necessárias, conforme indicado na documentação do projeto.

2. **Configuração do Banco de Dados:**
   - Crie um banco de dados MySQL e importe o arquivo `database.sql` localizado na pasta `sql/`.
   - Configure as credenciais de acesso ao banco de dados no arquivo `config.php`.

3. **Configuração de E-mail:**
   - Configure o envio de e-mails no arquivo `config.php`, ajustando os parâmetros do PHPMailer para corresponder ao seu servidor SMTP.

4. **Execução:**
   - Hospede a aplicação em um servidor web compatível (Apache ou Nginx).
   - Acesse a aplicação através do navegador utilizando o endereço do servidor.

## Exemplos de Uso

- **Criação de um Novo Pacote:** Acesse a seção "Criar Pacote" e preencha os campos com as informações necessárias para adicionar um novo pacote de marketing.
- **Gestão de Campanhas:** Navegue até "Campanhas" para ver a lista de campanhas associadas a cada pacote e gerenciar suas etapas e metas.

## Contribuições

Contribuições são bem-vindas! Se você deseja melhorar este projeto ou adicionar novas funcionalidades, sinta-se à vontade para enviar um pull request.

