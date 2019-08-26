
<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function inser_cullmom()
{
    isset($_REQUEST['name_proviso']) ? $select_option = $_REQUEST['name_proviso'] : $select_option = '';
    isset($_REQUEST['number_proviso']) ? $number_proviso = $_REQUEST['number_proviso'] : $number_proviso = '';
    isset($_REQUEST['txt']) ? $txt = $_REQUEST['txt'] : $txt = '';

    include '../connect/connect.php';
    $sqls = "select * from proviso where name_proviso = '" . $select_option . "' ";
    $query = mysqli_query($conn, $sqls);
    if (mysqli_num_rows($query) > 0) {
        $sql = "UPDATE proviso SET number_proviso = '" . $number_proviso . "',txt_proviso = '" . $txt . "' where name_proviso = '" . $select_option . "' ";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo json_encode(array('status' => '1', 'message' => 'เพิ่มข้อมูลสำเร็จ'));
        } else {
            echo json_encode(array('status' => '0', 'message' => 'เกิดข้อผิดผลาด'));
        }
    } else {
        $strsql = "INSERT INTO proviso (name_proviso, number_proviso, txt_proviso) VALUE('" . $select_option . "','" . $number_proviso . "','" . $txt . "')";
        $query = mysqli_query($conn, $strsql);
        if ($query) {
            echo json_encode(array('status' => '1', 'message' => 'เพิ่มข้อมูลสำเร็จ'));
        } else {
            echo json_encode(array('status' => '0', 'message' => 'เกิดข้อผิดผลาด'));
        }
    }
}

function selectshow(){
    $strsql = "select * from proviso where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "<div class='table-responsive'>
        <table class='table table-bordered' id='example' style='width:100%;' align='center'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class=''><center>เงื่อนไขการคัดทิ้ง</center></th>
          <th bgcolor='#ffe6ee' class=''><center>จำนวน</center></th>
          <th bgcolor='#ffe6ee' class=''><center>หน่วย</center></th>
          <th bgcolor='#ffe6ee' class='col-md-3 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while ($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='" . $re['ID_proviso'] . "'>";
            echo "<td><div align='center'>" . $re['name_proviso'] . "</div></td>";
            echo "<td><div align='center'>" . $re['number_proviso'] . "</div></td>";
            echo "<td><div align='center'>" . $re['txt_proviso'] . "</div></td>";
            echo "<td>
            <button type='button' class='btn btn-lg' style='background-color: white; height: 0px;margin-top: -8px;width: 0px;margin-bottom: 1px;margin-inline: 20px;' data-toggle='modal' data-target='#flipFlop$re[ID_proviso]'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'></button>
            <input type='image' id='delete' style='margin-bottom: -16px;' onclick=delete_proviso1('" . $re['ID_proviso'] . "') src='https://img.icons8.com/plasticine/26/000000/full-trash.png'>
            </td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop$re[ID_proviso]' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document' style='width: 60%;'>";
            echo "<div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <h4 class='modal-title' id='modalLabel'>แก้ไขข้อมูล : เงื่อนไขการคัดทิ้ง </h4>
                </div>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='col-md-4 form-group' align='center'>
                                <label>แก้ไข เงื่อนไขการคัดทิ้ง</label>
                                <input type='text' class='form-control' name='activity_a' id='name_provisoedit$re[ID_proviso]' style='height:40px; font-size:16px;width: 70%;'  value='$re[name_proviso]'>
                                <br>
                            </div>
                            <div class='col-md-4 form-group' align='center'>
                                <label>แก้ไข จำนวน</label>
                                <input type='number' class='form-control' name='number_proviso' id='number_provisoedit$re[ID_proviso]' style='height:40px; font-size:16px;width: 70%;'  value='$re[number_proviso]'>
                                <br>
                            </div>
                            <div class='col-md-4 form-group' align='center'>
                                <label>แก้ไข </label>
                                <input type='text' class='form-control' name='txt_proviso' id='txt_provisoedit$re[ID_proviso]' style='height:40px; font-size:16px;width: 70%;'  value='$re[txt_proviso]'>
                                <br>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick=Saveedit('$re[ID_proviso]')>บันทึก</button>
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

function SaveEdit(){
    isset($_REQUEST['ID_proviso']) ? $ID_proviso = $_REQUEST['ID_proviso'] : $ID_proviso = '';
    isset($_REQUEST['name_provisoedit']) ? $name_provisoedit = $_REQUEST['name_provisoedit'] : $name_provisoedit = '';
    isset($_REQUEST['number_provisoedit']) ? $number_provisoedit = $_REQUEST['number_provisoedit'] : $number_provisoedit = '';

    $strsql = "UPDATE proviso
    SET name_proviso='" . $name_provisoedit . "',number_proviso='" . $number_provisoedit . "'
    WHERE ID_proviso = '" . $ID_proviso . "'";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
        if ($query) {
            echo json_encode(array('status' => '1', 'message' => 'แก้ไขข้อมูลสำเร็จ'));
        } else {
            echo json_encode(array('status' => '0', 'message' => 'แก้ไขข้อมูลไม่สำเร็จ'));
        }
}

function select_activity()
{
    include '../connect/connect.php';
    $sql = "SELECT activity_a FROM activity where Isdelete = '0' ";
    $query = mysqli_query($conn, $sql);

    $i = 1;
    while ($row = mysqli_fetch_array($query)) {
        if (($i % 3) == 1) {
            echo "<tr>";
        }
        echo "<td align='left' valign='middle' style='padding-left: 15px;'>
            <h4>" . $i . ". " . $row['activity_a'] . "</h4>
            </td>";
        if (($i % 3) == 0) {
            echo "</tr>";
        }
       
        $i++;
    }
}

function select_option()
{
    $strsql = "select activity_a from activity where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>เหตุการณ์กิจกรรม</label>
        <select id='name_proviso' name='name_proviso' class='custom-select' onchange='ChangOptionmom()' style='height: 50px; width: 100%; width: auto; float: left;'>
        <option value=''>เลือกกิจกรรม</option>";
        while ($re = mysqli_fetch_assoc($query)) {
            echo "<option value='" . $re['activity_a'] . "'>" . $re['activity_a'] . "</option>";
        }
        echo "</select>";

    }
}

