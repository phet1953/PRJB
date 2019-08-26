<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_checkbelly(){
    $strsql = "select * from checkbelly where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<div class='table-responsive'>
        <table class='table table-bordered' id='example' style='width:100%;' align='center'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class=''><center>ผลการตรวจท้อง</center></th>
          <th bgcolor='#ffe6ee' class='col-md-3 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_checkbelly']."'>";
            echo "<td><div align='center'>".$re['checkbelly_c']."</div></td>";
            echo "<td>
            <button type='button' class='btn btn-lg' style='background-color: white; height: 0px;margin-top: -8px;width: 0px;margin-bottom: 1px;margin-inline: 20px;' data-toggle='modal' data-target='#flipFlop$re[ID_checkbelly]'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'></button>
            <input type='image' id='delete' style='margin-bottom: -16px;' onclick=checkbelly_delete('".$re['ID_checkbelly']."') src='https://img.icons8.com/plasticine/26/000000/full-trash.png'>
            </td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop$re[ID_checkbelly]' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document' style='width: 60%;'>";
            echo "<div class='modal-content'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                <div class='modal-header'>
                    <h4 class='modal-title' id='modalLabel'>แก้ไขข้อมูล : ผลการตรวจท้อง </h4>
                </div>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                        <div class='col-md-12 form-group' align='center'>
                        <label>แก้ไข ผลการตรวจท้อง</label>
                        <input class='form-control' type='text' name='checkbelly_c' id='checkbelly_cedit$re[ID_checkbelly]' style='height:40px; font-size:16px;width: 30%;' value='$re[checkbelly_c]'>
                    </div>
                        </div>
                    </div>                    
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick=Saveedit('$re[ID_checkbelly]')>บันทึก</button>
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
    isset($_REQUEST['ID_checkbelly']) ? $ID_checkbelly = $_REQUEST['ID_checkbelly'] : $ID_checkbelly = '';
    isset($_REQUEST['checkbelly_cedit']) ? $checkbelly_cedit = $_REQUEST['checkbelly_cedit'] : $checkbelly_cedit = '';  

    $strsql = "UPDATE checkbelly 
    SET checkbelly_c='" . $checkbelly_cedit . "'
    WHERE  ID_checkbelly = '" . $ID_checkbelly . "'";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'แก้ไขข้อมูลสำเร็จ'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'แก้ไขข้อมูลไม่สำเร็จ'));
    }
}

function inser_checkbelly(){
    isset($_REQUEST['checkbelly_c']) ? $checkbelly_c = $_REQUEST['checkbelly_c'] : $checkbelly_c = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO checkbelly (checkbelly_c) VALUE('".$checkbelly_c."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function checkbelly_delete(){
    isset($_REQUEST['ID_checkbelly']) ? $ID_checkbelly = $_REQUEST['ID_checkbelly'] : $ID_checkbelly = '';

    include '../connect/connect.php';

    $strsql = "UPDATE checkbelly SET IsDelete = '1' WHERE ID_checkbelly = '".$ID_checkbelly."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_checkbelly));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>