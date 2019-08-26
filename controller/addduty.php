<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_duty(){
    $strsql = "select * from duty where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<div class='table-responsive'>
        <table class='table table-bordered' id='example' style='width:100%;' align='center'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class=''><center>หน้าที่ในฟาร์ม</center></th>
          <th bgcolor='#ffe6ee' class='col-md-3 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_duty']."'>";
            echo "<td><div align='center'>".$re['duty_d']."</div></td>";
            echo "<td>
            <button type='button' class='btn btn-lg' style='background-color: white; height: 0px;margin-top: -8px;width: 0px;margin-bottom: 1px;margin-inline: 20px;' data-toggle='modal' data-target='#flipFlop$re[ID_duty]'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'></button>
            <input type='image' id='delete' style='margin-bottom: -16px;' onclick=duty_delete('".$re['ID_duty']."') src='https://img.icons8.com/plasticine/26/000000/full-trash.png'>
            </td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop$re[ID_duty]' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document' style='width: 60%;'>";
            echo "<div class='modal-content'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                <div class='modal-header'>
                    <h4 class='modal-title' id='modalLabel'>แก้ไขข้อมูล : ตำแหน่งหน้าที่ในฟาร์ม </h4>
                </div>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='col-md-12 form-group' align='center'>
                                <label>แก้ไข ตำแหน่งหน้าที่ในฟาร์ม</label>
                                <input type='text' class='form-control' name='duty_d' id='duty_dedit$re[ID_duty]' style='height:40px; font-size:16px;width: 50%;' value='$re[duty_d]'>
                                <br>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick=Saveedit('$re[ID_duty]')>บันทึก</button>
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
    isset($_REQUEST['ID_duty']) ? $ID_duty = $_REQUEST['ID_duty'] : $ID_duty = '';
    isset($_REQUEST['duty_dedit']) ? $duty_dedit = $_REQUEST['duty_dedit'] : $duty_dedit = '';  

    $strsql = "UPDATE duty 
    SET duty_d='" . $duty_dedit . "'
    WHERE  ID_duty = '" . $ID_duty . "'";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'แก้ไขข้อมูลสำเร็จ'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'แก้ไขข้อมูลไม่สำเร็จ'));
    }
}

// function inser_duty(){
//     isset($_REQUEST['duty_d']) ? $duty_d = $_REQUEST['duty_d'] : $duty_d = '';

//     include '../connect/connect.php';

//     $strsql = "INSERT INTO duty (duty_d) VALUE('".$duty_d."')";
//             $query = mysqli_query($conn,$strsql);
//             if ($query) 
//             {
//                 echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
//             }else{
//                 echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
//             }

// }

function duty_delete(){
    isset($_REQUEST['ID_duty']) ? $ID_duty = $_REQUEST['ID_duty'] : $ID_duty = '';

    include '../connect/connect.php';

    $strsql = "UPDATE duty SET IsDelete = '1' WHERE ID_duty = '".$ID_duty."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_duty));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>