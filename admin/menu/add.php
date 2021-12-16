<?php
    if(isset($_POST['add_menu_btn'])){
        $data=$_POST['frm'];
        add_menu($data);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>افزودن منو</title>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../style/style.css">

    <style>
        *{
            font-family: 'shabnam-400', sans-serif;
        }
    </style>
</head>
<body>
<h1 class="pageLables" style="font-family: 'shabnam-400', sans-serif;margin-bottom: 30px;">افزودن منوی جدید</h1>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <section class="panel">
            <header class="panel-heading text-center font-weight-bolder" style="background-color: #58c9f3;color: #ffffff;">
                افزودن منوی جدید به وبسایت
            </header>
            <div class="panel-body">
                <form action="" role="form" method="post">
                    <div class="form-group">
                        <label for="frm[title]" class="text-info">عنوان منو</label>
                        <input type="text" id="title" name="frm[title]" class="form-control" placeholder="عنوان منو را وارد کنید...">
                    </div>
                    <div class="form-group">
                        <label for="frm[url]" class="text-info" style="margin-bottom: 5px;">لینک</label>
                        <input type="text" id="url" name="frm[url]" class="form-control" placeholder="لینک منوی مورد نظر را وارد کنید...">
                    </div>
                    <div class="form-group">
                        <label for="frm[parent]" class="text-info" style="margin-bottom: 5px;">دسته بندی(مادر)</label>
                        <select class="form-control " name="frm[parent]" id="parent">
                            <option value="a">دسته اول</option>
                            <option value="b">دسته دوم</option>
                            <option value="c">دسته سوم</option>
                            <option value="d">دسته چهارم</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="frm[sort]" class="text-info" style="margin-bottom: 5px;">ترتیب نمایش</label>
                        <input type="number" id="title" name="frm[sort]" class="form-control" placeholder="ترتیب را وارد کنید...">
                    </div>
                    <div class="form-group">
                        <label for="frm[status]" class="text-info" style="margin-bottom: 5px;">وضعیت نمایش</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="frm[status]" id="optionsRadios1" value="1" checked>
                                فعال
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="frm[status]" id="optionsRadios1" value="0" checked>
                                غیر فعال
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-info btn-block text-center" type="submit" name="add_menu_btn">ذخیره</button>
                </form>
            </div>
        </section>
    </div>
</div>


<script src="../../../bootstrap/js/jquery.minV3.6.js"></script>
<script src="../../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>