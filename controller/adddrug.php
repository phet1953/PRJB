<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_option(){

    $strsql = "select compadrug_c from compadrug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>ชื่อบริษัท <a style='color: red;'>&nbsp;&nbsp; *</a></label>
        <select id='selectA' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['compadrug_c']."'>".$re['compadrug_c']."</option>";
        }
        echo "</select>";
    }
}

function select_drug(){
    $strsql = "select * from drug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<div class='table-responsive'>
        <table class='table table-bordered table-responsive' id='example' style='width:100%;'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วัคซีนป้องกันโรค</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อผลิตภัณฑ์</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ปริมาณการใช้(ซีซี/ตัว)</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อบริษัท</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ข้อบ่งใช้</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_drug']."'>";
            echo "<td><div align='center'>".$re['drug_d']."</div></td>";
            echo "<td><div align='center'>".$re['product_p']."</div></td>";
            echo "<td><div align='center'>".$re['cc_c']."</div></td>";
            echo "<td><div align='center'>".$re['com_c']."</div></td>";
            echo "<td><div align='center'>".$re['use_u']."</div></td>";
            echo "<td>
            <button type='button' class='btn btn-lg' style='width: 0px;height: 0px;margin-top: -8px; margin-bottom: 0px;background-color: white;margin-inline: 14px;' data-toggle='modal' data-target='#flipFlop$re[ID_drug]'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'></button>
            <input type='image' id='delete' style='margin-bottom: -17px;' onclick=drug_delete('".$re['ID_drug']."') src='https://img.icons8.com/plasticine/26/000000/full-trash.png'>
            </td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop$re[ID_drug]' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document' style='width: 60%;'>";
            echo "<div class='modal-content'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                <div class='modal-header'>
                    <h4 class='modal-title' id='modalLabel'>แก้ไขข้อมูล : การใช้วัคซีนในฟาร์ม </h4>
                </div>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='col-md-4 form-group'>";
                                echo "<div  id='select_option'>
                                </div>";
                                $strsql2 = "select compadrug_c from compadrug where Isdelete = '0' ";
                                include '../connect/connect.php';
                                $query2 = mysqli_query($conn,$strsql2);
                                if (mysqli_num_rows($query2) > 0) 
                                {
                                    echo "<label>แก้ไข ชื่อบริษัท</label>
                                    <select id='selectAedit$re[ID_drug]' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
                                    <option value=''>เลือกรายการ</option>";
                                    while($re2 = mysqli_fetch_assoc($query2)) {
                                        if($re['com_c']==$re2['compadrug_c']){
                                            echo "<option value='".$re2['compadrug_c']."' selected>".$re2['compadrug_c']."</option>";
                                        }else{
                                            echo "<option value='".$re2['compadrug_c']."'>".$re2['compadrug_c']."</option>";
                                        }
                                    }
                                    echo "</select>";
                                }
                            echo "</div>
                            <div class='col-md-4 form-group'>
                                <label>แก้ไข วัคซีนป้องกันโรค</label>
                                <input class='form-control' type='text' name='drug_d' id='drug_dedit$re[ID_drug]' style='height:40px; font-size:16px;width: 100%;' value='$re[drug_d]'>
                            </div>
                            <div class='col-md-4 form-group'>
                                <label>แก้ไข ปริมาณการใช้(ซีซี/ตัว)</label>
                                <input class='form-control' type='number' name='cc_c' id='cc_cedit$re[ID_drug]' style='height:40px; font-size:16px;width: 100%;' value='$re[cc_c]'>
                            </div>
                            <div class='col-md-4 form-group'>
                                <label>แก้ไข ชื่อผลิตภัณฑ์</label>
                                <input class='form-control' type='text' name='product_p' id='product_pedit$re[ID_drug]' style='height:40px; font-size:16px;width: 100%;' value='$re[product_p]'>
                            </div>
                            <div class='col-md-4 form-group'>
                                <label>แก้ไข ข้อบ่งใช้</label>
                                <input class='form-control' type='text' name='use_u' id='use_uedit$re[ID_drug]' style='height:40px; font-size:16px;width: 100%;' value='$re[use_u]'>
                            </div>      
                        </div>
                    </div>                    
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick=Saveedit('$re[ID_drug]')>บันทึก</button>
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
    isset($_REQUEST['ID_drug']) ? $ID_drug = $_REQUEST['ID_drug'] : $ID_drug = '';
    isset($_REQUEST['selectAedit']) ? $selectAedit = $_REQUEST['selectAedit'] : $selectAedit = ''; 
    isset($_REQUEST['drug_dedit']) ? $drug_dedit = $_REQUEST['drug_dedit'] : $drug_dedit = '';
    isset($_REQUEST['cc_cedit']) ? $cc_cedit = $_REQUEST['cc_cedit'] : $cc_cedit = '';
    isset($_REQUEST['product_pedit']) ? $product_pedit = $_REQUEST['product_pedit'] : $product_pedit = '';
    isset($_REQUEST['use_uedit']) ? $use_uedit = $_REQUEST['use_uedit'] : $use_uedit = ''; 

    $strsql = "UPDATE drug 
    SET com_c='" . $selectAedit . "',drug_d='" . $drug_dedit . "',cc_c='" . $cc_cedit . "',product_p='" . $product_pedit . "',use_u='" . $use_uedit . "'
    WHERE  ID_drug = '" . $ID_drug . "'";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'แก้ไขข้อมูลสำเร็จ'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'แก้ไขข้อมูลไม่สำเร็จ'));
    }
}

function inser_drug(){
    isset($_REQUEST['selectA']) ? $select_option = $_REQUEST['selectA'] : $select_option = '';
    isset($_REQUEST['drug_d']) ? $drug_d = $_REQUEST['drug_d'] : $drug_d = '';
    isset($_REQUEST['cc_c']) ? $cc_c = $_REQUEST['cc_c'] : $cc_c = '';
    isset($_REQUEST['product_p']) ? $product_p = $_REQUEST['product_p'] : $product_p = '';
    isset($_REQUEST['use_u']) ? $use_u = $_REQUEST['use_u'] : $use_u = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO drug (com_c, drug_d, cc_c, product_p, use_u) VALUE('".$select_option."','".$drug_d."','".$cc_c."','".$product_p."','".$use_u."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function drug_delete(){
    isset($_REQUEST['ID_drug']) ? $ID_drug = $_REQUEST['ID_drug'] : $ID_drug = '';

    include '../connect/connect.php';

    $strsql = "UPDATE drug SET IsDelete = '1' WHERE ID_drug = '".$ID_drug."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_drug));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>