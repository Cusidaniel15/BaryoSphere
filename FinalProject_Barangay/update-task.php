<?php 
    include('includes/constants.php');
    
    //Check the Task ID in URL
    
    if(isset($_GET['task_id']))
    {
        //Get the Values from DAtabase
        $task_id = $_GET['task_id'];
        
        //Connect Database
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //Select Database
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        //SQL Query to Get the detail of selected task
        $sql = "SELECT * FROM tbl_tasks WHERE task_id=$task_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
        //Check if the query executed successfully or not
        if($res==true)
        {
            //Query <br />Executed
            $row = mysqli_fetch_assoc($res);
            
            //Get the Individual Value
            $task_name = $row['task_name'];
            $task_description = $row['task_description'];
            $list_id = $row['list_id'];
            $priority = $row['priority'];
            $deadline = $row['deadline'];
        }
    }
    else
    {
        //Redirect to Homepage
        header('location:'.SITEURL);
    }
?>

<html>
    <head>
        <title>Project | BaryoSphere</title>
        <link rel="stylesheet" href="<?php echo SITEURL; ?>css/project.css" />
        <link rel= "stylesheet" href="css/projectheader.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    
    <body style="background: #daf1de; ">
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
        
	</header></div>        
    
        <div class="container" style="background: #235347; border-radius:20px; 
        margin-bottom: 70px; margin-top: 70px; padding:20px;
        width:50%; box-shadow: 0px 10px 60px rgba(0, 0, 0, 0.3);">
        <p style="justify-content:left; margin-leftmargin-top:20px;">
                    <a class="btn-secondary" style="background: #64db7c; border:1px solid white;
                    border-radius:5px; padding:7px 20px;text-decoration: none;"
                    href="<?php echo SITEURL; ?>admin_projectpage.php">Home</a>
        </p>
            <div class="row" style="">
                <div class="col-lg-3"></div>

                <div class="col-lg-6">
                <h1 class="text-center" style="color:#fff;">Update Project</h1>

                
                
        
                <p>
                    <?php 
                        if(isset($_SESSION['update_fail']))
                        {
                            echo $_SESSION['update_fail'];
                            unset($_SESSION['update_fail']);
                        }
                    ?>
                </p>

                <form method="POST" action="">
                <div class="mb-3">
                    <label for="example" class="form-label" style="color:white;">Project Name:</label>
                    <input type="text" name="task_name" class="form-control" value="<?php echo $task_name; ?>" required="required" />
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" style="color:white;" class="form-label" >Project Description</label>
                    <textarea name="task_description" class="form-control">
                        <?php echo $task_description; ?>
                        </textarea>
                </div>

                <div class="mb-3">
                    <label for="ascc" style="color:white; class="form-label">Select List:</label>
                    <select name="list_id" class="form-select" id="">
                <?php 
                                //Connect Database
                                $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                                
                                //SElect Database
                                $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());
                                
                                //SQL Query to GET Lists
                                $sql2 = "SELECT * FROM tbl_lists";
                                
                                //Execute Query
                                $res2 = mysqli_query($conn2, $sql2);
                                
                                //Check if executed successfully or not
                                if($res2==true)
                                {
                                    //Display the Lists
                                    //Count Rows
                                    $count_rows2 = mysqli_num_rows($res2);
                                    
                                    //Check whether list is added or not
                                    if($count_rows2>0)
                                    {
                                        //Lists are Added
                                        while($row2=mysqli_fetch_assoc($res2))
                                        {
                                            //Get individual value
                                            $list_id_db = $row2['list_id'];
                                            $list_name = $row2['list_name'];
                                            ?>
                                            
                                            <option <?php if($list_id_db==$list_id){echo "selected='selected'";} ?> value="<?php echo $list_id_db; ?>"><?php echo $list_name; ?></option>
                                            
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        //No List Added
                                        //Display None as option
                                        ?>
                                        <option <?php if($list_id=0){echo "selected='selected'";} ?> value="0">None</option>p
                                        <?php
                                    }
                                }
                            ?>
                </select>
                </div>

                <div class="mb-3">
                    <label for="example" style="color:white;" class="form-label">Priority</label>
                    <select name="priority" class="form-select" id="">
                    <option <?php if($priority=="High"){echo "selected='selected'";} ?> value="High">High</option>
                            <option <?php if($priority=="Medium"){echo "selected='selected'";} ?> value="Medium">Medium</option>
                            <option <?php if($priority=="Low"){echo "selected='selected'";} ?> value="Low">Low</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="example" style="color:white; class="form-label">Deadline:</label>
                    <input type="date" name="deadline" class="form-control" value="<?php echo $deadline; ?>" />
                </div>


                <button style="background:#64db7c; border-color:white;"type="submit" class="btn btn-primary" name="submit">Make Changes</button>
                </form>
                </div>

                <div class="col-lg-3"></div>
            </div>
        </div>    

    </body>
</html>


<?php 

    //Check if the button is clicked
    if(isset($_POST['submit']))
    {
        //echo "Clicked";
        
        //Get the CAlues from Form
        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];
        $list_id = $_POST['list_id'];
        $priority = $_POST['priority'];
        $deadline = $_POST['deadline'];
        
        //Connect Database
        $conn3 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect Database
        $db_select3 = mysqli_select_db($conn3, DB_NAME) or die(mysqli_error());
        
        //CREATE SQL QUery to Update TAsk
        $sql3 = "UPDATE tbl_tasks SET 
        task_name = '$task_name',
        task_description = '$task_description',
        list_id = '$list_id',
        priority = '$priority',
        deadline = '$deadline'
        WHERE 
        task_id = $task_id
        ";
        
        //Execute Query
        $res3 = mysqli_query($conn3, $sql3);
        
        //CHeck whether the Query Executed of Not
        if($res3==true)
        {
            //Query Executed and Task Updated
            $_SESSION['update'] = "Project Updated Successfully.";
            
            //Redirect to Home Page
            header('location: '.SITEURL);
        }
        else
        {
            //FAiled to Update Task
            $_SESSION['update_fail'] = "Failed to Update Project";
            
            //Redirect to this Page
            header('location:'.SITEURL.'update-task.php?task_id='.$task_id);
        }
        
        
    }

?>
