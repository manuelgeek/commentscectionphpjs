<?php
   // session_start();  

//get the class
   include 'functions.php';

   $login = new FUNCTIONS();

    if (isset($_SESSION['user'])) {
            header("Location:index.php");             
        } 

   if(isset($_POST['login'])){
        
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        $login->login($uid,$pwd);
    }  
?>
<html>
    <head><title>login</title></head>
    <body>
       <form method='POST' >
                <input type='text' name='uid' value='' placeholder='Username'> 
                <input type='password' name='pwd' value='' placeholder='Password'>
                <input type='submit' name='login' value='Log in'>                                     
                </form>

                <a href='../index.php'> back </a> or <a href='signup.php'>sign up</a> 
        
    </body>
</html>
