<?php

/*
|--------------------------------------------------------------------------
| Database Seeding
|--------------------------------------------------------------------------
*/
function insert_category_data()
{
    global $conn;

    truncate_table($conn, 'categories');

    $json = file_get_contents('assets/files/categories.json');
    $objs = json_decode($json);

    foreach( $objs as $obj ){
        $slug  = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $obj->title));
        $query = "
            INSERT INTO 
                categories (id, title, logo, slug, created_at)
            VALUES
                ('$obj->id', '$obj->title', '$obj->logo', '$slug', '$obj->created_at')
        ";
        mysqli_query($conn, $query);
    }
}

function insert_post_data()
{
    global $conn;

    truncate_table($conn, 'posts');

    $json = file_get_contents('assets/files/posts.json');
    $objs = json_decode($json);
    $text = "
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus sed iste similique, doloremque iusto minus ea odit eligendi veniam, asperiores autem aperiam quisquam! Repellat, dignissimos atque. Adipisci labore magnam tempore?
    ";

    foreach( $objs as $obj ){
        $slug    = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $obj->title));
        $user_id = rand(1, 5);
        $rand = rand(1, 24);
        if($rand < 10){
            $image = 'img_post_0'.$rand.'.jpg';
        }else{
            $image = 'img_post_'.$rand.'.jpg';
        }
        $query = "
            INSERT INTO 
                posts (category_id, user_id, title, slug, image, post_tag, content, status, created_at)
            VALUES
                ('$obj->category_id', '$user_id', '$obj->title', '$slug', '$image', '$obj->post_tag', '$text', 1, '$obj->created_at')
        ";
        mysqli_query($conn, $query);
    }
}

function insert_user_data()
{
    global $conn;

    truncate_table($conn, 'users');

    $json = file_get_contents('assets/files/users.json');
    $objs = json_decode($json);
    $pwd  = password_hash('password', PASSWORD_BCRYPT);

    foreach( $objs as $obj ){
        $query = "
            INSERT INTO 
                users (name, email, role, password, address, created_at)
            VALUES
                ('$obj->name', '$obj->email', '$obj->role', '$pwd', 'Yangon, Myanmar', '$obj->created_at');
        ";
        mysqli_query($conn, $query);
    }
}

function insert_comment_data()
{
    global $conn;

    truncate_table($conn, 'comments');

    $text = "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.";
    for($i=0; $i<50; $i++){
        $post_id = rand(1, 16);
        $query = "
            INSERT INTO
                comments (post_id, name, email, comment, created_at)
            VALUES
                ('$post_id', 'Mo Mo', 'momo@gmail.com', '$text', now());
        ";
        mysqli_query($conn, $query);
    }
}

function truncate_table($conn, $table)
{   
    $query = "TRUNCATE TABLE $table";
    mysqli_query($conn, $query);
}



/*
|--------------------------------------------------------------------------
| Utilities Functions
|--------------------------------------------------------------------------
*/
function redirect_back()
{
    isset($_SERVER['HTTP_REFERER']) ? header('location:' . $_SERVER['HTTP_REFERER']) : header('location: javascript:history.back(-1)');
}

function show_alert_message($message, $status)
{
    $upper_case_status = strtoupper($status);
    return $_SESSION['alert'] = "<script>toastr.$status('$message &nbsp;<i class=\"far fa-check-circle\"></i>', '$upper_case_status')</script>";
}

function check_page_status($param)
{
    $current_page = basename($_SERVER['PHP_SELF'], '.php');
    return $current_page == $param ? 'active' : '';
}

function get_data_by_page($tbl, $auth_user = null)
{
    global $conn;
    $limit  = 4;
    $page   = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    $data   = [];
    
    if( $tbl == 'posts' && isset($auth_user) ){
        if( $auth_user->role == 'admin' ){
            $query = "SELECT * FROM {$tbl} ORDER BY created_at DESC LIMIT {$offset},{$limit}";
        }else{
            $query = "SELECT * FROM {$tbl} WHERE user_id=$auth_user->id ORDER BY created_at DESC LIMIT {$offset},{$limit}";
        }
    }else{
        $query = "SELECT * FROM {$tbl} ORDER BY created_at DESC LIMIT {$offset},{$limit}";
    }   

    if( $result = mysqli_query($conn, $query) ){
        while( $row = mysqli_fetch_object($result) ){
            $data[] = $row;
        }
    }

    return [ $data, $page ];
}

