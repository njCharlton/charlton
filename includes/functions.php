<?php

function confirm_query($result_set)
{
    if (!$result_set) {
        die("Database query failed.");
    }
}
function find_all_subjects()
{
    //get database connection
    global $connection ;
    //var_dump($connection);

   //create sql query
    $query  = "SELECT * FROM subjects WHERE visible = 1 ORDER BY position ASC";

    //send query to database and get result
    $subject_set = mysqli_query($connection, $query);

    //check if result has no value
    confirm_query($subject_set);
    // var_dump($subject_set);
    // die();

    //return value to be used
    return $subject_set;
}

function find_all_pages_subject($subject_id)
{
    global $connection;

    $query1  = "SELECT * FROM pages WHERE visible = 1 and subject_id = ".$subject_id." ORDER BY position ASC";
    $pages_set = mysqli_query($connection, $query1);
    confirm_query($pages_set);
    // var_dump($pages_set);
    // die();
    return $pages_set;
}