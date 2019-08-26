<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_far()
{

    include '../connect/connect.php';
    $strsql = "select * from farm where Isdelete = '0' ";
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "<div class='table-responsive'>
        <table id='example' class='table table-bordered ' style='width:100%;' align='center'>
        <thead>
         <tr>
            <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ฃื่อฟาร์ม</center></th>
            <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ฃื่อเจ้าของฟาร์ม</center></th>
            <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เบอร์โทรศัพท์(เจ้าของ)</center></th>
            <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อผู้จัดการฟาร์ม</center></th>
            <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เบอร์โทรศัพท์(ผู้จัดการ)</center></th>
            <th bgcolor='#ffe6ee' class='col-md-3 col-xs-3'><center>ที่อยู่ฟาร์ม</center></th>
            <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เบอร์โทรศัพท์(ฟาร์ม)</center></th>
            <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>รับรองเป็นมาตรฐานฟาร์มเลี้ยงสุกรของประเทศไทย ณ วันที่</center></th>
            <th bgcolor='#ffe6ee' class='col-md-2 col-xs-2'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while ($re = mysqli_fetch_assoc($query)) {
            $num = strlen($re['mowntel_m']);
            if ($num == 9) {
                $num = "0" . $re['mowntel_m'];
            } else {
                $num = $re['mowntel_m'];
            }
            $num1 = strlen($re['telfarm_t']);
            if ($num1 == 9) {
                $num1 = "0" . $re['telfarm_t'];
            } else {
                $num1 = $re['telfarm_t'];
            }
            $num2 = strlen($re['farmtel_f']);
            if ($num2 == 8) {
                $num2 = "0" . $re['farmtel_f'];
            } else {
                $num2 = $re['farmtel_f'];
            }
            echo "<tr id='" . $re['ID_farm'] . "'>";
            echo "<td><div align='center'>" . $re['far_f'] . "</div></td>";
            echo "<td><div align='center'>" . $re['farmown_f'] . "</div></td>";
            echo "<td><div align='center'>" . $num . "</div></td>";
            echo "<td><div align='center'>" . $re['farfarm_f'] . "</div></td>";
            echo "<td><div align='center'>" . $num1 . "</div></td>";
            echo "<td><div align='center'>" . $re['farmaddress_f'] . "</div></td>";
            echo "<td><div align='center'>" . $num2 . "</div></td>";
            echo "<td><div align='center'>" . $re['warrantdate_w'] . "</div></td>";
            echo "<td>
            <button type='button' class='btn btn-lg' style='background-color: white; height: 0px;margin-top: -8px;width: 0px;margin-bottom: 2px;margin-right: -3px;margin-inline: -11px;' data-toggle='modal' data-target='#flipFlop$re[ID_farm]'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'></button>
            <input type='image' id='delete' style='margin-bottom: -15px;' onclick=delete_far('" . $re['ID_farm'] . "') src='https://img.icons8.com/plasticine/26/000000/full-trash.png'>
            </td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop$re[ID_farm]' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document' style='width: 70%;'>";
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
                                    <div class='col-md-12 form-group' align='center'>
                                        <label>แก้ไข ชื่อฟาร์ม</label>
                                        <input class='form-control' type='text' name='far' id='far_fedit$re[ID_farm]' style='height:40px; font-size:16px; width: 35%;' value='$re[far_f]'>
                                    </div>    
                                    <div class='col-md-6 form-group'>
                                        <label>แก้ไข ชื่อเจ้าของฟาร์ม</label>
                                        <input  class='form-control' type='text' name='farmown' id='farmown_fedit$re[ID_farm]' style='height:40px; font-size:16px;' value='$re[farmown_f]'>
                                    </div>
                                    <div class='col-md-6 form-group'>
                                        <label>แก้ไข เบอร์โทรศัพท์(เจ้าของ)</label>
                                        <input class='form-control' type='number' name='mowntel' maxlength='10' minlength='10' id='mowntel_medit$re[ID_farm]' maxlength='10' minlength='10' style='height:40px; font-size:16px;' value='$num'>
                                    </div>
                                    <div class='col-md-6 form-group'>
                                        <label>แก้ไข ชื่อผู้จัดการฟาร์ม</label>
                                        <input class='form-control' type='text' name='farfarm' id='farfarm_fedit$re[ID_farm]' style='height:40px; font-size:16px;' value='$re[farfarm_f]'>
                                    </div>
                                    <div class='col-md-6 form-group'>
                                        <label>แก้ไข เบอร์โทรศัพท์(ผู้จัดการ)</label>
                                        <input class='form-control' type='number' name='telfarm' maxlength='10' minlength='10' id='telfarm_tedit$re[ID_farm]' maxlength='10' minlength='10' style='height:40px; font-size:16px;' value='$num1'>
                                    </div>
                                    <div class='col-md-12 form-group'>
                                        <label>แก้ไข ที่อยู่ฟาร์ม</label>
                                        <input class='form-control' type='text' name='farmaddress' id='farmaddress_fedit$re[ID_farm]' style='height:40px; font-size:16px;' value='$re[farmaddress_f]'>
                                    </div>
                                    <div class='col-md-6 form-group' >
                                        <label>แก้ไข เบอร์โทรศัพท์(ฟาร์ม)</label>
                                        <input class='form-control' type='number' name='farmtel' maxlength='10' minlength='10' id='farmtel_fedit$re[ID_farm]' maxlength='10' minlength='10' style='height:40px; font-size:16px;' value='$num2'>
                                    </div>
                                    <div class='col-md-6 form-group'>
                                        <label>แก้ไข รับรองเป็นมาตรฐานฟาร์มเลี้ยงสุกรของประเทศไทย ณ วันที่</label>
                                        <input type='date' class='form-control' name='warrantdate' id='warrantdate_wedit$re[ID_farm]' style='height:40px;width: 245px;font-size:16px;padding: 0px 60px;' value='$re[warrantdate_w]'>                                                                     
                                    </div>
                                </div>
                            </div>                    
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick=Saveedit('$re[ID_farm]')>บันทึก</button>
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
    isset($_REQUEST['ID_farm']) ? $ID_farm = $_REQUEST['ID_farm'] : $ID_farm = '';
    isset($_REQUEST['far_fedit']) ? $far_fedit = $_REQUEST['far_fedit'] : $far_fedit = '';
    isset($_REQUEST['farmown_fedit']) ? $farmown_fedit = $_REQUEST['farmown_fedit'] : $farmown_fedit = '';
    isset($_REQUEST['mowntel_medit']) ? $mowntel_medit = $_REQUEST['mowntel_medit'] : $mowntel_medit = '';
    isset($_REQUEST['farfarm_fedit']) ? $farfarm_fedit = $_REQUEST['farfarm_fedit'] : $farfarm_fedit = '';
    isset($_REQUEST['telfarm_tedit']) ? $telfarm_tedit = $_REQUEST['telfarm_tedit'] : $telfarm_tedit = '';
    isset($_REQUEST['farmaddress_fedit']) ? $farmaddress_fedit = $_REQUEST['farmaddress_fedit'] : $farmaddress_fedit = '';
    isset($_REQUEST['farmtel_fedit']) ? $farmtel_fedit = $_REQUEST['farmtel_fedit'] : $farmtel_fedit = '';
    isset($_REQUEST['warrantdate_wedit']) ? $warrantdate_wedit = $_REQUEST['warrantdate_wedit'] : $warrantdate_wedit = '';


    $strsql = "UPDATE farm 
    SET far_f='" . $far_fedit . "',farmown_f='" . $farmown_fedit . "',mowntel_m='" . $mowntel_medit . "',farfarm_f='" . $farfarm_fedit . "'
    ,telfarm_t='" . $telfarm_tedit . "',farmaddress_f='" . $farmaddress_fedit . "',farmtel_f='" . $farmtel_fedit . "',warrantdate_w='" . $warrantdate_wedit . "'
    WHERE  ID_farm = '" . $ID_farm . "'";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'แก้ไขข้อมูลสำเร็จ'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'แก้ไขข้อมูลไม่สำเร็จ'));
    }
}

