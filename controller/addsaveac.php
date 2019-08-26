<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function inser_saveac()
{
    isset($_REQUEST['breeder_b']) ? $select_option1 = $_REQUEST['breeder_b'] : $select_option1 = '';
    isset($_REQUEST['date_d']) ? $date_d = $_REQUEST['date_d'] : $date_d = '';
    isset($_REQUEST['even']) ? $even = $_REQUEST['even'] : $even = '';

    isset($_REQUEST['breederdad_breed']) ? $select_option3 = $_REQUEST['breederdad_breed'] : $select_option3 = '';
    isset($_REQUEST['medicin_getmedicin']) ? $select_option4 = $_REQUEST['medicin_getmedicin'] : $select_option4 = '';
    isset($_REQUEST['volume_getmedicin']) ? $volume_getmedicin = $_REQUEST['volume_getmedicin'] : $volume_getmedicin = '';
    isset($_REQUEST['sick_sick']) ? $select_option5 = $_REQUEST['sick_sick'] : $select_option5 = '';
    isset($_REQUEST['note_sick']) ? $note_sick = $_REQUEST['note_sick'] : $note_sick = '';
    isset($_REQUEST['drug_drug']) ? $select_option6 = $_REQUEST['drug_drug'] : $select_option6 = '';
    isset($_REQUEST['note_inreturn_animal']) ? $note_inreturn_animal = $_REQUEST['note_inreturn_animal'] : $note_inreturn_animal = '';
    isset($_REQUEST['note_dead']) ? $note_dead = $_REQUEST['note_dead'] : $note_dead = '';
    isset($_REQUEST['results_check_up']) ? $select_option7 = $_REQUEST['results_check_up'] : $select_option7 = '';
    isset($_REQUEST['define_check_up']) ? $define_check_up = $_REQUEST['define_check_up'] : $define_check_up = '';
    isset($_REQUEST['text_abortion']) ? $text_abortion = $_REQUEST['text_abortion'] : $text_abortion = '';
    isset($_REQUEST['abortion_abortion']) ? $abortion_abortion = $_REQUEST['abortion_abortion'] : $abortion_abortion = '';
    isset($_REQUEST['allpigs_deliver']) ? $allpigs_deliver = $_REQUEST['allpigs_deliver'] : $allpigs_deliver = '';
    isset($_REQUEST['piglet_alive_deliver']) ? $piglet_alive_deliver = $_REQUEST['piglet_alive_deliver'] : $piglet_alive_deliver = '';
    isset($_REQUEST['dead_pig_birth_deliver']) ? $dead_pig_birth_deliver = $_REQUEST['dead_pig_birth_deliver'] : $dead_pig_birth_deliver = '';
    isset($_REQUEST['eooukornou_deliver']) ? $eooukornou_deliver = $_REQUEST['eooukornou_deliver'] : $eooukornou_deliver = '';
    isset($_REQUEST['pork_litter_deliver']) ? $pork_litter_deliver = $_REQUEST['pork_litter_deliver'] : $pork_litter_deliver = '';
    isset($_REQUEST['average_piglets_deliver']) ? $average_piglets_deliver = $_REQUEST['average_piglets_deliver'] : $average_piglets_deliver = '';
    isset($_REQUEST['number_deposit_piglet']) ? $number_deposit_piglet = $_REQUEST['number_deposit_piglet'] : $number_deposit_piglet = '';
    isset($_REQUEST['breder_deposit_piglet']) ? $select_option8 = $_REQUEST['breder_deposit_piglet'] : $select_option8 = '';
    isset($_REQUEST['number_piglet']) ? $number_piglet = $_REQUEST['number_piglet'] : $number_piglet = '';
    isset($_REQUEST['breder_piglet']) ? $select_option9 = $_REQUEST['breder_piglet'] : $select_option9 = '';
    isset($_REQUEST['number_wean']) ? $number_wean = $_REQUEST['number_wean'] : $number_wean = '';
    isset($_REQUEST['pork_litter_wean']) ? $pork_litter_wean = $_REQUEST['pork_litter_wean'] : $pork_litter_wean = '';
    isset($_REQUEST['number_piglet_dies']) ? $number_piglet_dies = $_REQUEST['number_piglet_dies'] : $number_piglet_dies = '';
    isset($_REQUEST['cause_piglet_dies']) ? $select_option10 = $_REQUEST['cause_piglet_dies'] : $select_option10 = '';
    isset($_REQUEST['note_piglet_dies']) ? $note_piglet_dies = $_REQUEST['note_piglet_dies'] : $note_piglet_dies = '';
    isset($_REQUEST['text_wind_belly']) ? $text_wind_belly = $_REQUEST['text_wind_belly'] : $text_wind_belly = '';

    include '../connect/connect.php';

    date_default_timezone_set("Asia/Bangkok");
    $Time = date("H:i:s");
    /////   ///////////////////////////////////////////////
    $strsql1 = "select * from activity_record where breeder_b = '" . $select_option1 . "' ";
    $query1 = mysqli_query($conn, $strsql1);
    if (mysqli_num_rows($query1) > 0) {
        $strsql2 = "UPDATE activity_record SET breeder_b = '" . $select_option1 . "',Isdelete = '0' where breeder_b = '" . $select_option1 . "'  ";
        mysqli_query($conn, $strsql2);
    }
    /////    /////////////////////////////////////////////////
    if ($even == "ผสม") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `breederdad_breed`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $select_option3 . "','0')";
    } else if ($even == "ได้รับยา") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `medicin_getmedicin`, `volume_getmedicin`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $select_option4 . "', '" . $volume_getmedicin . "','0')";
    } else if ($even == "ป่วย") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `sick_sick`, `note_sick`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $select_option5 . "', '" . $note_sick . "','0')";
    } else if ($even == "ทำวัคซีน") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `drug_drug`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $select_option6 . "','0')";
    } else if ($even == "กลับสัด") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `note_inreturn_animal`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $note_inreturn_animal . "','0')";
    } else if ($even == "ตาย") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `note_dead`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $note_dead . "','5')";
        $strsql1 = "UPDATE breeder SET IsDelete = '5' WHERE No_b = '" . $select_option1 . "'";
    } else if ($even == "ตรวจท้อง") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `results_check_up`, `define_check_up`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $select_option7 . "', '" . $define_check_up . "','0')";
    } else if ($even == "แท้ง") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `text_abortion`, `abortion_abortion`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $text_abortion . "', '" . $abortion_abortion . "','0')";
    } else if ($even == "คลอด") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `allpigs_deliver`, `piglet_alive_deliver`, `dead_pig_birth_deliver`, `eooukornou_deliver`, `pork_litter_deliver`, `average_piglets_deliver`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $allpigs_deliver . "', '" . $piglet_alive_deliver . "', '" . $dead_pig_birth_deliver . "', '" . $eooukornou_deliver . "', '" . $pork_litter_deliver . "', '" . $average_piglets_deliver . "','0')";
    } else if ($even == "ฝากเลี้ยง") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `number_deposit_piglet`, `breder_deposit_piglet`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $number_deposit_piglet . "', '" . $select_option8 . "','0')";
    } else if ($even == "รับเลี้ยง") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `number_piglet`, `breder_piglet`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $number_piglet . "', '" . $select_option9 . "','0')";
    } else if ($even == "หย่านม") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `number_wean`, `pork_litter_wean`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $number_wean . "', '" . $pork_litter_wean . "','0')";
    } else if ($even == "ลูกหมูตาย") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `number_piglet_dies`, `cause_piglet_dies`, `note_piglet_dies`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $number_piglet_dies . "', '" . $select_option10 . "', '" . $note_piglet_dies . "','0')";
    } else if ($even == "ท้องลม") {
        $strsql = "INSERT INTO `activity_record` (`breeder_b`, `date_d`, `activity_a`, `text_wind_belly`, `Isdelete`) VALUES ('" . $select_option1 . "', '" . $date_d . " " . $Time . "', '" . $even . "', '" . $text_wind_belly . "','0')";
    } else {
        echo "Error save";
    }
    $query = mysqli_query($conn, $strsql);
    $query1 = mysqli_query($conn, $strsql1);
    if ($query && $query1) {
        echo json_encode(array('status' => '1', 'message' => 'เพิ่มข้อมูลสำเร็จ'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'เกิดข้อผิดผลาด'));
    }
}

