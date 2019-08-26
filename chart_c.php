<?php
include 'header/head.php';
?>
<title>กราฟแสดงข้อมูล</title>
<style>
    #dynamic_data {
        border: 1px solid gray;
        border-radius: 10px;
        padding: 10px;
        text-decoration: none;
        float: left;
        margin: 4px;
        text-align: center;
        display: block;
        color: green;
    }
</style>
<?php
session_start();
if ($_SESSION["ID_login"] == 'แอดมิน') {
    include 'header/barechart.php';
} else {
    session_destroy();
    header("location:login.php");
    include 'login.php';
    exit();
}
?>
<script src="js/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>
<select id="dynamic_data" style="margin-left: 300px;margin-top: 30px;">
    <option value="">เลือกรายการ</option>
    <option value="จำนวนพ่อพันธุ์-แม่พันธุ์">จำนวนพ่อพันธุ์-แม่พันธุ์</option>
    <option value="กิจกรรม">กิจกรรม</option>
    <option value="กำหนดวันเดือนปี">กำหนดวันเดือนปี</option>
    <option value="แสดงข้อมูลการโดนคัดทิ้งแบบผ่านเงื่อนไข">แสดงข้อมูลการโดนคัดทิ้งแบบผ่านเงื่อนไข</option>
    <option value="แสดงข้อมูลการโดนคัดทิ้งแบบไม่ผ่านเงื่อนไข">แสดงข้อมูลการโดนคัดทิ้งแบบไม่ผ่านเงื่อนไข</option>
</select>
<div id='date' style='display: none;'>
    วันที่เริ่ม : <input type='date' id='Startdate'>
    ถึง : <input type='date' id='Enddate'>
    <button id='sear'>ค้นหา</button>
</div>

<div id="chart_tabal" style='display: none;width: 50%;margin-left: 431px;'></div>
<div id="containerzz" align='center' style="width: 50%;min-width: 310px; height: 400px; margin-left: 435px;margin-top: 107px;display: none;"></div>

<script type="text/javascript">
    $(function() {

        //on page load  
        getAjaxData(1);

        //on changing select option
        $('#dynamic_data').change(function() {
            var val = $('#dynamic_data').val();
            getAjaxData(val);
        });

        $('#sear').click(function() {
            var val = $('#dynamic_data').val();
            getAjaxData(val);
        });

        function getAjaxData(id) {
            var Startdate = document.getElementById("Startdate").value;
            var Enddate = document.getElementById("Enddate").value;

            if (id == 'แสดงข้อมูลการโดนคัดทิ้งแบบผ่านเงื่อนไข') {
                $('#date').attr('style', 'display:none');

                var jsonObj = {
                    "id": id
                }

                $.ajax({
                    type: "POST",
                    url: "controller/chart.php",
                    data: jsonObj,
                    dataType: "html",
                    success: function(result) {
                        $('#chart_tabal').html(result);
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
                        $('#date').attr('style', 'display:none');
                        $('#containerzz').attr('style', 'display:none;width: 50%;min-width: 310px; height: 400px; margin-left: 435px;margin-top: 107px;');
                        $('#chart_tabal').attr('style', 'display:block;width: 50%;margin-left: 431px;');
                    }
                });
            } else if (id == 'แสดงข้อมูลการโดนคัดทิ้งแบบไม่ผ่านเงื่อนไข') {
                $('#date').attr('style', 'display:none');

                var jsonObj = {
                    "id": id
                }

                $.ajax({
                    type: "POST",
                    url: "controller/chart.php",
                    data: jsonObj,
                    dataType: "html",
                    success: function(result) {
                        $('#chart_tabal').html(result);
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
                        $('#date').attr('style', 'display:none');
                        $('#containerzz').attr('style', 'display:none;width: 50%;min-width: 310px; height: 400px; margin-left: 435px;margin-top: 107px;');
                        $('#chart_tabal').attr('style', 'display:block;width: 50%;margin-left: 431px;');
                    }
                });
            } else {
                $('#chart_tabal').attr('style', 'display:none;width: 50%;margin-left: 431px;');
                $('#containerzz').attr('style', 'display:block;width: 50%;min-width: 310px; height: 400px; margin-left: 435px;margin-top: 107px;');

                if (id == 'กำหนดวันเดือนปี') {
                    $('#date').attr('style', 'display:block;margin-top: 40px;');
                } else {
                    $('#date').attr('style', 'display:none');
                }
                //use getJSON to get the dynamic data via AJAX call
                $.getJSON('controller/chart.php', {
                    id: id,
                    Startdate: Startdate,
                    Enddate: Enddate
                }, function(chartData) {
                    $('#containerzz').highcharts({
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: ''
                        },
                        xAxis: {
                            categories: ['']
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Value'
                            }
                        },
                        series: chartData
                    });
                });
            }
        }
    });
</script>
<?php
include 'script/script.php';
?>