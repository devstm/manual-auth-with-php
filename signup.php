<html lang="en">
<?php include "temp\header.php"?>
<?php require_once 'creat_new_user.php'?>



<form style="background-color: white;
    width: 50%;
    min-height: 400px;
    text-align: center;
    margin-left: 25%;
    margin-top: 5%;
    border: #d7d7d7 solid 4px;
    border-radius: 20px;
    box-shadow: black;
    padding: 20px;" action="signup.php" method="POST">
    <h1> Forms </h1>
    <div class="input">




        <div class="form-group">
            <label for="name" style="font-size: 22px">name</label>
            <input class="form-control"  name="name" type="text" value="<?php echo htmlspecialchars($name); ?>">
            <h6 style="color: red;font-size: 15px"><?php echo( $errors['name']); ?></h6>
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1" style="font-size: 22px">Email address</label>
            <input value="<?php echo htmlspecialchars($email); ?>" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <h6 style="color: red;font-size: 15px"><?php echo( $errors['email']); ?></h6>
        </div>


        <div class="form-group">
            <label style="font-size: 22px" for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
            <h6 style="color: red;font-size: 15px"><?php echo( $errors['password']); ?></h6>
        </div>
        <div class="form-group">
            <label style="font-size: 22px" for="exampleInputPassword2">conf . Password </label>
            <input type="password" class="form-control" name="configPassword" placeholder="Password">
            <h6 style="color: red;font-size: 15px"><?php echo( $errors['configPassword']); ?></h6>
        </div>

    </div>


    <input type="submit" name="submit" value="submit" class="btn btn-primary">

</form>



<?php include "temp/footer.php"?>
</html>





