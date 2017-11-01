<?php 
include '../conexion/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nick = $con->real_escape_string(htmlentities($_POST['nick']));
	$pass = $con->real_escape_string(htmlentities($_POST['pass']));
	
	$nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
	$nivel = $con->real_escape_string(htmlentities($_POST['nivel']));
	$correo = $con->real_escape_string(htmlentities($_POST['correo']));

	if(empty($nick) || empty($pass) || empty($nombre) || empty($nivel)){
		header('location:../extend/alerta.php?msj=Hay campos vacios. Redireccionando...&carp=us&pag=in&tipo=error');
		exit;
	};
	//Verificacion solo letras en NICK
	if(!ctype_alpha($nick)){
		header('location:../extend/alerta.php?msj=El nick no contiene solo letras.&carp=us&pag=in&tipo=error');
		exit;
	}
	//Verificacion solo letras en NIVEL
	if(!ctype_alpha($nivel)){
		header('location:../extend/alerta.php?msj=El nivel no contiene solo letras.&carp=us&pag=in&tipo=error');
		exit;
	}

	//Verificacion solo letras en NOMBRE, en este caso, debemos incluir A-Z y (espacio)
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ ';
	
	for ($i=0; $i<strlen($nombre); $i++){
		//Remueve de la posicion i , solo un caracter.
		$buscar = substr($nombre,$i,1);
		//Devuelve un numero si lo encuentra, devuelve falso si lo encontro.
		if(strpos($chars,$buscar) == false){
			header('location:../extend/alerta.php?msj=El nombre no contiene SOLO letras y espacios.&carp=us&pag=in&tipo=error');
			exit;
		};
	};
	
	//Validacion back-end del usuario
	if(strlen($nick) < 8 || strlen($nick) > 15)){
		header('location:../extend/alerta.php?msj=El nick debe tener entre 5 y 15 caracteres.&carp=us&pag=in&tipo=error');
		exit;
	};

	if(strlen($pass) < 8 || strlen($pass) > 15)){
		header('location:../extend/alerta.php?msj=La password debe tener entre 8 y 15 caracteres.&carp=us&pag=in&tipo=error');
		exit;
	}
	$pass = sha1($pass);

	//Validacion de correo, en caso de que no este vacio
	if(!empty($correo)){
		if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
			header('location:../extend/alerta.php?msj=La password debe tener entre 8 y 15 caracteres.&carp=us&pag=in&tipo=error');
			exit;
		};
	}; 

}else{
	header('location:../extend/alerta.php?msj=Utiliza el formulario. Redireccionando...&carp=us&pag=in&tipo=error');
	exit;
};



?>