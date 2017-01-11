<?php

/*
Author: Abraham Mcogol
email: abramogol@gmail.com/
*/


session_start();
require_once 'dbconfig.php';

    if(isset($_POST['btn-reg']))
    {
        //$user_name = $_POST['user_name'];
        $user_email = trim($_POST['user_email']);
        $no = $_POST['no'];
        $user_password = trim($_POST['password']);
        
        $password = md5($user_password);
        
        $sql = "INSERT INTO tbl_users ( user_email, no, user_password ) VALUES ( '{$user_email}', '{$no}', '{$password}')";

        try
        {   
        
      $stmt = $db_con->prepare($sql);
      $stmt->execute();

      $count = $stmt->rowCount();
            
            if($count > 0){
                
                // echo " Successful "; // log in
                header("Location: index.php");
            
            }
            else{
                
                echo "Error."; // wrong details 
            }
                
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login and Registration with SMS intergration</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<link href="style.css" rel="stylesheet" type="text/css" media="screen">


</head>

<body>
    
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" action="register.php">
      
        <h2 class="form-signin-heading">Register In to WebApp.</h2><hr />
        
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="user_email" />
        <span id="check-e"></span>
        </div>

        <div class="form-group">
        <input type="text" class="form-control" placeholder="Your mobine no# This is not validated please enter correctly" name="no"  />
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password"  />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-reg" >
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register
			</button>
            Already have an account? <a href="index.php">Sign in</a> 
        </div>  
      
      </form>


    </div>
    
</div>
    
<!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->

</bod