<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['borrar_marca'])){

$borrar_id = $_GET['borrar_marca'];

$borrar_marca = "delete from marca where marca_id='$borrar_id'";

$run_marca = mysqli_query($con,$borrar_marca);

if($run_marca){

echo "<script>alert('La marca ha sido eliminada')</script>";
echo "<script>window.open('index.php?ver_marcas','_self')</script>";

}

}


?>


<?php } ?>