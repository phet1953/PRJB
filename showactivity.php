<?php
include 'header/head.php';
?>
<title>ตารางแสดงกิจกรรมสุกรแม่พันธ์ุ</title>
<?php
session_start();
if ($_SESSION["ID_login"] == 'แอดมิน') {
    include 'header/barshowac.php';
} else {
    session_destroy();
    header("location:login.php");
    exit();
}
?>
<link rel="stylesheet" href="css/newcss.css">
<script src="js/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>
<div class="colorlib-narrow-content cllx">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
            <h2 class="colorlib-heading">ประวัติกิจกรรมสุกร</h2>
        </div>
    </div>
    <div class="row">
        <div class="colorlib-text">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo" style="border-radius: 20px">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo" style="border-radius: 20px">ประวัติกิจกรรมสุกร
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body" style="border-radius: 20px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div id="table" class="table-editable">
                                        <div id="select_showactivity" style='margin-top: 10px;'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        select_showactivity("a");
    });

    function Saveedit($ID_activity_record, $even1) {
        var breederdad_breededit = "";
        var medicin_getmedicinedit = "";
        var volume_getmedicinedit = "";
        var sick_sickedit = "";
        var note_sickedit = "";
        var drug_drugedit = "";
        var note_inreturn_animaledit = "";
        var note_deadedit = "";
        var results_check_upedit = "";
        var define_check_upedit = "";
        var text_abortionedit = "";
        var abortion_abortionedit = "";
        var allpigs_deliveredit = "";
        var piglet_alive_deliveredit = "";
        var dead_pig_birth_deliveredit = "";
        var eooukornou_deliveredit = "";
        var pork_litter_deliveredit = "";
        var average_piglets_deliveredit = "";
        var number_deposit_pigletedit = "";
        var breder_deposit_pigletedit = "";
        var number_pigletedit = "";
        var breder_pigletedit = "";
        var number_weanedit = "";
        var pork_litter_weanedit = "";
        var number_piglet_diesedit = "";
        var cause_piglet_diesedit = "";
        var note_piglet_diesedit = "";
        var text_wind_bellyedit = "";

        if ($even1 == 'ผสม') {
            breederdad_breededit = document.getElementById("breederdad_breededit" + $ID_activity_record).value;
        } else if ($even1 == 'ได้รับยา') {
            medicin_getmedicinedit = document.getElementById("medicin_getmedicinedit" + $ID_activity_record).value;
            volume_getmedicinedit = document.getElementById("volume_getmedicinedit" + $ID_activity_record).value;
        } else if ($even1 == 'ป่วย') {
            sick_sickedit = document.getElementById("sick_sickedit" + $ID_activity_record).value;
            note_sickedit = document.getElementById("note_sickedit" + $ID_activity_record).value;
        } else if ($even1 == 'ทำวัคซีน') {
            drug_drugedit = document.getElementById("drug_drugedit" + $ID_activity_record).value;
        } else if ($even1 == 'กลับสัด') {
            note_inreturn_animaledit = document.getElementById("note_inreturn_animaledit" + $ID_activity_record).value;
        } else if ($even1 == 'ตาย') {
            note_deadedit = document.getElementById("note_deadedit" + $ID_activity_record).value;
        } else if ($even1 == 'ตรวจท้อง') {
            results_check_upedit = document.getElementById("results_check_upedit" + $ID_activity_record).value;
            define_check_upedit = document.getElementById("define_check_upedit" + $ID_activity_record).value;
        } else if ($even1 == 'แท้ง') {
            text_abortionedit = document.getElementById("text_abortionedit" + $ID_activity_record).value;
            abortion_abortionedit = document.getElementById("abortion_abortionedit" + $ID_activity_record).value;
        } else if ($even1 == 'คลอด') {
            allpigs_deliveredit = document.getElementById("allpigs_deliveredit" + $ID_activity_record).value;
            piglet_alive_deliveredit = document.getElementById("piglet_alive_deliveredit" + $ID_activity_record).value;
            dead_pig_birth_deliveredit = document.getElementById("dead_pig_birth_deliveredit" + $ID_activity_record).value;
            eooukornou_deliveredit = document.getElementById("eooukornou_deliveredit" + $ID_activity_record).value;
            pork_litter_deliveredit = document.getElementById("pork_litter_deliveredit" + $ID_activity_record).value;
            average_piglets_deliveredit = document.getElementById("average_piglets_deliveredit" + $ID_activity_record).value;
        } else if ($even1 == 'ฝากเลี้ยง') {
            number_deposit_pigletedit = document.getElementById("number_deposit_pigletedit" + $ID_activity_record).value;
            breder_deposit_pigletedit = document.getElementById("breder_deposit_pigletedit" + $ID_activity_record).value;
        } else if ($even1 == 'รับเลี้ยง') {
            number_pigletedit = document.getElementById("number_pigletedit" + $ID_activity_record).value;
            breder_pigletedit = document.getElementById("breder_pigletedit" + $ID_activity_record).value;
        } else if ($even1 == 'หย่านม') {
            number_weanedit = document.getElementById("number_weanedit" + $ID_activity_record).value;
            pork_litter_weanedit = document.getElementById("pork_litter_weanedit" + $ID_activity_record).value;
        } else if ($even1 == 'ลูกหมูตาย') {
            number_piglet_diesedit = document.getElementById("number_piglet_diesedit" + $ID_activity_record).value;
            cause_piglet_diesedit = document.getElementById("cause_piglet_diesedit" + $ID_activity_record).value;
            note_piglet_diesedit = document.getElementById("note_piglet_diesedit" + $ID_activity_record).value;
        } else if ($even1 == 'ท้องลม') {
            text_wind_bellyedit = document.getElementById("text_wind_bellyedit" + $ID_activity_record).value;
        }


        var jsonObj = {
            "namef": "SaveEdit",
            "even1": $even1,
            "ID_activity_record": $ID_activity_record,
            "breederdad_breededit": breederdad_breededit,
            "medicin_getmedicinedit": medicin_getmedicinedit,
            "volume_getmedicinedit": volume_getmedicinedit,
            "sick_sickedit": sick_sickedit,
            "note_sickedit": note_sickedit,
            "drug_drugedit": drug_drugedit,
            "note_inreturn_animaledit": note_inreturn_animaledit,
            "note_deadedit": note_deadedit,
            "results_check_upedit": results_check_upedit,
            "define_check_upedit": define_check_upedit,
            "text_abortionedit": text_abortionedit,
            "abortion_abortionedit": abortion_abortionedit,
            "allpigs_deliveredit": allpigs_deliveredit,
            "piglet_alive_deliveredit": piglet_alive_deliveredit,
            "dead_pig_birth_deliveredit": dead_pig_birth_deliveredit,
            "eooukornou_deliveredit": eooukornou_deliveredit,
            "pork_litter_deliveredit": pork_litter_deliveredit,
            "average_piglets_deliveredit": average_piglets_deliveredit,
            "number_deposit_pigletedit": number_deposit_pigletedit,
            "breder_deposit_pigletedit": breder_deposit_pigletedit,
            "number_pigletedit": number_pigletedit,
            "breder_pigletedit": breder_pigletedit,
            "number_weanedit": number_weanedit,
            "pork_litter_weanedit": pork_litter_weanedit,
            "number_piglet_diesedit": number_piglet_diesedit,
            "cause_piglet_diesedit": cause_piglet_diesedit,
            "note_piglet_diesedit": note_piglet_diesedit,
            "text_wind_bellyedit": text_wind_bellyedit,

        }

        $.ajax({
            type: "POST",
            url: "controller/showactivity.php",
            data: jsonObj,
            success: function(result) {
                alert(result.message);
                if (result.status == 1) {
                    window.location = 'showactivity.php';
                }
            }
        });
    }

    function select_showactivity(selectd, value) {

        var jsonObj = {
            "namef": "select_showactivity",
        }

        $.ajax({
            type: "POST",
            url: "controller/showactivity.php",
            data: jsonObj,
            dataType: "html",
            success: function(result) {
                $('#select_showactivity').html(result);
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

    function delete_activity_record(ID_activity_record) {
        var jsonObj = {
            "namef": "delete_activity_record",
            "ID_activity_record": ID_activity_record
        }

        $.ajax({
            type: "POST",
            url: "controller/showactivity.php",
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