 <?php
 // session_start();
 include 'functions.php';

   $sign = new FUNCTIONS();

        if (isset($_SESSION['user'])) {
            header("Location:index.php");             
        }

    if (isset($_POST['upload'])) {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];
        $pwd2 = $_POST['pwd2'];
        $file = $_FILES['image'];

    if($firstname=="")  {
        $error[] = "provide f rname !";
    }
    else if($lastname=="") {
        $error[] = "provide l name !";    
    }
    else if($uid=="")   {
        $error[] = "provide u id!";
    }
    else if($pwd != $pwd2)   {
        $error[] = "pass do not match!";
    }
    else if($file=="") {
        $error[] = "provide your photo !";
    }
   

        $sign->sign_up($firstname, $lastname,$uid,$pwd , $file );
 }

?>
<html>
    <head>
        <title>Signin</title>
    </head>
    <body>

        <?php
        if(isset($error))
      {
        foreach($error as $error)
        {
           ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
        }
      }
    ?>
       
                <form method='POST'  enctype='multipart/form-data'>
                    
                    <div>
                        <input type='file' name='image' value=''>
    
                    </div>                
                    <div>
                        <p>First Name:</p><input type='text' name='firstname' value='' placeholder='First Name'>
                    </div>
                    <div>
                        <p>Last Name:</p><input type='text' name='lastname' value='' placeholder='Last Name'>
                    </div>
                    <div>
                        <p>User id:</p><input type='text' name='uid' value='' placeholder='User id'>
                    </div>
                    <div>
                        <p>Password:</p><input type='password' name='pwd' value='' placeholder='Password'>
                    </div>
                    <div>
                        <p>Con Password:</p><input type='password' name="pwd2"  value='' placeholder='c Password'>
                    </div>
                    <div>
                        <input type='submit' name='upload' value='Submit'>
                    </div>
                </form>"
               
                <!-- //header("Location:index.php?loginfailed"); -->

                 <a href='../index.php'> back </a> or <a href='login.php'>sign in</a> 
        
    </body>


</html>




