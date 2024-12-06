<?php

@include('includes/config.php'); //for user authentication

session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit;
}

?>
<?php
$conn = mysqli_connect("localhost", "root", "", "data");

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $comments = $_POST["comments"];
  $dates = date('F d Y, h:i:s A');
  $reply_id = $_POST["reply_id"];

  $query = "INSERT INTO tb_data VALUES('', '$name', '$comments', '$dates', '$reply_id')";
  mysqli_query($conn, $query);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum | BaryoSphere</title>
    <link rel= "stylesheet" href="css/admin_user.css">
	<link rel= "stylesheet" href="css/forum.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <!-- Header -->
	<header>
		<div class="navbar">
			<div class="logo"><a href ="admin_homepage.php">BaryoSphere</a></div>
			<ul class="links">
				<li><a href="admin_homepage.php">Home</a></li>
				<li><a href="admin_projectpage.php">Projects</a></li>
				<li><a href="admin_eventpage.php">Events</a></li>
                <li><a href="admin_forum.php">Forum</a></li>
				<li><a href="adminregister.php">Add Account</a></li>
			</ul>
			<a href="login_form.php" class="action_button">Logout</a>
	</header>
	
	<div class="container1">
      <?php
      $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id = 0"); // only select comment and not select reply
      foreach($datas as $data) {
        require 'comment.php';
      }
      ?>
      <form action = "" method = "post">
        <h3 id = "title">Leave a Comment</h3>
        <input type="hidden" name="reply_id" id="reply_id">
        <input type="text" name="name" placeholder="Your Name">
        <textarea name="comments" placeholder="Your Comment"></textarea>
        <button class = "submit" type="submit" name="submit">Submit</button>
      </form>
    </div>
	
	
	<script>
      function reply(id, name){
        title = document.getElementById('title');
        title.innerHTML = "Reply to " + name;
        document.getElementById('reply_id').value = id;
      }
    </script>
	  

	 <script>
		const toggleBtn = document.querySelector('.toggle_btn');
        const toggleBtnIcon = document.querySelector('.toggle_btn i');
        const dropDownMenu = document.querySelector('.dropdown_menu');

        toggleBtn.onclick = function () {
            dropDownMenu.classList.toggle('open');
            const isOpen = dropDownMenu.classList.contains('open');
            toggleBtnIcon.className = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
        };
	 </script>
</body>
</html>