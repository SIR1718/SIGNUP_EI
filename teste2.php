<?php
$userdb = "php";
$hostdb = "localhost";
$passdb = "php";
$namedb = "ex_login";
 
$conn = new mysqli($hostdb,$userdb,$passdb,$namedb);

if($conn->connect_errno) {
    //var_dump($conn);
    //echo $conn->connect_error;
    die("erro no accesso à bd");
} else {
   // echo "ok";
}

$sql = "SELECT * from users";

$result = $conn->query($sql);


echo "<ul>";
while ($user = $result->fetch_object()) {
	echo "<li>";
	echo $user->nome . ' ' . $user->apelido;
	echo "</li>";
}
echo "</ul>";

$result->data_seek(0);

$html = new SimpleXMLElement("<ol></ol>");
while ($user = $result->fetch_object()) {
	$html->addChild("li",$user->nome . ' ' . $user->apelido);
}

echo $html->asXML();




?>