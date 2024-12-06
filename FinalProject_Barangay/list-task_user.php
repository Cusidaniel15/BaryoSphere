<?php 
    include('includes/constants.php');
    //Get the listid from URL
    
    $list_id_url = $_GET['list_id'];
?>

<html>
    <head>
    <link rel= "stylesheet" href="css/projectheader.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Project | BaryoSphere</title>
        <link rel="stylesheet" href="<?php echo SITEURL; ?>css/project.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    
    <body style="background:#daf1de; color: white;;">

    <div class="header1">
    <header>
		<div class="navbar1">
			<div class="logo"><a href ="user_homepage.php">BaryoSphere</a></div>
			<ul class="links">
				<li><a href="user_homepage.php">Home</a></li>
				<li><a href="user_projectpage.php">Projects</a></li>
				<li><a href="user_eventpage.php">Events</a></li>
				<li><a href="forum.php">Forum</a></li>
			</ul>
			<a href="login_form.php" class="action_button">Logout</a>
	</header>
        </div>
        <div class="wrapper2"style="background:#235347; height:auto; margin-top:70px; border-radius:10px;box-shadow: 0px 10px 60px rgba(0, 0, 0, 0.3);">
        
        
        <!-- Menu Starts Here -->
    <nav>
        <h2 style="background: #8eb69b; text-align:center; border-radius:10px; padding:10px;justify-content:center; color:white;">Project Manager</h2>

        <div class="nav nav-tabs" id="nav-tab" role="tablist">
    
            
            <?php 
                
                //Comment Displaying Lists From Database in ourMenu
                $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                
                //SELECT DATABASE
                $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());
                
                //Query to Get the Lists from database
                $sql2 = "SELECT * FROM tbl_lists";
                
                //Execute Query
                $res2 = mysqli_query($conn2, $sql2);
                
                //CHeck whether the query executed or not
                if($res2==true)
                {
                    //Display the lists in menu
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $list_id = $row2['list_id'];
                        $list_name = $row2['list_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>list-task_user.php?list_id=<?php echo $list_id; ?>" style="text-decoration: none; "><button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><b><?php echo $list_name; ?></b></button></a>
                        
                        <?php
                        
                    }
                }
                
            ?>
            
            
            
        </div>
    </nav>
    <!-- Menu Ends Here -->
        
        
        <div class="all-task">
        
            <a href="<?php echo SITEURL; ?>add-task_user.php"></a>
            
            
            <table class="tbl-full table table-condensed table-hover" style="color:white;">
    <tr style="color:white;">
        <th>S.N.</th>
        <th>Project Name</th>
        <th>Priority</th>
        <th>Deadline</th>
    </tr>
    
    <?php 
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

    // SQL QUERY to display tasks by list selected
    $sql = "SELECT * FROM tbl_tasks WHERE list_id=$list_id_url";

    // Execute Query
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        // Display the tasks based on list
        // Count the Rows
        $count_rows = mysqli_num_rows($res);

        if ($count_rows > 0) {
            // Initialize a counter variable
            $sn = 1;

            // We have tasks on this list
            while ($row = mysqli_fetch_assoc($res)) {
                $task_id = $row['task_id'];
                $task_name = $row['task_name'];
                $priority = $row['priority'];
                $deadline = $row['deadline'];
                ?>
                <tr>
                    <!-- Use the counter variable for Serial Number -->
                    <td><?php echo $sn; ?>.</td>
                    <td style="color:#FFD700;"><?php echo $task_name; ?></td>
                    <td><?php echo $priority; ?></td>
                    <td><?php echo $deadline; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>update-task.php?task_id=<?php echo $task_id; ?>" style="text-decoration:none;">
                        </a>
                        
                        <a href="<?php echo SITEURL; ?>delete-task.php?task_id=<?php echo $task_id; ?>" style="text-decoration:none;">
                            
                        </a>
                    </td>
                </tr>
                <?php
                // Increment the counter for the next row
                $sn++;
            }
        } else {
            // No tasks on this list
            ?>
            <tr>
                <td colspan="5" style="color:tomato;">No Project Added on this List.</td>
            </tr>
            <?php
        }
    }
    ?>
</table>

        
        </div>
        
        </div>
        
    </body>
    
</html>