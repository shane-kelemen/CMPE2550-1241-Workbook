// PHP may be added to a file as the only content.  This is a pretty standard way of
// creating library files that may be required into other PHP scopes, and a way of 
// build a PHP webservice page / remote API
<?php

// The method below will create and return an HTML unordered list, populating the
// list items with the loop indexes.  Tobe used in an inline PHP block to demonstrate
// dynamic insertion of page elements using PHP.
function SomeFunction()
{
    $output = "<ul>";
    for($i = 0; $i < 10; ++$i)
        $output .= "<li>$i</li>";
    $output .= "</ul>";

    error_log($output);
    return $output;
}



