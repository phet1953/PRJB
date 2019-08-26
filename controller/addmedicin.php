<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_option1(){

    $strsql = "select unitdrug_u from unitdrug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>ขนาดยา <a style='color: red;'>&nbsp;&nbsp; *</a></label>
        <select id='selectA' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['unitdrug_u']."'>".$re['unitdrug_u']."</option>";
        }
        echo "</select>";
    }
}

function select_option2(){

    $strsql = "select munitdrug_m from munitdrug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>ขนาดการใช้ยา <a style='color: red;'>&nbsp;&nbsp; *</a></label>
        <select id='selectB' name='selectB' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['munitdrug_m']."'>".$re['munitdrug_m']."</option>";
        }
        echo "</select>";
    }
}

function select_option3(){

    $strsql = "select methoddrug_m from methoddrug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>วิธีการให้ยา <a style='color: red;'>&nbsp;&nbsp; *</a></label>
        <select id='selectC' name='selectC' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['methoddrug_m']."'>".$re['methoddrug_m']."</option>";
        }
        echo "</select>";
    }
}

function select_option4(){

    $strsql = "select compadrug_c from compadrug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>ชื่อบริษัท <a style='color: red;'>&nbsp;&nbsp; *</a></label>
        <select id='selectD' name='selectD' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['compadrug_c']."'>".$re['compadrug_c']."</option>";
        }
        echo "</select>";
    }
}

function select_option5(){

    $strsql = "select objdrug_o from objdrug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql);
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<label>จุดประสงค์การใช้ยา <a style='color: red;'>&nbsp;&nbsp; *</a></label>
        <select id='selectE' name='selectE' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while($re = mysqli_fetch_assoc($query)) 
        {
            echo "<option value='".$re['objdrug_o']."'>".$re['objdrug_o']."</option>";
        }
        echo "</select>";
    }
}