function get_paginator($tbl, $auth_user = null)
{
    global $conn;

    if( $tbl == 'posts' && isset($auth_user) ){
        if( $auth_user->role == 'admin' ){
            $result = mysqli_query($conn, "SELECT * FROM $tbl");
        }else{
            $result = mysqli_query($conn, "SELECT * FROM $tbl WHERE user_id=$auth_user->id");
        }
    }else{
        $result = mysqli_query($conn, "SELECT * FROM $tbl");
    } 

    if( mysqli_num_rows($result) > 0 ){
        $total_records = mysqli_num_rows($result);
        $limit = 4;
        $total_page = ceil($total_records / $limit);

        return $total_page;
    }
}

/*
|--------------------------------------------------------------------------
| Category Module
|--------------------------------------------------------------------------
*/
function get_all_categories()
{
    global $conn;
    $categories = [];
    if($result = mysqli_query($conn, "SELECT * FROM categories")){
        while($row = mysqli_fetch_object($result)){
            $categories[] = $row;
        }
    }
    return $categories;
}

function get_category($post_category_id)
{
    global $conn;
    $result   = mysqli_query($conn, "SELECT * FROM categories WHERE id=$post_category_id");
    $category = mysqli_fetch_object($result);
    return $category;
}

function insert_category()
{
    global $conn;
    if( isset($_POST['insert_category']) ){
        $title = $_POST['title'];
        $logo  = $_POST['logo'];
        $desc  = $_POST['description'];
    
        $query = "INSERT INTO categories (title, logo, description, created_at) 
                  VALUES ('$title', '$logo', '$desc', now())";
        $result = mysqli_query($conn, $query);
        if($result){
            show_alert_message('New Category Created Successfully', 'success');
            header('location: category_index.php');
            exit();
        }
    }
}

function edit_category()
{
    global $conn;
    if( isset($_POST['edit_category']) ){
        $id    = $_POST['id'];
        $title = $_POST['title'];
        $logo  = $_POST['logo'];
        $desc  = $_POST['description'];
    
        $query  = "UPDATE categories SET title='$title', logo='$logo', description='$desc', updated_at=now() WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if($result){
            show_alert_message('Category Updated Successfully', 'success');
            header('location: category_index.php');
            exit();
        }
    }
}

function delete_category($id)
{ 
    global $conn;
    mysqli_query($conn, "DELETE FROM categories WHERE id=$id");
    show_alert_message('Category Deleted Successfully', 'success');
    header('location: category_index.php');
    exit();
}



/*
|--------------------------------------------------------------------------
| Post Module
|--------------------------------------------------------------------------
*/
function get_all_posts()
{
    global $conn;
    $posts = [];
    if( $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY created_at DESC") ){
        while($row = mysqli_fetch_object($result)){
            $posts[] = $row;
        }
    }
    return $posts;
}

function get_post($param)
{
    global $conn;
    $query  = isset( $_GET['post_slug'] ) ? "SELECT * FROM posts WHERE slug='$param'" : "SELECT * FROM posts WHERE id=$param";
    $result = mysqli_query($conn, $query);
    $post   = mysqli_fetch_object($result);
    return $post;
}

function get_category_posts($slug)
{
    global $conn;
    $result1  = mysqli_query($conn, "SELECT id FROM categories WHERE slug='$slug'");
    $category = mysqli_fetch_object($result1);

    $posts = [];
    if( $result2 = mysqli_query($conn, "SELECT * FROM posts WHERE category_id='$category->id'") ){
        while($row = mysqli_fetch_object($result2)){
            $posts[] = $row;
        }
    }
    return $posts;
}

function insert_post()
{
    global $conn;
    if(isset($_POST['insert_post'])){
        $user_id     = $_POST['user_id'];
        $category_id = $_POST['category_id'];
        $title       = $_POST['title'];
        $content     = $_POST['content'];
        $post_tag    = $_POST['post_tag'];
        $status      = $_POST['status'];
        $slug        = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title']));

        $file_name   = $_FILES['image']['name'];
        $file_temp   = $_FILES['image']['tmp_name'];
        if( isset($file_name) ) {
            $file_name = uniqid(time()) . $file_name;
            move_uploaded_file($file_temp, "uploads/post/$file_name");
        }
    
        $query = "INSERT INTO posts(category_id, user_id, title, content, slug, image, post_tag, status, created_at)
                  VALUES('$category_id', '$user_id', '$title', '$content', '$slug', '$file_name', '$post_tag', '$status', now())";
        mysqli_query($conn, $query);
        show_alert_message('New Post Created Successfully', 'success');
        header('location: post_index.php');
        exit();
    }
}

