<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_staff()
{

    $strsql = "select * from staff where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "<div class='table-responsive'>
        <table class='table table-bordered' id='example' style='width:100%;' align='center'>
            <thead>
                <tr>
                <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>username</center></th>
                <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>password</center></th>
                <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อ-สกุล</center></th>
                <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เลขบัตรประชาชน</center></th>
                <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ที่อยู่</center></th>
                <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>อีเมล</center></th>
                <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วันเกิด</center></th>
                <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เลขประกอบวิชาชีพ</center></th>
                <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>หน้าที่</center></th>
                <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เบอร์โทร</center></th>
                <th bgcolor='#ffe6ee' class='col-md-2 col-xs-2'><center>สถานะ</center></th>
                </tr>
            </thead>
        <tbody>";
        while ($re = mysqli_fetch_assoc($query)) {
            $num = strlen($re['tel_t']);
            if ($num == 9) {
                $num = "0" . $re['tel_t'];
            } else {
                $num = $re['tel_t'];
            }
            echo "<tr id='" . $re['ID_login'] . "'>";
            echo "<td><div align='center'>" . $re['usernames'] . "</div></td>";
            echo "<td><div align='center'>" . $re['passwords'] . "</div></td>";
            echo "<td><div align='center'>" . $re['name_n'] . ' ชื่อเล่น ' . $re['lastname_l'] . "</div></td>";
            echo "<td><div align='center'>" . $re['idcard'] . "</div></td>";
            echo "<td><div align='center'>" . $re['house_no'] . ' ' . $re['postal_code'] . "</div></td>";
            echo "<td><div align='center'>" . $re['email_e'] . "</div></td>";
            echo "<td><div align='center'>" . $re['birthday_b'] . "</div></td>";
            echo "<td><div align='center'>" . $re['professional_number'] . "</div></td>";
            echo "<td><div align='center'>" . $re['duty_d'] . "</div></td>";
            echo "<td><div align='center'>" . $num . "</div></td>";
            echo "<td>
            <button type='button' class='btn btn-link' style='background-color: white; height: 0px;margin-top: -3px;width: 0px;margin-bottom: -6px;margin-inline: -8px;' data-toggle='modal' data-target='#flipFlop$re[ID_login]'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'></button>
            <input type='image' id='delete' style='margin-top: -8px;margin-left: 42px;' onclick=login_delete('" . $re['ID_login'] . "') src='https://img.icons8.com/plasticine/26/000000/full-trash.png'>
            </td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop$re[ID_login]' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document' style='width: 60%;'>";
            echo "<div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <h4 class='modal-title' id='modalLabel'>แก้ไขข้อมูล : ฟาร์ม </h4>
                </div>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข username</label>
                                <input class='form-control input-normal' type='text' name='user' id='useredit$re[ID_login]' style='height:40px; font-size:16px;' value='$re[usernames]'>
                            </div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข password</label>
                                <input class='form-control input-normal' type='text' name='pass' id='passedit$re[ID_login]' style='height:40px; font-size:16px;' value='$re[passwords]'>
                            </div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข ชื่อ-สกุล</label>
                                <input class='form-control input-normal' type='text' name='name_n' id='name_nedit$re[ID_login]' style='height:40px; font-size:16px;' value='$re[name_n]'>
                            </div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข ชื่อเล่น</label>
                                <input class='form-control' type='text' name='lastname_l' id='lastname_ledit$re[ID_login]' style='height:40px; font-size:16px;' value='$re[lastname_l]'>
                            </div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข เลขบัตรประชาชน</label>
                                <input class='form-control' type='number' maxlength='13 minlength='13' name='idcard' id='idcardedit$re[ID_login]' style='height: 40px; width: 100%;font-size:16px;' value='$re[idcard]'>
                            </div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข วันเกิด</label>
                                <input class='form-control' type='date' name='birthday_b' id='birthday_bedit$re[ID_login]' style='height:40px; width: 76%; font-size:16px;padding: 0px 60px;' value='$re[birthday_b]'>
                            </div>
                            <div class='col-md-12 form-group'>
                                <label>แก้ไข ที่อยู่</label>
                                <input class='form-control' type='text' name='house_no' id='house_noedit$re[ID_login]' style='height:40px; font-size:16px;' value='$re[house_no]'>
                            </div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข รหัสไปรษณีย</label>
                                <input class='form-control' type='number' maxlength='6' minlength='6' name='postal_code' id='postal_codeedit$re[ID_login]' style='height:40px; font-size:16px;' value='$re[postal_code]'>
                            </div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข อีเมล</label>
                                <input class='form-control' type='text' name='email_e' id='email_eedit$re[ID_login]' style='height:40px; font-size:16px;' value='$re[email_e]'>
                            </div>
                            <div class='col-md-12 form-group'>
                                <label>แก้ไข เลขประกอบวิชาชีพ</label>
                                <input class='form-control' type='text' name='professional_number' id='professional_numberedit$re[ID_login]' style='height:40px; font-size:16px;' value='$re[professional_number]'>
                            </div>
                            <div class='col-md-6 form-group' id='select_option'>";

            $strsql2 = "select duty_d from duty where Isdelete = '0' ";
            include '../connect/connect.php';
            $query2 = mysqli_query($conn, $strsql2);
            if (mysqli_num_rows($query2) > 0) {
                echo "<label>แก้ไข หน้าที่</label>
                                <select id='selectAedit$re[ID_login]' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
                                <option value=''>เลือกรายการ</option>";
                while ($re2 = mysqli_fetch_assoc($query2)) {
                    if ($re['duty_d'] == $re2['duty_d']) {
                        echo "<option value='" . $re2['duty_d'] . "' selected>" . $re2['duty_d'] . "</option>";
                    } else {
                        echo "<option value='" . $re2['duty_d'] . "'>" . $re2['duty_d'] . "</option>";
                    }
                }
                echo "</select>";
            }
            echo "</div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข เบอร์โทร</label>
                                <input class='form-control' type='number' maxlength='10' minlength='10' name='tel_t' id='tel_tedit$re[ID_login]' style='height:40px; font-size:16px;' value='$num'>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick=Saveedit('$re[ID_login]')>บันทึก</button>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>ยกเลิก</button>
                </div>
                </div>
            </div>
         </div>";
        }
        echo "</tbody>
        </table></div>";
    }
}