function select_medicin(){
    $strsql = "select * from medicin where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn,$strsql); 
    if(mysqli_num_rows($query) > 0){
        echo "<div class='table-responsive'>
        <table class='table table-bordered table-responsive' id='example' style='width:100%;'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ชื่อสารออกฤทธิ์</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เลขทะเบียนยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ขนาดยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วิธีการให้ยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ขนาดการใช้ยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>% ของยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ระยะหยุดยา(วัน)</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>จุดประสงค์การใช้ยา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>ข้อบ่งใช้</center></th>
          <th bgcolor='#ffe6ee' class='col-md-2 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while($re = mysqli_fetch_assoc($query)) {
            echo "<tr id='".$re['ID_medicin']."'>";
            echo "<td><div align='center'>".$re['medicin_m']."</div></td>";
            echo "<td><div align='center'>".$re['act_a']."</div></td>";
            echo "<td><div align='center'>".$re['registration_r']."</div></td>";
            echo "<td><div align='center'>".$re['unitdrug_u']."</div></td>";
            echo "<td><div align='center'>".$re['methoddrug_m']."</div></td>";
            echo "<td><div align='center'>".$re['munitdrug_m']."</div></td>";
            echo "<td><div align='center'>".$re['percent_p']."</div></td>";
            echo "<td><div align='center'>".$re['stop_s']."</div></td>";
            echo "<td><div align='center'>".$re['objdrug_o']."</div></td>";
            echo "<td><div align='center'>".$re['use_u']."</div></td>";
            echo "<td>
            <button type='button' class='btn btn-lg' style='width: 0px;height: 0px;margin-bottom: 0px; margin-top: -8px;margin-inline: 10px; background-color: white;' data-toggle='modal' data-target='#flipFlop$re[ID_medicin]'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'></button>
            <input type='image' id='delete' style='margin-bottom: -16px;' onclick=medicin_delete('".$re['ID_medicin']."') src='https://img.icons8.com/plasticine/26/000000/full-trash.png'>
            </td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop$re[ID_medicin]' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document' style='width: 60%;'>";
            echo "<div class='modal-content'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                <div class='modal-header'>
                    <h4 class='modal-title' id='modalLabel'>แก้ไขข้อมูล : การเพิ่มยาในฟาร์ม </h4>
                </div>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='col-md-12 form-group' align='center'>
                                <label>แก้ไข ชื่อยา</label>
                                <input class='form-control' type='text' name='medicin_m' id='medicin_medit$re[ID_medicin]' style='height:40px; font-size:16px;width: 40%;' value='$re[medicin_m]'>
                            </div>
                            <div class='col-md-6 form-group' id='select_option1'>";
                                $strsql1 = "select unitdrug_u from unitdrug where Isdelete = '0' ";
                                include '../connect/connect.php';
                                $query1 = mysqli_query($conn,$strsql1);
                                if (mysqli_num_rows($query1) > 0) 
                                {
                                    echo "<label>แก้ไข ขนาดยา</label>
                                    <select id='selectAedit$re[ID_medicin]' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
                                    <option value=''>เลือกรายการ</option>";
                                    while($re1 = mysqli_fetch_assoc($query1)) {
                                        if($re['unitdrug_u']==$re1['unitdrug_u']){
                                            echo "<option value='".$re1['unitdrug_u']."' selected>".$re1['unitdrug_u']."</option>";
                                        }else{
                                            echo "<option value='".$re1['unitdrug_u']."'>".$re1['unitdrug_u']."</option>";
                                        }
                                    }
                                    echo "</select>";
                                }
                            echo "</div>
                            <div class='col-md-6 form-group' id='select_option2'>";
                                $strsql2 = "select munitdrug_m from munitdrug where Isdelete = '0' ";
                                include '../connect/connect.php';
                                $query2 = mysqli_query($conn,$strsql2);
                                if (mysqli_num_rows($query2) > 0) 
                                {
                                    echo "<label>แก้ไข ขนาดการใช้ยา</label>
                                    <select id='selectBedit$re[ID_medicin]' name='selectB' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
                                    <option value=''>เลือกรายการ</option>";
                                    while($re2 = mysqli_fetch_assoc($query2)) {
                                        if($re['munitdrug_m']==$re2['munitdrug_m']){
                                            echo "<option value='".$re2['munitdrug_m']."' selected>".$re2['munitdrug_m']."</option>";
                                        }else{
                                            echo "<option value='".$re2['munitdrug_m']."'>".$re2['munitdrug_m']."</option>";
                                        }
                                    }
                                    echo "</select>";
                                }
                            echo"</div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข ชื่อสารออกฤทธิ์</label>
                                <input class='form-control' type='text' name='act_a' id='act_aedit$re[ID_medicin]' style='height:40px; font-size:16px;width: 100%;' value='$re[act_a]'>
                            </div>
                            <div class='col-md-4 form-group' id='select_option3'>";
                                $strsql3 = "select methoddrug_m from methoddrug where Isdelete = '0' ";
                                include '../connect/connect.php';
                                $query3 = mysqli_query($conn,$strsql3);
                                if (mysqli_num_rows($query3) > 0) 
                                {
                                    echo "<label>แก้ไข วิธีการให้ยา</label>
                                    <select id='selectCedit$re[ID_medicin]' name='selectC' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
                                    <option value=''>เลือกรายการ</option>";
                                    while($re3 = mysqli_fetch_assoc($query3)) {
                                        if($re['methoddrug_m']==$re3['methoddrug_m']){
                                            echo "<option value='".$re3['methoddrug_m']."' selected>".$re3['methoddrug_m']."</option>";
                                        }else{
                                            echo "<option value='".$re3['methoddrug_m']."'>".$re3['methoddrug_m']."</option>";
                                        }
                                    }
                                    echo "</select>";
                                }
                            echo"</div>
                            <div class='col-md-2 form-group'>
                                <label>แก้ไข % ของยา</label>
                                <input class='form-control' type='number' name='percent_p' id='percent_pedit$re[ID_medicin]' style='height:40px; font-size:16px;width: 100%;' value='$re[percent_p]'>
                            </div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข เลขทะเบียนยา</label>
                                <input class='form-control' type='text' name='registration_r' id='registration_redit$re[ID_medicin]' style='height:40px; font-size:16px;width: 100%;' value='$re[registration_r]'>
                            </div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข ระยะหยุดยา(วัน)</label>
                                <input class='form-control' type='number' name='stop_s' id='stop_sedit$re[ID_medicin]' style='height:40px; font-size:16px;width: 100%;' value='$re[stop_s]'>
                            </div>
                            <div class='col-md-6 form-group' id='select_option5'>";
                                $strsql5 = "select objdrug_o from objdrug where Isdelete = '0' ";
                                include '../connect/connect.php';
                                $query5 = mysqli_query($conn,$strsql5);
                                if (mysqli_num_rows($query5) > 0) 
                                {
                                    echo "<label>แก้ไข จุดประสงค์การใช้ยา</label>
                                    <select id='selectEedit$re[ID_medicin]' name='selectE' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
                                    <option value=''>เลือกรายการ</option>";
                                    while($re5 = mysqli_fetch_assoc($query5)) {
                                        if($re['objdrug_o']==$re5['objdrug_o']){
                                            echo "<option value='".$re5['objdrug_o']."' selected>".$re5['objdrug_o']."</option>";
                                        }else{
                                            echo "<option value='".$re5['objdrug_o']."'>".$re5['objdrug_o']."</option>";
                                        }
                                    }
                                    echo "</select>";
                                }
                            echo"</div>
                            <div class='col-md-6 form-group' id='select_option4'>";
                                $strsql4 = "select compadrug_c from compadrug where Isdelete = '0' ";
                                include '../connect/connect.php';
                                $query4 = mysqli_query($conn,$strsql4);
                                if (mysqli_num_rows($query4) > 0) 
                                {
                                    echo "<label>แก้ไข ชื่อบริษัท</label>
                                    <select id='selectDedit$re[ID_medicin]' name='selectD' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
                                    <option value=''>เลือกรายการ</option>";
                                    while($re4 = mysqli_fetch_assoc($query4)) {
                                        if($re['comname_c']==$re4['compadrug_c']){
                                            echo "<option value='".$re4['compadrug_c']."' selected>".$re4['compadrug_c']."</option>";
                                        }else{
                                            echo "<option value='".$re4['compadrug_c']."'>".$re4['compadrug_c']."</option>";
                                        }
                                    }
                                    echo "</select>";
                                }
                            echo"</div>
                            <div class='col-md-6 form-group'>
                                <label>แก้ไข ข้อบ่งใช้</label>
                                <input class='form-control' type='text' name='use_u' id='use_uedit$re[ID_medicin]' style='height:40px; font-size:16px;width: 100%;' value='$re[use_u]'>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick=Saveedit('$re[ID_medicin]')>บันทึก</button>
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
    isset($_REQUEST['ID_medicin']) ? $ID_medicin = $_REQUEST['ID_medicin'] : $ID_medicin = '';
    isset($_REQUEST['medicin_medit']) ? $medicin_medit = $_REQUEST['medicin_medit'] : $medicin_medit = '';  
    isset($_REQUEST['selectAedit']) ? $selectAedit = $_REQUEST['selectAedit'] : $selectAedit = '';
    isset($_REQUEST['selectBedit']) ? $selectBedit = $_REQUEST['selectBedit'] : $selectBedit = '';
    isset($_REQUEST['act_aedit']) ? $act_aedit = $_REQUEST['act_aedit'] : $act_aedit = '';
    isset($_REQUEST['selectCedit']) ? $selectCedit = $_REQUEST['selectCedit'] : $selectCedit = '';
    isset($_REQUEST['percent_pedit']) ? $percent_pedit = $_REQUEST['percent_pedit'] : $percent_pedit = '';
    isset($_REQUEST['registration_redit']) ? $registration_redit = $_REQUEST['registration_redit'] : $registration_redit = '';
    isset($_REQUEST['stop_sedit']) ? $stop_sedit = $_REQUEST['stop_sedit'] : $stop_sedit = '';
    isset($_REQUEST['selectDedit']) ? $selectDedit = $_REQUEST['selectDedit'] : $selectDedit = '';
    isset($_REQUEST['use_uedit']) ? $use_uedit = $_REQUEST['use_uedit'] : $use_uedit = '';
    isset($_REQUEST['selectEedit']) ? $selectEedit = $_REQUEST['selectEedit'] : $selectEedit = '';

    $strsql = "UPDATE medicin 
    SET medicin_m='" . $medicin_medit . "',unitdrug_u='" . $selectAedit . "',munitdrug_m='" . $selectBedit . "',act_a='" . $act_aedit . "',methoddrug_m='" . $selectCedit . "'
    ,percent_p='" . $percent_pedit . "',registration_r='" . $registration_redit . "',stop_s='" . $stop_sedit . "',comname_c='" . $selectDedit . "',use_u='" . $use_uedit . "',objdrug_o='" . $selectEedit . "'
    WHERE  ID_medicin = '" . $ID_medicin . "'";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'แก้ไขข้อมูลสำเร็จ'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'แก้ไขข้อมูลไม่สำเร็จ'));
    }
}

