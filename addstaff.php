<?php
include 'header/head.php';
?>
<title>ข้อมูลเจ้าหน้าที่ในฟาร์ม</title>
<?php
session_start();
if ($_SESSION["ID_login"] == 'แอดมิน') {
    include 'header/barstaff.php';
} else {
    session_destroy();
    header("location:login.php");
    exit();
}
?>
<script src="js/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>
<div class="colorlib-narrow-content cllx">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
            <h2 class="colorlib-heading">เพิ่มข้อมูลเจ้าหน้าที่</h2>
        </div>
    </div>
    <div class="row">
        <div class="colorlib-text">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">ข้อมูลเจ้าหน้าที่
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body" style="border-radius: 20px">
                        <form action="" method="POST" name="" style="width: 100%">
                            <div class="panel-body" style="border-radius: 20px">
                                <div class="col-md-12">
                                    <div class="col-md-6 form-group">
                                        <label>username <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input class="form-control input-normal" type="text" name="user" id="user" style='height:40px; font-size:16px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>password <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input class="form-control input-normal" type="password" name="pass" id="pass" style='height:40px; font-size:16px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>ชื่อ-สกุล <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input class="form-control input-normal" type="text" name="name_n" id="name_n" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" style='height:40px; font-size:16px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>ชื่อเล่น</label>
                                        <input class="form-control" type="text" name="lastname_l" id="lastname_l" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" style='height:40px; font-size:16px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>เลขบัตรประชาชน <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input class="form-control" type="text" maxlength="13" minlength="13" name="idcard" id="idcard" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" style='height: 40px; width: 100%;font-size:16px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>วันเกิด <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input class="form-control" type="date" name="birthday_b" id="birthday_b" style='height:40px; width: 76%; font-size:16px;padding: 0px 60px;'>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>ที่อยู่ <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input class="form-control" type="text" name="house_no" id="house_no" style='height:40px; font-size:16px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>รหัสไปรษณีย <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input class="form-control" type="text" maxlength="5" minlength="5" name="postal_code" id="postal_code" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" style='height:40px; font-size:16px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>อีเมล</label>
                                        <input class="form-control" type="text" name="email_e" id="email_e" style='height:40px; font-size:16px;' onblur="check_email(this)">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>เลขประกอบวิชาชีพ <a style="color: red;">&nbsp;&nbsp; * &nbsp; ไม่มี (-)</a></label>
                                        <input class="form-control" type="text" name="professional_number" id="professional_number" style='height:40px; font-size:16px;'>
                                    </div>
                                    <div class="col-md-6 form-group" id="select_option">

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>เบอร์โทร <a style="color: red;">&nbsp;&nbsp; * &nbsp; (08XXXXXXXX)</a></label>
                                        <input class="form-control" type="text" maxlength="10" minlength="10" name="tel_t" id="tel_t" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" placeholder='08XXXXXXXX' style='height:40px; font-size:16px;'>
                                    </div>
                                    <div align="center">
                                        <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="ตกลง">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div id="select"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        select();
        select_option();
        $("#btnSend").click(function() {
            inser_staff();
        });
    });

    function check_email(elm) {
        var regex_email = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/
        if (!elm.value.match(regex_email)) {
            alert('กรุณากรอก Email ให้ถูกต้อง');
        }
    }

    function Saveedit($ID_login) {
        var useredit = document.getElementById("useredit" + $ID_login).value;
        var passedit = document.getElementById("passedit" + $ID_login).value;
        var name_nedit = document.getElementById("name_nedit" + $ID_login).value;
        var lastname_ledit = document.getElementById("lastname_ledit" + $ID_login).value;
        var idcardedit = document.getElementById("idcardedit" + $ID_login).value;
        var birthday_bedit = document.getElementById("birthday_bedit" + $ID_login).value;
        var house_noedit = document.getElementById("house_noedit" + $ID_login).value;
        var postal_codeedit = document.getElementById("postal_codeedit" + $ID_login).value;
        var email_eedit = document.getElementById("email_eedit" + $ID_login).value;
        var professional_numberedit = document.getElementById("professional_numberedit" + $ID_login).value;
        var selectAedit = document.getElementById("selectAedit" + $ID_login).value;
        var tel_tedit = document.getElementById("tel_tedit" + $ID_login).value;

        var jsonObj = {
            "namef": "SaveEdit",
            "ID_login": $ID_login,
            "useredit": useredit,
            "passedit": passedit,
            "name_nedit": name_nedit,
            "lastname_ledit": lastname_ledit,
            "idcardedit": idcardedit,
            "birthday_bedit": birthday_bedit,
            "house_noedit": house_noedit,
            "postal_codeedit": postal_codeedit,
            "email_eedit": email_eedit,
            "professional_numberedit": professional_numberedit,
            "selectAedit": selectAedit,
            "tel_tedit": tel_tedit
        }

        $.ajax({
            type: "POST",
            url: "controller/addstaff.php",
            data: jsonObj,
            success: function(result) {
                alert(result.message);
                if (result.status == 1) {
                    window.location = 'addstaff.php';
                }
            }
        });

    }

    function select() {

        var jsonObj = {
            "namef": "select_staff",
        }

        $.ajax({
            type: "POST",
            url: "controller/addstaff.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select').html(result);
                $('#example').dataTable({
                    "oLanguage": {
                        "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                        "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                        "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                        "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ",",
                        "sLengthMenu": "แสดง _MENU_ แถว",
                        "sLoadingRecords": "กำลังโหลดข้อมูล...",
                        "sProcessing": "กำลังดำเนินการ...",
                        "sSearch": "ค้นหา: ",
                        "sZeroRecords": "ไม่พบข้อมูล",
                        "oPaginate": {
                            "sFirst": "หน้าแรก",
                            "sPrevious": "ก่อนหน้า",
                            "sNext": "ถัดไป",
                            "sLast": "หน้าสุดท้าย"
                        },
                        "oAria": {
                            "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                            "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                        }
                    },
                    "lengthMenu": [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ]
                });
            }
        });
    }

    function select_option() {
        var jsonObj = {
            "namef": "select_option"
        }
        $.ajax({
            type: "POST",
            url: "controller/addstaff.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option').html(result);
            }
        });
    }

    function inser_staff() {
        var user = document.getElementById("user").value;
        var pass = document.getElementById("pass").value;
        var name_n = document.getElementById("name_n").value;
        var lastname_l = document.getElementById("lastname_l").value;
        var idcard = document.getElementById("idcard").value;
        var house_no = document.getElementById("house_no").value;
        var postal_code = document.getElementById("postal_code").value;
        var email_e = document.getElementById("email_e").value;
        var birthday_b = document.getElementById("birthday_b").value;
        var professional_number = document.getElementById("professional_number").value;
        var selectA = document.getElementById("selectA").value;
        var tel_t = document.getElementById("tel_t").value;

        var jsonObj = {
            "namef": "inser_staff",
            "user": user,
            "pass": pass,
            "name_n": name_n,
            "lastname_l": lastname_l,
            "idcard": idcard,
            "house_no": house_no,
            "postal_code": postal_code,
            "email_e": email_e,
            "birthday_b": birthday_b,
            "professional_number": professional_number,
            "selectA": selectA,
            "tel_t": tel_t
        }
        if (user != "" && user != null) {
            if (pass != "" && pass != null) {
                if (name_n != "" && name_n != null) {
                    if (idcard != "" && idcard != null) {
                        if (house_no != "" && house_no != null) {
                            if (birthday_b != "" && birthday_b != null) {
                                if (professional_number != "" && professional_number != null) {
                                    if (selectA != "" && selectA != null) {
                                        if (tel_t != "" && tel_t != null) {
                                            if (postal_code != "" && postal_code != null) {
                                                $.ajax({
                                                    type: "POST",
                                                    url: "controller/addstaff.php",
                                                    data: jsonObj,
                                                    success: function(result) {
                                                        alert(result.message);
                                                        window.location = 'addstaff.php';
                                                    }
                                                });
                                            } else {
                                                alert("กรุณาใส่รหัสไปรษณีย");
                                            }
                                        } else {
                                            alert("กรุณาใส่เบอร์โทร");
                                        }
                                    } else {
                                        alert("กรุณาเลือกหน้าที่");
                                    }
                                } else {
                                    alert("กรุณาใส่เลขประกอบวิชาชีพ");
                                }
                            } else {
                                alert("กรุณาใส่วันเกิด");
                            }
                        } else {
                            alert("กรุณาใส่ที่อยู่");
                        }
                    } else {
                        alert("กรุณาใส่เลขบัตรประชาชน");
                    }
                } else {
                    alert("กรุณาใส่ชื่อ-สกุล");
                }
            } else {
                alert("กรุณาใส่password");
            }
        } else {
            alert("กรุณาใส่username");
        }
    }

    function login_delete(ID_login) {
        var jsonObj = {
            "namef": "login_delete",
            "ID_login": ID_login
        }

        $.ajax({
            type: "POST",
            url: "controller/addstaff.php",
            data: jsonObj,
            success: function(result) {
                alert(result.message);
                if (result.status == 1) {
                    $("#" + result.num).hide();
                }
            }
        });
    }
</script>
<?php
include 'script/script.php';
?>