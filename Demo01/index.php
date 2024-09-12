<?php

require_once "lib.php";

$cleanTest = "";
if (isset($_POST['Test']) && strlen($_POST['Test']) > 0)
{
    $cleanTest = strip_tags($_POST['Test']);
    // Do Stuff
    echo json_encode("returnedData");
    
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
        <input type="text" id="test" name="test" value="Testing" placeholder=<?php echo "$cleanTest" ?>/>
    <form>

    <?php echo SomeFunction(); ?>
</body>
</html>