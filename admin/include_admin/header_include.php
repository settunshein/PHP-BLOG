<?php

if( isset($_SESSION['auth_user']) ){
    $auth_user = (object) $_SESSION['auth_user'];
}else{
    redirect_back();
    show_alert_message('You Must Login to View Admin Dashboard', 'info');
    header('location: ../login.php');
    exit();
}

if (isset($_GET['del_category_id'])) {
    $id = $_GET['del_category_id'];
    delete_category($id);
}

if (isset($_GET['del_post_id'])) {
    $id = $_GET['del_post_id'];
    delete_post($id);
}


if (isset($_GET['del_user_id'])) {
    $id = $_GET['del_user_id'];
    delete_user($id);
}

if (isset($_GET['del_comment_id'])) {
    $id = $_GET['del_comment_id'];
    delete_comment($id);
}

if (isset($_GET['logout'])){
    unset($_SESSION['auth_user']);
    header('location: ../login.php');
    exit();
}

?>