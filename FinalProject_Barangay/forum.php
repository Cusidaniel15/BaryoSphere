
<?php

@include('includes/config.php');

session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit;
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "data");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle comment form submission
if (isset($_POST["submit"])) {
    $name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["name"]));
    $comments = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["comments"]));
    $reply_id = intval($_POST["reply_id"]); // Ensure reply_id is an integer
    $dates = date('F d Y, h:i:s A');

    if (!empty($name) && !empty($comments)) {
        $query = "INSERT INTO tb_data (name, comments, dates, reply_id) VALUES ('$name', '$comments', '$dates', '$reply_id')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Comment added successfully!');</script>";
        } else {
            echo "<script>alert('Error: Could not add comment.');</script>";
        }
    } else {
        echo "<script>alert('Name and comment fields are required.');</script>";
    }
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
				<li><a href="user_homepage.php">Home</a></li>
				<li><a href="user_projectpage.php">Projects</a></li>
				<li><a href="user_eventpage.php">Events</a></li>
                <li><a href="forum.php">Forum</a></li>
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
        <input type="text" name="name" placeholder="Your name">
        <textarea name="comments" placeholder="Your comment"></textarea>
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