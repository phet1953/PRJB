<?php
include 'header/head.php';
?>
<title>เงื่อนไขในการคัดทิ้ง</title>
<?php
session_start();
if ($_SESSION["ID_login"] == 'แอดมิน') {
  include 'header/barcullmom.php';
} else {
  session_destroy();
  header("location:login.php");
  exit();
}
?>
<style>
  select {
    text-align: center;
    text-align-last: center;
  }

  option {
    text-align: left;
  }
</style>
<script src="js/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>
<div class="colorlib-narrow-content cllx">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
      <h2 class="colorlib-heading">เงื่อนไขในการคัดทิ้ง</h2>
    </div>
  </div>
  <div class="row">
    <div class="colorlib-text">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree" style="border-radius: 20px">
          <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree" style="border-radius: 20px">+เลือกเงื่อนไขการคัดทิ้ง
            </a>
          </h4>
        </div>
        <div class="panel-body" style="border-radius: 20px">
          <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body" style="border-radius: 20px">
              <div class="col-md-7">
                <table border="2" cellspacing="2" cellpadding="2" width="100%" align="center" style="border: 5px double #6d6d46">
                  <tbody>
                    <tr>
                      <td align="center" valign="middle" style="border: 2px dashed #ebebe0">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center" style="background-color: #f5f5ef">
                          <tbody>
                            <tr>
                              <td align="center" valign="middle" style="background-image: url(http://www.yenta4.com/cutie/upload/7/7/465571981930b.gif); height: 20px"></td>
                            </tr>
                            <tr>
                              <td align="center" valign="middle">
                                <p>
                                  <font size="5" color="#6d6d46">เงื่อนไขการคัดทิ้ง</font>
                                </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table border="2" cellspacing="2" cellpadding="2" width="100%" align="center" style="border: 5px double #6d6d46">
                  <tbody>
                    <tr>
                      <td align="center" valign="middle">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center" style="background-color: #ebebe0">
                          <tbody>
                            <tr>
                              <td align="center" valign="middle" style="background-image: url(http://www.yenta4.com/cutie/upload/7/7/465571981930b.gif); height: 20px"></td>
                            </tr><br>
                            <div id="select_activity"></div>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-5">
                <div class="super-selector form-group">
                  <div class="items">
                    <div class="item form-group clearfix">
                      <div id="select_option" class="col-md-5" style='padding-left: 0px;padding-right: 0px;'>
                      </div>
                      <div class="col-md-4">
                        <input class="form-control cull-input" id="number_proviso" name="number_proviso" type='number' maxlength="3">
                        <form id='txt' style='margin-top: -40px;margin-left: 60px;'></form>
                      </div>
                      <div class="col-md-3">
                        <input class="btn btn-primary btn-send-message cull-button" id="btnSend" type="button" value="เพิ่ม">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="super-selector form-group">
                  <div class="items">
                    <div class="item form-group clearfix">
                      <div class="col-md-5" style='padding-left: 0px;padding-right: 0px;'>
                        <div id="select_option1">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><br>
            <div id="selectshow"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    select_option();
    select_option1();
    select_activity();
    selectshow();
    $("#btnSend").click(function() {
      inser_cullmom();
    });

  });

  function Saveedit($ID_proviso) {
    var name_provisoedit = document.getElementById("name_provisoedit" + $ID_proviso).value;
    var number_provisoedit = document.getElementById("number_provisoedit" + $ID_proviso).value;

    var jsonObj = {
      "namef": "SaveEdit",
      "ID_proviso": $ID_proviso,
      "name_provisoedit": name_provisoedit,
      "number_provisoedit": number_provisoedit,

    }

    $.ajax({
      type: "POST",
      url: "controller/cullmom.php",
      data: jsonObj,
      success: function(result) {
        alert(result.message);
        if (result.status == 1) {
          window.location = 'cullmom.php';
        }
      }
    });
  }

  function ChangOptionmom() {
    var name_proviso = document.getElementById("name_proviso").value;
    var txt = '';
    if (name_proviso == 'ผสม') {
      txt = '/ตัว';
    } else if (name_proviso == 'ได้รับยา') {
      txt = '/ซีซี';
    } else if (name_proviso == 'ป่วย') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'ทำวัคซีน') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'กลับสัด') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'ตาย') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'ตรวจท้อง') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'แท้ง') {
      txt = '/ตัว';
    } else if (name_proviso == 'คลอด') {
      txt = '/ตัว';
    } else if (name_proviso == 'ฝากเลี้ยง') {
      txt = '/ตัว';
    } else if (name_proviso == 'รับเลี้ยง') {
      txt = '/ตัว';
    } else if (name_proviso == 'หย่านม') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'ลูกหมูตาย') {
      txt = '/ตัว';
    } else if (name_proviso == 'ท้องลม') {
      txt = '/ครั้ง';
    }


    document.getElementById("txt").innerHTML = txt;
  }

  function inser_cullmom() {
    var name_proviso = document.getElementById("name_proviso").value;
    var number_proviso = document.getElementById("number_proviso").value;
    var txt = '';
    if (name_proviso == 'ผสม') {
      txt = '/ตัว';
    } else if (name_proviso == 'ได้รับยา') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'ป่วย') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'ทำวัคซีน') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'กลับสัด') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'ตาย') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'ตรวจท้อง') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'แท้ง') {
      txt = '/ตัว';
    } else if (name_proviso == 'คลอด') {
      txt = '/ตัว';
    } else if (name_proviso == 'ฝากเลี้ยง') {
      txt = '/ตัว';
    } else if (name_proviso == 'รับเลี้ยง') {
      txt = '/ตัว';
    } else if (name_proviso == 'หย่านม') {
      txt = '/ครั้ง';
    } else if (name_proviso == 'ลูกหมูตาย') {
      txt = '/ตัว';
    } else if (name_proviso == 'ท้องลม') {
      txt = '/ครั้ง';
    }
    document.getElementById("txt").innerHTML = txt;

    var jsonObj = {
      "namef": "inser_cullmom",
      "name_proviso": name_proviso,
      "number_proviso": number_proviso,
      "txt": txt,
    }
    if (name_proviso != "" && name_proviso != null) {
      if (number_proviso != "" && number_proviso != null) {
        $.ajax({
          type: "POST",
          url: "controller/cullmom.php",
          data: jsonObj,
          success: function(result) {
            alert(result.message);
            if (result.status == 1) {
              window.location = 'cullmom.php';
            }
          }
        });
      } else {
        alert("กรุณาใส่กรอกข้อมูล");
      }
    } else {
      alert("กรุณาใส่กรอกข้อมูล");
    }

  }

  function selectshow() {
    var jsonObj = {
      "namef": "selectshow"
    }

    $.ajax({
      type: "POST",
      url: "controller/cullmom.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#selectshow').html(result);
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

  function select_activity() {
    var jsonObj = {
      "namef": "select_activity"
    }

    $.ajax({
      type: "POST",
      url: "controller/cullmom.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_activity').html(result);
      }
    });
  }


  function select_option() {
    var jsonObj = {
      "namef": "select_option"
    }

    $.ajax({
      type: "POST",
      url: "controller/cullmom.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_option').html(result);
      }
    });
  }

  function select_option1() {
    var jsonObj = {
      "namef": "select_option1"
    }

    $.ajax({
      type: "POST",
      url: "controller/cullmom.php",
      data: jsonObj,
      dataType: "html",
      success: function(result) {
        $('#select_option1').html(result);
      }
    });
  }

  function delete_proviso() {
    var ID_proviso = document.getElementById("ID_proviso").value;

    var jsonObj = {
      "namef": "delete_proviso",
      "ID_proviso": ID_proviso,
    }

    $.ajax({
      type: "POST",
      url: "controller/cullmom.php",
      data: jsonObj,
      success: function(result) {
        alert(result.message);
        if (result.status == 1) {
          window.location = 'cullmom.php';
        }
      }
    });
  }

  function delete_proviso1(ID_proviso) {
    var jsonObj = {
      "namef": "delete_proviso1",
      "ID_proviso": ID_proviso,
    }

    $.ajax({
      type: "POST",
      url: "controller/cullmom.php",
      data: jsonObj,
      success: function(result) {
        alert(result.message);
        if (result.status == 1) {
          $("#" + result.num).hide();
        }
      }
    });
  }

  function create_proviso() {
    var ID_proviso = document.getElementById("ID_proviso").value;

    var jsonObj = {
      "namef": "create_proviso",
      "ID_proviso": ID_proviso,
    }

    $.ajax({
      type: "POST",
      url: "controller/cullmom.php",
      data: jsonObj,
      success: function(result) {
        alert(result.message);
        if (result.status == 1) {
          window.location = 'cullmom.php';
        }
      }
    });
  }
</script>
<script>
  var $superSelector = $('.super-selector');

  function syncOptions() {
    var $selects = $('.super-selector select');

    // Create empty array to store the selected values
    var selectedValue = [];

    // Get all selected options and filter them to get only options with value attr (to skip the default options). After that push the values to the array.
    $selects.find(':selected').filter(function(idx, el) {
      return $(el).attr('value');
    }).each(function(idx, el) {
      selectedValue.push($(el).attr('value'));
    });
    // Loop all the options
    $selects.find('option').each(function(idx, option) {
      // If the array contains the current option value otherwise we re-enable it.
      if (selectedValue.indexOf($(option).attr('value')) > -1) {
        // If the current option is the selected option, we skip it otherwise we disable it.
        if ($(option).is(':checked')) {
          return;
        } else {
          $(this).attr('disabled', true);
        }
      } else {
        $(this).attr('disabled', false);
      }
    });
  }

  // Add a new item
  $superSelector.on('click', '.js-add-select', function(e) {
    e.preventDefault();

    // Clone the first item
    var clone = $superSelector.find('.item:first-child').clone();

    // Clear the values
    clone.find('input').attr('name', 'number_proviso');
    clone.find('input').val('');

    // Append the clone
    $superSelector.find('.items').append(clone);

    // Sync
    syncOptions();
  });

  // Set the selected value to to siblings input name
  $superSelector.on('change', 'select', function() {
    $(this).siblings('input').attr('name', $(this).val());
    syncOptions();
  });

  // Remove item
  $superSelector.on('click', '.item .js-remove-item', function() {
    $(this).closest('.item').remove();
    syncOptions();
  });
</script>
<?PHP
include 'script/script.php';
?>