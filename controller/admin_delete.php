<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_de()
{

    $text = "";
    $set = false;

    include '../connect/connect.php';
    $sql_1 = "SELECT DISTINCT breeder_b FROM `activity_record` where isdelete = 0 ORDER by breeder_b ASC ";
    $query_1 = mysqli_query($conn, $sql_1);
    if (mysqli_num_rows($query_1) > 0) {
        echo "<table class='table table-hover table-bordered results' id='example' style='width:100%;'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>ดูประวัติทั้งหมด</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>เบอร์หู</center></th>";
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
            echo "<tr id='" . $num . "'>";
            echo "<td><div align='center'>
                    <button type='button' class='btn btn-lg' style='background-color: white;height: 43px;width: -1px;margin-bottom: -4px; margin-top: -4px;' data-toggle='modal' data-target='#flipFlop" . $num . "'><img src='https://png.icons8.com/search' style='height: 24px;'></button>
                </div>
            </td>";
            echo "<td><div align='center'>" . $num . "</div></td>";
            echo "<td><center>
            <input type='image' id='delete' style='margin-top: 22px;margin-left: 0px;' onclick=admin_de('" . $num . "') src='https://img.icons8.com/plasticine/26/000000/full-trash.png'>
            </center></td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop" . $num . "' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document' style='width: 60%;'>";
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

            $strsql = "SELECT * FROM `activity_record` WHERE Isdelete = '0' AND breeder_b = '" . $num . "' ORDER BY date_d DESC";
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

function admin_de()
{
    isset($_REQUEST['No_b']) ? $No_b = $_REQUEST['No_b'] : $No_b = '';

    include '../connect/connect.php';

    date_default_timezone_set("Asia/Bangkok");
    $Today = date("Y-m-d");

    $strsql = "UPDATE activity_record SET IsDelete = '4',today_ac ='" . $Today . "' WHERE breeder_b = '" . $No_b . "'";
    $strsql1 = "UPDATE breeder SET IsDelete = '4' WHERE No_b = '" . $No_b . "'";

    $query = mysqli_query($conn, $strsql);
    $query1 = mysqli_query($conn, $strsql1);

    if ($query && $query1) {
        echo json_encode(array('status' => '1', 'message' => 'คัดทิ้งสำเร็จ', 'num' => $No_b));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'คัดทิ้งไม่สำเร็จ'));
    }
}

////สถานะ IsDelete 1 ลบ ข้อมูลปกติ
////สถานะ IsDelete 2 คัดทิ้ง
////สถานะ IsDelete 3 ไม่คัดทิ้ง
////สถานะ IsDelete 4 คัดทิ้งไม่ผ่านเงื่อนไข
