<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function SaveEdit()
{
    isset($_REQUEST['ID_breederdad']) ? $ID_breederdad = $_REQUEST['ID_breederdad'] : $ID_breederdad = '';
    isset($_REQUEST['numberedit']) ? $numberedit = $_REQUEST['numberedit'] : $numberedit = '';
    isset($_REQUEST['detedit']) ? $detedit = $_REQUEST['detedit'] : $detedit = '';
    isset($_REQUEST['ageedit']) ? $ageedit = $_REQUEST['ageedit'] : $ageedit = '';
    isset($_REQUEST['selectAedit']) ? $selectAedit = $_REQUEST['selectAedit'] : $selectAedit = '';
    isset($_REQUEST['momedit']) ? $momedit = $_REQUEST['momedit'] : $momedit = '';
    isset($_REQUEST['datfromedit']) ? $datfromedit = $_REQUEST['datfromedit'] : $datfromedit = '';
    isset($_REQUEST['noedit']) ? $noedit = $_REQUEST['noedit'] : $noedit = '';
    isset($_REQUEST['datbirthedit']) ? $datbirthedit = $_REQUEST['datbirthedit'] : $datbirthedit = '';
    isset($_REQUEST['datdetedit']) ? $datdetedit = $_REQUEST['datdetedit'] : $datdetedit = '';

    $num = strlen($numberedit);
            if ($num == 1) {
                $num = "000" . $numberedit;
            } else if ($num == 2) {
                $num = "00" . $numberedit;
            } else if ($num == 3) {
                $num = "0" . $numberedit;
            } else {
                $num = $numberedit;
            }
            $num1 = strlen($detedit);
            if ($num1 == 1) {
                $num1 = "000" . $detedit;
            } else if ($num1 == 2) {
                $num1 = "00" . $detedit;
            } else if ($num1 == 3) {
                $num1 = "0" . $detedit;
            } else {
                $num1 = $detedit;
            }
            $num2 = strlen($momedit);
            if ($num2 == 1) {
                $num2 = "000" . $momedit;
            } else if ($num2 == 2) {
                $num2 = "00" . $momedit;
            } else if ($num2 == 3) {
                $num2 = "0" . $momedit;
            } else {
                $num2 = $momedit;
            }

    $strsql = "UPDATE breederdad 
    SET No_b='" . $num . "',dad_b='" . $num1 . "',age_b='" . $ageedit . "',breed_b='" . $selectAedit . "'
    ,mom_b='" . $num2 . "',birthfrom_b='" . $datfromedit . "',form_b='" . $noedit . "',birthday_b='" . $datbirthedit . "',datdet_d='" . $datdetedit . "'
    WHERE  ID_breederdad = '" . $ID_breederdad . "'";
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

    $strsql = "select breed_b from breed where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label>สายพันธ์ุ <a style='color: red;'>&nbsp;&nbsp; *</a></label>
        <select id='selectA' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
        <option value=''>เลือกรายการ</option>";
        while ($re = mysqli_fetch_assoc($query)) {
            echo "<option value='" . $re['breed_b'] . "'>" . $re['breed_b'] . "</option>";
        }
        echo "</select>";
    }
}

function select_option1()
{

    $strsql = "select No_b from breederdad where Isdelete = '0' ORDER BY No_b ASC";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>ค้นหา เบอร์หูสุกรพ่อพันธู์</label>
        <select id='breeder_b' name='breeder_b' onchange='Changfunction()' class='form-control' style='height:34px; width:140px; font-size:13px;padding: 0px 43px;'>
        <option value=''>ทั้งหมด</option>";
        while ($re = mysqli_fetch_assoc($query)) {
            $num = strlen($re['No_b']);
            if ($num == 1) {
                $num = "000" . $re['No_b'];
            } else if ($num == 2) {
                $num = "00" . $re['No_b'];
            } else if ($num == 3) {
                $num = "0" . $re['No_b'];
            } else {
                $num = $re['No_b'];
            }
            echo "<option value='" . $num . "'>" . $num . "</option>";
        }
        echo "</select>";
    }
}