function select_option1()
{
    $strsql = "select * from proviso where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>ลบกิจกรรมที่ไม่ต้องการ</label>
        <select id='ID_proviso' name='name_proviso' class='custom-select' style='height: 50px; width: 100%; width: auto; float: left;'>
        <option value=''>เลือกกิจกรรม</option>";
        while ($re = mysqli_fetch_assoc($query)) {
            echo "<option value='" . $re['ID_proviso'] . "'>" . $re['name_proviso'] . "</option>";
        }
        echo "</select>";
        echo"<input class='btn btn-primary btn-send-message cull-button1' onclick=delete_proviso() type='button' value='ลบข้อมูล'>";
        echo"<input class='btn btn-primary btn-send-message cull-button2' onclick=create_proviso() type='button' value='เคลียร์ข้อมูล'>";
    }
}

function delete_proviso(){
    isset($_REQUEST['ID_proviso']) ? $ID_proviso = $_REQUEST['ID_proviso'] : $ID_proviso = '';

    include '../connect/connect.php';

    $strsql = "UPDATE proviso SET IsDelete = '1' WHERE ID_proviso = '".$ID_proviso."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_proviso));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  

}

function delete_proviso1(){
    isset($_REQUEST['ID_proviso']) ? $ID_proviso = $_REQUEST['ID_proviso'] : $ID_proviso = '';

    include '../connect/connect.php';

    $strsql = "UPDATE proviso SET IsDelete = '1' WHERE ID_proviso = '".$ID_proviso."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_proviso));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  

}



function create_proviso(){
    isset($_REQUEST['ID_proviso']) ? $ID_proviso = $_REQUEST['ID_proviso'] : $ID_proviso = '';

    include '../connect/connect.php';

    $strsql = "UPDATE proviso SET IsDelete = '1' ";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_proviso));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>