<?php

function confirm_query($result_set)
{
    if (!$result_set) {
        die("Database query failed.");
    }
}
function find_all_subjects()
{
    global $connection;

    $query  = "SELECT * FROM subjects WHERE visible = 1 ORDER BY position ASC";
    $subject_set = mysqli_query($connection, $query);
    confirm_query($subject_set);
    return $subject_set;
}

function find_all_pages_subject($subject_id)
{
    global $connection;

    $query1  = "SELECT * FROM pages WHERE visible = 1 and subject_id = " . $subject_id["id"] . " ORDER BY position ASC";
    $pages_set = mysqli_query($connection, $query1);
    confirm_query($pages_set);
}