function inser_far()
{
    isset($_REQUEST['far_f']) ? $far_f = $_REQUEST['far_f'] : $far_f = '';
    isset($_REQUEST['farmown_f']) ? $farmown_f = $_REQUEST['farmown_f'] : $farmown_f = '';
    isset($_REQUEST['mowntel_m']) ? $mowntel_m = $_REQUEST['mowntel_m'] : $mowntel_m = '';
    isset($_REQUEST['farfarm_f']) ? $farfarm_f = $_REQUEST['farfarm_f'] : $farfarm_f = '';
    isset($_REQUEST['telfarm_t']) ? $telfarm_t = $_REQUEST['telfarm_t'] : $telfarm_t = '';
    isset($_REQUEST['farmaddress_f']) ? $farmaddress_f = $_REQUEST['farmaddress_f'] : $farmaddress_f = '';
    isset($_REQUEST['farmtel_f']) ? $farmtel_f = $_REQUEST['farmtel_f'] : $farmtel_f = '';
    isset($_REQUEST['warrantdate_w']) ? $warrantdate_w = $_REQUEST['warrantdate_w'] : $warrantdate_w = '';

    include '../connect/connect.php';

    $sqls = "SELECT * FROM `farm` WHERE Isdelete = 0 ";
    $query = mysqli_query($conn, $sqls);
    if (mysqli_num_rows($query) > 0) {
        echo json_encode(array('status' => '1', 'message' => 'คุณมีฟาร์มอยู่แล้ว'));
    } else {
        $strsql = "INSERT INTO farm (far_f,farmown_f, mowntel_m, farfarm_f, telfarm_t, farmaddress_f, farmtel_f, warrantdate_w) VALUE('" . $far_f . "','" . $farmown_f . "','" . $mowntel_m . "','" . $farfarm_f . "','" . $telfarm_t . "','" . $farmaddress_f . "','" . $farmtel_f . "','" . $warrantdate_w . "')";
        $query = mysqli_query($conn, $strsql);
        if ($query) {
            echo json_encode(array('status' => '1', 'message' => 'ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว'));
        } else {
            echo json_encode(array('status' => '0', 'message' => 'เกิดข้อผิดผลาด'));
        }
    }
}

function delete_far()
{
    isset($_REQUEST['ID_farm']) ? $ID_farm = $_REQUEST['ID_farm'] : $ID_farm = '';

    include '../connect/connect.php';

    $strsql = "UPDATE farm SET IsDelete = '1' WHERE ID_farm = '" . $ID_farm . "'";
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'ลบข้อมูลสำเร็จ', 'num' => $ID_farm));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'ลบข้อมูลไม่สำเร็จ'));
    }
}
