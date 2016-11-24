 <?php include "database.php"; ?>

 
<?php

	//Create Select Query
	$query="select * from shouts order by time desc limit 100";
	$shouts = mysqli_query($con,$query);
	
 ?>
 
 <?php
 session_start();

?>
 
<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8" />
    <title>Simple PHP Public Chatbox!</title>
    <link rel="stylesheet" href="css/new2.css" type="text/css" />
  </head>
  <body>
    <div id="container">
      <header>
        <center>
		
		<form method="post" action="index.php"> 
		<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="icon.png" style="width:70px;height:60px;"> &nbsp;GROUP CHATBOX&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<input class="logout"type="image" name="logout" value="LOG-OUT" src="power.png" />
		</form>
		</h1></center> 
      </header>
    <div id="shouts">
	
	
      	<ul>
	  <?php while ($row=mysqli_fetch_assoc($shouts)): ?>
	  
      	    <li class="shout"> 
	      <span><?php echo $row['time'];  ?> - </span><strong><?php echo $row['user'];  ?>:</strong> <?php $row['message'];  ?>
		  
		  <?php
			$chars = array("(y)","^_^",":|]",":')","3:)","-_-","(^^^)",">:o","B)",":*",";)",":(",":42:","<(~)",":/","o:)",":v","o.O","8|",">:(",":3",":p",":D",":)",":o","<3", "[peace]", "[umbr]");
			$icons = array("<img src='emoticons/like.png'>","<img src='emoticons/joy.png'>","<img src='emoticons/robot.png'>","<img src='emoticons/cry.png'>","<img src='emoticons/devil.png'>","<img src='emoticons/squint.png'>","<img src='emoticons/shark.png'>","<img src='emoticons/upset.png'>","<img src='emoticons/glasses.png'>","<img src='emoticons/kiss.png'>","<img src='emoticons/wink.png'>","<img src='emoticons/frown.png'>","<img src='emoticons/42.png'>","<img src='emoticons/penguin.png'>","<img src='emoticons/unsure.png'>","<img src='emoticons/angel.png'>","<img src='emoticons/pacman.png'>","<img src='emoticons/confused.png'>","<img src='emoticons/shades.png'>","<img src='emoticons/grumpy.png'>","<img src='emoticons/curly.png'>","<img src='emoticons/toungeout.png'>","<img src='emoticons/veryhappy.png'>","<img src='emoticons/happy.png'>","<img src='emoticons/gasp.png'>","<img src='emoticons/heart.png'>", "&#9774;", "&#9730;");
			$new_str = str_replace($chars,$icons,$row['message']);
			echo $new_str;
			 ?>
		  
		  </li>
		
		
	  <?php endwhile; ?>
      	</ul>
      </div>
      <div id="input">
      	<?php if (isset($_GET['error'])) : ?>
	      <div class="error"><?php echo $_GET['error'];  ?></div>
	<?php endif; ?>
        <form method="post" action="process.php">
          <input type='text' value= "<?php echo $_SESSION['username']; ?>" name='user' placeholder="Enter your name" readonly='readonly'/>
          <input type='text' name="message" placeholder="Enter message" />
		  
          <br/>
          <input class="shout-btn"type="submit" name="submit" value="SEND" />
		  
        </form>
		<br>
      </div>
    </div>
  </body>
</html>