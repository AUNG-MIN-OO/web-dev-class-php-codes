<?php
//common start
function alert ($data,$color="danger"){
    return "<p class='alert alert-$color'>$data</p>";
}

function runQuery ($sql){ //torunQuery
    $con = con();
    if (mysqli_query($con,$sql)) {
        return true;
    } else {
        die("Query Fail : ".mysqli_error($con));
    }
    
}

function redirection($l){
    header("location:$l");
}

function linkTo($l){
    echo "<script>location.href='$l'</script>";
}

function fetch($sql){
    $query = mysqli_query(con(),$sql);
    $row  = mysqli_fetch_assoc($query);
    return $row;
}

function fetchAll($sql){
    $query = mysqli_query(con(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function showTime($tiemstamp,$format= "d-m-y"){
    return date($format,strtotime($tiemstamp));
}

function countTotal($table,$condition = 1){
    $sql="SELECT COUNT(id) FROM $table WHERE $condition";
    $total = fetch($sql);
    return $total['COUNT(id)'];
}

function short($str,$length="100"){
    return substr($str,0,$length)."...";
}

function textFilter($text){
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES); //change to entities line ><>?/
    $text = stripcslashes($text);//to prevent web security,database injection
    return $text;
}

//common end



//authentication start

function register (){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];

    if ($password == $cPassword){
        $sPass = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(name,email,password) VALUES('$name','$email','$sPass')";
        if (runQuery($sql)){
            linkTo("category_add.php");
        }
    }else{
        return alert("Password don't match");
    }
}

function login(){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    if (!$row){
        return alert("Email or Password does not match") ;
    }else{
        if (!password_verify($password,$row['password'])){
            return alert("Email or Password does not match") ;
        }else{
            session_start();
            $_SESSION['user'] = $row ;
            redirection("dashboard.php");
        }
    }

}

//authentication end

// user start
function user($id){
    $sql = "SELECT * FROM users WHERE id=$id";
    return fetch($sql);
}

function users(){
    $sql = "SELECT * FROM users";
    return fetchAll($sql);

}
// user end

//category start

function categoryAdd(){
    $title = textFilter(strip_tags($_POST['title']));
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO categories (title,user_id) VALUES ('$title','$user_id')";
    if (runQuery($sql)){
        redirection("login.php");
    }
}

function category($id){
    $sql = "SELECT * FROM categories WHERE id=$id";
    return fetch($sql);
}

function categories(){
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);

}

function categoryDelete($id){
    $sql = "DELETE FROM `categories` WHERE id=$id";
    return runQuery($sql);
}

function categoryEdit($id){
    $sql = "EDIT FROM `categories` WHERE id=$id";
    return runQuery($sql);
}

function categoryUpdate(){
    $title = $_POST['title'];
    $id = $_POST['id'];
    $sql = "UPDATE categories SET title ='$title' WHERE id=$id";
    return runQuery($sql);
}

function categoryPinToTop($id){
    $sql = "UPDATE categories SET ordering='0'";
    mysqli_query(con(),$sql);

    $sql = "UPDATE categories SET ordering='1' WHERE id=$id";
    return runQuery($sql);
}

function categoryRemovePin(){
    $sql = "UPDATE categories SET ordering='0'";
    return runQuery($sql);
}

function isCategory($id){
    if (category($id)){
        return $id;
    }else{
        die("category is invalid");
    }
}

//category end

//post start

function postAdd(){
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = isCategory($_POST['category_id']);
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO posts (title,description,user_id,category_id) VALUES ('$title','$description','$user_id','$category_id')";
    if (runQuery($sql)){
        linkTo("post_add.php");
    }
}

function post($id){
    $sql = "SELECT * FROM posts WHERE id=$id";
    return fetch($sql);
}

