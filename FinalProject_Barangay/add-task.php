<?php 
    include('includes/constants.php');
?>

<html>
    <head>
        <title>Project | BaryoSphere</title>
        <link rel= "stylesheet" href="css/projectheader.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo SITEURL; ?>css/project.css" />
    </head>
    
    <body style="background:#daf1de; color: white;">
    <div class="header1">
    <header>
		<div class="navbar1">
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
        </div>
    
        <div class="wrapper" >
        

        <div class="container" style="background: #235347; border-radius:20px; 
        margin-bottom: 70px; margin-top: 70px; padding:20px;
        width:50%; ">
        <p style="justify-content:left; margin-leftmargin-top:20px;">
                    <a class="btn-secondary" style="background: #64db7c; border:1px solid white;
                    border-radius:5px; padding:7px 20px;text-decoration: none;"
                    href="<?php echo SITEURL; ?>admin_projectpage.php">Home</a>
        </p>
            <div class="row">
            
                <div class="col-lg-2"></div>


            <div class="col-lg-8">

            <h1 class="text-center" style="margin-top: 10px; color:white;">Add Projects</h1>
           

                <p>
                    <?php 
                    
                        if(isset($_SESSION['add_fail']))
                        {
                            echo $_SESSION['add_fail'];
                            unset($_SESSION['add_fail']);
                        }
                    
                    ?>
                </p>
               
                <form method="POST" action="">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Project Name</label>
                      <input type="text" name="task_name" class="form-control" placeholder="Type your Project Name" required="required" /></td>
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Project Description</label>
                      <textarea name="task_description" class="form-control" placeholder="Type Project Description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Select List</label>
                      <select name="list_id" class="form-select" id="">
                        <?php 
                                
                        //Connect Database
                        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                        
                        //SElect Database
                        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
                        
                        //SQL query to get the list from table
                        $sql = "SELECT * FROM tbl_lists";
                        
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        
                        //Check whether the query executed or not
                        if($res==true)
                        {
                            //Create variable to Count Rows
                            $count_rows = mysqli_num_rows($res);
                            
                            //If there is data in database then display all in dropdows else display None as option
                            if($count_rows>0)
                            {
                                //display all lists on dropdown from database
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $list_id = $row['list_id'];
                                    $list_name = $row['list_name'];
                                    ?>
                                    <option value="<?php echo $list_id ?>"><?php echo $list_name; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                //Display None as option
                                ?>
                                <option value="0">None</option>
                                <?php
                            }
                            
                        }
                    ?>
                      </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Priority:</label>
                        <select name="priority" class="form-select" id="">
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deadline</label>
                        <input type="date" class="form-control" name="deadline" />
                      </div>

                    <button style="margin-bottom: 20px; background: #64db7c; border:1px solid white;color:white;" type="submit" class="btn btn-secondary" name="submit">Add</button>
                </form>

            </div>

                <div class="col-lg-2"></div>
            
            
            </div>
        
        </div>
        
        </div>
    </body>
    
</html>


<?php 

    //Check whether the SAVE button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Get all the Values from Form
        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];
        $list_id = $_POST['list_id'];
        $priority = $_POST['priority'];
        $deadline = $_POST['deadline'];
        
        //Connect Database
        $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect Database
        $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());
        
        //CReate SQL Query to INSERT DATA into DAtabase
        $sql2 = "INSERT INTO tbl_tasks SET 
            task_name = '$task_name',
            task_description = '$task_description',
            list_id = $list_id,
            priority = '$priority',
            deadline = '$deadline'
        ";
        
        //Execute Query
        $res2 = mysqli_query($conn2, $sql2);
        
        //Check whetehre the query executed successfully or not
        if($res2==true)
        {
            //Query Executed and Task Inserted Successfully
            $_SESSION['add'] = "Task Added Successfully.";
            
            //Redirect to Homepage
            header('location:'.SITEURL);
            
        }
        else
        {
            //FAiled to Add TAsk
            $_SESSION['add_fail'] = "Failed to Add Task";
            //Redirect to Add TAsk Page
            header('location:'.SITEURL.'add-task.php');
        }
    }

?>