function Changfunction()
{
    isset($_REQUEST['breeder_b']) ? $breeder_b = $_REQUEST['breeder_b'] : $breeder_b = '';

    include '../connect/connect.php';
    if ($breeder_b != "") {
        $strsql = "select * from activity_record where Isdelete != '1' AND Isdelete != '2' AND Isdelete != '4' AND Isdelete != '5' AND breeder_b = '" . $breeder_b . "'  ORDER BY date_d DESC";
    } else {
        $strsql = "select * from activity_record where Isdelete != '1' AND Isdelete != '2' AND Isdelete != '4' AND Isdelete != '5' ORDER BY date_d DESC";
    }
    $query = mysqli_query($conn, $strsql);
    echo "<table class='table table-hover table-bordered results' style='margin-top: 2px;' id='example' style='width:100%;'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'style='width:4%;'><center>เบอร์หูแม่พันธุ์</center></th>";
    echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>วันที่</center></th>";
    echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>เหตุการณ์กิจกรรม</center></th>";
    echo "<th bgcolor='#ffe6ee'class='col-md-2 col-xs-2'><center>หมายเหตุ</center></th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    if (mysqli_num_rows($query) > 0) {
        while ($re = mysqli_fetch_assoc($query)) {
            $num = strlen($re['breeder_b']);
            if ($num == 1) {
                $num = "000" . $re['breeder_b'];
            } else if ($num == 2) {
                $num = "00" . $re['breeder_b'];
            } else if ($num == 3) {
                $num = "0" . $re['breeder_b'];
            } else {
                $num = $re['breeder_b'];
            }
            $num1 = strlen($re['breederdad_breed']);
            if ($num1 == 1) {
                $num1 = "000" . $re['breederdad_breed'];
            } else if ($num1 == 2) {
                $num1 = "00" . $re['breederdad_breed'];
            } else if ($num1 == 3) {
                $num1 = "0" . $re['breederdad_breed'];
            } else {
                $num1 = $re['breederdad_breed'];
            }
            $num2 = strlen($re['breder_deposit_piglet']);
            if ($num2 == 1) {
                $num2 = "000" . $re['breder_deposit_piglet'];
            } else if ($num2 == 2) {
                $num2 = "00" . $re['breder_deposit_piglet'];
            } else if ($num2 == 3) {
                $num2 = "0" . $re['breder_deposit_piglet'];
            } else {
                $num2 = $re['breder_deposit_piglet'];
            }
            $num3 = strlen($re['breder_piglet']);
            if ($num3 == 1) {
                $num3 = "000" . $re['breder_piglet'];
            } else if ($num3 == 2) {
                $num3 = "00" . $re['breder_piglet'];
            } else if ($num3 == 3) {
                $num3 = "0" . $re['breder_piglet'];
            } else {
                $num3 = $re['breder_piglet'];
            }

            $dates = $re['date_d'];
            $end = DateTime::createFromFormat('Y-m-d H:i:s', $dates)->format('d-m-Y H:i:s'); 

            echo "<tr id='" . $re['ID_activity_record'] . "'>";
            echo "<td><div align='center'>" . $num . "</div></td>";
            echo "<td><div align='center'>" . $end . "</div></td>";
            echo "<td><div align='center'>" . $re['activity_a'] . "</div></td>";

            $even = $re["activity_a"];
            if ($even == "ผสม") {
                echo "<td class='pt-2-half' contenteditable='true'>ผสมกับพ่อพันธู์ : " . $num1 . "</td>";
            } else if ($even == "ได้รับยา") {
                echo "<td class='pt-2-half' contenteditable='true'>ชื่อยา : " . $re['medicin_getmedicin'] . " &nbsp;&nbsp;" . " ปริมาณ : " . $re['volume_getmedicin'] . " เม็ด</td>";
            } else if ($even == "ป่วย") {
                echo "<td class='pt-2-half' contenteditable='true'>อาการป่วย  : " . $re['sick_sick'] . " &nbsp;&nbsp;" . " หมายเหตุ  : " . $re['note_sick'] . "</td>";
            } else if ($even == "ทำวัคซีน") {
                echo "<td class='pt-2-half' contenteditable='true'>ชื่อวัคซีน  : " . $re['drug_drug'] . "</td>";
            } else if ($even == "กลับสัด") {
                echo "<td class='pt-2-half' contenteditable='true'>หมายเหตุ  : " . $re['note_inreturn_animal'] . "</td>";
            } else if ($even == "ตาย") {
                echo "<td class='pt-2-half' contenteditable='true'>หมายเหตุ  : " . $re['note_dead'] . "</td>";
            } else if ($even == "ตรวจท้อง") {
                echo "<td class='pt-2-half' contenteditable='true'>ผล  : " . $re['results_check_up'] . " &nbsp;&nbsp;" . " กำหนดคลอด  : " . $re['define_check_up'] . "</td>";
            } else if ($even == "แท้ง") {
                echo "<td class='pt-2-half' contenteditable='true'>ข้อความ   : " . $re['text_abortion'] . " &nbsp;&nbsp;" . " อายุที่แท้ง   : " . $re['abortion_abortion'] . " วัน " . "</td>";
            } else if ($even == "คลอด") {
                echo "<td class='pt-2-half' contenteditable='true'>ลูกทั้งหมด  : " . $re['allpigs_deliver'] . " ตัว " . " &nbsp;&nbsp;" . " ลูกมีชีวิต : " . $re['piglet_alive_deliver'] . " ตัว " . " &nbsp;&nbsp;" . "ตายแรกคลอด : " . $re['dead_pig_birth_deliver'] . " ตัว " . " &nbsp;&nbsp;" . " ลูกกรอก  : " . $re['eooukornou_deliver'] . " ตัว " . " &nbsp;&nbsp;" . "นน.ครอก  : " . $re['pork_litter_deliver'] . " ตัว " . " &nbsp;&nbsp;" . " เฉลี่ย นน.ลูกสุกร   : " . $re['average_piglets_deliver'] . "กก." . "</td>";
            } else if ($even == "ฝากเลี้ยง") {
                echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : " . $re['number_deposit_piglet'] . " ตัว " . " &nbsp;&nbsp;" . " เบอร์แม่ที่ฝาก  : " . $num2 . "</td>";
            } else if ($even == "รับเลี้ยง") {
                echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : " . $re['number_piglet'] . " ตัว " . " &nbsp;&nbsp;" . " เบอร์แม่ที่ฝาก  : " . $num3 . "</td>";
            } else if ($even == "หย่านม") {
                echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : " . $re['number_wean'] . " ตัว " . " &nbsp;&nbsp;" . " นน.ครอก  : " . $re['pork_litter_wean'] . "</td>";
            } else if ($even == "ลูกหมูตาย") {
                echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : " . $re['number_piglet_dies'] . " ตัว " . " &nbsp;&nbsp;" . " สาเหตุ  : " . $re['cause_piglet_dies'] . " &nbsp;&nbsp;" . " หมายเหตุ  : " . $re['note_piglet_dies'] . "</td>";
            } else if ($even == "ท้องลม") {
                echo "<td class='pt-2-half' contenteditable='true'>ข้อความ  : " . $re['text_wind_belly'] . "</td>";
            } else {
                echo "<td class='pt-2-half' contenteditable='true'></td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr id=''>";
        echo "<td><div align='center'>ไม่พบข้อมูล</div></td>";
        echo "<td><div align='center'>ไม่พบข้อมูล</div></td>";
        echo "<td><div align='center'>ไม่พบข้อมูล</div></td>";
        echo "<td><div align='center'>ไม่พบข้อมูล</div></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

function select_option1()
{

    $strsql = "select No_b from breeder where Isdelete = '0' ORDER BY No_b ASC";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>เบอร์หูของสุกรแม่พันธุ์</label>
        <select id='breeder_b' name='breeder_b' onchange='Changfunction()' class='form-control' style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
        <option value=''>เบอร์หูของสุกรแม่พันธุ์</option>";
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

function select_option2()
{
    $sql = "select activity_a from activity where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>เหตุการณ์กิจกรรม</label>
                <select id='even' class='form-control' name='even' onchange='ChangOption()' style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                <option value=''>เลือกกิจกรรม</option>";
        while ($row = mysqli_fetch_array($query)) {
            echo "<option value=" . $row['activity_a'] . ">" . $row['activity_a'] . "</option>";
        }
        echo "</select>";
    }
}

function select_option3()
{
    $sql = "SELECT No_b FROM breederdad where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>เบอร์หูของสุกรพ่อพันธุ์</label>
                <select id='breederdad_breed' class='form-control' name='breederdad_breed' style='height:34px; width:210px; font-size:13px;padding: -1px 43px;'>
                <option value=''>เลือกเบอร์หูของสุกรพ่อพันธุ์</option>";
        while ($re = mysqli_fetch_array($query)) {
            $num1 = strlen($re['No_b']);
            if ($num1 == 1) {
                $num1 = "000" . $re['No_b'];
            } else if ($num1 == 2) {
                $num1 = "00" . $re['No_b'];
            } else if ($num1 == 3) {
                $num1 = "0" . $re['No_b'];
            } else {
                $num1 = $re['No_b'];
            }
            echo "<option value=" . $num1 . ">" . $num1 . "</option>";
        }
        echo "</select>";
    }
}

function select_option4()
{
    $sql = "SELECT medicin_m FROM medicin where Isdelete = '0'  ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>ชื่อยา</label>
                <select id='medicin_getmedicin' class='form-control' name='medicin_getmedicin' style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                <option value=''>เลือกชื่อยา</option>";
        while ($row = mysqli_fetch_array($query)) {
            echo "<option value=" . $row['medicin_m'] . ">" . $row['medicin_m'] . "</option>";
        }
        echo "</select>";
    }
}

function select_option5()
{
    $sql = "SELECT sick_s FROM sick  where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>อาการป่วย</label>
                <select id='sick_sick' class='form-control' name='sick_sick' style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                <option value=''>เลือกอาการป่วย</option>";
        while ($row = mysqli_fetch_array($query)) {
            echo "<option value=" . $row['sick_s'] . ">" . $row['sick_s'] . "</option>";
        }
        echo "</select>";
    }
}

