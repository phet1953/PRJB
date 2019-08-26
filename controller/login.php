<?PHP

header('Content-Type: application/json');
session_start();
isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function login(){
    isset($_REQUEST['usernames']) ? $usernames = $_REQUEST['usernames'] : $usernames = '';
    isset($_REQUEST['passwords']) ? $passwords = $_REQUEST['passwords'] : $passwords = '';
    include '../connect/connect.php';

    $strsql = "SELECT name_n,duty_d FROM `staff` WHERE usernames = '".$usernames."' AND passwords = '".$passwords."' AND Isdelete = '0' ";
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) == 1){
        while ($re = mysqli_fetch_assoc($query)) {
            $_SESSION["ID_login"] = $re["duty_d"];
            $_SESSION["name"] = $re["name_n"];
        }
        echo json_encode(array('status' => '1','message'=> $_SESSION["ID_login"]));
    }else{
        echo json_encode(array('status' => '0','message'=> 'ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง'));
    }
    
}

?>