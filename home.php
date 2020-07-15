<?php



$sal='';
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("Location:login.php");

}
else{


}

?>
<html>
<body>
Welcome <?php echo $sal; ?>
Login Successful
</body>
</html>