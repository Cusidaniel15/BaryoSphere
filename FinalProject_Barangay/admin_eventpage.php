
<?php

@include ('includes/config.php'); // for user authentication

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
      <title>Event | BaryoSphere</title>
      <link rel= "stylesheet" href="css/admin_user.css">
      

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
      />
    <link rel="stylesheet" href="css/event.css" />
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

    <div class="container">
        <div class="left">
          <div class="calendar"   >
            <div class="month">
              <i class="fas fa-angle-left prev" style="color:#228B22;"></i>
              <div class="date" style="color:#FFf;
              background:#235347; padding:8px 30px; border-radius:5px;">december 2015</div>
              <i class="fas fa-angle-right next" style="color:#228B22;"></i>
            </div>
            <div class="weekdays" style="color:#228B22;margin-top:-50px; ">
              <div>Sun</div>
              <div>Mon</div>
              <div>Tue</div>
              <div>Wed</div>
              <div>Thu</div>
              <div>Fri</div>
              <div>Sat</div>
            </div>
            <div class="days" style="margin-top:-20px;"></div>
            <div class="goto-today">
              <div class="gotos" >
                <input type="text" placeholder="mm/yyyy" class="date-input" style="padding:10px;"/>
                <button class="goto-btn" style="padding:10px;">Go</button>
              </div>
              <button class="today-btn" style="padding:10px;">Today</button>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="today-date">
            <div class="event-day" style="color:#FFD700;margin-top:-70px;">wed</div>
            <div class="event-date" style="color:#FFD700;margin-top:-70px;">12th december 2022</div>
          </div>
          <div class="events"></div>
          <div class="add-event-wrapper">
            <div class="add-event-header">
              <div class="title">Add Event</div>
              <i class="fas fa-times close"></i>
            </div>
            <div class="add-event-body">
              <div class="add-event-input">
                <input type="text" placeholder="Event Name" class="event-name" />
              </div>
              <div class="add-event-input">
                <input
                  type="text"
                  placeholder="Event Time Start"
                  class="event-time-from"
                />
              </div>
              <div class="add-event-input">
                <input
                  type="text"
                  placeholder="Event Time Ends"
                  class="event-time-to"
                />
              </div>
            </div>
            <div class="add-event-footer">
              <button class="add-event-btn">Add Event</button>
            </div>
          </div>
        </div>
        <button class="add-event">
          <i class="fas fa-plus"></i>
        </button>
      </div>



    <script src="js/event.js"></script>

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