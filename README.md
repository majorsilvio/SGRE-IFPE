# SGRE-IFPE
Projeto de sistema de gerenciamento de equipamentos - Web II

Nesse sistema os usuários podem solicitar uma reserva de equipamentos em uma determinada data e hora.


# Requisitos operacionais: 
- Git;
- Composer;
- Laravel.

# Instalação:
- Passo 1: git clone https://github.com/majorsilvio/SGRE-IFPE.git (entrar na pasta do projeto para continuar as outras etapas)
- Passo 2: composer install
- Passo 3: cp .env.example .env (antes de abrir o arquivo .env criar uma base de dados, após criar abrir o arquivo e editar o nome da base de dados que foi criada, o nome do usuário e senha cadastrado no mysql)
- Passo 4: php artisan key:generate
- Passo 5: php artisan migrate --seed
- Passo 6: php artisan serve (iniciar o servidor)
- Passo 7: Agora no seu navegador colocar  na URL http://127.0.0.1:8000 ou localhost:8000 , pronto agora pode se cadastrar no sistema e ter acesso a suas funcionalidades.