function inser_medicin(){
    isset($_REQUEST['selectA']) ? $select_option1 = $_REQUEST['selectA'] : $select_option1 = '';
    isset($_REQUEST['medicin_m']) ? $medicin_m = $_REQUEST['medicin_m'] : $medicin_m = '';
    isset($_REQUEST['selectB']) ? $select_option2 = $_REQUEST['selectB'] : $select_option2 = '';
    isset($_REQUEST['act_a']) ? $act_a = $_REQUEST['act_a'] : $act_a = '';
    isset($_REQUEST['selectC']) ? $select_option3 = $_REQUEST['selectC'] : $select_option3 = '';
    isset($_REQUEST['percent_p']) ? $percent_p = $_REQUEST['percent_p'] : $percent_p = '';
    isset($_REQUEST['registration_r']) ? $registration_r = $_REQUEST['registration_r'] : $registration_r = '';
    isset($_REQUEST['stop_s']) ? $stop_s = $_REQUEST['stop_s'] : $stop_s = '';
    isset($_REQUEST['selectD']) ? $select_option4 = $_REQUEST['selectD'] : $select_option4 = '';
    isset($_REQUEST['use_u']) ? $use_u = $_REQUEST['use_u'] : $use_u = '';
    isset($_REQUEST['selectE']) ? $select_option5 = $_REQUEST['selectE'] : $select_option5 = '';

    include '../connect/connect.php';

    $strsql = "INSERT INTO medicin (unitdrug_u, medicin_m, munitdrug_m, act_a, methoddrug_m, percent_p, registration_r, stop_s, comname_c, use_u, objdrug_o) VALUE('".$select_option1."','".$medicin_m."','".$select_option2."','".$act_a."','".$select_option3."','".$percent_p."','".$registration_r."','".$stop_s."','".$select_option4."','".$use_u."','".$select_option5."')";
            $query = mysqli_query($conn,$strsql);
            if ($query) 
            {
                echo json_encode(array('status' => '1','message'=> 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0','message'=> 'เกิดข้อผิดผลาด'));
            }

}

function medicin_delete(){
    isset($_REQUEST['ID_medicin']) ? $ID_medicin = $_REQUEST['ID_medicin'] : $ID_medicin = '';

    include '../connect/connect.php';

    $strsql = "UPDATE medicin SET IsDelete = '1' WHERE ID_medicin = '".$ID_medicin."'";
    $query = mysqli_query($conn,$strsql);
    if($query){
        echo json_encode(array('status' => '1','message'=> 'ลบข้อมูลสำเร็จ','num' => $ID_medicin));
    }
    else
    {
        echo json_encode(array('status' => '0','message'=> 'ลบข้อมูลไม่สำเร็จ'));
    }  
}
?>