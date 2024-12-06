<?php

@include('includes/config.php');

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events | BaryoSphere</title>
    <link rel="stylesheet" href="css/admin_user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/user_event.css"/>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="navbar">
            <div class="logo"><a href="user_homepage.php">BaryoSphere</a></div>
            <ul class="links">
                <li><a href="user_homepage.php">Home</a></li>
                <li><a href="user_projectpage.php">Projects</a></li>
                <li><a href="user_eventpage.php">Events</a></li>
                <li><a href="forum.php">Forum</a></li>
            </ul>
            <a href="login_form.php" class="action_button">Logout</a>
        </div>
    </header>
    <!-- End of Header -->

    <div class="container">
        <div class="left">
            <div class="calendar" style="margin-top:-40px; height:auto;">
                <div class="month">
                    <i class="fas fa-angle-left prev" style="color:#228B22;"></i>
                    <div class="date" style="color:#FFf;
              background:#235347; padding:8px 30px; border-radius:5px;">December 2022</div>
                    <i class="fas fa-angle-right next" style="color:#228B22;"></i>
                </div>
                <div class="weekdays" style="color:#228B22;margin-top:-50px;">
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
                    <div class="goto">
                        <input type="text" placeholder="mm/yyyy" class="date-input" style="padding:10px;"/>
                <button class="goto-btn" style="padding:10px;">Go</button>
              </div>
              <button class="today-btn" style="padding:10px;">Today</button>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="today-date">
                <div class="event-day" style="color:#FFD700;margin-top:-70px;" >Wed</div>
                <div class="event-date" style="color:#FFD700;margin-top:-70px;">12th December 2022</div>
            </div>
            <div class="events">
                <!-- Events for the selected date will be dynamically displayed here -->
            </div>
        </div>
    </div>

    <script src="js/event.js"></script>
    <script>
        // Remove any functionality to add events from the JavaScript
        document.querySelector('.add-event')?.remove();

        // Initialize and render events (read-only)
        // This would ideally fetch data from the database and display events for the selected date.
        // Update this logic as needed to retrieve and display events dynamically.
        const eventsContainer = document.querySelector('.events');
        const dummyEvents = [
            { name: "Community Cleanup", time: "10:00 AM - 12:00 PM" },
            { name: "Tree Planting", time: "2:00 PM - 4:00 PM" },
        ];

        function renderEvents() {
            eventsContainer.innerHTML = '';
            if (dummyEvents.length === 0) {
                eventsContainer.innerHTML = '<p>No events scheduled for this day.</p>';
            } else {
                dummyEvents.forEach(event => {
                    const eventElement = document.createElement('div');
                    eventElement.classList.add('event');
                    eventElement.innerHTML = `
                        <h4>${event.name}</h4>
                        <p>${event.time}</p>
                    `;
                    eventsContainer.appendChild(eventElement);
                });
            }
        }

        renderEvents();
    </script>
</body>
</html>
