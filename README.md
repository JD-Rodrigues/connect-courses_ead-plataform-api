<p align="center">
  <img width=300 src="https://github.com/JD-Rodrigues/public-assets/blob/main/Logos/connect-courses-logo.png?raw=true" />
</p>

## 📋 Descrição:
<p>Connect Courses API é uma estrutura backend para uma plataforma EAD.</p>


## 🎯 Motivação:
O projeto teve como objetivo o aprofundamento de meus conhecimentos em PHP e no Framework Laravel, bem como o aprendizado de Docker em aplicações multi-container.

## 🟡 Status do projeto:
Em andamento. Na etapa de testes de integração.

## 🛠️ Funcionalidades já desenvolvidas:
- Autenticação de usuário;
- Recuperação de senha;
- Listagem de cursos, módulos e aulas;
- Criação e fechamento de tickets de suporte pelos alunos;
- Resposta de mensagens de support pelos professores;
- Suporta upload das imagens dos eventos;
- Fornece uma API com endpoints para todas as operações listadas acima.
  
## 🔭 Tecnologias utilizadas:
<b>MySQL Server</b> - Sistema de gerenciamento de banco de dados utilizado na persistência das informações.

<b>Laravel</b> - Framework PHP utilizado na construção da API. A versão utilizada é a 10.x.

<b>Redis</b> - Banco de dados em memória usado para armazenar o cache.

<b>Docker</b> - Plataforma utilizada para padronizar o ambiente de execução e facilitar a portabilidade.

<b>Docker Compose</b> - Ferramenta utilizada para trabalhar com os diversos contêineres Docker que compõem a aplicação, pois é um projeto multi-container.

<b>Nginx</b> - Servidor web que interage com os diferentes serviços da aplicação, presentes em cada contêiner.

## Como rodar a aplicação:
### Requisitos:
- Ter o Docker instalado: https://docs.docker.com/engine/install/
- Ter o Docker Compose instalado: https://docs.docker.com/compose/install/


### Passo a passo:
1. Clone o Repositório:
- Abra o terminal ou prompt de comando e navegue até o diretório onde deseja armazenar o projeto.
- Use o comando `git clone https://github.com/JD-Rodrigues/connect-courses_ead-plataform-api.git`
2. Instale as dependências:
- Navegue até o diretório do projeto recém-clonado, usando o terminal.

3. Configure o manco de dados e servidor de e-mail no arquivo `.env`:
- Renomeie o arquivo `.env.example` para `.env`;
- Atribua as informações de seu banco de dados às seguintes variáveis de ambiente: `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD`.
- Adicione as informações de seu servidor de e-mail às variáveis de ambiente iniciadas com o prefixo `MAIL_`.
4. Execute o Docker Compose na pasta raiz do projeto, para fazer a build e subir os contêineres: `docker compose up -d`.
5. Rodando a aplicação:
- Liste os contêineres da aplicação que estão em execução: `docker ps`;
- Identifique o id do contêiner do Laravel (o de nome `connect-courses_ead-plataform-api-app`) e em seguida acesse-o: `docker exec -it id-do-contêiner-laravel bash` (substitua `id-do-contêiner-laravel` pelo id do contêiner). Assim, você acessará o contêiner através de um terminal bash.
- Execute o comando `composer install` para instalar as dependências do projeto Laravel listadas no arquivo composer.json.
- Execute o comando `php artisan key:generate`, para gerar uma chave criptografada para a aplicação.
- Execute o comando `php artisan migrate` para criar as tabelas do banco de dados.
6. Testando a rota principal da API:
- Abra um navegador da web e acesse `http://localhost:8888`. O retorno esperado é: `Esta é a rota base da API Connect Courses!`


## Endpoints:
### == Autenticação ==
`POST /login` - Faz login, utilizando as seguintes informações de usuário obrigatórias enviadas via corpo da requisição (não requer autenticação):
- `email`: endereço de email em formato padrão;
- `password`: string.

Retorna um token de autenticação, requerido na maioria dos endpoints. É recomendado adicionar este token no header `Àuthorization` logo após recebê-lo, para que ele não seja perdido. O valor enviado neste header deve ser composto da palavra `Bearer` seguida de espaço e o token retornado no momento do login do usuário. Ex.: `Bearer 2|x45fdsashdushduiayouioduisfiseroiserusirsicr`.

`GET /me` - Retorna informações sobre o usuário logado.

`POST /logout` - Faz logout na aplicação. Requer autenticação.
### == Redefinição de senha ==

`POST /forgot-password` - Envia um link de redefinição de senha para o e-mail informado, se esse e-mail estiver cadastrado na tabela de usuários do banco de dados. Logo, o `email` é a informação obrigatória para ser enviada no body desta requisição.

`POST /reset-password` - Redefine a senha de usuário. As seguintes informações deverão ser passadas no body da requisição:

- `email`

- `password`

- `password_confirmation`

- `token` (token contido no parâmetro do link de redefinição de senha enviado para o e-mail)
### == Cursos, módulos e aulas ==
`GET /courses` - Lista todos os cursos. Requer autenticação.

`GET /course/{id}` - Retorna o curso cujo id for passado no parâmetro da url. Requer autenticação.

`GET /course/{id}/modules` - Lista todos os módulos do curso cujo id for passado no parâmetro da url. Requer autenticação.

`GET /modules/{id}/lessons` - Lista todas as aulas do módulo cujo id for passado no parâmetro da url. Requer autenticação.

`GET /lesson/{id}` - Retorna a aula cujo id for passado no parâmetro da url.  Requer autenticação.
### == Tickets de suporte ==

`GET /supports` - Lista todos os tickets de suporte criados pelos estudantes. Requer autenticação.

`GET /my-supports` - Lista todos os tickets de suporte criados pelos estudante logado. Requer autenticação.

`POST /supports` - Cria um novo ticket de suporte. O body da requisição deverá conter:

- `lesson_id`: uuid;

- `status_code`: Opções possíveis: "T", "S" ou "C", significando, respectivamente, "Awaiting Teacher", "Awaiting Student" e "Closed"

- `description`: Texto contendo a dúvida/solicitação de ajuda.

Requer autenticação.

`POST /support-replies` - Cria uma nova resposta a um ticket de suporte. O body da requisição deverá conter:
- `user_id`: uuid;

- `support_id`: uuid;

- `description`: texto da resposta.

Requer autenticação.

### Autor
---
 <br />

<a href="https://www.linkedin.com/in/domingos-rodrigues-dev/">
 <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/87840631?s=400&u=0e6c41155a125e5042cb3497fa1ff4f9be6625ab&v=4" width="100px;" alt=""/>
 <br />
 <p><b>Domingos Rodrigues</b></p>