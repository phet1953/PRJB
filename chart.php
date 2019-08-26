<?php
include 'header/head.php';
?>
<title>กราฟแสดงข้อมูล</title>
<script src="js/jquery-1.11.2.min.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script> -->
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
// include 'header/barechart.php';
include 'script/script.php';
?>

<!-- <h3><a href="http://blog.theonlytutorials.com/highcharts-pass-data-dynamically-jquery/">Go back to the Tutorial</a></h3> -->
<select id="dynamic_data" style="margin-left: 300px;margin-top: 30px;">
    <option value="">เลือกรายการ</option>
    <option value="จำนวนพ่อพันธุ์-แม่พันธุ์">จำนวนพ่อพันธุ์-แม่พันธุ์</option>
    <option value="กิจกรรม">กิจกรรม</option>
    <option value="กำหนดวันเดือนปี">กำหนดวันเดือนปี</option>
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
                        categories: ['ฟฟ']
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
    });
</script>
<?php
include 'script/script.php';
?>