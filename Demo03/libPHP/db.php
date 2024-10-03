<?php

$mysql_connection = null;
$mysql_response = "";
$mysql_status = "";

mysqlConnect();

function mysqlConnect()
{
    global $mysql_connection, $mysql_response;

    $mysql_connection = new mysqli("localhost", 
                                    "Your_MySql_Database_Username", 
                                    "Your_MySql_Database_User_Password", 
                                    "Your_MySql_Database_Name");

    if ($mysql_connection->connect_error)
    {
        $mysql_response = "Connect Error (" . $mysql_connection->connect_errno . ") " . $mysql_connection->connect_error;
        //echo json_encode($mysql_response);
        error_log(json_encode($mysql_response));
        die();
    }
    else
    {
        //echo "Connection successfully created";
        error_log("Connection successfully created");
    }
}

function mysqlQuery( $query )
{
    global $mysql_connection, $mysql_response;

    $result = false;

    if ($mysql_connection == null)
    {
        $mysql_response = "No database connection established";
        return $result;
    }

    if(!($result = $mysql_connection->query( $query )))
    {
        $mysql_response = "Query Error : {$mysql_connection->errno} : {$mysql_connection->error}";
    }

    return $result;
}