function select_option6()
{
    $sql = "SELECT drug_d FROM drug where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>ชื่อวัคซีน</label>
                <select id='drug_drug' class='form-control' name='drug_drug' style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                <option value=''>เลือกชื่อวัคซีน</option>";
        while ($row = mysqli_fetch_array($query)) {
            echo "<option value=" . $row['drug_d'] . ">" . $row['drug_d'] . "</option>";
        }
        echo "</select>";
    }
}

function select_option7()
{
    $sql = "SELECT checkbelly_c FROM checkbelly where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>ผล</label>
                <select id='results_check_up' class='form-control' name='results_check_up' style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                <option value=''>เลือกผลการตรวจ</option>";
        while ($row = mysqli_fetch_array($query)) {
            echo "<option value=" . $row['checkbelly_c'] . ">" . $row['checkbelly_c'] . "</option>";
        }
        echo "</select>";
    }
}

function select_option8()
{
    $sql = "SELECT No_b FROM breeder where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>เบอร์แม่ที่ฝาก</label>
                <select id='breder_deposit_piglet' class='form-control' name='breder_deposit_piglet' style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                <option value=''>เลือกเบอร์แม่ที่ฝาก</option>";
        while ($re = mysqli_fetch_array($query)) {
            $num2 = strlen($re['No_b']);
            if ($num2 == 1) {
                $num2 = "000" . $re['No_b'];
            } else if ($num2 == 2) {
                $num2 = "00" . $re['No_b'];
            } else if ($num2 == 3) {
                $num2 = "0" . $re['No_b'];
            } else {
                $num2 = $re['No_b'];
            }
            echo "<option value=" . $num2 . ">" . $num2 . "</option>";
        }
        echo "</select>";
    }
}

