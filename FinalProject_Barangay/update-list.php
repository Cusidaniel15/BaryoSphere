<?php 

    include('includes/constants.php'); 

    
    
    
    //Get the Current Values of Selected List
    if(isset($_GET['list_id']))
    {
        //Get the List ID value
        $list_id = $_GET['list_id'];
        
        //Connect to Database
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect DAtabase
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        //Query to Get the Values from Database
        $sql = "SELECT * FROM tbl_lists WHERE list_id=$list_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
        //CHekc whether the query executed successfully or not
        if($res==true)
        {
            //Get the Value from Database
            $row = mysqli_fetch_assoc($res); //Value is in array
            
            //printing $row array
            //print_r($row);
            
            //Create Individual Variable to save the data
            $list_name = $row['list_name'];
            $list_description = $row['list_description'];
        }
        else
        {
            //Go Back to Manage List Page
            header('location:'.SITEURL.'manage-list.php');
        }
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
    
    <body>
    <body style="background: #daf1de; color:white;">
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
        width:50%;  box-shadow: 0px 10px 60px rgba(0, 0, 0, 0.3);">
        <p style="justify-content:left; margin-leftmargin-top:20px;">
                    <a class="btn-secondary" style="background: #64db7c; border:1px solid white;
                    border-radius:5px; padding:7px 20px;text-decoration: none;"
                    href="<?php echo SITEURL; ?>admin_projectpage.php">Home</a>
                    <a class="btn-secondary" style="background: #64db7c; border:1px solid white;
                    border-radius:5px; padding:7px 20px;text-decoration: none;"
                    href="<?php echo SITEURL; ?>manage-list.php">Manage Lists</a>
        </p>
    
            <div class="row">

                <div class="col-lg-3"></div>


                <div class="col-lg-6">

                <h1 class="text-center" style="color:white;">Update List</h1>


                <p>
                <?php 
                    //Check whether the session is set or not
                    if(isset($_SESSION['update_fail']))
                    {
                        echo $_SESSION['update_fail'];
                        unset($_SESSION['update_fail']);
                    }
                ?>
            </p>

                <form method="POST" action="">
                <div class="mb-3">
                    <label for="exampleLabel" class="form-label">List Name</label>
                    <input type="text" name="list_name" class="form-control" value="<?php echo $list_name; ?>" required="required" />
                   
                </div>

                <div class="mb-3">
                    <label for="exampleDesc" class="form-label">List Description</label>
                    <textarea name="list_description" class="form-control">
                            <?php echo $list_description; ?>
                        </textarea>
                </div>

                

                <button style="background:#64db7c; border-color:white;" type="submit" name="submit" class="btn btn-primary">Make Changes</button>
                </form>

                </div>


                <div class="col-lg-3"></div>

            </div>

        </div>
        
        
    
    </body>

</html>


<?php 

    //Check whether the Update is Clicked or Not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        
        //Get the Updated Values from our Form
        $list_name = $_POST['list_name'];
        $list_description = $_POST['list_description'];
        
        //Connect Database
        $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect the Database
        $db_select2 = mysqli_select_db($conn2, DB_NAME);
        
        //QUERY to Update List
        $sql2 = "UPDATE tbl_lists SET 
            list_name = '$list_name',
            list_description = '$list_description' 
            WHERE list_id=$list_id
        ";
        
        //Execute the Query
        $res2 = mysqli_query($conn2, $sql2);
        
        //Check whether the query executed successfully or not
        if($res2==true)
        {
            //Update Successful
            //SEt the Message
            $_SESSION['update'] = "List Updated Successfully";
            
            //Redirect to Manage List PAge
            header('location:'.SITEURL.'manage-list.php');
        }
        else
        {
            //FAiled to Update
            //SEt Session Message
            $_SESSION['update_fail'] = "Failed to Update List";
            //Redirect to the Update List PAge
            header('location:'.SITEURL.'update-list.php?list_id='.$list_id);
        }
        
    }
?>