function Changfunction(){

    include '../connect/connect.php';
    $strsql = "SELECT * FROM `breederdad` WHERE Isdelete = '0' ORDER BY No_b ASC ";
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "<div class='table-responsive'>
        <table class='table table-bordered' id='example' style='width:100%;margin-top: 2px;' align='center'>
        <thead>
         <tr>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เบอร์หูสุกรพ่อพันธุ์</center></th>
          <th bgcolor='#ffe6ee' class='col-md-2 col-xs-1'><center>สายพันธ์ุ</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เบอร์หูพ่อของสุกรพ่อพันธู์</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>เบอร์หูแม่ของสุกรพ่อพันธู์</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วันที่เกิด</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วันที่เข้าฝูง</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>วันที่คัดออก</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>อายุ</center></th>
          <th bgcolor='#ffe6ee' class='col-md-1 col-xs-1'><center>แหล่งที่มา</center></th>
          <th bgcolor='#ffe6ee' class='col-md-2 col-xs-1'><center>สถานะ</center></th>
         </tr>
        </thead>
        <tbody>";
        while ($re = mysqli_fetch_assoc($query)) {
            $num = strlen($re['No_b']);
            if ($num == 1) {
                $num = "000" . $re['No_b'];
            } else if ($num == 2) {
                $num = "00" . $re['No_b'];
            } else if ($num == 3) {
                $num = "0" . $re['No_b'];
            } else {
                $num = $re['No_b'];
            }
            $num1 = strlen($re['dad_b']);
            if ($num1 == 1) {
                $num1 = "000" . $re['dad_b'];
            } else if ($num1 == 2) {
                $num1 = "00" . $re['dad_b'];
            } else if ($num1 == 3) {
                $num1 = "0" . $re['dad_b'];
            } else {
                $num1 = $re['dad_b'];
            }
            $num2 = strlen($re['mom_b']);
            if ($num2 == 1) {
                $num2 = "000" . $re['mom_b'];
            } else if ($num2 == 2) {
                $num2 = "00" . $re['mom_b'];
            } else if ($num2 == 3) {
                $num2 = "0" . $re['mom_b'];
            } else {
                $num2 = $re['mom_b'];
            }
            echo "<tr id='" . $re['ID_breederdad'] . "'>";
            echo "<td><div align='center'>" . $num . "</div></td>";
            echo "<td><div align='center'>" . $re['breed_b'] . "</div></td>";
            echo "<td><div align='center'>" . $num1 . "</div></td>";
            echo "<td><div align='center'>" . $num2 . "</div></td>";
            echo "<td><div align='center'>" . $re['birthday_b'] . "</div></td>";
            echo "<td><div align='center'>" . $re['birthfrom_b'] . "</div></td>";
            echo "<td><div align='center'>" . $re['datdet_d'] . "</div></td>";
            echo "<td><div align='center'>" . $re['age_b'] . "</div></td>";
            echo "<td><div align='center'>" . $re['form_b'] . "</div></td>";
            echo "<td>
            
            <button type='button' class='btn btn-lg' style='background-color: white;margin-bottom:-5px;margin-top: -8px;margin-inline: -10px;width: 0px; height: 0px;' data-toggle='modal' data-target='#flipFlop$re[ID_breederdad]'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'></button>
            <input type='image' id='delete' style='margin-bottom: -20px;' onclick=dad_delete('" . $re['ID_breederdad'] . "') src='https://img.icons8.com/plasticine/26/000000/full-trash.png'>
            </td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop$re[ID_breederdad]' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document' style='width: 60%;'>";
            echo "<div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <h4 class='modal-title' id='modalLabel'>แก้ไขข้อมูล : เบอร์หู $num</h4>
            </div>
            <div class='modal-body'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='col-md-4 form-group' align='center'>
                            <label>แก้ไข เบอร์หูสุกรพ่อพันธู์</label>
                            <input class='form-control' name='number' id='numberedit$re[ID_breederdad]' type='number' style='height:40px; font-size:16px;' value='$num'>
                        </div>
                        <div class='col-md-4 form-group' align='center'>
                            <label>แก้ไข เบอร์หูพ่อของสุกรพ่อพันธู์</label>
                            <input class='form-control' name='det' id='detedit$re[ID_breederdad]' type='number' style='height:40px; font-size:16px;' value='$num1'>
                        </div>
                        <div class='col-md-4 form-group' align='center'>
                            <label>แก้ไข อายุ</label>
                            <input class='form-control' type='number' name='age' id='ageedit$re[ID_breederdad]' style='height:40px; font-size:16px;' value='$re[age_b]'>
                        </div>
                        <div class='col-md-4 form-group' id='select_option' align='center'>";

                            $strsql2 = "select breed_b from breed where Isdelete = '0' ";
                            $query2 = mysqli_query($conn, $strsql2);
                            if (mysqli_num_rows($query2) > 0) {
                                echo "<label>แก้ไข สายพันธ์ุ</label>
                                <select id='selectAedit$re[ID_breederdad]' name='selectA' class='form-control' style='height:40px; font-size:16px;padding: 0px 60px;'>
                                <option value=''>เลือกรายการ</option>";
                                while ($re2 = mysqli_fetch_assoc($query2)) {
                                    if($re['breed_b']==$re2['breed_b']){
                                        echo "<option value='".$re2['breed_b']."' selected>".$re2['breed_b']."</option>";
                                    }else{
                                        echo "<option value='".$re2['breed_b']."'>".$re2['breed_b']."</option>";
                                    }
                                }
                                echo "</select>";
                            }

                echo "</div>
                        <div class='col-md-4 form-group' align='center'>
                            <label>แก้ไข เบอร์หูแม่ของสุกรพ่อพันธู์</label>
                            <input class='form-control' name='mom' id='momedit$re[ID_breederdad]' type='number' style='height:40px; font-size:16px;' value='$num2'>
                        </div>
                        <div class='col-md-4 form-group' align='center'>
                            <label>แก้ไข วันที่เข้าฝูง</label>
                            <input type='date' class='form-control' name='datfrom' id='datfromedit$re[ID_breederdad]' style='height:40px; font-size:16px;padding: 0px 60px;' value='$re[birthfrom_b]'>
                        </div>
                        <div class='col-md-4 form-group' align='center'>
                            <label>แก้ไข แหล่งที่มา</label>
                            <input class='form-control' name='no' id='noedit$re[ID_breederdad]' type='text' style='height:40px; font-size:16px;' value='$re[form_b]'>
                        </div>
                        <div class='col-md-4 form-group' align='center'>
                            <label>แก้ไข วันที่เกิด</label>
                            <input type='date' class='form-control' name='datbirth' id='datbirthedit$re[ID_breederdad]' style='height:40px; font-size:16px;padding: 0px 60px;' value='$re[birthday_b]'>
                        </div>
                        <div class='col-md-4 form-group' align='center'>
                            <label>แก้ไข วันที่คัดออก</label>
                            <input type='date' class='form-control' name='datdet' id='datdetedit$re[ID_breederdad]' style='height:40px; font-size:16px;padding: 0px 60px;'value='$re[datdet_d]'>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick=Saveedit('$re[ID_breederdad]')>บันทึก</button>
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

function inser_dad()
{
    isset($_REQUEST['number']) ? $number = $_REQUEST['number'] : $number = '';
    isset($_REQUEST['det']) ? $det = $_REQUEST['det'] : $det = '';
    isset($_REQUEST['age']) ? $age = $_REQUEST['age'] : $age = '';
    isset($_REQUEST['selectA']) ? $select_option = $_REQUEST['selectA'] : $select_option = '';
    isset($_REQUEST['mom']) ? $mom = $_REQUEST['mom'] : $mom = '';
    isset($_REQUEST['datfrom']) ? $datfrom = $_REQUEST['datfrom'] : $datfrom = '';
    isset($_REQUEST['no']) ? $no = $_REQUEST['no'] : $no = '';
    isset($_REQUEST['datbirth']) ? $datbirth = $_REQUEST['datbirth'] : $datbirth = '';
    isset($_REQUEST['datdet']) ? $datdet = $_REQUEST['datdet'] : $datdet = '';

    include '../connect/connect.php';

    $num = strlen($number);
    if ($num == 1) {
        $num = "000" . $number;
    } else if ($num == 2) {
        $num = "00" . $number;
    } else if ($num == 3) {
        $num = "0" . $number;
    } else {
        $num = $number;
    }
    $num1 = strlen($det);
    if ($num1 == 1) {
        $num1 = "000" . $det;
    } else if ($num1 == 2) {
        $num1 = "00" . $det;
    } else if ($num1 == 3) {
        $num1 = "0" . $det;
    } else {
        $num1 = $det;
    }
    $num2 = strlen($mom);
    if ($num2 == 1) {
        $num2 = "000" . $mom;
    } else if ($num2 == 2) {
        $num2 = "00" . $mom;
    } else if ($num2 == 3) {
        $num2 = "0" . $mom;
    } else {
        $num2 = $mom;
    }
    $strsql = "SELECT * FROM `breederdad` WHERE No_b = '" . $num . "'";
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0){
        echo json_encode(array('status' => '0', 'message' => 'fail ซ้ำเบอร์หูสุกรพ่อพันธู์'));
    }else{
        $strsql1 = "SELECT * FROM `breeder` WHERE No_b = '" . $num . "'";
        $query1 = mysqli_query($conn, $strsql1);
        if (mysqli_num_rows($query1) > 0){
            echo json_encode(array('status' => '0', 'message' => 'fail ซ้ำเบอร์หูสุกรแม่พันธู์'));
        }else{
            $strsql2 = "INSERT INTO breederdad (No_b, dad_b, mom_b, birthday_b, birthfrom_b, datdet_d, age_b, breed_b, form_b) VALUE('" . $num . "','" . $num1 . "','" . $num2 . "','" . $datbirth . "','" . $datfrom . "','" . $datdet . "','" . $age . "','" . $select_option . "','" . $no . "')";
            $query2 = mysqli_query($conn, $strsql2);
            if ($query2){
                echo json_encode(array('status' => '1', 'message' => 'เพิ่มข้อมูลสำเร็จ'));
            }else{
                echo json_encode(array('status' => '0', 'message' => 'เกิดข้อผิดผลาด'));
            }
        }
    }
}

function dad_delete()
{
    isset($_REQUEST['ID_breederdad']) ? $ID_breederdad = $_REQUEST['ID_breederdad'] : $ID_breederdad = '';

    include '../connect/connect.php';

    $strsql = "UPDATE breederdad SET IsDelete = '1' WHERE ID_breederdad = '" . $ID_breederdad . "'";
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'ลบข้อมูลสำเร็จ', 'num' => $ID_breederdad));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'ลบข้อมูลไม่สำเร็จ'));
    }
}
?>