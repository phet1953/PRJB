<?php
include 'header/head.php';
?>
<title>เพื่มผลการตรวจท้อง</title>
<?php
session_start();
if ($_SESSION["ID_login"] == 'แอดมิน') {
    include 'header/barcheckbelly.php';
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
            <h2 class="colorlib-heading">เพื่มผลการตรวจท้อง</h2>
        </div>
    </div>
    <div class="row">
        <div class="colorlib-text">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพื่มผลการตรวจท้อง
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body" style="border-radius: 20px">
                        <form action="" method="POST" name="bt1" style="width: 100%">
                            <div class="panel-body" style="border-radius: 20px">
                                <div class="col-md-12" align='center'>
                                    <div class="col-md-12 form-group" align='center' style="width:100%">
                                        <label>ผลการตรวจท้อง</label>
                                        <input class="form-control" type="text" name="checkbelly_c" id="checkbelly_c" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" style='height:40px; font-size:16px;width: 30%;'>
                                    </div>
                                    <br>
                                </div>
                                <div align='center'>
                                    <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="ตกลง">
                                </div>
                            </div>
                        </form>
                        <br>
                        <div id="select_checkbelly"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        select_checkbelly();
        $("#btnSend").click(function() {
            inser_checkbelly();
        });
    });

    function Saveedit($ID_checkbelly) {
        var checkbelly_cedit = document.getElementById("checkbelly_cedit" + $ID_checkbelly).value;

        var jsonObj = {
            "namef": "SaveEdit",
            "ID_checkbelly": $ID_checkbelly,
            "checkbelly_cedit": checkbelly_cedit,

        }

        $.ajax({
            type: "POST",
            url: "controller/addcheckbelly.php",
            data: jsonObj,
            success: function(result) {
                alert(result.message);
                if (result.status == 1) {
                    window.location = 'addcheckbelly.php';
                }
            }
        });
    }

    function select_checkbelly() {
        var jsonObj = {
            "namef": "select_checkbelly"
        }

        $.ajax({
            type: "POST",
            url: "controller/addcheckbelly.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_checkbelly').html(result);
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

    function inser_checkbelly() {
        var checkbelly_c = document.getElementById("checkbelly_c").value;
        var jsonObj = {
            "namef": "inser_checkbelly",
            "checkbelly_c": checkbelly_c,
        }
        if (checkbelly_c != "" && checkbelly_c != null) {
            $.ajax({
                type: "POST",
                url: "controller/addcheckbelly.php",
                data: jsonObj,
                success: function(result) {
                    alert(result.message);
                    if (result.status == 1) {
                        window.location = 'addcheckbelly.php';
                    }
                }
            });
        } else {
            alert("กรุณาใส่ผลการตรวจท้อง");
        }
    }

    function checkbelly_delete(ID_checkbelly) {
        var jsonObj = {
            "namef": "checkbelly_delete",
            "ID_checkbelly": ID_checkbelly
        }

        $.ajax({
            type: "POST",
            url: "controller/addcheckbelly.php",
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