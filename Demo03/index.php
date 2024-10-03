<?php

require_once 'libPHP/db.php';

function TestQuery( $data )
{
    global $mysql_connection, $mysql_response;

    $data = $mysql_connection->real_escape_string( $data );

    $query = "SELECT title_id, title, price";
    $query .= " FROM titles";
    $query .= " WHERE title like '%$data%'";

    $output = "<ul>";
    if ( $results = mysqlQuery( $query ))
    {
        while ( $row = $results->fetch_assoc() )
        {
            $output .= "<li>{$row['title_id']} : {$row['title']} = {$row['price']}</li>";
        }
    }
    else
        return $mysql_response;
    $output .= "</ul>";

    return $output;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div><h1>CMPE2550 Demo 03 - Retrieval Query</h1></div>
    <div>
        <?php echo TestQuery( "" ); ?>
    </div>
</body>
</html>