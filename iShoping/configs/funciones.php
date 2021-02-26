<?php

$host_mysql = "localhost";
$user_mysql = "root";
$pass_mysql = "";
$db_mysql = "ishoping";
$mysqli = mysqli_connect($host_mysql,$user_mysql,$pass_mysql,$db_mysql);

//Funcion para establecer coneccion con db
function connect(){
	$host_mysql = "localhost";
	$user_mysql = "root";
	$pass_mysql = "";
	$db_mysql = "ishoping";


 	$mysqli = mysqli_connect($host_mysql,$user_mysql,$pass_mysql,$db_mysql);

	return $mysqli;
}
	
//Funcion Clear
function clear($var){
	htmlspecialchars($var);

	return $var;
}
// check admin
function check_admin(){
	if(!isset($_SESSION['id'])){
		redir("./");
	}
}
//Redir
function redir($var){
	?>
	<script>
		window.location="<?=$var?>";
	</script>
	<?php
	die();
}

//alert
function alert($txt,$type,$url){

	//"error", "success" and "info".

	if($type==0){
		$t = "error";
	}elseif($type==1){
		$t = "success";
	}elseif($type==2){
		$t = "info";
	}else{
		$t = "info";
	}

	echo '<script>swal({ title: "Alerta", text: "'.$txt.'", icon: "'.$t.'"});';
	echo '$(".swal-button").click(function(){ window.location="?p='.$url.'"; });';
	echo '</script>';
}
//check user
function check_user($url){

	if(!isset($_SESSION['id_cliente'])){
		redir("?p=login&return=$url");
	}else{

	}

}

//Nombre del cliente

//Sacar fecha

//Sacar estado del pedido

//Admin name coneccted
function admin_name_connected(){
	include "config.php";
	$id = $_SESSION['id'];
	$mysqli = connect();

	$q = $mysqli->query("SELECT * FROM admins WHERE id = '$id'");
	$r = mysqli_fetch_array($q);

	return $r['name'];

}

//Estado del pago

?>