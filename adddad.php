<?php
include 'header/head.php';
?>
<title>เพิ่มข้อมูลพ่อพันธ์ุ</title>
<?php
session_start();
if ($_SESSION["ID_login"] == 'แอดมิน') {
    include 'header/bareditpigdad.php';
} else if ($_SESSION["ID_login"] == 'เจ้าหน้าที่ประจำฟาร์ม') {
    include 'header/bareditpigdad_st.php';
} else {
    session_destroy();
    header("location:login.php");
    // include 'login.php';
    exit();
}
//include 'header/bareditpigdad.php';
include 'connect/connect.php';
?>
<script src="js/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>
<div class="colorlib-narrow-content cllx">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <h2 class="colorlib-heading">เพิ่มข้อมูลสุกรพ่อพันธ์ุ</h2>
            </div>
        </div>
        <div class="row">
            <div class="colorlib-text">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เพิ่มข้อมูลสุกรพ่อพันธ์ุ
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body" style="border-radius: 20px">
                            <form action="" method="POST" name="bt1" style="width: 100%" id="adddad">
                                <div class="panel-body" style="border-radius: 20px">
                                    <div class="col-md-12">
                                        <div class="col-md-4 form-group" align="center">
                                            <label>เบอร์หูสุกรพ่อพันธู์ <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                                            <input class="form-control" name="number" id="number" onblur="check()" maxlength="4" minlength="4" type="text" style='height:40px; font-size:16px;'>
                                        </div>
                                        <div class="col-md-4 form-group" align="center">
                                            <label>เบอร์หูพ่อของสุกรพ่อพันธู์ <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                                            <input class="form-control" name="det" id="det" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" maxlength="4" minlength="4" type="text" style='height:40px; font-size:16px;'>
                                        </div>
                                        <div class="col-md-4 form-group" align="center">
                                            <label>อายุ <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                                            <input class="form-control" type="text" name="age" id="age" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" style='height:40px; font-size:16px;'>
                                        </div>
                                        <div class="col-md-4 form-group" id="select_option" align="center">

                                        </div>
                                        <div class="col-md-4 form-group" align="center">
                                            <label>เบอร์หูแม่ของสุกรพ่อพันธู์ <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                                            <input class="form-control" name="mom" id="mom" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" maxlength="4" minlength="4" type="text" style='height:40px; font-size:16px;'>
                                        </div>
                                        <div class="col-md-4 form-group" align="center">
                                            <label>วันที่เข้าฝูง <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                                            <input type="date" class="form-control" name="datfrom" id="datfrom" style='height:40px; font-size:16px;padding: 0px 60px;'>
                                        </div>
                                        <div class="col-md-4 form-group" align="center">
                                            <label>แหล่งที่มา</label>
                                            <input class="form-control" name="no" id="no" type="text" style='height:40px; font-size:16px;'>
                                        </div>
                                        <div class="col-md-4 form-group" align="center">
                                            <label>วันที่เกิด <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                                            <input type="date" class="form-control" name="datbirth" id="datbirth" style='height:40px; font-size:16px;padding: 0px 60px;'>
                                        </div>
                                        <div class="col-md-4 form-group" align="center">
                                            <label>วันที่คัดออก <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                                            <input type="date" class="form-control" name="datdet" id="datdet" style='height:40px; font-size:16px;padding: 0px 60px;'>
                                        </div>
                                        <br>
                                    </div>
                                    <div align='center'>
                                        <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="ตกลง">
                                    </div>
                                </div>
                            </form>
                            <br>
                            <div id="Changfunction"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        select_option();
        Changfunction("A");
        $("#btnSend").click(function() {
            inser_dad();
        });

    });

    function check() {
        var elem = document.getElementById('number').value;
        if (!elem.match(/^([0-9])+$/i)) {
            alert("กรอกได้เฉพาะตัวเลขเท่านั้น");
            document.getElementById('number').value = "";
        }
    }

    function Saveedit($ID_breederdad) {
        var numberedit = parseFloat(document.getElementById("numberedit" + $ID_breederdad).value);
        var detedit = parseFloat(document.getElementById("detedit" + $ID_breederdad).value);
        var ageedit = document.getElementById("ageedit" + $ID_breederdad).value;
        var selectAedit = document.getElementById("selectAedit" + $ID_breederdad).value;
        var momedit = parseFloat(document.getElementById("momedit" + $ID_breederdad).value);
        var datfromedit = document.getElementById("datfromedit" + $ID_breederdad).value;
        var noedit = document.getElementById("noedit" + $ID_breederdad).value;
        var datbirthedit = document.getElementById("datbirthedit" + $ID_breederdad).value;
        var datdetedit = document.getElementById("datdetedit" + $ID_breederdad).value;

        var num = '';
        var num1 = '';
        var num2 = '';
        num = (numberedit.toString()).length;
        if (num == 1) {
            num = "000" + numberedit;
        } else if (num == 2) {
            num = "00" + numberedit;
        } else if (num == 3) {
            num = "0" + numberedit;
        } else {
            num = numberedit;
        }
        num1 = (detedit.toString()).length;
        if (num1 == 1) {
            num1 = "000" + detedit;
        } else if (num1 == 2) {
            num1 = "00" + detedit;
        } else if (num1 == 3) {
            num1 = "0" + detedit;
        } else {
            num1 = detedit;
        }
        num2 = (momedit.toString()).length;
        if (num2 == 1) {
            num2 = "000" + momedit;
        } else if (num2 == 2) {
            num2 = "00" + momedit;
        } else if (num2 == 3) {
            num2 = "0" + momedit;
        } else {
            num2 = momedit;
        }

        var jsonObj = {
            "namef": "SaveEdit",
            "ID_breederdad": $ID_breederdad,
            "numberedit": numberedit,
            "detedit": detedit,
            "ageedit": ageedit,
            "selectAedit": selectAedit,
            "momedit": momedit,
            "datfromedit": datfromedit,
            "noedit": noedit,
            "datbirthedit": datbirthedit,
            "datdetedit": datdetedit
        }

        if (String(num).length == "4") {
            if (String(num1).length == "4") {
                if (String(num2).length == "4") {
                    $.ajax({
                        type: "POST",
                        url: "controller/adddad.php",
                        data: jsonObj,
                        success: function(result) {
                            alert(result.message);
                            if (result.status == 1) {
                                window.location = 'adddad.php';
                            }
                        }
                    });
                } else {
                    alert("กรุณาใส่หมายเลขเบอร์หูแม่ของสุกรพ่อพันธู์ 4 หลัก");
                }
            } else {
                alert("กรุณาใส่หมายเลขเบอร์หูพ่อของสุกรพ่อพันธู์ 4 หลัก");
            }
        } else {
            alert("กรุณาใส่หมายเลขเบอร์หูสุกรพ่อพันธุ์ 4 หลัก");
        }
    }

    function select_option() {
        var jsonObj = {
            "namef": "select_option"
        }

        $.ajax({
            type: "POST",
            url: "controller/adddad.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option').html(result);
            }
        });
    }

    function Changfunction(value) {
        var jsonObj = {
            "namef": "Changfunction",
        }

        $.ajax({
            type: "POST",
            url: "controller/adddad.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#Changfunction').html(result);
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


    function inser_dad() {
        var number = parseFloat(document.getElementById("number").value);
        var det = parseFloat(document.getElementById("det").value);
        var age = parseFloat(document.getElementById("age").value);
        var selectA = document.getElementById("selectA").value;
        var mom = parseFloat(document.getElementById("mom").value);
        var datfrom = document.getElementById("datfrom").value;
        var no = document.getElementById("no").value;
        var datbirth = document.getElementById("datbirth").value;
        var datdet = document.getElementById("datdet").value;

        var num = '';
        var num1 = '';
        var num2 = '';
        num = (number.toString()).length;
        if (num == 1) {
            num = "000" + number;
        } else if (num == 2) {
            num = "00" + number;
        } else if (num == 3) {
            num = "0" + number;
        } else {
            num = number;
        }
        num1 = (det.toString()).length;
        if (num1 == 1) {
            num1 = "000" + det;
        } else if (num1 == 2) {
            num1 = "00" + det;
        } else if (num1 == 3) {
            num1 = "0" + det;
        } else {
            num1 = det;
        }
        num2 = (mom.toString()).length;
        if (num2 == 1) {
            num2 = "000" + mom;
        } else if (num2 == 2) {
            num2 = "00" + mom;
        } else if (num2 == 3) {
            num2 = "0" + mom;
        } else {
            num2 = mom;
        }


        var jsonObj = {
            "namef": "inser_dad",
            "number": number,
            "det": det,
            "age": age,
            "selectA": selectA,
            "mom": mom,
            "datfrom": datfrom,
            "no": no,
            "datbirth": datbirth,
            "datdet": datdet
        }

        if (num != "" && num != null) {
            if (String(num).length == "4") {
                if (num1 != "" && num1 != null) {
                    if (String(num1).length == "4") {
                        if (age != "" && age != null) {
                            if (selectA != "" && selectA != null) {
                                if (num2 != "" && num2 != null) {
                                    if (String(num2).length == "4") {
                                        if (datfrom != "" && datfrom != null) {
                                            if (datbirth != "" && datbirth != null) {
                                                if (datdet != "" && datdet != null) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "controller/adddad.php",
                                                        data: jsonObj,
                                                        success: function(result) {
                                                            alert(result.message);
                                                            document.getElementById("adddad").reset();
                                                            window.location = 'adddad.php';
                                                        }
                                                    });
                                                } else {
                                                    alert("กรุณาใส่วันที่คัดออก");
                                                }
                                            } else {
                                                alert("กรุณาใส่วันที่เกิด");
                                            }
                                        } else {
                                            alert("กรุณาใส่วันที่เข้าฝูง");
                                        }
                                    } else {
                                        alert("กรุณาใส่หมายเลขเบอร์หูแม่ของสุกรพ่อพันธู์ 4 หลัก");
                                    }
                                } else {
                                    alert("กรุณาใส่เบอร์หูแม่ของสุกรพ่อพันธู์");
                                }
                            } else {
                                alert("กรุณาเลือกสายพันธ์");
                            }
                        } else {
                            alert("กรุณาใส่อายุ");
                        }
                    } else {
                        alert("กรุณาใส่หมายเลขเบอร์หูพ่อของสุกรพ่อพันธู์ 4 หลัก");
                    }
                } else {
                    alert("กรุณาใส่เบอร์หูพ่อของสุกรพ่อพันธู์");
                }
            } else {
                alert("กรุณาใส่หมายเลขเบอร์หูสุกรพ่อพันธุ์ 4 หลัก");
            }
        } else {
            alert("กรุณาใส่เบอร์หูสุกรพ่อพันธู์");
        }
    }


    function dad_delete(ID_breederdad) {
        var jsonObj = {
            "namef": "dad_delete",
            "ID_breederdad": ID_breederdad
        }

        $.ajax({
            type: "POST",
            url: "controller/adddad.php",
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