function edit_post()
{
    global $conn;
    if( isset($_POST['edit_post']) ){
        $id          = $_POST['id'];
        $user_id     = $_POST['user_id'];
        $category_id = $_POST['category_id'];
        $title       = $_POST['title'];
        $content     = $_POST['content'];
        $post_tag    = $_POST['post_tag'];
        $status      = $_POST['status'];
        $old_image   = $_POST['old_image'];
        $slug        = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title']));
    
        $file_name   = $_FILES['image']['name'];
        $file_temp   = $_FILES['image']['tmp_name'];

        if($file_name){
            $file_name = uniqid(time()) . $file_name;
            $query = "UPDATE posts SET category_id='$category_id', user_id='$user_id', title='$title', content='$content',
            image='$file_name', post_tag='$post_tag', slug='$slug', status='$status', updated_at=now() WHERE id=$id";
            move_uploaded_file($file_temp, "uploads/post/$file_name");
        }else{
            $query = "UPDATE posts SET category_id='$category_id', user_id='$user_id', title='$title', content='$content',
            image='$old_image', post_tag='$post_tag', slug='$slug', status='$status', updated_at=now() WHERE id=$id";
        }
    
        $result = mysqli_query($conn, $query);
        if($result){
            show_alert_message('Post Updated Successfully', 'success');
            header('location: post_index.php');
            exit();
        }
    }
}

function delete_post($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM posts WHERE id=$id");
    show_alert_message('Post Deleted Successfully', 'success');
    header('location: post_index.php');
    exit();
}



/*
|--------------------------------------------------------------------------
| User Module
|--------------------------------------------------------------------------
*/
function get_all_users()
{
    global $conn;
    $users = [];
    if($result = mysqli_query($conn, "SELECT * FROM users")){
        while($row = mysqli_fetch_object($result)){
            $users[] = $row;
        }
    }
    return $users;
}

function get_user($id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    $user   = mysqli_fetch_object($result);
    return $user;
}

function insert_user()
{
    global $conn;
    if(isset($_POST['insert_user'])){
        $name         = $_POST['name'];
        $email        = $_POST['email'];
        $password     = $_POST['password'];
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $address      = $_POST['address'];
        $role         = $_POST['role'];

        $file_name    = $_FILES['image']['name'];
        $file_temp    = $_FILES['image']['tmp_name'];

        if( isset($file_name) ) {
            move_uploaded_file($file_temp, "uploads/user/$file_name");
        }
    
        $query = "INSERT INTO users(name, email, password, address, image, role, created_at)
                  VALUES('$name', '$email', '$hashPassword', '$address', '$file_name', '$role', now())";
        mysqli_query($conn, $query);
        show_alert_message('New User Created Successfully', 'success');
        header('location: user_index.php');
        exit();
    }
}

function edit_user()
{
    global $conn;
    if(isset($_POST['edit_user'])){
        $id        = $_POST['id'];
        $name      = $_POST['name'];
        $email     = $_POST['email'];
        $address   = $_POST['address'];
        $role      = $_POST['role'];
        $old_image = $_POST['old_image'];

        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];

        if( $file_name ){
            $file_name = uniqid(time()) . $file_name;
            $query = "UPDATE users SET name='$name', email='$email', address='$address', 
            image='$file_name', role='$role', updated_at=now() WHERE id=$id";
            move_uploaded_file($file_temp, "uploads/user/$file_name");
        }else{
            $query = "UPDATE users SET name='$name', email='$email', address='$address', 
            image='$old_image', role='$role', updated_at=now() WHERE id=$id";
        }
        $result = mysqli_query($conn, $query);
        if($result){
            show_alert_message('User Updated Successfully', 'success');
            header('location: user_index.php');
            exit();
        }
    }
}

function delete_user($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
    show_alert_message('User Deleted Successfully', 'success');
    redirect_back();
    exit();
}


