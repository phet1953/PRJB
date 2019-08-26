<?php
include 'header/head.php';
?>
<title>กราฟแสดงข้อมูล</title>
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

<div id="container" style="width: 50%;min-width: 310px; height: 400px; margin: 0 auto"></div>

<select id="dynamic_data"  style="margin-left: 300px;margin-top: -320px;">
	<option value="0">Select Data</option>
	<option value="1" selected>Data 1</option>
	<option value="2">Data 2</option>
	<option value="3">Data 3</option>
</select>
<script type="text/javascript">
    $(function() {

        //on page load  
        getAjaxData(1);

        //on changing select option
        $('#dynamic_data').change(function() {
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
    });
</script>
<?php
include 'script/script.php';
?>