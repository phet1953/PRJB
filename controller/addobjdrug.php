<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_objdrug(){
    $strsql = "select * from objdrug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<div class='table-responsive'>
        <table class='table table-bordered' id='example' style='width:100%;' align='center'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class=''><center>จุดประสงค์การใช้ยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-3 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_objdrug']."'>";
            echo "<td><div align='center'>".$re['objdrug_o']."</div></td>";
            echo "<td>
            <button type='button' class='btn btn-lg' style='background-color: white; height: 0px;margin-top: -8px;width: 0px;margin-bottom: 1px;margin-inline: 20px;' data-toggle='modal' data-target='#flipFlop$re[ID_objdrug]'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'></button>
            <input type='image' id='delete' style='margin-bottom: -16px;' onclick=objdrug_delete('".$re['ID_objdrug']."') src='https://img.icons8.com/plasticine/26/000000/full-trash.png'>
            </td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop$re[ID_objdrug]' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document' style='width: 60%;'>";
            echo "<div class='modal-content'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                <div class='modal-header'>
                    <h4 class='modal-title' id='modalLabel'>แก้ไขข้อมูล : จุดประสงค์การใช้ยา </h4>
                </div>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='col-md-12 form-group' align='center'>
                                <label>แก้ไข จุดประสงค์การใช้ยา</label>
                                <input class='form-control' type='text' name='objdrug_o' id='objdrug_oedit$re[ID_objdrug]' style='height:40px; font-size:16px;width: 30%;' value='$re[objdrug_o]'>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick=Saveedit('$re[ID_objdrug]')>บันทึก</button>
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
    isset($_REQUEST['ID_objdrug']) ? $ID_objdrug = $_REQUEST['ID_objdrug'] : $ID_objdrug = '';
    isset($_REQUEST['objdrug_oedit']) ? $objdrug_oedit = $_REQUEST['objdrug_oedit'] : $objdrug_oedit = '';  

    $strsql = "UPDATE objdrug 
    SET objdrug_o='" . $objdrug_oedit . "'
    WHERE  ID_objdrug = '" . $ID_objdrug . "'";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'แก้ไขข้อมูลสำเร็จ'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'แก้ไขข้อมูลไม่สำเร็จ'));
    }
}

function inser_objdrug(){
    isset($_REQUEST['ID_objdrug']) ? $ID_objdrug = $_REQUEST['ID_objdrug'] : $ID_objdrug = '';
    isset($_REQUEST['objdrug_o']) ? $objdrug_o = $_REQUEST['objdrug_o'] : $objdrug_o = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO objdrug (ID_objdrug, objdrug_o) VALUE('".$ID_objdrug."','".$objdrug_o."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function objdrug_delete(){
    isset($_REQUEST['ID_objdrug']) ? $ID_objdrug = $_REQUEST['ID_objdrug'] : $ID_objdrug = '';

    include '../connect/connect.php';

    $strsql = "UPDATE objdrug SET IsDelete = '1' WHERE ID_objdrug = '".$ID_objdrug."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_objdrug));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>