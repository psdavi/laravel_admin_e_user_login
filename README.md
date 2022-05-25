# laravel_admin_e_user_login
Esse é o projeto inicial do digiatas!
Separei esse código num repositório a parte pra aproveitar a funcionalidade como base para outros projetos em laravel! 
Este projeto base funciona da seguinte forma: 
O admin recebe um email e uma senha pelo seed no banco; 
Ai então ele pode cadastrar novos usuarios para usar o sistema; 
Apenas o admin pode cadastrar novos usuarios mediante login; 
o admin e o usuario tem logins diferentes apos o cadastro; 
o codigo foi modificado na controller de register para que o admin cadastre um novo usuario e permaneça logado ao inves de logar com o 
novo usuario cadastrado (padrão do Auth do laravel) 
