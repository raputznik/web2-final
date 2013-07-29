<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width" />
	<title>Jeremy Dahl's Web2 Final</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>	
	<link href='http://fonts.googleapis.com/css?family=Averia+Serif+Libre:700' rel='stylesheet' type='text/css'>
	<script src="scripts/jquery-1.10.2.min.js"></script>
	<script src="scripts/scripts.js"></script>
</head>
<body>
			<?php 
	         $file = "votes.txt"; 

     		$title = "What is your favourite book below?"; 
         	$answers = array("A Tale of Two Cities - Charles Dickens",         
                          "The Hitchhiker's Guide to the Galaxy - Douglas Adams",   // answers
                          "Cat's Cradle - Kurt Vonnegut",
                          "The DaVinci Code - Dan Brown");


		 ?>


	<div class="container">
		<header class="header">
			<div class="title"><h1>Prefect's Books
							</h1></div>	
			<div class="logo">
				<img src="images/book.svg" alt="book logo">
					
				</div>	
		</header>
		<nav class="navbar">
			<ul class="nav">
				<li id="about"><a href="#">ABOUT</a></li>
				<li id="contact"><a href="#">CONTACT</a></li>
				<li id="poll"><a href="#">POLL</a></li>
				<li id="results"><a href="#">RESULTS</a></li>
			</ul>
		</nav>

		<section class="poll">
			<h3><?php echo $title; ?></h3>
			<p>
			  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
			<?php
			  //print possible answers
			  for($i=0;$i<count($answers);$i++){
			    ?><input type="radio" name="vote" value="<?php echo $i; ?>"> <?php echo $answers[$i]; ?><br /><?php
			  }
			?>
			    <p><input type="submit" value="Vote!"></p>
			  </form>
			</p>
			<h3>Results</h3>
			<p>
			<?php
			  //read votes
			  $votes = file($file);
			  $total = 0;
			  $vote = $_POST["vote"];

			  //submit vote
			  if(isset($vote)){
			    $votes[$vote] = $votes[$vote]+1;
			  }

			  //write votes
			  $handle = fopen($file,"w");

			  foreach($votes as $v){
			    $total += $v;
			    fputs($handle,chop($v)."\n");
			  }

			  fclose($handle);

			  //print votes
			  for($i=0;$i<count($answers);$i++){
			    echo "{$votes[$i]} {$answers[$i]}<br />";
			  }
			?>
			</p>
			<p>Total: <?php echo $total; ?> votes.</p>
			
		</section>
		<section class="about">
			<h2>About Prefect's Books</h2>
			<br>
			<p> <img src="images/bookstore.jpg" height="150" width="150" alt="bookstore"> We specialize in rare and hard-to-find books from the 20th century. Please come down and see us sometime, and we'll set you up with a nice book, and maybe a drink, if you come towards closing time.</p><br>
			<h3>Ideal Books</h3>

			<p>Books are available in Hebrew, English, German, French, and other languages.</p>
			
		</section>
		<section class="contact">
			<h2>Contact Us</h2>

			<ul class="social">
			    <li><a href="http://twitter.com" id="tw" rel="nofollow" target="_blank">Twitter</a></li>
			 
			     <li><a href="http://www.facebook.com" id="fb" rel="nofollow" target="_blank">Facebook</a></li>
			 
			     <li><a href="https://profiles.google.com/103518004460450152079/about/?rel=author" id="plus" rel="me author" target="_blank">Google+</a></li>
			 
			    <li><a href="http://feeds.feedburner.com" id="rss" rel="nofollow" target="_blank">RSS</a></li>
			</ul>
			<br>
			<div id="conp2"><p>We look forward to hearing from you.<br> Please drop us a line below.</p></div>
			<form action="mail.php" method="POST">
				<p>Name</p> <input type="text" name="name">
				<br>

				<p>Email</p> <input type="text" name="email">
				<br>

				<p>Message</p><textarea name="message" rows="6" cols="25"></textarea>
				<br>

				<input type="submit" value="Send"><input type="reset" value="Clear">
			</form>
		</section>
		<section class="results">
			<h2>Results</h2>
			<br>
		</section>

	</div>

</body>
</html>