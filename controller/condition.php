<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_condition()
{
    include '../connect/connect.php';
    $sql_1 = "SELECT * FROM `breeder` where isdelete = 0 ORDER by No_b ASC";
    $query_1 = mysqli_query($conn, $sql_1);
    if (mysqli_num_rows($query_1) > 0) {
        echo "<table class='table table-hover table-bordered results' id='example' style='width:100%;'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>ดูประวัติทั้งหมด</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>เบอร์หู</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-2 col-xs-1'><center>หมายเหตุ</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>สถานะ</center></th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($re_1 = mysqli_fetch_assoc($query_1)) {
            $number = strlen($re_1['No_b']);
            if ($number == 1) {
                $number = "000" . $re_1['No_b'];
            } else if ($number == 2) {
                $number = "00" . $re_1['No_b'];
            } else if ($number == 3) {
                $number = "0" . $re_1['No_b'];
            } else {
                $number = $re_1['No_b'];
            }
            $check = true;
            $text = "";
            $sql_2 = "SELECT name_proviso,number_proviso,txt_proviso FROM `proviso` WHERE Isdelete = 0";
            $query_2 = mysqli_query($conn, $sql_2);
            if (mysqli_num_rows($query_2) > 0) {
                while ($re_2 = mysqli_fetch_assoc($query_2)) {
                    if ($check == true) {
                        $sql_3 = "SELECT COUNT(breeder_b) AS countprovis,activity_a FROM `activity_record` WHERE activity_a = '" . $re_2['name_proviso'] . "' AND breeder_b = '" . $number . "' AND Isdelete = 0 ";
                        $query_3 = mysqli_query($conn, $sql_3);
                        if (mysqli_num_rows($query_3) > 0) {
                            while ($re_3 = mysqli_fetch_assoc($query_3)) {
                                if ($re_2['name_proviso'] == $re_3['activity_a']  && $re_2['number_proviso'] <= $re_3['countprovis']) {
                                    $check = true;
                                    $text = $text . " " . $re_2['name_proviso'] . " " . $re_3['countprovis'] . " " . $re_2['txt_proviso'] . " ";
                                } else if ($re_2['name_proviso'] == $re_3['activity_a']  && $re_2['number_proviso'] > $re_3['countprovis']) {
                                    $check = false;
                                }else{
                                    $check = false;
                                }
                            }
                        }
                    } else {
                        $text = "";
                    }
                }
            }
            if ($text != "") {
                echo "<tr id='" . $number . "'>";
                echo "<td><div align='center'>
                            <button type='button' class='btn btn-lg' style='background-color: white;height: 76px;width: -1px;margin-bottom: -4px; margin-top: -4px;' data-toggle='modal' data-target='#flipFlop" . $number . "'><img src='https://png.icons8.com/search' style='height: 24px;'></button>
                        </div>
                    </td>";
                echo "<td><div align='center'>" . $number . "</div></td>";
                echo "<td><div align='center'>" . $text . "</div></td>";
                echo "<td><center>
                <input type='Submit' style='background-color: #F9DEDB;' value='คัดทิ้ง' id='de' onclick=delete_numberbreeder_record('" . $number . "')>
                <input type='Submit' style='background-color: #F9DEDB;' value='ไม่คัดทิ้ง' id='de1' onclick=notdelete_numberbreeder_record('" . $number . "')>
                </center></td>";
                echo "</tr>";
                echo "<div class='modal fade' id='flipFlop" . $number . "' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document' style='width: 65%;'>";
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

                $strsql = "SELECT * FROM `activity_record` WHERE Isdelete = '0' AND breeder_b = '" . $number . "' ORDER BY date_d DESC";
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
        }
        echo "</tbody>";
        echo "</table>";
    }
}

function delete_numberbreeder_record()
{
    isset($_REQUEST['No_b']) ? $No_b = $_REQUEST['No_b'] : $No_b = '';

    include '../connect/connect.php';

    date_default_timezone_set("Asia/Bangkok");
    $Today = date("Y-m-d");

    $strsql = "UPDATE activity_record SET IsDelete = '2',today_ac ='" . $Today . "' WHERE breeder_b = '" . $No_b . "'";
    $strsql1 = "UPDATE breeder SET IsDelete = '4' WHERE No_b = '" . $No_b . "'";

    $query = mysqli_query($conn, $strsql);
    $query1 = mysqli_query($conn, $strsql1);
    if ($query && $query1) {
        echo json_encode(array('status' => '1', 'message' => 'คัดทิ้งสำเร็จ', 'num' => $No_b));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'คัดทิ้งไม่สำเร็จ'));
    }
}

function notdelete_numberbreeder_record()
{
    isset($_REQUEST['No_b']) ? $No_b = $_REQUEST['No_b'] : $No_b = '';

    include '../connect/connect.php';

    $strsql = "UPDATE activity_record SET IsDelete = '3' WHERE breeder_b = '" . $No_b . "'";
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'สำเร็จ', 'num' => $No_b));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'ไม่สำเร็จ'));
    }
}
////สถานะ IsDelete 1 ลบ ข้อมูลปกติ
////สถานะ IsDelete 2 คัดทิ้ง
////สถานะ IsDelete 3 ไม่คัดทิ้ง
