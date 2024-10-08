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

function TestNonQuery ( $value, $filter, $action )
{
    global $mysql_connection, $mysql_response;

    if ($action == "Update")
    {
        $query = "update titles";
        $query .= " set price = $value";// * price";
        $query .= " where title like '%$filter%'";
    }

    if (($numRows = mysqlNonQuery( $query )) == -1)
    {
        echo $mysql_response;
    }

    return $numRows;
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
    <div><h1>CMPE2550 Demo 04 - Data Manipulation Queries</h1></div>
    <div>
        <button value=3847>sldjasdljs</button>
        <?php 
            echo "Updated " . TestNonQuery( 30.00, "Computer", "Update") . " records in titles table.";
            echo TestQuery( "%" ); 
        ?>
    </div>
</body>
</html>