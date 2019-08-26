<?PHP
session_start();
session_destroy();
?>
<html lang="en-Us">

<head>
    <meta charset="utf-8">
    <title>เข้าสู่ระบบ</title>
    <script src="js/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" href="css/log.css">
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet"> 
    <!--[if lt IE 9]>
          <script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
          <![endif]-->
</head>
<body>
    <div class="login" style="margin-top:-140px;">
        <h1>Login</h1>
        <input type="text" name="usernames" id="usernames" placeholder="Username" required="required" />
        <input type="password" name="passwords" id="passwords" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large log-button" onclick="login();">เข้าสู่ระบบ</button>
    </div>
    <!-- <script type="js/login.js"></script> -->
</body>
<script type="text/javascript">

    function login() {
        var usernames = document.getElementById("usernames").value;
        var passwords = document.getElementById("passwords").value;

        var jsonObj = {
            "namef": "login",
            "usernames": usernames,
            "passwords": passwords,
        }

        $.ajax({
            type: "POST",
            url: "controller/login.php",
            data: jsonObj,
            success: function(result) {
                if(result.status == 1){
                    window.location = 'index.php';
                }else{
                    alert(result.message);
                }

            }
        });
    }
    function login2() {
        var usernames = document.getElementById("usernames").value;
        var passwords = document.getElementById("passwords").value;

        var jsonObj = {
            "namef": "login",
            "usernames": usernames,
            "passwords": passwords,
        }

        $.ajax({
            type: "POST",
            url: "controller/login.php",
            data: jsonObj,
            success: function(result) {
                alert(result.message);
            }
        });
    }
    /* 
         
         I built this login form to block the front end of most of my freelance wordpress projects during the development stage. 
         
         This is just the HTML / CSS of it but it uses wordpress's login system. 
         
         Nice and Simple
         
         */
</script>

</html>