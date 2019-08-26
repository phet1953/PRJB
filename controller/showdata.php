<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_datas(){

    include '../connect/connect.php';
    $sql_1 = "SELECT DISTINCT breeder_b,isdelete,today_ac,year(today_ac) as days FROM `activity_record` where isdelete !=0 AND isdelete !=1 AND isdelete !=3 ORDER by breeder_b ASC";
    $query_1 = mysqli_query($conn, $sql_1);
    if (mysqli_num_rows($query_1) > 0) {
        echo "<table class='table table-hover table-bordered results' id='example' style='width:100%;'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>เบอร์หู</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>วันที่โดนคัดทิ้ง</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>ดูประวัติ</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>สถานะ</center></th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($re_1 = mysqli_fetch_assoc($query_1)) {
            $num = strlen($re_1['breeder_b']);
            if ($num == 1) {
                $num = "000" . $re_1['breeder_b'];
            } else if ($num == 2) {
                $num = "00" . $re_1['breeder_b'];
            } else if ($num == 3) {
                $num = "0" . $re_1['breeder_b'];
            } else {
                $num = $re_1['breeder_b'];
            }
            $a = '';
            if($re_1['isdelete'] == 2){
                $a = 'การคัดทิ้งแบบผ่านเงื่อนไข';
            }else if($re_1['isdelete'] == 4){
                $a = 'การคัดทิ้งแบบไม่ผ่านเงื่อนไข';
            }else{
                echo "ไม่รู้สาเหตุการคัดทิ้ง";
            }

            $date = $re_1['today_ac'];
            $end = DateTime::createFromFormat('Y-m-d', $date)->format('d-m-Y'); 

            echo "<tr id='" . $num . "'>";
            echo "<td><div align='center'>" . $num . "</div></td>";
            echo "<td><div align='center'>".$end."</div></td>";
            echo "<td><div align='center'>
            <button type='button' class='btn btn-lg' style='background-color: white;height: 43px;width: -1px;margin-bottom: -4px; margin-top: -4px;' data-toggle='modal' data-target='#flipFlop" . $num . "'><img src='https://png.icons8.com/search' style='height: 24px;'></button>
                </div>
            </td>";
            echo "<td><div align='center'>".$a."</div></td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop" . $num . "' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document' style='width: 70%;'>";
            echo "<div class='modal-content'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <div class='modal-header'>
                        <h4 class='modal-title' id='modalLabel'>ดูประวัติทั้งหมด</h4>
                    </div>
                    <div class='modal-body'>";
            echo "<div class='table-responsive table ' style='width:20%;margin-inline: 151px;' align='center'>เบอร์หู</div>";
            echo "<div class='table-responsive table ' style='width:20%;margin-top: -50px;margin-inline: 326px;' align='center'>วันที่</div>";
            echo "<div class='table-responsive table ' style='width:20%;margin-top: -49px;margin-inline: 500px;' align='center'>เหตุการณ์กิจกรรม</div>";

            $strsql = "SELECT * FROM `activity_record` WHERE isdelete !=0 AND isdelete !=1 AND isdelete !=3 AND breeder_b = '" . $num . "' ORDER BY date_d DESC";
            include '../connect/connect.php';
            $query = mysqli_query($conn, $strsql);
            if (mysqli_num_rows($query) > 0) {
                while ($re = mysqli_fetch_assoc($query)) {

                    $dates = $re['date_d'];
                    $end = DateTime::createFromFormat('Y-m-d H:i:s', $dates)->format('d-m-Y H:i:s'); 

                    echo "<div class='table-responsive table ' style='width:20%;margin-inline: 151px;' align='center'>";
                    echo $re['breeder_b'];
                    echo "</div>";
                    echo "<div class='table-responsive table ' style='width:20%;margin-top: -50px;margin-inline: 326px;' align='center'>";
                    echo $end;
                    echo "</div>";
                    echo "<div class='table-responsive table ' style='width:20%;margin-top: -49px;margin-inline: 500px;' align='center'>";
                    echo $re['activity_a'];
                    echo "</div>";
                }
            }
            echo "</div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>ยกเลิก</button>
                </div>
                </div>
            </div>
        </div>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}
?>