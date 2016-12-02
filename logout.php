<?php include("include/header.php"); session_start(); 
session_destroy();
header('Location: authentication.php');
?>
<?php include("include/footer.php")?>