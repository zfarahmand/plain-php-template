<?php
/******************************HELPER FUNCTIONS************************/
//get the url and redirect
function redirect($url)
{
    header("Location: $url");
}

//get the query string and run it
function query($query)
{
    global $connection;
    return mysqli_query($connection , $query);
}

//check if the result doesn't have any errors
function confirm($result)
{
    global $connection;
    if(!$result)
    {
        die("Query failed because: ". mysqli_error($connection));
    }
}

//escapes the query string
function escape($string)
{
    global $connection;
    return mysqli_escape_string($connection , $string);
}

//fetch one row array of result
function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

//get the message and set it to the session
function set_message($message)
{
    if(!empty($message))
        $_SESSION['message'] = $message;
    else
        $message = "";
}

//displays the session message
function display_message()
{
    if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

/******************************FRONTEND FUNCTIONS************************/
//a brief example of using helper functions
function get_posts()
{
    $result = $query("SELECT * FROM posts");
    confirm($result);
    while($row = fetch_array($result))
    {
        echo "<div>{$row['title']}</div>";
    }
}