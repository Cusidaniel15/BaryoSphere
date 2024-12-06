<?php 
    include('includes/constants.php');
?>

<?php
    @include ('includes/config.php');



if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

if($_SESSION['user_type'] != 'user'){
	header('location:user_homepage.php'); // Kung hindi admin, i-redirect sa user dashboard o ibang pahina
	exit();
}

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project | BaryoSphere</title>
    <link rel= "stylesheet" href="css/projectheader.css">
	<link rel="stylesheet" href="<?php echo SITEURL; ?>css/project.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

    <body style="background: #daf1de;color: white">
    <!-- Header -->
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
        
	</header></div>
	<!-- End of Header -->
    
    <div class="wrapper2" style="background:#235347; height:auto; margin-top:70px; border-radius:10px; box-shadow: 0px 10px 60px rgba(0, 0, 0, 0.3);">
    
    <h2 class="text-center" style="background: #8eb69b; padding:10px;text-align:center; border-radius:10px; justify-content:center; color:white;">Project Manager</h2>
    <h3 style="margin-bottom:30px; margin-bottom:30px; margin-top:15px;">List of All Projects</h3>

    
    
    <!-- Menu Starts Here -->
    <nav>
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
                        
                        <a href="<?php echo SITEURL; ?>list-task_user.php?list_id=<?php echo $list_id; ?>" style="text-decoration: none;"><button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><b><?php echo $list_name; ?></b></button></a>
                        
                        <?php
                        
                    }
                }
                
            ?>
            
            
            
        </div>
    </nav>
    <!-- Menu Ends Here -->
    
 
    
    <div class="all-tasks">
        
    <a href="<?php echo SITEURL; ?>add-task_user.php"></a>        
        <table class="tbl-full table table-condensed table-hover" style="color:white;">
        
            <tr style="color:white;">
                <th>S.N.</th>
                <th>Project Name</th>
                <th>Priority</th>
                <th>Deadline</th>
            </tr>
            
            <?php 
            
                //Connect Database
                $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                
                //Select Database
                $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
                
                //Create SQL Query to Get DAta from Databse
                $sql = "SELECT * FROM tbl_tasks";
                
                //Execute Query
                $res = mysqli_query($conn, $sql);
                
                //CHeck whether the query execueted o rnot
                if($res==true)
                {
                    //DIsplay the Tasks from DAtabase
                    //Dount the Tasks on Database first
                    $count_rows = mysqli_num_rows($res);
                    
                    //Create Serial Number Variable
                    $sn=1;
                    
                    //Check whether there is task on database or not
                    if($count_rows>0)
                    {
                        //Data is in Database
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $task_id = $row['task_id'];
                            $task_name = $row['task_name'];
                            $priority = $row['priority'];
                            $deadline = $row['deadline'];
                            ?>
                            
                            <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <td style="color:#FFD700;"><?php echo $task_name; ?></td>
                                <td><?php echo $priority; ?></td>
                                <td><?php echo $deadline; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>update-task.php?task_id=<?php echo $task_id; ?>"></a>
                                    <a href="<?php echo SITEURL; ?>delete-task.php?task_id=<?php echo $task_id; ?>"></a>
                                
                                </td>
                            </tr>
                            
                            <?php
                        }
                    }
                    else
                    {
                        //No data in Database
                        ?>
                        
                        <tr style="color:white;">
                            <td colspan="5">No Project Added Yet.</td>
                        </tr>
                        
                        <?php
                    }
                }
            
            ?>
            
            
        
        </table>
    
    </div>
    
    <!-- Tasks Ends Here -->
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>

    </body>

</html>