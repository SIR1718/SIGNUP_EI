<?php

session_start();

$lastusername = "";
$lastusernome = "";
$lastuserapelido = "";

if (isset($_SESSION['u'])) {
	$lastusername = $_SESSION['u'];
}

if (isset($_SESSION['n'])) {
	$lastusernome = $_SESSION['n'];
}


if (isset($_SESSION['a'])) {
	$lastuserapelido = $_SESSION['a'];
}

session_unset();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
</head>
<body>

<form action="signup.php" method="POST">

<label for="iuser"> username: </label>
<input type="text" id="iuser" name="username" value= "<?php echo $lastusername;?>"/>

<label for="ipass1"> password: </label>
<input type="password" id="ipass1" name="password1"/>

<label for="ipass2"> password: </label>
<input type="password" id="ipass2" name="password2"/>

<label for="inome"> nome: </label>
<input type="text" id="inome" name="nome" value="<?php echo $lastusernome ?>"/>
<label for="iapelido"> apelido: </label>
<input type="text" id="iapelido" name="apelido" value="<?php echo $lastuserapelido ?>"/>

<input type = "submit" value="registar"/>

</form>
</body>
<script type="text/javascript">
	
	$("#iuser").keyup(function (event) {
		$.ajax({
			url: "checkuser.php",
			dataType : "json",
			method : "GET",
			data : {
				"username" : $("#iuser").val(),
			},
			success : function (data) {
				console.log(data);
				if (data.status) {
					$("#iuser").css("background-color",'green');
				} else {
					$("#iuser").css("background-color",'red');
				}
			}
		})
	})
</script>
</html>

