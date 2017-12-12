<?php 

$username = $_GET['username'];

$result = [];



    // estabelecer a ligacao à bd
    require_once('connect.php');

    // preparar uma query
    $sqlquery = "SELECT * FROM users WHERE username = :u";

    $ps = $conn->prepare($sqlquery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    // executar a query com parametros nomeados
    $ps->execute(array(':u' => $username));

    // o resultado fica referenciado pelo mesmo objecto $ps
    if ($ps->rowCount() == 1) {
       // existe login válido
    	$result['status'] = false;
    } else {
    	$result['status'] = true;
    } 
    echo json_encode($result);
?>