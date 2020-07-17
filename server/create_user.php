<?php


include 'conector.php';
CrearUsuarios("Daniel","1993/07/16","dani@gmail.com","1234");
CrearUsuarios("Karen Mentiras","2000/18/09","karenyurara@gmail.com","123456");
CrearUsuarios("Hachi loca","1998/01/16","loca@hotmail.com","1234");
function CrearUsuarios($Nombre,$FechaNacimiento,$UserName,$Password){
IniciarConexion();
$Consulta="Select * from usuario where Username='".$UserName."'";
$Resultado= mysqli_num_rows($GLOBALS['Conexion']->query($Consulta));
if($Resultado==0){
    $Consulta = "INSERT INTO usuario (Nombre, FechaNacimiento, Username, Password)
    VALUES ('".$Nombre."', '".$FechaNacimiento."', '".$UserName."', '".password_hash($Password, PASSWORD_BCRYPT)."')";

    if ($GLOBALS['Conexion']->query($Consulta) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['Conexion']->error;
    }
}
DesactivarConexion();
}
 ?>
