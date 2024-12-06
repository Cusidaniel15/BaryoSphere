<! Done Landing Page>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaryoSphere</title>
    <link rel= "stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_forward" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
<body>
    <!-- Header -->
	<header>
		<div class="navbar">    
			<div class="logo"><a href ="#home">BaryoSphere</a></div>
			<ul class="links">
				<li><a href="#home">Home</a></li>
				<li><a href="#projects">Projects</a></li>
				<li><a href="#about">About</a></li>
			</ul>
			<a href="login_form.php" class="action_button">Login</a>
			<div class="toggle_btn">
				<i class="fa-solid fa-bars"></i>
			</div>
		</div>
		<div class="dropdown_menu">
			<li><a href="#home">Home</a></li>
			<li><a href="#projects">Projects</a></li>
			<li><a href="#about">About</a></li>	
			<li><a href="login_form.php" class="action_button">Login</a></li>
			<li><a href="register_form.php" class="action_button">Register</a></li>
		</div>
	</header>
	<!-- End of Header -->
	<!-- Home -->
	 <section class="home" id="home">
		<div class="container">
			<img src="img\puzzle.png" alt="">
			<div class="hero">
				<h1>Welcome to BaryoSphere!</h1>
				<p>Join us in celebrating community initiatives and fostering meaningful discussions.</p>
				
			</div>
		</div>
	 </section>

	 <!-- Projects -->
	 <section class="projects" id="projects" style="margin: 0;">
		<div class="title">
			<h1>Successful Projects</h1>
		</div>
            <div class="container swiper">
                <div class="card-wrapper" style="max-width: 1100px; margin: 40px 90px 35px;
                padding: 20px 10px; overflow: hidden;">
                    <ul class="card-list swiper-wrapper">
                        <li class="card-item swiper-slide" style="list-style: none;" data-name="p-1">
                            <a href="#" class="card-link" style="user-select: none; display: block; background: #fff; padding: 18px;
                                border-radius: 12px; text-decoration: none; border: 2px solid transparent;
                                box-shadow: 0 10px 10px rgb(141, 136, 136); transition: 0.2s ease;"
                                onmouseover="this.style.borderColor='#5372f0';" onmouseout="this.style.borderColor='transparent';">
                                <img src="img/Cleanup.png" alt="Card Image" class="card-image" 
                                style="height: 250px; width: 100%; aspect-ratio: 16 / 9; object-fit: cover; border-radius: 10px;"> 
                                <p class="badge" style="color: blue; padding: 8px 16px;
                                font-size: 0.95rem;
                                font-weight: 500;
                                margin: 16px 0 18px; background: #dde4ff;
                                width: fit-content;
                                border-radius: 50px;">Barangay Clean Up</p>
                                <h5 class="card-title" style="font-size: 1.19rem; color: black;
                                font-weight: 600;"> A community effort to clean streets, public spaces, 
                                    and promote environmental care. </h2>
                                <button class="material-symbols-outlined" 
                                style="height: 35px; width: 35px; color: blue; transition: 0.4s ease; border-radius: 50%; 
                                margin: 30px 0 5px; background: none; cursor: pointer; border: 2px solid #5372f0; 
                                transform: rotate(-45deg);"
                                onmouseover="this.style.color='#fff'; this.style.background='#5372f0';"
                                 onmouseout="this.style.color='blue'; this.style.background='none';">arrow_forward</button>
                            </a>
                        </li>                             
                        <li class="card-item swiper-slide" style="list-style: none;" data-name="p-2">
                            <a href="#" class="card-link" style="user-select: none; display: block; background: #fff; padding: 18px;
                                border-radius: 12px; text-decoration: none; border: 2px solid transparent;
                                box-shadow: 0 10px 10px rgb(141, 136, 136); transition: 0.2s ease;"
                                onmouseover="this.style.borderColor='#5372f0';" onmouseout="this.style.borderColor='transparent';">
                                <img src="img/CoveredCourt.png" alt="Card Image" class="card-image" 
                                style="height:250px;width: 100%; aspect-ratio: 16 / 9; object-fit: cover; border-radius: 10px;"> 
                                <p class="badge" style="color: #b25a2b; padding: 8px 16px;
                                font-size: 0.95rem;
                                font-weight: 500;
                                margin: 16px 0 18px; background: #ffe3d2;
                                width: fit-content;
                                border-radius: 50px;">Renovation of Covered Court</p>
                                <h5 class="card-title" style="font-size: 1.19rem; color: black;
                                font-weight: 600;"> This Renovation of Court are collaborated with the Sangguniang Kabataan 
                                and Barangay Officials. </h2>
                                <button class="material-symbols-outlined" 
                                style="height: 35px; width: 35px; color: blue; transition: 0.4s ease; border-radius: 50%; 
                                margin: 30px 0 5px; background: none; cursor: pointer; border: 2px solid #5372f0; 
                                transform: rotate(-45deg);"
                                onmouseover="this.style.color='#fff'; this.style.background='#5372f0';"
                                onmouseout="this.style.color='blue'; this.style.background='none';">arrow_forward</button>
                            </a>
                        </li>
                        <li class="card-item swiper-slide" style="list-style: none;" data-name="p-3">
                            <a href="#" class="card-link" style="user-select: none; display: block; background: #fff; padding: 18px;
                                border-radius: 12px; text-decoration: none; border: 2px solid transparent;
                                box-shadow: 0 10px 10px rgb(141, 136, 136); transition: 0.2s ease;"
                                onmouseover="this.style.borderColor='#5372f0';" onmouseout="this.style.borderColor='transparent';">
                                <img src="img/road.png" alt="Card Image" class="card-image" 
                                style="height:250px;width: 100%; aspect-ratio: 16 / 9; object-fit: cover; border-radius: 10px;"> 
                                <p class="badge" style="color: #b22485; padding: 8px 16px;
                                font-size: 0.95rem;
                                font-weight: 500;
                                margin: 16px 0 18px; background: #f7dff5;
                                width: fit-content;
                                border-radius: 50px;">Reconstruction of Roadways</p>
                                <h5 class="card-title" style="font-size: 1.19rem; color: black;
                                font-weight: 600;"> This Succesful Project was started this year of January and ends until second week of March 2024.</h2>
                                <button class="material-symbols-outlined" 
                                style="height: 35px; width: 35px; color: blue; transition: 0.4s ease; border-radius: 50%; 
                                margin: 30px 0 5px; background: none; cursor: pointer; border: 2px solid #5372f0; 
                                transform: rotate(-45deg);"
                                onmouseover="this.style.color='#fff'; this.style.background='#5372f0';"
                                 onmouseout="this.style.color='blue'; this.style.background='none';">arrow_forward</button>
                            </a>
                        </li>
                        <li class="card-item swiper-slide" style="list-style: none;" data-name="p-4">
                            <a href="#" class="card-link" style="user-select: none; display: block; background: #fff; padding: 18px;
                                border-radius: 12px; text-decoration: none; border: 2px solid transparent;
                                box-shadow: 0 10px 10px rgb(141, 136, 136); transition: 0.2s ease;"
                                onmouseover="this.style.borderColor='#5372f0';" onmouseout="this.style.borderColor='transparent';">
                                <img src="img/StreetLights.png" alt="Card Image" class="card-image" 
                                style="height:250px;width: 100%; aspect-ratio: 16 / 9; object-fit: cover; border-radius: 10px;"> 
                                <p class="badge" style="color: #205c20; padding: 8px 16px;
                                font-size: 0.95rem;
                                font-weight: 500;
                                margin: 16px 0 18px; background: #d6f8d6;
                                width: fit-content;
                                border-radius: 50px;">Solar Streetlights Project</p>
                                <h5 class="card-title" style="font-size: 1.19rem; color: black;
                                font-weight: 600;"> At this project, it costs approximately 500,000 pesos. It is led by our Barangay Chairman.  </h2>
                                <button class="material-symbols-outlined" 
                                style="height: 35px; width: 35px; color: blue; transition: 0.4s ease; border-radius: 50%; 
                                margin: 30px 0 5px; background: none; cursor: pointer; border: 2px solid #5372f0; 
                                transform: rotate(-45deg);"
                                onmouseover="this.style.color='#fff'; this.style.background='#5372f0';"
                                 onmouseout="this.style.color='blue'; this.style.background='none';">arrow_forward</button>
                            </a>
                        </li>
                        <li class="card-item swiper-slide" style="list-style: none;" data-name="p-5">
                            <a href="#" class="card-link" style="user-select: none; display: block; background: #fff; padding: 18px;
                                border-radius: 12px; text-decoration: none; border: 2px solid transparent;
                                box-shadow: 0 10px 10px rgb(141, 136, 136); transition: 0.2s ease;"
                                onmouseover="this.style.borderColor='#5372f0';" onmouseout="this.style.borderColor='transparent';">
                                <img src="img/Scholarship.png" alt="Card Image" class="card-image" 
                                style="height:250px;width: 100%; aspect-ratio: 16 / 9; object-fit: cover; border-radius: 10px;"> 
                                <p class="badge" style="color: #856404; padding: 8px 16px;
                                font-size: 0.95rem;
                                font-weight: 500;
                                margin: 16px 0 18px; background: #fff3cd;
                                width: fit-content;
                                border-radius: 50px;">Educational Assistance</p>
                                <h5 class="card-title" style="font-size: 1.19rem; color: black;
                                font-weight: 600;"> To give back in hardworking and deserving students, Educational Assistance was offered.</h2>
                                <button class="material-symbols-outlined" 
                                style="height: 35px; width: 35px; color: blue; transition: 0.4s ease; border-radius: 50%; 
                                margin: 30px 0 5px; background: none; cursor: pointer; border: 2px solid #5372f0; 
                                transform: rotate(-45deg);"
                                onmouseover="this.style.color='#fff'; this.style.background='#5372f0';"
                                 onmouseout="this.style.color='blue'; this.style.background='none';">arrow_forward</button>
                            </a>
                        </li>
                        
                    </ul>

                    <div class="swiper-pagination"></div>
                    
                    <div class="swiper-slide-button swiper-button-prev"></div>
                    <div class="swiper-slide-button swiper-button-next"></div>

                </div>
            </div>
		
			
	 </section>

	 <!-- About -->
	  <section class="about" id="about">
		<div class="wrapper">
			<h1>About Us</h1>
			<p>BaryoSphere is a digital space dedicated to empowering and connecting our barangay community. 
			<br> Our platform serves as a central hub for transparency and participation, 
			where community members can stay informed, celebrate progress, and share their voices.</p>
		
			<div class="content-box">
				<div class="card">
					<i class="fas fa-lightbulb fa-2x"></i>
					<h2>Project Highlights</h2>
					<p>Showcase ongoing and completed projects in the barangay, 
					 with updates and timelines to keep everyone informed.</p>
				</div>

				<div class="card">
					<i class="fas fa-globe fa-2x"></i>
					<h2>Community Forum</h2>
					<p>Provide a space where residents can discuss concerns, 
					propose new ideas, and celebrate community achievements.</p>
				</div>

				<div class="card">
					<i class="fas fa-calendar-alt fa-2x"></i>
					<h2>Event Announcements</h2>
					<p>Share information on upcoming events and gatherings 
						to keep the barangay connected.</p>
				</div>

				<div class="card">
					<i class="fas fa-bullseye fa-2x"></i>
					<h2>Our Mission</h2>
					<p>Our mission is to promote community engagement, transparency, and unity by providing access to 
					 project updates, open discussions, and events. We believe in a barangay where everyone feels 
					 connected and informed.</p>
				</div>
				
				<div class="card">
					<i class="fas fa-eye fa-2x"></i>
					<h2>Our Vision</h2>
					<p>To foster a supportive, transparent, and thriving barangay community 
						where each resident feels empowered to contribute and stay informed.</p>
				</div>
			</div>
		</div>
	  </section>		

	  <footer>
		<div class="footer-content">
			<h3>BaryoSphere</h3>
			<p>Connecting our community through projects and forums for shared growth and support.</p>
		</div>

		<div class="footer-menu">
			<ul class="f-menu">
				<li><a href="#home">Home</a></li>
				<li><a href="#projects">Projects</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="services.html">Terms of Services</a></li>
				<li><a href="privacy.html">Privacy Policy</a></li>
			</ul>
		</div>

		<div class="footer-bottom">
			<p>&copy; 2024 BaryoSphere. All rights reserved.</p>
		</div>
	  </footer>


      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
      <script src="js/home.js"></script>

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