<?php
session_start();    // starts a new session if there is not one already for the connecting client,
                    // but if there is an existing session, connects the client back to it.

// Testing to see if the form was submitted with a "quit" action.  Only reason the form exists.
if (isset($_POST["submit"]) && $_POST["submit"] == "quit")
{
    session_unset();        // deletes all of the current variables related to the session
    session_destroy();      // completely eliminates all data related to the session, including variables
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
    <script src="Demo02.js"></script>  
    <title>Document</title>
</head>
<body>

    <!-- button to be used to initiate an AJAX call to the webservice.php page from javascript -->
    <input type="button" id="submit" value="start" />  

    <!-- quick form for posting back to the current page, meant to end the session -->
    <form action="index.php" method="post">
        <input type="button" name="submit" value="quit" />
    </form>

</body>
</html>