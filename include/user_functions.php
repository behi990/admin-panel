<?php
include_once 'functions.php';

    function user_login($data){
        $connection=config();
        $sql="SELECT * FROM admin_tbl WHERE username='$data[username]'";
        $row=mysqli_query($connection,$sql);
        $result=mysqli_fetch_array($row);

        if($data['password']==='' || $data['username']===''){
            header('location:login.php?login_first');
        }
        elseif ($result['password']===$data['password'] && $result['username']===$data['username']){
            $_SESSION['username']=$result['first_name']."  ".$result['last_name']."  خوش آمدید   ";
            header('location:dashboard.php?login=ok');
        }
       else{
           header('location:login.php?password=wrong');
       }
    }