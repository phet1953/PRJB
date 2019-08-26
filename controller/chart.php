<?PHP
// header('Content-Type: application/json');

isset($_REQUEST['id']) ? $id = $_REQUEST['id'] : $id = ''; //รับชื่อฟังค์ชันมา
isset($_REQUEST['Startdate']) ? $Startdate = $_REQUEST['Startdate'] : $Startdate = ''; //รับชื่อฟังค์ชันมา
isset($_REQUEST['Enddate']) ? $Enddate = $_REQUEST['Enddate'] : $Enddate = ''; //รับชื่อฟังค์ชันมา

// $namef(); //เรียกใช้ฟังค์ชันส่งมา

// function grap(){
// isset($_REQUEST['selectd']) ? $selectd = $_REQUEST['selectd'] : $selectd = '';

include '../connect/connect.php';

$arr     = array();
$arr1     = array();
$result = array();

if ($id == 'จำนวนพ่อพันธุ์-แม่พันธุ์') {
    $arr     = array();
    $arr1     = array();
    $strsql = "select count(breed_b) as numm from breeder where isdelete = 0 "; //แม่
    $query = mysqli_query($conn, $strsql);
    while ($row = mysqli_fetch_array($query)) {
        //and the data for male and female is here
        $arr['data'][] = $row['numm'];
    }

    $strsql = "select count(breed_b) as numd from breederdad where isdelete = 0"; //พ่อ
    $query = mysqli_query($conn, $strsql);
    while ($row = mysqli_fetch_array($query)) {
        //and the data for male and female is here
        $arr1['data'][] = $row['numd'];
    }
    array_push($result, $arr);
    array_push($result, $arr1);
} else if ($id == 'กิจกรรม') {
    $strsqlz = "SELECT activity_a FROM `activity` where isdelete = 0";
    $queryz = mysqli_query($conn, $strsqlz);
    while ($rowz = mysqli_fetch_array($queryz)) {
        $arr = array();
        //highcharts needs name, but only once, so give a IF condition
        $arr['name'] = $rowz['activity_a'];
        //get the result from the table "highcharts_data"
        $strsql = "SELECT count(activity_a) as num FROM `activity_record` where activity_a = '" . $rowz['activity_a'] . "'"; //แม่
        $query = mysqli_query($conn, $strsql);
        while ($row = mysqli_fetch_array($query)) {
            //and the data for male and female is here
            $arr['data'][] = $row['num'];
        }
        array_push($result, $arr);
    }
} else if ($id == 'กำหนดวันเดือนปี') {
    $start = new DateTime($Startdate);
    $start2 = new DateTime($Startdate);
    $end   = new DateTime($Enddate);

    $end->modify('+1 day');
    $period3[] = $end->format('Y-m-d');

    $strsqlzz = "SELECT DISTINCT breeder_b FROM `activity_record` WHERE isdelete = 2 ORDER BY breeder_b ASC";
    $queryzz = mysqli_query($conn, $strsqlzz);
    while ($rowz = mysqli_fetch_array($queryzz)) {
        $arr = array();
        $strsqlz = "SELECT count(breeder_b) as num,today_ac FROM `activity_record` WHERE date_d BETWEEN '" . $Startdate . "' AND '" . $period3[0] . "' AND isdelete = 2 AND breeder_b = '$rowz[breeder_b]' ORDER BY date_d DESC";
        $queryz = mysqli_query($conn, $strsqlz);
        while ($row = mysqli_fetch_array($queryz)) {
            if ($row['num'] > 0) {
                $arr['name'] = "เบอร์หู : " . $rowz['breeder_b'] . " | วันที่โดนคัดทิ้ง : " . $row['today_ac'];
                $arr['data'][] = $row['num'];
                array_push($result, $arr);
            }
        }
    }
}
//now create the json result using "json_encode"
print json_encode($result, JSON_NUMERIC_CHECK);
