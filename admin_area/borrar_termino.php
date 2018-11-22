<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_self')</script>";
}
else {
?>
<?php
if(isset($_GET['borrar_termino'])){
$borrar_id = $_GET['borrar_termino'];
$borrar_termino = "delete from terminos where termino_id='$borrar_id'";
$run_term = mysqli_query($con,$borrar_termino);
if($run_term){
echo "<script>alert('Una condicion o termino eliminada')</script>";
echo "<script>window.open('index.php?ver_terminos','_self')</script>";
}
}
?>


<?php } ?>