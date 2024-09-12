<?php

// REMEMBER!  PHP blocks are processed and removed by the server as long as this is a .php file.
//            If you put this same code in an HTML file, it will be passed through to the client without being touched.

// This top PHP block is called a preprocessing block.  Examples of tasks that would be performed
// here are cleaning of input data (if posted via form to this page), declaration of global variables 
// needed on the page, other processes that may need functionality built into other PHP documents 
// that have been required in here.
require_once "lib.php";


$cleanTest = "";  // global variable to be used to store cleaned input data and used late in the page body

// If the variable exists and it has data
if (isset($_POST['Test']) && strlen($_POST['Test']) > 0)
{
    // strip any tags out of the input data to avoid HTML injection attacks
    $cleanTest = strip_tags($_POST['Test']);
    
    // Do other Stuff as required    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="ajaxCalls.js" rel="javascript" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>       
    <link href="style.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <!-- Note the PHP block in the placeholder of the following input.  This shows you may even 
                insert just a part of an HTML control.  Structured propery, you are effectively adding text
                into the body of the HTML page that is then interpretted by the client's browser -->
        <input type="text" id="test" name="test" value="Testing" placeholder=<?php echo "$cleanTest" ?>/>
    <form>

    <!-- This is an example of a PHP built construct being inserted directly into the page body -->
    <?php echo SomeFunction(); ?>
</body>
</html>
