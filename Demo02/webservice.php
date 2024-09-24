<?php
session_start();    // Joining the client to an existing session, assuming there is one,
                    // creating a new session if not.

error_log(json_encode($_POST));  // Check that teh data received on the server is what was expected from the client.
                                 // In CPanel, view the error_log file in the same directory as the PHP file

$clean = CleanData($_POST); // Call our data cleaning function to validate / clean all input data
$output = array();  // create an array to be used to hold all data to be returned to the client.

error_log(json_encode($clean));  // Make sure the data is still as we expect

// If the action requested by the client was to "start", then run whatever initialization process related to our 
// application.
if (isset($clean["action"]) && $clean["action"] == "start")
{
    $output["gameData"] = StartProcess();  // Often use functions to avoid having too much "stuff" in the program flow
                                           // portion of our application.
}

error_log(json_encode($output));  // Take a look at the data we intend to send back to the client before sending
echo json_encode($output);  // Package and send data to the client.  Only do this a single time per AJAX request.
die();  // Stop execution of the PHP page here.  Everything below this point should be objects and functions for 
        // supporting the program flow above.


// Iterate over the supplied collection and clean all of the key/value pairs.
// This version of the function is very simple and usable only with a single level collection.  A more
// complex version will be discussed / provided at a later time that will handle more complex data sets.
function CleanData($inputData)
{
    $cleanData = array();
    foreach($inputData as $key => $value)
        $cleanData[trim(strip_tags($key))] = trim(strip_tags($value));

    return $cleanData;
}

// A sample showing use of the $_SESSION super global.  Remember that it is an associative arrany and therefore 
// may store ver complex data constructs.
// The $_SESSION may be used directly in program operations, but because of the level of indexing complexity
// that may arise in some programs, it is wise to extract $_SESSION information out into locat variables for use. 
function StartProcess()
{
    $_SESSION["statusMessage"] = "We are starting our storage of game data";
    $gameGrid = array();
    $_SESSION["gameGrid"] = $gameGrid;

    return "Blah";
}
