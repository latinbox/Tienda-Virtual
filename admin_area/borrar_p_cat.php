<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['borrar_p_cat'])){

$borrar_p_cat_id = $_GET['borrar_p_cat'];

$borrar_p_cat = "delete from producto_categoria where p_cat_id='$borrar_p_cat_id'";

$run_delete = mysqli_query($con,$borrar_p_cat);

if($run_delete){

echo "<script>alert('La categoria de productos ha sido eliminada exitosamente')</script>";

echo "<script>window.open('index.php?view_p_cats','_self')</script>";

}

}



?>



<?php } ?>