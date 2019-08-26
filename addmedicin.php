<?php
include 'header/head.php';
?>
<title>ข้อมูลการเพิ่มยาในฟาร์ม</title>
<?php
session_start();
if ($_SESSION["ID_login"] == 'สัตวแพทย์ประจำฟาร์ม') {
  include 'header/bareditmedicin.php';
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
      <h2 class="colorlib-heading">ข้อมูลการเพิ่มยาในฟาร์ม</h2>
    </div>
  </div>
  <div class="row">
    <div class="colorlib-text">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
          <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+ข้อมูลการเพิ่มยาในฟาร์ม
            </a>
          </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body" style="border-radius: 20px">
            <form action="" method="POST" name="" style="width: 100%">
              <div class="panel-body" style="border-radius: 20px">
                <div class="col-md-12">
                  <div class="col-md-12 form-group" align='center'>
                    <label>ชื่อยา <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                    <input class="form-control" type="text" name="medicin_m" id="medicin_m" style='height:40px; font-size:16px;width: 40%;'>
                  </div>
                  <div class="col-md-6 form-group" id="select_option1">

                  </div>
                  <div class="col-md-6 form-group" id="select_option2">

                  </div>
                  <div class="col-md-6 form-group">
                    <label>ชื่อสารออกฤทธิ์ <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                    <input class="form-control" type="text" name="act_a" id="act_a" style='height:40px; font-size:16px;width: 100%;'>
                  </div>
                  <div class="col-md-4 form-group" id="select_option3">

                  </div>
                  <div class="col-md-2 form-group">
                    <label>% ของยา <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                    <input class="form-control" type="text" name="percent_p" id="percent_p" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" style='height:40px; font-size:16px;width: 100%;'>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>เลขทะเบียนยา <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                    <input class="form-control" type="text" name="registration_r" id="registration_r" style='height:40px; font-size:16px;width: 100%;'>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>ระยะหยุดยา(วัน) <a style='color: red;'>&nbsp;&nbsp; *</a></label>
                    <input class="form-control" type="text" name="stop_s" id="stop_s" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" style='height:40px; font-size:16px;width: 100%;'>
                  </div>
                  <div class="col-md-6 form-group" id="select_option5">

                  </div>
                  <div class="col-md-6 form-group" id="select_option4">

                  </div>
                  <div class="col-md-6 form-group">
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
            <div id="select_medicin"></div>
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
    select_medicin();
    $("#btnSend").click(function() {
      inser_medicin();
    });
  });

  function Saveedit($ID_medicin) {
    var medicin_medit = document.getElementById("medicin_medit" + $ID_medicin).value;
    var selectAedit = document.getElementById("selectAedit" + $ID_medicin).value;
    var selectBedit = document.getElementById("selectBedit" + $ID_medicin).value;
    var act_aedit = document.getElementById("act_aedit" + $ID_medicin).value;
    var selectCedit = document.getElementById("selectCedit" + $ID_medicin).value;
    var percent_pedit = document.getElementById("percent_pedit" + $ID_medicin).value;
    var registration_redit = document.getElementById("registration_redit" + $ID_medicin).value;
    var stop_sedit = document.getElementById("stop_sedit" + $ID_medicin).value;
    var selectDedit = document.getElementById("selectDedit" + $ID_medicin).value;
    var use_uedit = document.getElementById("use_uedit" + $ID_medicin).value;
    var selectEedit = document.getElementById("selectEedit" + $ID_medicin).value;

    var jsonObj = {
      "namef": "SaveEdit",
      "ID_medicin": $ID_medicin,
      "medicin_medit": medicin_medit,
      "selectAedit": selectAedit,
      "selectBedit": selectBedit,
      "act_aedit": act_aedit,
      "selectCedit": selectCedit,
      "percent_pedit": percent_pedit,
      "registration_redit": registration_redit,
      "stop_sedit": stop_sedit,
      "selectDedit": selectDedit,
      "use_uedit": use_uedit,
      "selectEedit": selectEedit,

    }

    $.ajax({
      type: "POST",
      url: "controller/addmedicin.php",
      data: jsonObj,
      success: function(result) {
        alert(result.message);
        if (result.status == 1) {
          window.location = 'addmedicin.php';
        }
      }
    });
  }

  function select_option1() {
    var jsonObj = {
      "namef": "select_option1"
    }

    $.ajax({
      type: "POST",
      url: "controller/addmedicin.php",
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
      url: "controller/addmedicin.php",
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
      url: "controller/addmedicin.php",
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
      url: "controller/addmedicin.php",
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
      url: "controller/addmedicin.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_option5').html(result);
      }
    });
  }

  function select_medicin() {
    var jsonObj = {
      "namef": "select_medicin"
    }

    $.ajax({
      type: "POST",
      url: "controller/addmedicin.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_medicin').html(result);
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

  function inser_medicin() {
    var selectA = document.getElementById("selectA").value;
    var medicin_m = document.getElementById("medicin_m").value;
    var selectB = document.getElementById("selectB").value;
    var act_a = document.getElementById("act_a").value;
    var selectC = document.getElementById("selectC").value;
    var percent_p = document.getElementById("percent_p").value;
    var registration_r = document.getElementById("registration_r").value;
    var stop_s = document.getElementById("stop_s").value;
    var selectD = document.getElementById("selectD").value;
    var use_u = document.getElementById("use_u").value;
    var selectE = document.getElementById("selectE").value;

    var jsonObj = {
      "namef": "inser_medicin",
      "selectA": selectA,
      "medicin_m": medicin_m,
      "selectB": selectB,
      "act_a": act_a,
      "selectC": selectC,
      "percent_p": percent_p,
      "registration_r": registration_r,
      "stop_s": stop_s,
      "selectD": selectD,
      "use_u": use_u,
      "selectE": selectE,
    }
    if (selectA != "" && selectA != null) {
      if (medicin_m != "" && medicin_m != null) {
        if (selectB != "" && selectB != null) {
          if (act_a != "" && act_a != null) {
            if (selectC != "" && selectC != null) {
              if (percent_p != "" && percent_p != null) {
                if (registration_r != "" && registration_r != null) {
                  if (stop_s != "" && stop_s != null) {
                    if (selectD != "" && selectD != null) {
                      if (selectE != "" && selectE != null) {
                        $.ajax({
                          type: "POST",
                          url: "controller/addmedicin.php",
                          data: jsonObj,
                          success: function(result) {
                            alert(result.message);
                            if (result.status == 1) {
                              window.location = 'addmedicin.php';
                            }
                          }
                        });
                      } else {
                        alert("กรุณาใส่จุดประสงค์การใช้ยา");
                      }
                    } else {
                      alert("กรุณาใส่ชื่อบริษัท");
                    }
                  } else {
                    alert("กรุณาใส่ระยะหยุดยา(วัน)");
                  }
                } else {
                  alert("กรุณาใส่เลขทะเบียนยา");
                }
              } else {
                alert("กรุณาใส่ % ของยา");
              }
            } else {
              alert("กรุณาใส่วิธีการให้ยา");
            }
          } else {
            alert("กรุณาใส่ชื่อสารออกฤทธิ์");
          }
        } else {
          alert("กรุณาใส่ขนาดการใช้ยา");
        }
      } else {
        alert("กรุณาใส่ชื่อยา");
      }
    } else {
      alert("กรุณาใส่ขนาดยา");
    }
  }

  function medicin_delete(ID_medicin) {
    var jsonObj = {
      "namef": "medicin_delete",
      "ID_medicin": ID_medicin
    }

    $.ajax({
      type: "POST",
      url: "controller/addmedicin.php",
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