<?php

$mysql_connection = null;
$mysql_response = "";
$mysql_status = "";

mysqlConnect();

function mysqlConnect()
{
    global $mysql_connection, $mysql_response;

    $mysql_connection = new mysqli("localhost", "shanek_Tester", "My_1st_Test", "shanek_Test");

    if ($mysql_connection->connect_error)
    {
        $mysql_response = "Connect Error (" . $mysql_connection->connect_errno . ") " . $mysql_connection->connect_error;
     
        error_log(json_encode($mysql_response));
        die();
    }
    else
    {
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

function mysqlNonQuery( $query )
{
    global $mysql_connection, $mysql_response;

    $result = 0;

    if ($mysql_connection == null)
    {
        $mysql_response = "No database connection established";
        return $result;
    }

    if(!($result = $mysql_connection->query( $query )))
    {
        $mysql_response = "Query Error : {$mysql_connection->errno} : {$mysql_connection->error}";
    }

    return $mysql_connection->affected_rows;
}
