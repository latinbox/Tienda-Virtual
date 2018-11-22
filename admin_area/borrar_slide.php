<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_self')</script>";
}
else {
?> 
<?php

if(isset($_GET['borrar_slide'])){
$borrar_id = $_GET['borrar_slide'];
$borrar_slide = "delete from slider where slide_id='$borrar_id'";
$run_borrar = mysqli_query($con,$borrar_slide);
if($run_borrar){
echo "<script>alert('Slide Eliminado')</script>";
echo "<script>window.open('index.php?ver_slides','_self')</script>";
}
} 
?>

<?php } ?>