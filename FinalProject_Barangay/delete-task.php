<?php 

    include('includes/constants.php');
    
    //Check task_id in URL
    if(isset($_GET['task_id']))
    {
        //Delete the Task from Database
        //Get the Task ID
        $task_id = $_GET['task_id'];
        
        //Connect Databaes
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect Database
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        //SQL Query to DELETE TASK
        $sql = "DELETE FROM tbl_tasks WHERE task_id=$task_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
       
        if($res == true)
{
    // Query Executed Successfully and Task Deleted
    $_SESSION['delete'] = "Task Deleted Successfully.";
    
    // Redirect to admin_projectpage.php
    header('location:' . SITEURL . 'admin_projectpage.php');
    exit(); // Ensure script stops execution after redirection
}
        else
        {
            //FAiled to Delete Task
            $_SESSION['delete_fail'] = "Failed to Delete Task";
            
            //Redirect to Home PAge
            header('location:'.SITEURL);
        }
        
    }
    else
    {
        //Redirect to Home
        header('location:'.SITEURL);
    }

?>