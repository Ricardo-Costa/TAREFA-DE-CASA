# Tarefa de Casa
Projeto destinado a educação, com a finalidade de estimular os estudos não só nas escolas mas também no dia a dia dos Alunos.

Ferramentas
-----------

Este projeto está sendo desenvolvido com o Framework PHP [Codeigniter](http://www.codeigniter.com) + [Jquery](https://jquery.com) + [Bootstrap](http://getbootstrap.com)

Configurando
------------

1. Crie seu Banco de Dados e em seguida execute o código SQL do arquivo `tables.sql` localizado em `/docs/tables.sql` para que as tabelas requeridas do sistema sejam construídas:

        Obs: Este arquivo pode ser descartado após a instalação.
        
2. Defina os dados do seu `Data Base` em `/application/config/database.php`. Substitua os valores das seguintes chaves do array:

        'hostname' => 'localhost', // TODO - Alterar Host
        'username' => 'usuario', // TODO - Alterar Usuário padrão
        'password' => 'senha', // TODO - Alterar Senha padrão
        'database' => 'nome-do-banco', // TODO - Alterar Banco de Dados
        
3. Você deve definir o E-mail padrão do sistema. Abra o arquivo `/application/config/constants.php` e substitua os valores das seguintes constantes com os seus dados:

        define('SYS_EMAIL',     'my-email@mail.com'); // TODO - Definir E-mail aqui
        define('SYS_EMAIL_PASS','my-password'); // TODO - Definir senha aqui
        
        Obs: A execução desta etapa é necessária para que o sistema envie um email de confirmação de cadastro ao usuário.

4. Você precisa configurar seu `smtp` vá ao arquivo `/application/controllers/User.php` da classe `User` e localize o método `_sendMailDefault`:
        
        Obs: A execução desta etapa é necessária para que o sistema envie um email de confirmação de cadastro ao usuário.
        
**Note:**  Encontre mais informações em [http://www.codeigniter.com/user_guide/libraries/email.htm](http://www.codeigniter.com/user_guide/libraries/email.html?highlight=mail#setting-email-preferences)