<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_self')</script>";
}
else {
?>
<?php
if(isset($_GET['borrar_usuario'])){
$borrar_id = $_GET['borrar_usuario'];
$borrar_usuario = "delete from admin where admin_id='$borrar_id'";
$run_borrar = mysqli_query($con,$borrar_usuario);
if($run_borrar){
echo "<script>alert('Usuario eliminado')</script>";
echo "<script>window.open('index.php?ver_usuarios','_self')</script>";
}
}
?>
<?php } ?>