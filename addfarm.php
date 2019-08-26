<?php
include 'header/head.php';
?>
<title>ข้อมูลทั้งหมดของฟาร์ม</title>
<?php
session_start();
if ($_SESSION["ID_login"] == 'แอดมิน') {
    include 'header/bareditfarm.php';
} else {
    session_destroy();
    header("location:login.php");
    exit();
}
include 'script/script.php';
?>
<script src="js/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>
<div class="colorlib-narrow-content cllx">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
            <h2 class="colorlib-heading">เพิ่มข้อมูลทั้งหมดของฟาร์ม</h2>
        </div>
    </div>
    <div class="row">
        <div class="colorlib-text">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพิ่มข้อมูลทั้งหมดของฟาร์ม
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body" style="border-radius: 20px">
                        <form action="" method="POST" name="bt1" style="width: 100%">
                            <div class="panel-body" style="border-radius: 20px; margin-top: -14px;">
                                <div class="col-md-12">
                                    <div class="col-md-12 form-group" align="center">
                                        <label style="margin-top: -17px;">ชื่อฟาร์ม <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input class="form-control" type="text" name="far" id="far_f" style='height:40px; font-size:16px; width: 35%;margin-top: -10px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label style="margin-top: -14px;">ชื่อเจ้าของฟาร์ม <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input class="form-control" type="text" name="farmown" id="farmown_f" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" style='height:40px; font-size:16px;margin-top: -10px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label style="margin-top: -14px;">เบอร์โทรศัพท์(เจ้าของ) <a style="color: red;">&nbsp;&nbsp; * &nbsp; (08XXXXXXXX)</a></label>
                                        <input class="form-control" type="text" name="mowntel" id="mowntel_m" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" maxlength="10" minlength="10" placeholder='08XXXXXXXX' style='height:40px; font-size:16px;margin-top: -10px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label style="margin-top: -14px;">ชื่อผู้จัดการฟาร์ม <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input class="form-control" type="text" name="farfarm" id="farfarm_f" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" style='height:40px; font-size:16px;margin-top: -10px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label style="margin-top: -14px;">เบอร์โทรศัพท์(ผู้จัดการ) <a style="color: red;">&nbsp;&nbsp; * &nbsp; (08XXXXXXXX)</a></label>
                                        <input class="form-control" type="text" name="telfarm" id="telfarm_t" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" maxlength="10" minlength="10" placeholder='08XXXXXXXX' style='height:40px; font-size:16px;margin-top: -10px;'>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label style="margin-top: -14px;">ที่อยู่ฟาร์ม <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input class="form-control" type="text" name="farmaddress" id="farmaddress_f" style='height:40px; font-size:16px;margin-top: -10px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label style="margin-top: -14px;">เบอร์โทรศัพท์(ฟาร์ม) <a style="color: red;">&nbsp;&nbsp; (05XXXXXXX)</a></label>
                                        <input class="form-control" type="text" name="farmtel" id="farmtel_f" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" maxlength="9" minlength="9" placeholder='05XXXXXXX' style='height:40px; font-size:16px;margin-top: -10px;'>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label style="margin-top: -14px;">รับรองเป็นมาตรฐานฟาร์มเลี้ยงสุกรของประเทศไทย ณ วันที่ <a style="color: red;">&nbsp;&nbsp; *</a></label>
                                        <input type="date" class="form-control" name="warrantdate" id="warrantdate_w" style='height:40px;width: 245px;font-size:16px;padding: 0px 60px;margin-top: -10px;'>
                                    </div>
                                </div>
                                <br><br>
                                <div align="center">
                                    <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="ตกลง">
                                </div>
                            </div>
                        </form>
                        <br>
                        <div id="select" style="margin-top: -20px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        select();
        $("#btnSend").click(function() {
            inser();
        });
    });

    function Saveedit($ID_farm) {
        var far_fedit = document.getElementById("far_fedit" + $ID_farm).value;
        var farmown_fedit = document.getElementById("farmown_fedit" + $ID_farm).value;
        var mowntel_medit = document.getElementById("mowntel_medit" + $ID_farm).value;
        var farfarm_fedit = document.getElementById("farfarm_fedit" + $ID_farm).value;
        var telfarm_tedit = document.getElementById("telfarm_tedit" + $ID_farm).value;
        var farmaddress_fedit = document.getElementById("farmaddress_fedit" + $ID_farm).value;
        var farmtel_fedit = document.getElementById("farmtel_fedit" + $ID_farm).value;
        var warrantdate_wedit = document.getElementById("warrantdate_wedit" + $ID_farm).value;

        var jsonObj = {
            "namef": "SaveEdit",
            "ID_farm": $ID_farm,
            "far_fedit": far_fedit,
            "farmown_fedit": farmown_fedit,
            "mowntel_medit": mowntel_medit,
            "farfarm_fedit": farfarm_fedit,
            "telfarm_tedit": telfarm_tedit,
            "farmaddress_fedit": farmaddress_fedit,
            "farmtel_fedit": farmtel_fedit,
            "warrantdate_wedit": warrantdate_wedit
        }

        $.ajax({
            type: "POST",
            url: "controller/addfarm.php",
            data: jsonObj,
            success: function(result) {
                alert(result.message);
                if (result.status == 1) {
                    window.location = 'addfarm.php';
                }
            }
        });
    }

    function select() {
        var jsonObj = {
            "namef": "select_far",
        }

        $.ajax({
            type: "POST",
            url: "controller/addfarm.php",
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

    function inser() {
        var far_f = document.getElementById("far_f").value;
        var farmown_f = document.getElementById("farmown_f").value;
        var mowntel_m = parseFloat(document.getElementById("mowntel_m").value);
        var farfarm_f = document.getElementById("farfarm_f").value;
        var telfarm_t = document.getElementById("telfarm_t").value;
        var farmaddress_f = document.getElementById("farmaddress_f").value;
        var farmtel_f = document.getElementById("farmtel_f").value;
        var warrantdate_w = document.getElementById("warrantdate_w").value;

        var jsonObj = {
            "namef": "inser_far",
            "far_f": far_f,
            "farmown_f": farmown_f,
            "mowntel_m": mowntel_m,
            "farfarm_f": farfarm_f,
            "telfarm_t": telfarm_t,
            "farmaddress_f": farmaddress_f,
            "farmtel_f": farmtel_f,
            "warrantdate_w": warrantdate_w
        }
        if (far_f != "" && far_f != null) {
            if (farmown_f != "" && farmown_f != null) {
                if (mowntel_m.toString().length != "" && mowntel_m.toString().length != null) {
                    if (farfarm_f != "" && farfarm_f != null) {
                        if (telfarm_t != "" && telfarm_t != null) {
                            if (farmaddress_f != "" && farmaddress_f != null) {
                                if (warrantdate_w != "" && warrantdate_w != null) {
                                    $.ajax({
                                        type: "POST",
                                        url: "controller/addfarm.php",
                                        data: jsonObj,
                                        success: function(result) {
                                            alert(result.message);
                                            if (result.status == 1) {
                                                window.location = 'addfarm.php';
                                            }
                                        }
                                    });
                                } else {
                                    alert("กรุณาใส่รับรองเป็นมาตรฐานฟาร์มเลี้ยงสุกรของประเทศไทย ณ วันที่");
                                }
                            } else {
                                alert("กรุณาใส่ที่อยู่ฟาร์ม");
                            }
                        } else {
                            alert("โปรดกรอกหมายเลขโทรศัพท์(้จัดการ) 10 หลัก ด้วยรูปแบบดังนี้ 08XXXXXXXX ไม่ต้องใส่เครื่องหมายขีด (-) วงเล็บหรือเว้นวรรค");
                        }
                    } else {
                        alert("กรุณาใส้่ชื่อผู้จัดการฟาร์ม");
                    }
                } else {
                    alert("โปรดกรอกหมายเลขโทรศัพท์(เจ้าของ) 10 หลัก ด้วยรูปแบบดังนี้ 08XXXXXXXX ไม่ต้องใส่เครื่องหมายขีด (-) วงเล็บหรือเว้นวรรค");
                }
            } else {
                alert("กรุณาใส่ชื่อเจ้าของฟาร์ม");
            }
        } else {
            alert("กรุณาใส่ชื่อฟาร์ม");
        }

    }

    function delete_far(ID_farm) {
        var jsonObj = {
            "namef": "delete_far",
            "ID_farm": ID_farm
        }

        $.ajax({
            type: "POST",
            url: "controller/addfarm.php",
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