function SaveEdit()
{
    isset($_REQUEST['ID_login']) ? $ID_login = $_REQUEST['ID_login'] : $ID_login = '';
    isset($_REQUEST['useredit']) ? $useredit = $_REQUEST['useredit'] : $useredit = '';
    isset($_REQUEST['passedit']) ? $passedit = $_REQUEST['passedit'] : $passedit = '';
    isset($_REQUEST['name_nedit']) ? $name_nedit = $_REQUEST['name_nedit'] : $name_nedit = '';
    isset($_REQUEST['lastname_ledit']) ? $lastname_ledit = $_REQUEST['lastname_ledit'] : $lastname_ledit = '';
    isset($_REQUEST['idcardedit']) ? $idcardedit = $_REQUEST['idcardedit'] : $idcardedit = '';
    isset($_REQUEST['birthday_bedit']) ? $birthday_bedit = $_REQUEST['birthday_bedit'] : $birthday_bedit = '';
    isset($_REQUEST['house_noedit']) ? $house_noedit = $_REQUEST['house_noedit'] : $house_noedit = '';
    isset($_REQUEST['postal_codeedit']) ? $postal_codeedit = $_REQUEST['postal_codeedit'] : $postal_codeedit = '';
    isset($_REQUEST['email_eedit']) ? $email_eedit = $_REQUEST['email_eedit'] : $email_eedit = '';
    isset($_REQUEST['professional_numberedit']) ? $professional_numberedit = $_REQUEST['professional_numberedit'] : $professional_numberedit = '';
    isset($_REQUEST['selectAedit']) ? $selectAedit = $_REQUEST['selectAedit'] : $selectAedit = '';
    isset($_REQUEST['tel_tedit']) ? $tel_tedit = $_REQUEST['tel_tedit'] : $tel_tedit = '';


    $strsql = "UPDATE staff 
    SET usernames='" . $useredit . "',passwords='" . $passedit . "',name_n='" . $name_nedit . "',lastname_l='" . $lastname_ledit . "'
    ,idcard='" . $idcardedit . "',birthday_b='" . $birthday_bedit . "',house_no='" . $house_noedit . "',postal_code='" . $postal_codeedit . "'
    ,email_e='" . $email_eedit . "',professional_number='" . $professional_numberedit . "',duty_d='" . $selectAedit . "',tel_t='" . $tel_tedit . "'
    WHERE  ID_login = '" . $ID_login . "'";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'แก้ไขข้อมูลสำเร็จ'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'แก้ไขข้อมูลไม่สำเร็จ'));
    }
}

