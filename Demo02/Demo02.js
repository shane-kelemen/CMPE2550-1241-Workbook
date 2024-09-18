$(document).ready(function()
{
    $("#submit").click(StartClick);  // Binding the click event handler to the function that will initiate 
                                     // our AJAX call

});

// Preparing for and initiating an AJAX call to the server
function StartClick()
{
    var postData = {};              // preparing data object to be used with the AJAX call to the server
    postData["action"] = "start";   // intended to be used to limit activity on the server to intended program flow
    CallAJAX('webservice.php', 'post', postData, 'json', StartSuccess, Error);
}

// On successful AJAX interaction with the server, any returned data from the server will be returned to this function
function StartSuccess(returnedData, statusMessage, ajaxRequest)
{
    console.log(returnedData);  // Always good to see what data has been returned.  After we verify we are getting back 
                                // what was expected, we may ignore the server and focus on client side data processing.
                                // Check for this data in the console of your inspect tools.
}


// Generic AJAX call
function CallAJAX(url, method, data, dataType, success, error)
{
    var ajaxOptions = {};
    ajaxOptions['url'] = url;
    ajaxOptions['method'] = method;
    ajaxOptions['data'] = data;
    ajaxOptions['dataType'] = dataType;
    ajaxOptions['success'] = success;
    ajaxOptions['error'] = error;

    $.ajax(ajaxOptions);
}

// Shared function for failed AJAX requests
function Error(ajaxRequest, statusMessage, errorThrownMessage)
{
    console.log(ajaxRequest);
    console.log(statusMessage);
    console.log(errorThrownMessage);
}