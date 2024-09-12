$(document).ready(function()
{

    Blah();
    
    Blarg();

});

var serviceUrl = "thor.cnt.sast.ca/~shanek/CMPE2550/webservice.php";

function Blah()
{
    var inputData = {};
    inputData["Test"] = $("#test").val();

    CallAJAX(serviceUrl, "POST", inputData, "json", BlahSuccess, Error);
}
function BlahSuccess(returnedData, statusMessage, ajaxRequest)
{
    console.log(returnedData);


    Balrog();
}

function Balrog()
{
    console.log($("#test").val());
}
function BalrogSuccess(returnedData, statusMessage, ajaxRequest)
{

}

function Blarg()
{
    console.log($("#test").val());
}
function BlargSuccess(returnedData, statusMessage, ajaxRequest)
{

}

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

function Error(ajaxRequest, statusMessage, errorThrownMessage)
{
    console.log(ajaxRequest);
    console.log(statusMessage);
    console.log(errorThrownMessage);
}