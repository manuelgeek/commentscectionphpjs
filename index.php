<?php
// session_start();
// require_once 'php/connect.php'; 
require_once 'php/functions.php'; 
// require_once 'php/login.php';
	

$comment = new FUNCTIONS();

	 if (isset($_SESSION['user'])) {
		$up = "SELECT * FROM users WHERE uid='$_SESSION[user]'";
		$conn = $comment->runQuery($up);
		// $conn = execute();
		$row = $conn->fetch_assoc();

		extract($row);
		//if you use Extract();, so instead of using $row['name'], ill use just $name, dont get confused just incase
	}

	// new comment
	if(isset($_POST['new_comment'])) {
		if (isset($_SESSION['user'])) {
			$new_com_name = $firstname .' '. $lastname ;
		}

		$new_com_text = $_POST['comment'];

		if($new_com_text=="")  {
        $error[] = "enter some text please !";
   		 }

		$comment->comment($new_com_name,$new_com_text);
		
	}

?>
<!doctype html>
<html>
	<head>
		<title> Comment System trial1</title>
		<meta charset="UTF-8" lang="en-US">
		<link rel="stylesheet" href="style.css">
		<script src="js/jquery.js"></script>
		<script src="js/global.js"></script>
	</head>
	<body>
		<div class="page-container">
			<?php 
				$comment->get_total();
				
			?>
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

			<?php
		        if(isset($_GET['successful']) || isset($_SESSION['user']))
		      {
		       
		           ?>
		                     <div class="alert alert-success">
		                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; Welcome <?php echo $firstname .' '. $lastname ; ?>
		                        <img src="uploads/<?php echo $images; ?>" width=200px>
		                     </div>
		                     <?php
		        
		      }
		    ?>
			<form action="" method="post" class="main">
				<label>enter a brief comment</label>
				<textarea class="form-text" name="comment" id="comment" placeholder="say something...."></textarea>
				<br />
			
				<!-- <input type='submit' class='form-submit' name='new_comment' value='post'><br> -->
				<?php
				 if (isset($_SESSION['user'])) { 
				 ?>

				 <input type="submit" class="form-submit" name="new_comment" value="post"><br>

				<a href="php/logout.php"> Logout</a>
			<?php } else { ?>
			<br>
				<p class='signin-link'>
				<a href='php/login.php'> longin </a> or <a href='php/signup.php'>sign up</a> to comment.
				</p>
			<?php } ?>
				<!--
				<input type="submit" class="form-submit" name="new_comment" value="post">
				<br />
				<br />
				<p class="signin-link">
				<a href="php/login.php"> longin </a> or <a href="php/signin.php">singup</a> to comment.
				</p>
				-->
			</form>
			<?php $comment->get_comments(); ?>
		</div>
	</body>
</html>