<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />

<!-- Facebook and Twitter integration -->
<meta property="og:title" content="" />
<meta property="og:image" content="" />
<meta property="og:url" content="" />
<meta property="og:site_name" content="" />
<meta property="og:description" content="" />
<meta name="twitter:title" content="" />
<meta name="twitter:image" content="" />
<meta name="twitter:url" content="" />
<meta name="twitter:card" content="" />

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<link rel="shortcut icon" href="favicon.ico">

<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

<!-- Animate.css -->
<link rel="stylesheet" href="css/animate.css">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="css/icomoon.css">
<!-- Bootstrap  -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- Flexslider  -->
<link rel="stylesheet" href="css/flexslider.css">
<!-- Flaticons  -->
<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
<!-- Owl Carousel -->
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<!-- Theme style  -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/boxiconuser.css">
<link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Modernizr JS -->
<script src="js/modernizr-2.6.2.min.js"></script>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<!-- Sticky Kit -->
<script src="js/sticky-kit.min.js"></script>
<!-- Owl carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- Counters -->
<script src="js/jquery.countTo.js"></script>
<!-- MAIN JS -->
<script src="js/main.js"></script>

<!-- FOR IE9 below -->
<!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>
    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="border js-fullheight">
            <h1 id="colorlib-logo"><a style="height: 0px;" href="index.php">PIGFARM</a></h1>
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li style="height: 25px;">
                        <h5><a href="index.php">หน้าแรก</a></h5>
                    </li>
                    <br>
                    <li  style="height: 30px;">
                        <h5><a href="addsaveac.php">เพิ่มข้อมูลกิจกรรม</a></h5>
                    </li>
                    <li  style="height: 30px;">
                        <h5><a href="adddrug.php">ข้อมูลการใช้วัคซีน</a></h5>
                    </li>
                    <li style="height: 30px;">
                        <h5><a href="addmedicin.php">ข้อมูลการใช้ยา</a></h5>
                    </li>
                    <li  style="height: 30px;">
                        <h5><a href="addobjdrug.php">จุดประสงค์การใช้ยา</a></h5>
                    </li>
                    <li style="height: 30px;">
                        <h5><a href="addcompadrug.php">บริษัทยาและวัคซีน</a></h5>
                    </li>
                    <li style="height: 30px;">
                        <h5><a href="addmethoddrug.php">วิธีการให้ยา</a></h5>
                    </li>
                    <li class="colorlib-active" style="height: 30px;">
                        <h5><a href="addunitdrug.php">หน่วยนับ [ขนาดยา]</a></h5>
                    </li>
                    <li style="height: 25px;">
                        <h5><a href="addmunitdrug.php">หน่วยนับ [ขนาดการใช้ยา]</a></h5>
                    </li>
                    <hr>
                    <li style="height: 11px;">
                        <h5><a href="logout.php">ออกจากระบบ</a></h5>
                    </li>
                    <br>
                    <div class="info-box bg-green">
                        <span class="info-box-icon">
                            <img src="https://img.icons8.com/color/50/000000/doctor-female.png">
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-number" style="font-size:15px;"><?PHP echo $_SESSION["ID_login"] ?></span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                                <?PHP echo $_SESSION["name"] ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </ul>
            </nav>


        </aside>