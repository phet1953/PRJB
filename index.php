<?php
include 'header/head.php';
session_start();
?>
<title><?PHP echo $_SESSION["ID_login"]?></title>
<?php
$count = count($_SESSION);
$_SESSION["ID_login"] = ($count > 0 ? $_SESSION["ID_login"] : '');
if($_SESSION["ID_login"] == 'แอดมิน'){
    include 'header/barindex.php';
}else if($_SESSION["ID_login"] == 'เจ้าหน้าที่ประจำฟาร์ม'){
    include 'header/barindexst.php';
}else if($_SESSION["ID_login"] == 'สัตวแพทย์ประจำฟาร์ม'){
    include 'header/barindexve.php';
}else{
    session_destroy();
    header("location:login.php");
    // include 'login.php';
    exit();
}

include 'script/script.php';
?>
<div id="colorlib-main">
    <aside id="colorlib-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url(images/img-1.jpg); border-radius: 25px ">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc" style="border-radius: 25px">
                                        <h1>Welcome to</h1>
                                        <font size="5" color="#000000">DECISION SUPPORT SYSTEM FOR CULLING OF PIG BREEDERS</font>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
</div>