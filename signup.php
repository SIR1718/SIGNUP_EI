<?php 

session_start();


$username = $_POST['username'];
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];

$nome = $_POST['nome'];
$apelido = $_POST['apelido'];

// verificações do lado do servidor

session_unset();

if ($pass1 != $pass2) {
	
	header("location:signupform.php");
	$_SESSION['u'] = $username;
	$_SESSION['n'] = $nome;
	$_SESSION['a'] = $apelido;
}


    // estabelecer a ligacao à bd
    require_once('connect.php');

    // preparar uma query
    $sqlquery = "INSERT INTO users (username,pass,nome,apelido) VALUES (:u, :p, :n, :a)";

    $ps = $conn->prepare($sqlquery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    // executar a query com parametros nomeados
    $ps->execute(array(':u' => $username, ':p' => $pass1, ':n' => $nome, ':a' => $apelido));

    //var_dump($ps->errorInfo());
    // o resultado fica referenciado pelo mesmo objecto $ps
    if ($ps->rowCount() == 1) {
       // existe login válido
        $_SESSION['user'] = $username;
        $_SESSION['nomecompleto'] = $nome . ' ' . $apelido;

        header("location:index.php");
    exit();
    } else {
    	$_SESSION['u'] = $username;
		$_SESSION['n'] = $nome;
		$_SESSION['a'] = $apelido;
    	header("location:signupform.php");
    }




?>