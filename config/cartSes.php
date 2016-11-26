<?php	session_start();	?>

<?php
$cartSesID=3574;
if (  isset($_POST['id']) & isset($_POST['qty']) ) {
	$_SESSION[$_POST['id']] = array($cartSesID,$_POST['id'],$_POST['qty']);
	echo count($_SESSION)."<br>";
	foreach ($_SESSION as $value) {
    echo "$value[0] <br>";
	}
	
	
}
?>
