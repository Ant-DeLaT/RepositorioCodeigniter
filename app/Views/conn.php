<?php
// GIVE THIS A GO THROUGH
$host="localhost";
$db="infer_base";
$username="root";
$password="";
$sql=new mysqli($host,$username,$password,$db);

if ($sql->connect_error) {
    echo "Fallo al conectar a MySQL: (" . $sql->connect_errno . ") " . $sql->connect_error;
}else{
    return $sql;
}
?>
