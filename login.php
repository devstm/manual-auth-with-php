<html lang="en">
<?php include "temp\header.php"?>
<?php include 'loginform.php'?>

<?php
if (isset($_GET['msg']) && !empty($_GET['msg']) ){
echo $_GET['msg'];}
?>
<form style="background-color: white;
    width: 50%;
    min-height: 400px;
    text-align: center;
    margin-left: 25%;
    margin-top: 5%;
    border: #d7d7d7 solid 4px;
    border-radius: 20px;
    box-shadow: black;
    padding: 20px;" action="login.php" method="POST">
    <h1> Forms </h1>
    <div class="input">






        <div class="form-group">
            <label for="exampleInputEmail1" style="font-size: 22px">Email address</label>
            <input  type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <h6 style="color: red;font-size: 15px"></h6>
        </div>


        <div class="form-group">
            <label style="font-size: 22px" for="exampleInputPassword1">Password</label>
            <input type="password"  class="form-control" name="password" placeholder="Password">
            <h6 style="color: red;font-size: 15px"><?php echo $error;?></h6>

        </div>


    </div>


    <input type="submit" name="submit" value="submit" class="btn btn-primary">

</form>



<?php include "temp/footer.php"?>
</html>


