$(document).ready(function()
{

    Blah();
    
    Blarg();

});

// It is common practice to save your url as a global variable so it may be reused.
var serviceUrl = "thor.cnt.sast.ca/~shanek/CMPE2550/webservice.php";

// A sample function showing the general staging needed to set up an AJAX call
function Blah()
{
    // We usually use an object here.  Begin with an empty one and start adding name/value pairs,
    // remembering that the server with receive everything as a string in the related superglobal,
    // $_GET or $_POST.
    var inputData = {};
    inputData["Test"] = $("#test").val();

    CallAJAX(serviceUrl, "POST", inputData, "json", BlahSuccess, Error);
}

// Sample function for supplying to the AJAX call that will be executed upon AJAX request success.
// Best practice, make sure to verify your data received is what you exect it to be.
function BlahSuccess(returnedData, statusMessage, ajaxRequest)
{
    console.log(returnedData);

    // If you want to avoid a race conditions where AJAX calls are sent from two separate methods,
    // during times such as page load, make sure you force them to be one after another by calling 
    // second function at the end of the success function from the first call.
    Balrog();
}

// Just a stub to avoid errors.  No real utility.
function Balrog()
{
    console.log($("#test").val());
}

// Just a stub that was never used.
function BalrogSuccess(returnedData, statusMessage, ajaxRequest)
{

}

// Again, not used, just a stub showing possibilites.  This function will be in a race with Blah(),
// but we may not care.
function Blarg()
{
    console.log($("#test").val());
}
// Just a stub to fill out the pattern...
function BlargSuccess(returnedData, statusMessage, ajaxRequest)
{

}

// Generic AJAX set up function.  Use this at all times and you should not have any difficulties as 
// long as your inputs are formatted correctly.
function CallAJAX(url, method, data, dataType, success, error)
{
    var ajaxOptions = {};
    ajaxOptions['url'] = url;
    ajaxOptions['method'] = method;
    ajaxOptions['data'] = data;
    ajaxOptions['dataType'] = dataType;
    ajaxOptions['success'] = success;
    ajaxOptions['error'] = error;

    $.ajax(ajaxoptions);
}

// Very often you will have a shared / standard error function that will be executed when the AJAX request fails
// Console logging the request can yield useful debugging information, such as malformed returned JSON from the 
// server.
function Error(ajaxRequest, statusMessage, errorThrownMessage)
{
    console.log(ajaxRequest);
    console.log(statusMessage);
    console.log(errorThrownMessage);
}
