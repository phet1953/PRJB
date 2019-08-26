<?PHP
isset($_REQUEST['id']) ? $id = $_REQUEST['id'] : $id = ''; //รับชื่อฟังค์ชันมา

include '../connect/connect.php';

$arr     = array();
$arr1     = array();
$result = array();

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
//now create the json result using "json_encode"
print json_encode($result, JSON_NUMERIC_CHECK);
