<?php
include 'header/head.php';
?>
<title>เพิ่มข้อมูลกิจกรรม</title>
<?php
session_start();
if ($_SESSION["ID_login"] == 'แอดมิน') {
    include 'header/barsaveac.php';
} else if ($_SESSION["ID_login"] == 'เจ้าหน้าที่ประจำฟาร์ม') {
    include 'header/barsaveac_st.php';
} else if ($_SESSION["ID_login"] == 'สัตวแพทย์ประจำฟาร์ม') {
    include 'header/barsaveac_ve.php';
} else {
    session_destroy();
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
            <h2 class="colorlib-heading">เพิ่มข้อมูลกิจกรรม</h2>
        </div>
    </div>
    <div class="row row-bottom-padded-md">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="colorlib-text">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+บันทึกข้อมูลกิจกรรม
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body" style="border-radius: 20px">
                                    <div class="col-md-3">
                                        <form action="" method="post">
                                            <div class="content">
                                                <!--##########  ----------------  เบอร์หู -------          ################-->
                                                <div class="form-group">
                                                    <div class="form-select js-form-select">
                                                        <div id="select_option1"></div>

                                                    </div>
                                                </div>
                                                <!--##########  ----------------  วันที่บันทึก -------          ################-->
                                                <div class="form-group">
                                                    <div class="form-select js-form-select">
                                                        <label class="form-select__label">วันที่บันทึก </label>
                                                        <input class='form-control' type="date" name="date_d" id="date_d" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                </div>
                                                <!--##########  ----------------  เหตุการณ์กิจกรรม -------          ################-->
                                                <div class="form-group">
                                                    <div class="form-select js-form-select">
                                                        <div id='select_option2'></div>

                                                    </div>
                                                </div>
                                                <!--##########  ----------------  ผสม -------          ################-->
                                                <div id="ผสม" style="display:none">
                                                    <div id="select_option3"></div>

                                                    <br>
                                                </div>
                                                <!--##########  ----------------  ได้รับยา -------          ################-->
                                                <div id="ได้รับยา" style="display:none">
                                                    <div id="select_option4"></div>

                                                    <div>
                                                        <label>ปริมาณ</label>
                                                        <input class="form-control" type="text" name="volume_getmedicin" id="volume_getmedicin" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <br>
                                                </div>
                                                <!--##########  ----------------  ป่วย -------          ################-->
                                                <div id="ป่วย" style="display:none">
                                                    <div id="select_option5"></div>

                                                    <div>
                                                        <label>หมายเหตุ</label>
                                                        <input class="form-control" type="text" name="note_sick" id="note_sick" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <br>
                                                </div>
                                                <!--##########  ----------------  ทำวัคซีน -------          ################-->
                                                <div id="ทำวัคซีน" style="display:none">
                                                    <div id="select_option6"></div>

                                                    <br>
                                                </div>
                                                <!--##########  ----------------  กลับสัด -------          ################-->
                                                <div id="กลับสัด" style="display:none">
                                                    <div>
                                                        <label>หมายเหตุ</label>
                                                        <input class="form-control" type="text" name="note_inreturn_animal" id="note_inreturn_animal" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <br>
                                                </div>
                                                <!--##########  ----------------  ตาย -------          ################-->
                                                <div id="ตาย" style="display:none">
                                                    <div>
                                                        <label>หมายเหตุ</label>
                                                        <input class="form-control" type="text" name="note_dead" id="note_dead" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <br>
                                                </div>
                                                <!--##########  ----------------  ตรวจท้อง -------          ################-->
                                                <div id="ตรวจท้อง" style="display:none">
                                                    <div id="select_option7"></div>

                                                    <div>
                                                        <label>กำหนดคลอด</label>
                                                        <input class="form-control" type="date" name="define_check_up" id="define_check_up" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <br>
                                                </div>
                                                <!--##########  ----------------  แท้ง -------          ################-->
                                                <div id="แท้ง" style="display:none">
                                                    <div>
                                                        <label>ข้อความ</label>
                                                        <input class="form-control" type="text" name="text_abortion" id="text_abortion" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <div>
                                                        <label>อายุที่แท้ง</label>
                                                        <input class="form-control" type="text" name="abortion_abortion" id="abortion_abortion" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <br>
                                                </div>
                                                <!--##########  ----------------  คลอด -------          ################-->
                                                <div id="คลอด" style="display:none">
                                                    <div>
                                                        <label>ลูกทั้งหมด</label>
                                                        <input class="form-control" type="text" name="allpigs_deliver" id="allpigs_deliver" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <div>
                                                        <label>ลูกมีชีวิต</label>
                                                        <input class="form-control" type="text" name="piglet_alive_deliver" id="piglet_alive_deliver" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <div>
                                                        <label>ตายแรกคลอด</label>
                                                        <input class="form-control" type="text" name="dead_pig_birth_deliver" id="dead_pig_birth_deliver" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <div>
                                                        <label>ลูกกรอก</label>
                                                        <input class="form-control" type="text" name="eooukornou_deliver" id="eooukornou_deliver" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <div>
                                                        <label>นน.ครอก</label>
                                                        <input class="form-control" type="text" name="pork_litter_deliver" id="pork_litter_deliver" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <div>
                                                        <label>เฉลี่ย นน.ลูกสุกร</label>
                                                        <input class="form-control" type="text" name="average_piglets_deliver" id="average_piglets_deliver" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <br>
                                                </div>
                                                <!--##########  ----------------  ฝากเลี้ยง -------          ################-->
                                                <div id="ฝากเลี้ยง" style="display:none">
                                                    <div>
                                                        <label>จำนวน</label>
                                                        <input class="form-control" type="text" name="number_deposit_piglet" id="number_deposit_piglet" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <div id="select_option8"></div>

                                                    <br>
                                                </div>
                                                <!--##########  ----------------  รับเลี้ยง -------          ################-->
                                                <div id="รับเลี้ยง" style="display:none">
                                                    <div>
                                                        <label>จำนวน</label>
                                                        <input class="form-control" type="text" name="number_piglet" id="number_piglet" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <div id="select_option9"></div>

                                                    <br>
                                                </div>
                                                <!--##########  ----------------  หย่านม -------          ################-->
                                                <div id="หย่านม" style="display:none">
                                                    <div>
                                                        <label>จำนวน</label>
                                                        <input class="form-control" type="text" name="number_wean" id="number_wean" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <div>
                                                        <label>นน.ครอก</label>
                                                        <input class="form-control" type="text" name="pork_litter_wean" id="pork_litter_wean" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <br>
                                                </div>
                                                <!--##########  ----------------  ลูกหมูตาย -------          ################-->
                                                <div id="ลูกหมูตาย" style="display:none">
                                                    <div>
                                                        <label>จำนวน :</label>
                                                        <input class="form-control" type="text" name="number_piglet_dies" id="number_piglet_dies" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <div id="select_option10"></div>

                                                    <div>
                                                        <label>หมายเหตุ</label>
                                                        <input class="form-control" type="text" name="note_piglet_dies" id="note_piglet_dies" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    </div>
                                                    <br>
                                                </div>
                                                <!--##########  ----------------  ท้องลม -------          ################-->
                                                <div id="ท้องลม" style="display:none">
                                                    <label>ข้อความ</label>
                                                    <input class="form-control" type="text" name="text_wind_belly" id="text_wind_belly" style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                                                    <br>
                                                </div>
                                                <!--##########  ----------------  button -------          ################-->
                                                <div align='center'>
                                                    <input class="btn btn-primary" id="btnSend" onclick='inser_saveac()' style="border-radius: 16px;height: 32px;width: 76px;margin-left: -16px;" type="button" value="ตกลง">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--##########  ----------------  สิ้นสุดส่วนกรอกข้อมูล -------          ################-->
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="table" class="table-editable">
                                                    <div id="Changfunction"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--##########  ----------------  แสดงข้อมูล -------          ################-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        select_option1();
        select_option2();
        select_option3();
        select_option4();
        select_option5();
        select_option6();
        select_option7();
        select_option8();
        select_option9();
        select_option10();
        Changfunction("A");
    });

    function Changfunction(value, value2) {
        var breeder_b = (value == "A" ? '' : document.getElementById("breeder_b").value);
        var jsonObj = {
            "namef": "Changfunction",
            "breeder_b": breeder_b,
        }

        $.ajax({
            type: "POST",
            url: "controller/addsaveac.php",
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

    function ChangOption() {
        var viewID = document.getElementById("even").value;
        $("#even option").each(function() {
            var hideID = $(this).val();
            $("#" + hideID).hide();
            $("#ya").val('');
        });
        $("#" + viewID).show();
    }

    function inser_saveac() {
        var breeder_b = document.getElementById("breeder_b").value;
        var date_d = document.getElementById("date_d").value;
        var even = document.getElementById("even").value;
        var breederdad_breed = document.getElementById("breederdad_breed").value;
        var medicin_getmedicin = document.getElementById("medicin_getmedicin").value;
        var volume_getmedicin = document.getElementById("volume_getmedicin").value;
        var sick_sick = document.getElementById("sick_sick").value;
        var note_sick = document.getElementById("note_sick").value;
        var drug_drug = document.getElementById("drug_drug").value;
        var note_inreturn_animal = document.getElementById("note_inreturn_animal").value;
        var note_dead = document.getElementById("note_dead").value;
        var results_check_up = document.getElementById("results_check_up").value;
        var define_check_up = document.getElementById("define_check_up").value;
        var text_abortion = document.getElementById("text_abortion").value;
        var abortion_abortion = document.getElementById("abortion_abortion").value;
        var allpigs_deliver = document.getElementById("allpigs_deliver").value;
        var piglet_alive_deliver = document.getElementById("piglet_alive_deliver").value;
        var dead_pig_birth_deliver = document.getElementById("dead_pig_birth_deliver").value;
        var eooukornou_deliver = document.getElementById("eooukornou_deliver").value;
        var pork_litter_deliver = document.getElementById("pork_litter_deliver").value;
        var average_piglets_deliver = document.getElementById("average_piglets_deliver").value;
        var number_deposit_piglet = document.getElementById("number_deposit_piglet").value;
        var breder_deposit_piglet = document.getElementById("breder_deposit_piglet").value;
        var number_piglet = document.getElementById("number_piglet").value;
        var breder_piglet = document.getElementById("breder_piglet").value;
        var number_wean = document.getElementById("number_wean").value;
        var pork_litter_wean = document.getElementById("pork_litter_wean").value;
        var number_piglet_dies = document.getElementById("number_piglet_dies").value;
        var cause_piglet_dies = document.getElementById("cause_piglet_dies").value;
        var note_piglet_dies = document.getElementById("note_piglet_dies").value;
        var text_wind_belly = document.getElementById("text_wind_belly").value;

        var jsonObj = {
            "namef": "inser_saveac",
            "breeder_b": breeder_b,
            "date_d": date_d,
            "even": even,
            "breederdad_breed": breederdad_breed,
            "medicin_getmedicin": medicin_getmedicin,
            "volume_getmedicin": volume_getmedicin,
            "sick_sick": sick_sick,
            "note_sick": note_sick,
            "drug_drug": drug_drug,
            "note_inreturn_animal": note_inreturn_animal,
            "note_dead": note_dead,
            "results_check_up": results_check_up,
            "define_check_up": define_check_up,
            "text_abortion": text_abortion,
            "abortion_abortion": abortion_abortion,
            "allpigs_deliver": allpigs_deliver,
            "piglet_alive_deliver": piglet_alive_deliver,
            "dead_pig_birth_deliver": dead_pig_birth_deliver,
            "eooukornou_deliver": eooukornou_deliver,
            "pork_litter_deliver": pork_litter_deliver,
            "average_piglets_deliver": average_piglets_deliver,
            "number_deposit_piglet": number_deposit_piglet,
            "breder_deposit_piglet": breder_deposit_piglet,
            "number_piglet": number_piglet,
            "breder_piglet": breder_piglet,
            "number_wean": number_wean,
            "pork_litter_wean": pork_litter_wean,
            "number_piglet_dies": number_piglet_dies,
            "cause_piglet_dies": cause_piglet_dies,
            "note_piglet_dies": note_piglet_dies,
            "text_wind_belly": text_wind_belly,

        }

        if (breeder_b != "" && breeder_b != null) {
            if (date_d != "" && date_d != null) {
                if (even != "" && even != null) {
                    $.ajax({
                        type: "POST",
                        url: "controller/addsaveac.php",
                        data: jsonObj,
                        success: function(result) {

                            if (result.status == 1) {
                                alert(result.message);
                                window.location = 'addsaveac.php';
                            } else {
                                alert(result.message);
                            }
                        }
                    });
                } else {
                    alert("กรุณาใส่เหตุการณ์กิจกรรม");
                }
            } else {
                alert("กรุณาใส่วันที่บันทึก ");
            }
        } else {
            alert("กรุณาใส่เบอร์หูของแม่พันธุ์หมู");
        }
    }



    function select_option1() {
        var jsonObj = {
            "namef": "select_option1"
        }

        $.ajax({
            type: "POST",
            url: "controller/addsaveac.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option1').html(result);
            }
        });
    }

    function select_option2() {
        var jsonObj = {
            "namef": "select_option2"
        }

        $.ajax({
            type: "POST",
            url: "controller/addsaveac.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option2').html(result);
            }
        });
    }

    function select_option3() {
        var jsonObj = {
            "namef": "select_option3"
        }

        $.ajax({
            type: "POST",
            url: "controller/addsaveac.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option3').html(result);
            }
        });
    }

    function select_option4() {
        var jsonObj = {
            "namef": "select_option4"
        }

        $.ajax({
            type: "POST",
            url: "controller/addsaveac.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option4').html(result);
            }
        });
    }

    function select_option5() {
        var jsonObj = {
            "namef": "select_option5"
        }

        $.ajax({
            type: "POST",
            url: "controller/addsaveac.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option5').html(result);
            }
        });
    }

    function select_option6() {
        var jsonObj = {
            "namef": "select_option6"
        }

        $.ajax({
            type: "POST",
            url: "controller/addsaveac.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option6').html(result);
            }
        });
    }

    function select_option7() {
        var jsonObj = {
            "namef": "select_option7"
        }

        $.ajax({
            type: "POST",
            url: "controller/addsaveac.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option7').html(result);
            }
        });
    }

    function select_option8() {
        var jsonObj = {
            "namef": "select_option8"
        }

        $.ajax({
            type: "POST",
            url: "controller/addsaveac.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option8').html(result);
            }
        });
    }

    function select_option9() {
        var jsonObj = {
            "namef": "select_option9"
        }

        $.ajax({
            type: "POST",
            url: "controller/addsaveac.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option9').html(result);
            }
        });
    }

    function select_option10() {
        var jsonObj = {
            "namef": "select_option10"
        }

        $.ajax({
            type: "POST",
            url: "controller/addsaveac.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_option10').html(result);
            }
        });
    }
</script>
<?PHP
include 'script/script.php';
?>