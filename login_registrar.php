
<?php

include("conexion.php");

$nombre = $_POST["nombre"];
$password   = $_POST["password"];
$dni   = $_POST["dni"];
$email   = $_POST["email"];
$Grado  = $_POST["Grado"];

//Login
if(isset($_POST["btningresar"]))
{
	$query = mysqli_query($conn,"SELECT * FROM login WHERE nombre = '$nombre' AND password='$password'");
	$nr = mysqli_num_rows($query);
	
	if($nr==1)
	{
		echo "<script> alert('Bienvenido $nombre'); window.location='principal.html' </script>";
	}else
	{
		echo "<script> alert('Usuario no existe'); window.location='index.html' </script>";
	}
}

//Registrar
if(isset($_POST["btnregistrar"]))
    {
	$login= "SELECT * FROM login WHERE dni= '$dni'";

	$resultado = mysqli_query($conn,$login);

	$contar = mysqli_num_rows ($resultado);
	
	if ($contar!=0)
	{
		echo "<script> alert('TU Numero de YA ESTA REGUISTRADO EN EL PORTAL : $dni'); window.location='index.html' </script>";
	}else 
	{
		{
	$sqlgrabar = "INSERT INTO login(nombre,password,dni,email,Grado) values ('$nombre','$password','$dni', '$email','$Grado')";
	
	if(mysqli_query($conn,$sqlgrabar))
	{
		echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.html' </script>";
	}else 
	{
		echo "Error: ".$sql."<br>".mysql_error($conn);
	}
}

	}
}


?>