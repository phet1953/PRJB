<?php
include 'header/head.php';
?>
<title>เพิ่มหน่วยนับขนาดยา</title>
<?php
session_start();
if ($_SESSION["ID_login"] == 'สัตวแพทย์ประจำฟาร์ม') {
  include 'header/barunitdrug.php';
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
      <h2 class="colorlib-heading">เพิ่มหน่วยนับขนาดยา</h2>
    </div>
  </div>
  <div class="row">
    <div class="colorlib-text">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo" style="border-radius: 20px">
          <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo" style="border-radius: 20px">+เพิ่มหน่วยนับขนาดยา
            </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body" style="border-radius: 20px">
            <div class="row">
              <div class="col-md-12">
                <form name="frm" method="post" action="">
                  <div class="panel-body" style="border-radius: 20px">
                    <div class="col-md-12">
                      <div class="col-md-12 form-group" align='center'>
                        <label>ชื่อหน่วยนับขนาดยา</label>
                        <input class="form-control" type="text" name="unitdrug_u" id="unitdrug_u" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" style='height:40px; font-size:16px;width: 30%;'>
                      </div>
                    </div>
                    <div align='center'>
                      <input class="btn btn-primary btn-send-message" id="btnSend" style="border-radius: 10px; height:30px; width:79px; " type="button" value="ตกลง">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <br>
            <div id="select_unitdrug"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    select_unitdrug();
    $("#btnSend").click(function() {
      inser_unitdrug();
    });
  });

  function Saveedit($ID_unitdrug) {
    var unitdrug_uedit = document.getElementById("unitdrug_uedit" + $ID_unitdrug).value;

    var jsonObj = {
      "namef": "SaveEdit",
      "ID_unitdrug": $ID_unitdrug,
      "unitdrug_uedit": unitdrug_uedit,

    }

    $.ajax({
      type: "POST",
      url: "controller/addunitdrug.php",
      data: jsonObj,
      success: function(result) {
        alert(result.message);
        if (result.status == 1) {
          window.location = 'addunitdrug.php';
        }
      }
    });
  }

  function select_unitdrug() {
    var jsonObj = {
      "namef": "select_unitdrug"
    }

    $.ajax({
      type: "POST",
      url: "controller/addunitdrug.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_unitdrug').html(result);
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

  function inser_unitdrug() {
    var ID_unitdrug = document.getElementById("ID_unitdrug").value;
    var unitdrug_u = document.getElementById("unitdrug_u").value;

    var jsonObj = {
      "namef": "inser_unitdrug",
      "ID_unitdrug": ID_unitdrug,
      "unitdrug_u": unitdrug_u,
    }
    if (unitdrug_u != "" && unitdrug_u != null) {
      $.ajax({
        type: "POST",
        url: "controller/addunitdrug.php",
        data: jsonObj,
        success: function(result) {
          alert(result.message);
          if (result.status == 1) {
            window.location = 'addunitdrug.php';
          }
        }
      });
    } else {
      alert("กรุณาใส่ หน่วยนับ [ขนาดยา]");
    }
  }

  function unitdrug_delete(ID_unitdrug) {
    var jsonObj = {
      "namef": "unitdrug_delete",
      "ID_unitdrug": ID_unitdrug
    }

    $.ajax({
      type: "POST",
      url: "controller/addunitdrug.php",
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