function select_option()
{
    $strsql = "select duty_d from duty where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label>หน้าที่ <a style='color: red;'>&nbsp;&nbsp; *</a></label>
        <select id='selectA' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while ($re = mysqli_fetch_assoc($query)) {
            echo "<option value='" . $re['duty_d'] . "'>" . $re['duty_d'] . "</option>";
        }
        echo "</select>";
    }
}

function inser_staff()
{
    isset($_REQUEST['user']) ? $user = $_REQUEST['user'] : $user = '';
    isset($_REQUEST['pass']) ? $pass = $_REQUEST['pass'] : $pass = '';
    isset($_REQUEST['name_n']) ? $name_n = $_REQUEST['name_n'] : $name_n = '';
    isset($_REQUEST['lastname_l']) ? $lastname_l = $_REQUEST['lastname_l'] : $lastname_l = '';
    isset($_REQUEST['idcard']) ? $idcard = $_REQUEST['idcard'] : $idcard = '';
    isset($_REQUEST['house_no']) ? $house_no = $_REQUEST['house_no'] : $house_no = '';
    isset($_REQUEST['postal_code']) ? $postal_code = $_REQUEST['postal_code'] : $postal_code = '';
    isset($_REQUEST['email_e']) ? $email_e = $_REQUEST['email_e'] : $email_e = '';
    isset($_REQUEST['birthday_b']) ? $birthday_b = $_REQUEST['birthday_b'] : $birthday_b = '';
    isset($_REQUEST['professional_number']) ? $professional_number = $_REQUEST['professional_number'] : $professional_number = '';
    isset($_REQUEST['selectA']) ? $select_option = $_REQUEST['selectA'] : $select_option = '';
    isset($_REQUEST['tel_t']) ? $tel_t = $_REQUEST['tel_t'] : $tel_t = '';

    include '../connect/connect.php';

    $sql1 = "SELECT usernames FROM `staff` WHERE usernames = '" . $user . "'";
    $query1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($query1) > 0) {
        echo json_encode(array('status' => '1', 'message' => 'username มีอยู่แล้ว'));
    } else {
        $sql2 = "SELECT passwords FROM `staff` WHERE passwords = '" . $pass . "'";
        $query2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($query2) > 0) {
            echo json_encode(array('status' => '1', 'message' => 'password มีอยู่แล้ว'));
        } else {
            $sql3 = "SELECT idcard FROM `staff` WHERE idcard = '" . $idcard . "'";
            $query3 = mysqli_query($conn, $sql3);
            if (mysqli_num_rows($query3) > 0) {
                echo json_encode(array('status' => '1', 'message' => 'เลขบัตรประชาชน มีอยู่แล้ว'));
            } else {
                $sql4 = "INSERT INTO staff (usernames, passwords, name_n, lastname_l, idcard, house_no, postal_code, email_e, birthday_b, professional_number, duty_d, tel_t) VALUE('" . $user . "','" . $pass . "','" . $name_n . "','" . $lastname_l . "','" . $idcard . "','" . $house_no . "','" . $postal_code . "','" . $email_e . "','" . $birthday_b . "','" . $professional_number . "','" . $select_option . "','" . $tel_t . "')";
                $query4 = mysqli_query($conn, $sql4);
                if ($query4) {
                    echo json_encode(array('status' => '1', 'message' => 'เพิ่มข้อมูลสำเร็จ'));
                } else {
                    echo json_encode(array('status' => '0', 'message' => 'เกิดข้อผิดผลาด'));
                }
            }
        }
    }

}

function login_delete()
{
    isset($_REQUEST['ID_login']) ? $ID_login = $_REQUEST['ID_login'] : $ID_login = '';

    include '../connect/connect.php';

    $strsql = "UPDATE staff SET ID_login = '1' WHERE ID_login = '" . $ID_login . "'";
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'ลบข้อมูลสำเร็จ', 'num' => $ID_login));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'ลบข้อมูลไม่สำเร็จ'));
    }
}
