<?php
$servername = "localhost";
$username = "u964064311_iass";
$password = "Root@123";
$dbname = "u964064311_iass";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Kolkata');

session_start();
ob_start();


function alert($type, $message)
{
    return '' .
        '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">' .
        '    <button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
        '        <span aria-hidden="true">&times;</span>' .
        '        <span class="sr-only">Close</span>' .
        '    </button>' .
        $message .
        '</div>';
}


function pdatetime($datetime)
{
    return date_format(date_create($datetime), "d M Y - h:i:s A");
}
function pdate($datetime)
{
    return date_format(date_create($datetime), "d M Y");
}
function ptime($datetime)
{
    return date_format(date_create($datetime), "h:i:s A");
}
