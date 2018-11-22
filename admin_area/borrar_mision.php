<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_self')</script>";
}
else {
?>
<?php
if(isset($_GET['borrar_mision'])){
$borrar_id = $_GET['borrar_mision'];
$borrar_mision = "delete from mision where mision_id='$borrar_id'";
$run_delete = mysqli_query($con,$borrar_mision);
if($run_delete){
echo "<script>alert('Mision ha sido eliminada')</script>";
echo "<script>window.open('index.php?ver_misiones','_self')</script>";
}
}
?>

<?php } ?>