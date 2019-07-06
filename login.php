

<?php
 
require "function.php";
require "conecta.php"; 


 // resgata variáveis do formulário
 $email = isset($_POST['email']) ? $_POST['email'] : '';
 $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
  
 if (empty($email) || empty($senha))
 {
	 echo "Informe email e senha";
	 exit;
 }
  
 // cria o hash da senha
 $senhaHash = make_hash($senha);
  
  
 $query = "SELECT id, nome FROM cliente WHERE email = :email AND senha = :senha";
 $stmt = $link->prepare($query);
  
 $stmt->bindParam(':email', $email);
 $stmt->bindParam(':senha', $senhaHash);
  
 $stmt->execute();
  
 $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
 if (count($usuario) <= 0)
 {
	 header ('Location:index.php');
	 exit;
 }
  
 // pega o primeiro usuário
 $usuario = $usuario[0];
  
 session_start();
 $_SESSION['logged_in'] = true;
 $_SESSION['id'] = $usuario['id'];
 $_SESSION['nome'] = $usuario['nome'];
 header('Location: index.php');
