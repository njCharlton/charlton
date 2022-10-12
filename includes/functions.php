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

// navigation takes 2 arguments
// - the currently selected subject (if any)
// - the currently selected page (if any)
function navigation($subject, $page) {
    $output = "<ul class=\"subjects\">";
    $subject_set = find_all_subjects(); 
    //var_dump($subject_set);
    while ($subject = mysqli_fetch_assoc($subject_set)) {
  
        $output .= "<li";
        if ($subject["id"] == $subject) {
        $output .=  " class=\"selected\"";
        }
        $output .=  ">";
        
         $output .=  "<a href=\"manage_content.php?subject="; 
        $output .= "<?php  urlencode($subject[id])"; 
         $output .= "\">;  
         $output .=  "($subject['menu_name']) . " " . $subject["id"];
         $output .= "</a>";"
        $page_set = "find_all_pages_subject($subject['id']);
            //var_dump($page_set);
         $output .= <ul class=\"pages\">";
         while ($page = mysqli_fetch_assoc($page_set)) {
         $output .= "<li";
         if ($page["id"] == $page) {
        $output .=  " class=\"selected\"";
         }
        $output .=  ">";
        $output .= "<a href=\"manage_content.php?page=";
        $output .=  urlencode($page["id"]);
        $output .= "\">"; 
        $output .=  $page["menu_name"]; 
        $output .= "</a></li>";
    }
        mysqli_free_result($page_set);
        $output .= "</ul> </li>";
    }
     mysqli_free_result($subject_set); 
    $output .= "</ul>";
    return $output;
}