function posts($limit = 9999999){
    if($_SESSION['user']['role'] == 2){
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id = '$current_user_id' LIMIT $limit";
    }else{
        $sql = "SELECT * FROM posts LIMIT $limit";
    }
    return fetchAll($sql);

}

function postDelete($id){
    $sql = "DELETE FROM `posts` WHERE id=$id";
    return runQuery($sql);
}

function postEdit($id){
    $sql = "EDIT FROM `posts` WHERE id=$id";
    return runQuery($sql);
}

function postUpdate(){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $id = $_POST['id'];

    $sql = "UPDATE posts SET title ='$title',description ='$description',category_id = '$category_id' WHERE id=$id";
    return runQuery($sql);
}

//post end

// front panel start

function fPosts($orderCol ="id",$orderType = "DESC") {
    
    $sql = "SELECT * FROM posts ORDER BY $orderCol $orderType";    
    return fetchAll($sql);
}
function fCategories() {
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    
    return fetchAll($sql);
}

function fPostsByCat($category_id,$limit="999999",$post_id = 0){
    $sql = "SELECT * FROM posts WHERE category_id = $category_id AND id!=$post_id ORDER BY id DESC LIMIT $limit";
    
    return fetchAll($sql);
}

function fSearch($searchKey){
    $sql = "SELECT * FROM posts WHERE title LIKE '%$searchKey%' OR description LIKE '%$searchKey%' ORDER BY id DESC";

    return fetchAll($sql);
}

function fSearchByDate($start,$end){
    $sql = "SELECT * FROM posts WHERE created_at BETWEEN '$start' AND '$end' ORDER BY id DESC";

    return fetchAll($sql);
}

// front panel end

// viewer count start

function viewerRecord($userId,$postId,$device){
    $sql = "INSERT INTO viewers(user_id,post_id,device) VALUE ('$userId','$postId','$device')";
    runQuery($sql);
}

function viewerCountByPost($postId){
    $sql = "SELECT * FROM viewers WHERE post_id = $postId";
    return fetchAll($sql);
}

function viewerCountByUser($userId){
    $sql = "SELECT * FROM viewers WHERE user_id = $userId";
    return fetchAll($sql);
}

// viewer count end


//ad start

function ads(){
    $today = date("Y-m-d");
    $sql = "SELECT * FROM ads WHERE start <= '$today' AND end > '$today'";
    // die($sql);
    return fetchAll($sql);
}

//ad end

//payment start

function payOn(){
    $from = $_SESSION['user']['id'];
    $to = $_POST['to_user'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    //from user update money caculate
    $fromUserDetail = user($from);
    $leftMoney = $fromUserDetail['money'] - $amount;
    if ($fromUserDetail['money'] >= $amount){
        $sql = "UPDATE users SET money = $leftMoney WHERE id = $from";
        mysqli_query(con(),$sql);

        //to user money update
        $toUserDetail = user($to);
        $newAmount = $toUserDetail['money'] + $amount;
        $sql = "UPDATE users SET money=$newAmount WHERE id = $to";
        mysqli_query(con(),$sql);


        //transaction record add to table
        $sql = "INSERT INTO transactions (from_user,to_user,amount,description) VALUES ('$from','$to','$amount','$description')";
        runQuery($sql);
    }


}

function transaction($id){
    $sql = "SELECT * FROM transactions WHERE id=$id";
    return fetch($sql);
}

function transactions(){
    $userId = $_SESSION['user']['id'];
    if ($_SESSION['user']['role'] == 0){
        $sql = "SELECT * FROM transactions";
    }else{
        $sql = "SELECT * FROM transactions WHERE from_user = $userId OR to_user = $userId";
    }
    return fetchAll($sql);
}

//payment end

//dashboard start 

function dashboardPosts($limit = 9999999){
    if($_SESSION['user']['role'] == 2){
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id = '$current_user_id' ORDER BY id DESC LIMIT $limit";
    }else{
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit";
    }
    return fetchAll($sql);

}

//dashboard end