/*
|--------------------------------------------------------------------------
| Comment Module
|--------------------------------------------------------------------------
*/
function get_all_comments($post_id = null)
{
    global $conn;

    $comments = [];

    if( isset($post_id) ){
        $query = "SELECT * FROM comments WHERE post_id=$post_id ORDER BY created_at DESC";
    }else{
        $query = "SELECT * FROM comments ORDER BY created_at DESC";
    }

    if($result = mysqli_query($conn, $query)){
        while($row = mysqli_fetch_object($result)){
            $comments[] = $row;
        }
    }

    return $comments;
}

function insert_comment()
{   
    global $conn;
    if(isset($_POST['insert_comment'])){
        $post_id = $_POST['post_id'];
        $name    = $_POST['name'];
        $email   = $_POST['email'];
        $comment = $_POST['comment'];
        
        $query = "INSERT INTO comments(post_id, name, email, comment, created_at)
                  VALUES('$post_id', '$name', '$email', '$comment', now())";
        mysqli_query($conn, $query);
        show_alert_message('Your Comment Submitted Successfully', 'success');
        redirect_back();
        exit();
    }
}

function delete_comment($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM comments WHERE id=$id");
    show_alert_message('Comment Deleted Successfully', 'success');
    redirect_back();
    exit();
}



/*
|--------------------------------------------------------------------------
| Auth Module
|--------------------------------------------------------------------------
*/
function login()
{
    global $conn;
    if( isset($_POST['login']) ){
        $email    = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        $result   = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        $authUser = mysqli_fetch_object($result);

        if( $email == '' || $password == '' ){
            show_alert_message('Both Email and Password Field is Required', 'error');
            redirect_back();
            exit();
        }
        
        if( $email !== $authUser->email ){
            show_alert_message('Invalid Email', 'error');
            redirect_back();
            exit();
        }

        if( !password_verify($password, $authUser->password) ){
            show_alert_message('Invalid Password', 'error');
            redirect_back();
            exit();
        }

        $_SESSION['auth_user'] = [
            'id'   => $authUser->id,
            'name' => $authUser->name,
            'role' => $authUser->role,
        ];

        show_alert_message('LoggedIn Successfully', 'success');
        header('location: admin/dashboard.php');
        exit();
    }   
}

function register()
{
    global $conn;
    if( isset($_POST['register']) ){
        // echo '<pre>' . print_r($_POST, true) . '</pre>'; die;
        $name        = mysqli_real_escape_string($conn, $_POST['name']);
        $email       = mysqli_real_escape_string($conn, $_POST['email']);
        $password    = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_pwd = $_POST['confirm_pwd'];

        if( $name == '' || $email == '' || $password == '' ){
            show_alert_message('All Input Fields Are Required', 'error');
            redirect_back();
            exit();
        }

        if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
            show_alert_message('Invalid Email Format', 'error');
            redirect_back();
            exit();
        }

        if( $password != $confirm_pwd ){
            show_alert_message('Password Confirmation Does Not Match', 'error');
            redirect_back();
            exit();
        }

        $hash_password  = password_hash('password', PASSWORD_BCRYPT);
        $query = "INSERT INTO users(name, email, password, role, created_at)
                  VALUES('$name', '$email', '$hash_password', 'author', now())";
        mysqli_query($conn, $query);
        show_alert_message('Registered Successfully', 'success');
        header('location: login.php');
        exit();
    }
}

function logout()
{
    unset($_SESSION['auth_user']);
    header('location: login.php');
    exit();
}


/*
|--------------------------------------------------------------------------
| Profile Module
|--------------------------------------------------------------------------
*/
function edit_profile()
{
    global $conn;
    if( isset($_POST['edit_profile']) ){
        $id        = $_POST['id'];
        $name      = $_POST['name'];
        $email     = $_POST['email'];
        $address   = $_POST['address'];
        $old_image = $_POST['old_image'];

        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];

        if($file_name){
            $file_name = uniqid(time()) . $file_name;
            $query = "UPDATE users SET name='$name', email='$email', address='$address', image='$file_name', updated_at=now() WHERE id=$id";
            move_uploaded_file($file_temp, "uploads/user/$file_name");
        }else{
            $query = "UPDATE users SET name='$name', email='$email', address='$address', image='$old_image', updated_at=now() WHERE id=$id";
        }
        $result = mysqli_query($conn, $query);
        if($result){
            show_alert_message('Your Profile Updated Successfully', 'success');
            header('location: profile_index.php');
            exit();
        }
    }
}