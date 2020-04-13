<?php
    session_start();
    if(!isset($_SESSION['username'])){
         $home_url = 'http://' . $_SERVER['HTTP_HOST'] .'/login.php';
         header('Location: ' . $home_url);
    }
    //echo $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>New Faculty</title>
    <link rel="stylesheet" href="p1_v2.css">
</head>
<body>
<div class="container">  
    <form id="contact" action="insert_faculty.php" method="get">
        <h3>New Faculty</h3>
        <h4>Enter the details for the new faculty :</h4>
        <fieldset>
            <input placeholder="Faculty ID" type="text" name="fid" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
            <input placeholder="Name" type="text" name = "name" tabindex="2" required>
            </fieldset>
            <fieldset>
            <input placeholder="Department" type="text" name = "dept" tabindex="3" required>
            </fieldset>
            <fieldset>
                    Date of Joining : 
            <input placeholder="Date of Joining" type="date" name = "doj" tabindex="3" required>
            </fieldset>
            <fieldset>
            <input placeholder="Your Web Site (optional)" type="url" name = "url" tabindex="4">
            </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
        </fieldset>
    </form>
</div>


</body>
</html>