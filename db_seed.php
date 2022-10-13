<?php 
include('include/db.php'); 
include('admin/include_admin/functions.php');

insert_category_data();
insert_post_data();
insert_user_data();
insert_comment_data();
redirect_back();
?>
