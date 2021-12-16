<?php
session_start();
function config()
{
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "cms";
    $connect = mysqli_connect($server, $user, $password, $db);
    mysqli_set_charset($connect, 'utf-8');
    mysqli_query($connect, "SET NAMES 'UTF-8");
    return $connect;
}

//    add menu from dashboard
function add_menu($data)
{
    $data = $_POST['frm'];
    $connect = config();
    if($data['title']!='' || $data['url']!='' || $data['sort']!=''){
        $sql = "INSERT INTO menu_tbl (title,url,parent,status,sort,chid) VALUES ('$data[title]','$data[url]','$data[parent]','$data[status]','$data[sort]','$data[chid]')";
        mysqli_query($connect, $sql);
        header('location:dashboard.php?m=menu&p=add');
        echo "<span class='alert-success'
    style='height: 40px;text-align: center;display : flex;align-items: center;justify-content: center;
    background-color: #1e7e34;color: #FFFFFF;'>منو با موفقیت اضافه شد</span>";
    }
    else{
        header('location:dashboard.php?m=menu&p=add');
        echo "<span class='alert-danger'
    style='height: 40px;text-align: center;display : flex;align-items: center;justify-content: center;
    '>لطفا فیلد های مورد نظر را تکمیل کنید</span>";
    }

}

