<?php
include 'header/head.php';
?>
<title>เพิ่มข้อมูลการใช้วัคซีนในฟาร์ม</title>
<?php
session_start();
if ($_SESSION["ID_login"] == 'สัตวแพทย์ประจำฟาร์ม') {
    include 'header/bareditdrug.php';
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
            <h2 class="colorlib-heading">เพิ่มข้อมูลการใช้วัคซีนในฟาร์ม</h2>
        </div>
    </div>
    <div class="row">
        <div class="colorlib-text">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพิ่มข้อมูลการใช้วัคซีนในฟาร์ม
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body" style="border-radius: 20px">
                        <form action="" method="POST" name="" style="width: 100%">
                            <div class="panel-body" style="border-radius: 20px">
                                <div class="col-md-12">
                                    <div class="col-md-4" id="select_option">

                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>วัคซีนป้องกันโรค <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                                        <input class="form-control" type="text" name="drug_d" id="drug_d" style='height:40px; font-size:16px;width: 100%;'>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>ปริมาณการใช้(ซีซี/ตัว) <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                                        <input class="form-control" type="text" name="cc_c" id="cc_c" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" style='height:40px; font-size:16px;width: 100%;'>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>ชื่อผลิตภัณฑ์ <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                                        <input class="form-control" type="text" name="product_p" id="product_p" style='height:40px; font-size:16px;width: 100%;'>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>ข้อบ่งใช้</label>
                                        <input class="form-control" type="text" name="use_u" id="use_u" style='height:40px; font-size:16px;width: 100%;'>
                                    </div>
                                </div>
                                <br>
                                <div align='center'>
                                    <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="ตกลง">
                                </div>
                            </div>
                        </form>
                        <br>
                        <div id="select_drug"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        select_option();
        select_drug();
        $("#btnSend").click(function() {
            inser_drug();
        });
    });

    function Saveedit($ID_drug) {
        var selectAedit = document.getElementById("selectAedit" + $ID_drug).value;
        var drug_dedit = document.getElementById("drug_dedit" + $ID_drug).value;
        var cc_cedit = document.getElementById("cc_cedit" + $ID_drug).value;
        var product_pedit = document.getElementById("product_pedit" + $ID_drug).value;
        var use_uedit = document.getElementById("use_uedit" + $ID_drug).value;

        var jsonObj = {
            "namef": "SaveEdit",
            "ID_drug": $ID_drug,
            "selectAedit": selectAedit,
            "drug_dedit": drug_dedit,
            "cc_cedit": cc_cedit,
            "product_pedit": product_pedit,
            "use_uedit": use_uedit,

        }

        $.ajax({
            type: "POST",
            url: "controller/adddrug.php",
            data: jsonObj,
            success: function(result) {
                alert(result.message);
                if (result.status == 1) {
                    window.location = 'adddrug.php';
                }
            }
        });
    }

    function select_option() {
        var jsonObj = {
            "namef": "select_option"
        }

        $.ajax({
            type: "POST",
            url: "controller/adddrug.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option').html(result);
            }
        });
    }

    function select_drug() {
        var jsonObj = {
            "namef": "select_drug"
        }

        $.ajax({
            type: "POST",
            url: "controller/adddrug.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_drug').html(result);
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

    function inser_drug() {
        var selectA = document.getElementById("selectA").value;
        var drug_d = document.getElementById("drug_d").value;
        var cc_c = document.getElementById("cc_c").value;
        var product_p = document.getElementById("product_p").value;
        var use_u = document.getElementById("use_u").value;

        var jsonObj = {
            "namef": "inser_drug",
            "selectA": selectA,
            "drug_d": drug_d,
            "cc_c": cc_c,
            "product_p": product_p,
            "use_u": use_u,
        }
        if (selectA != "" && selectA != null) {
            if (drug_d != "" && drug_d != null) {
                if (cc_c != "" && cc_c != null) {
                    if (product_p != "" && product_p != null) {
                        $.ajax({
                            type: "POST",
                            url: "controller/adddrug.php",
                            data: jsonObj,
                            success: function(result) {
                                alert(result.message);
                                if (result.status == 1) {
                                    window.location = 'adddrug.php';
                                }
                            }
                        });
                    } else {
                        alert("กรุณาใส่ชื่อผลิตภัณฑ์");
                    }
                } else {
                    alert("กรุณาใส่ปริมาณการใช้(ซีซี/ตัว)");
                }
            } else {
                alert("กรุณาใส่วัคซีนป้องกันโรค");
            }
        } else {
            alert("กรุณาใส่ชื่อบริษัท");
        }
    }

    function drug_delete(ID_drug) {
        var jsonObj = {
            "namef": "drug_delete",
            "ID_drug": ID_drug
        }

        $.ajax({
            type: "POST",
            url: "controller/adddrug.php",
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
<?PHP
include 'script/script.php';
?>