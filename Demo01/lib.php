<?php

function SomeFunction()
{
    $output = "<ul>";
    for($i = 0; $i < 10; ++$i)
        $output .= "<li>$i</li>";
    $output .= "</ul>";

    error_log($output);
    return $output;
}