function select_option9()
{
    $sql = "SELECT No_b FROM breeder where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>เบอร์แม่ที่ฝาก</label>
                <select id='breder_piglet' class='form-control' name='breder_piglet' style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                <option value=''>เลือกเบอร์แม่ที่ฝาก</option>";
        while ($re = mysqli_fetch_array($query)) {
            $num2 = strlen($re['No_b']);
            if ($num2 == 1) {
                $num2 = "000" . $re['No_b'];
            } else if ($num2 == 2) {
                $num2 = "00" . $re['No_b'];
            } else if ($num2 == 3) {
                $num2 = "0" . $re['No_b'];
            } else {
                $num2 = $re['No_b'];
            }
            echo "<option value=" . $num2 . ">" . $num2 . "</option>";
        }
        echo "</select>";
    }
}

function select_option10()
{
    $sql = "SELECT resdie_r FROM resdie where Isdelete = '0' ";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo "<label class='form-select__label'>สาเหตุ</label>
                <select id='cause_piglet_dies' class='form-control' name='cause_piglet_dies' style='height:34px; width:210px; font-size:13px;padding: 0px 43px;'>
                <option value=''>เลือกสาเหตุการตาย</option>";
        while ($row = mysqli_fetch_array($query)) {
            echo "<option value=" . $row['resdie_r'] . ">" . $row['resdie_r'] . "</option>";
        }
        echo "</select>";
    }
}
