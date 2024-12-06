<! Done >

<?php

@include ('includes/config.php');

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

if($_SESSION['user_type'] != 'admin'){
	header('location:user_homepage.php'); // Kung hindi admin, i-redirect sa user dashboard o ibang pahina
	exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | BaryoSphere</title>
    <link rel= "stylesheet" href="css/admin_user.css">

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
	<!-- End of Header -->

	<section class="home" id="home">
    <div class="container">
        <img src="img/puzzle.png" alt="">
        <div class="hero">
            <h1>Welcome to BaryoSphere, <span><?php echo $_SESSION['admin_name']; ?>!</span></h1>
            <p>Let's get connected to each other and make our community productive</p>
          
            <div id="date-time" style="margin-top: 15px; font-size: 1.5rem; color: #333; font-weight: bold;"></div>
        </div>
    </div>
</section>



	

	 <script>
 		//JavaScript for updating date and time
		function updateDateTime() {
    		const now = new Date();
    
   			 const options = { year: 'numeric', month: 'long', day: 'numeric' }; 
    		 const formattedDate = now.toLocaleDateString('en-US', options); 
    		 const formattedTime = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true }); 
    		 document.getElementById('date-time').textContent = `Date: ${formattedDate} | Time: ${formattedTime}`;

		}
		setInterval(updateDateTime, 1000);
		updateDateTime();


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