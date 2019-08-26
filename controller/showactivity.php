<link rel="stylesheet" href="css/style.css">
<?PHP
header('Content-Type: application/json');

isset($_REQUEST['namef']) ? $namef = $_REQUEST['namef'] : $namef = ''; //รับชื่อฟังค์ชันมา

$namef(); //เรียกใช้ฟังค์ชันส่งมา

function select_showactivity()
{

    $number = 0;

    include '../connect/connect.php';
    $strsql = "select * from activity_record where Isdelete != '1' AND Isdelete != '2' AND Isdelete != '4' AND Isdelete != '5' ORDER BY date_d DESC";
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "<table class='table table-hover table-bordered results' style='margin-top: -7px;' id='example' style='width:100%;'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>ลำดับ</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>เบอร์หูแม่พันธุ์</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-2 col-xs-1'><center>วันที่</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>เหตุการณ์กิจกรรม</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-3 col-xs-1'><center>หมายเหตุ</center></th>";
        echo "<th bgcolor='#ffe6ee'class='col-md-1 col-xs-1'><center>แก้ไข/ลบข้อมูล</center></th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($re = mysqli_fetch_assoc($query)) {
            $number = $number + 1;
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
            echo "<td><div align='center'>" . $number. "</div></td>";
            echo "<td><div align='center'>" . $num . "</div></td>";
            echo "<td><div align='center'>" . $end . "</div></td>";
            echo "<td><div align='center'>" . $re['activity_a'] . "</div></td>";

            $even = $re["activity_a"];
            if ($even == "ผสม") {
                echo "<td class='pt-2-half' contenteditable='true'>ผสมกับพ่อพันธู์ : " . $num1 . "</td>";
            } else if ($even == "ได้รับยา") {
                echo "<td class='pt-2-half' contenteditable='true'>ชื่อยา : " . $re['medicin_getmedicin'] ." &nbsp;&nbsp;". " ปริมาณ : " . $re['volume_getmedicin'] . " เม็ด</td>";
            } else if ($even == "ป่วย") {
                echo "<td class='pt-2-half' contenteditable='true'>อาการป่วย  : " . $re['sick_sick'] ." &nbsp;&nbsp;". " หมายเหตุ  : " . $re['note_sick'] . "</td>";
            } else if ($even == "ทำวัคซีน") {
                echo "<td class='pt-2-half' contenteditable='true'>ชื่อวัคซีน  : " . $re['drug_drug'] . "</td>";
            } else if ($even == "กลับสัด") {
                echo "<td class='pt-2-half' contenteditable='true'>หมายเหตุ  : " . $re['note_inreturn_animal'] . "</td>";
            } else if ($even == "ตาย") {
                echo "<td class='pt-2-half' contenteditable='true'>หมายเหตุ  : " . $re['note_dead'] . "</td>";
            } else if ($even == "ตรวจท้อง") {
                echo "<td class='pt-2-half' contenteditable='true'>ผล  : " . $re['results_check_up'] ." &nbsp;&nbsp;". " กำหนดคลอด  : " . $re['define_check_up'] . "</td>";
            } else if ($even == "แท้ง") {
                echo "<td class='pt-2-half' contenteditable='true'>ข้อความ   : " . $re['text_abortion'] ." &nbsp;&nbsp;". " อายุที่แท้ง   : " . $re['abortion_abortion'] ." วัน ". "</td>";
            } else if ($even == "คลอด") {
                echo "<td class='pt-2-half' contenteditable='true'>ลูกทั้งหมด  : " . $re['allpigs_deliver'] ." ตัว "." &nbsp;&nbsp;". " ลูกมีชีวิต : " . $re['piglet_alive_deliver'] ." ตัว "." &nbsp;&nbsp;". "ตายแรกคลอด : " . $re['dead_pig_birth_deliver'] ." ตัว "." &nbsp;&nbsp;". " ลูกกรอก  : " . $re['eooukornou_deliver'] ." ตัว "." &nbsp;&nbsp;". "นน.ครอก  : " . $re['pork_litter_deliver'] ." ตัว "." &nbsp;&nbsp;". " เฉลี่ย นน.ลูกสุกร   : " . $re['average_piglets_deliver'] ."กก.". "</td>";
            } else if ($even == "ฝากเลี้ยง") {
                echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : " . $re['number_deposit_piglet'] ." ตัว "." &nbsp;&nbsp;". " เบอร์แม่ที่ฝาก  : " . $num2 . "</td>";
            } else if ($even == "รับเลี้ยง") {
                echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : " . $re['number_piglet'] ." ตัว "." &nbsp;&nbsp;". " เบอร์แม่ที่ฝาก  : " . $num3 . "</td>";
            } else if ($even == "หย่านม") {
                echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : " . $re['number_wean'] ." ตัว "." &nbsp;&nbsp;". " นน.ครอก  : " . $re['pork_litter_wean'] . "</td>";
            } else if ($even == "ลูกหมูตาย") {
                echo "<td class='pt-2-half' contenteditable='true'>จำนวน  : " . $re['number_piglet_dies'] ." ตัว "." &nbsp;&nbsp;". " สาเหตุ  : " . $re['cause_piglet_dies'] ." &nbsp;&nbsp;". " หมายเหตุ  : " . $re['note_piglet_dies'] . "</td>";
            } else if ($even == "ท้องลม") {
                echo "<td class='pt-2-half' contenteditable='true'>ข้อความ  : " . $re['text_wind_belly'] . "</td>";
            } else {
                echo "<td class='pt-2-half' contenteditable='true'></td>";
            }
            echo "<td><center>
                <button type='button' class='btn btn-lg button-showsc'  data-toggle='modal' data-target='#flipFlop$re[ID_activity_record]'><img src='https://img.icons8.com/dusk/24/000000/edit-property.png'style='margin-top:-14px;'></button>
                <input type='image' id='delete' style='margin-top: -8px;' class='button-showsc1' onclick=delete_activity_record('" . $re['ID_activity_record'] . "') src='https://img.icons8.com/plasticine/26/000000/full-trash.png'>
                </center></td>";
            echo "</tr>";
            echo "<div class='modal fade' id='flipFlop$re[ID_activity_record]' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document' style='width: 60%;'>";
                    echo "<div class='modal-content'>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        <div class='modal-header'>
                            <h4 class='modal-title' id='modalLabel'>แก้ไข : ประวัติกิจกรรมสุกร </h4>
                        </div>
                        <div class='modal-body'>
                            <div class='row'>
                                <div class='col-md-12'>";
                                $even1 = $re["activity_a"];
                                   if($even1 == 'ผสม'){
                                        echo"<div class='col-md-12 form-group' align='center'>";
                                        $strsql2 = "select No_b from breederdad where Isdelete = '0' ";
                                            include '../connect/connect.php';
                                            $query2 = mysqli_query($conn,$strsql2);
                                            if (mysqli_num_rows($query2) > 0) 
                                            {
                                                echo "<label>แก้ไข ผสมกับสุกรพ่อพันธู์</label>
                                                <select id='breederdad_breededit$re[ID_activity_record]' name='breederdad_breed' class='form-control' style='height:40px;width: 30%; font-size:16px;padding: 0px 60px;'>
                                                <option value=''>เลือกรายการ</option>";
                                                while($re2 = mysqli_fetch_assoc($query2)) {
                                                    if($num1==$re2['No_b']){
                                                        echo "<option value='".$re2['No_b']."' selected>".$re2['No_b']."</option>";
                                                    }else{
                                                        echo "<option value='".$re2['No_b']."'>".$re2['No_b']."</option>";
                                                    }
                                                }
                                                echo "</select>";
                                            }
                                        echo "</div>";
                                   }else if($even1 == 'ได้รับยา'){
                                        echo"<div class='col-md-6 form-group''>";
                                            $sql2 = "select medicin_m from medicin where Isdelete = '0'  ";
                                            include '../connect/connect.php';
                                            $query2 = mysqli_query($conn, $sql2);
                                            if (mysqli_num_rows($query2) > 0) {
                                                echo "<label class='form-select__label'>แก้ไข ชื่อยา</label>
                                                        <select id='medicin_getmedicinedit$re[ID_activity_record]' class='form-control' name='medicin_getmedicin' style='height:40px; 100%; font-size:13px;padding: 0px 60px;'>
                                                        <option value=''>เลือกชื่อยา</option>";
                                                while ($re2 = mysqli_fetch_array($query2)) {
                                                    if($re['medicin_getmedicin']==$re2['medicin_m']){
                                                        echo "<option value='".$re2['medicin_m']."' selected>".$re2['medicin_m']."</option>";
                                                    }else{
                                                        echo "<option value=" . $re2['medicin_m'] . ">" . $re2['medicin_m'] . "</option>";
                                                    }
                                                }
                                                echo "</select>";
                                            }
                                        echo"</div>";
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข ปริมาณ </label>
                                        <input class='form-control' type='text' name='volume_getmedicin' id='volume_getmedicinedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[volume_getmedicin]'>
                                        </div>";
                                   }else if($even1 == 'ป่วย'){
                                        echo"<div class='col-md-6 form-group''>";
                                            $sql1 = "SELECT sick_s FROM sick  where Isdelete = '0' ";
                                            include '../connect/connect.php';
                                            $query1 = mysqli_query($conn, $sql1);
                                            if (mysqli_num_rows($query1) > 0) {
                                                echo "<label class='form-select__label'>แก้ไข อาการป่วย</label>
                                                        <select id='sick_sickedit$re[ID_activity_record]' class='form-control' name='sick_sick' style='height:40px; width: 100%; font-size:13px;padding: 0px 60px;'>
                                                        <option value=''>เลือกอาการป่วย</option>";
                                                while ($re1 = mysqli_fetch_array($query1)) {
                                                    if($re['sick_sick']==$re1['sick_s']){
                                                        echo "<option value='".$re1['sick_s']."' selected>".$re1['sick_s']."</option>";
                                                    }else{
                                                        echo "<option value=" . $re1['sick_s'] . ">" . $re1['sick_s'] . "</option>";
                                                    }
                                                }
                                                echo "</select>";
                                            }
                                        echo"</div>";
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข หมายเหตุ </label>
                                        <input class='form-control' type='text' name='note_sick' id='note_sickedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[note_sick]'>
                                        </div>";
                                    }else if($even1 == 'ทำวัคซีน'){
                                        echo"<div class='col-md-12 form-group' align='center'>";
                                            $sql1 = "SELECT drug_d FROM drug where Isdelete = '0' ";
                                            include '../connect/connect.php';
                                            $query1 = mysqli_query($conn, $sql1);
                                            if (mysqli_num_rows($query1) > 0) {
                                                echo "<label class='form-select__label'>ชื่อวัคซีน</label>
                                                        <select id='drug_drugedit$re[ID_activity_record]' class='form-control' name='drug_drug' style='height:40px; width: 30%; font-size:13px;padding: 0px 60px;'>
                                                        <option value=''>เลือกชื่อวัคซีน</option>";
                                                while ($re1 = mysqli_fetch_array($query1)) {
                                                    if($re['drug_drug']==$re1['drug_d']){
                                                        echo "<option value='".$re1['drug_d']."' selected>".$re1['drug_d']."</option>";
                                                    }else{
                                                        echo "<option value=" . $re1['drug_d'] . ">" . $re1['drug_d'] . "</option>";
                                                    }
                                                }
                                                echo "</select>";
                                            }
                                        echo"</div>";
                                    }else if($even1 == 'กลับสัด'){
                                        echo"<div class='col-md-12 form-group' align='center'>
                                        <label>แก้ไข หมายเหตุ</label>
                                        <input class='form-control' type='text' name='note_inreturn_animal' id='note_inreturn_animaledit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 30%;' value='$re[note_inreturn_animal]'>
                                        </div>";
                                    }else if($even1 == 'ตาย'){
                                        echo"<div class='col-md-12 form-group' align='center'>
                                        <label>แก้ไข หมายเหตุ</label>
                                        <input class='form-control' type='text' name='note_dead' id='note_deadedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 30%;' value='$re[note_dead]'>
                                        </div>";
                                    }else if($even1 == 'ตรวจท้อง'){
                                        echo"<div class='col-md-6 form-group''>";
                                            $sql1 = "SELECT checkbelly_c FROM checkbelly where Isdelete = '0' ";
                                            include '../connect/connect.php';
                                            $query1 = mysqli_query($conn, $sql1);
                                            if (mysqli_num_rows($query1) > 0) {
                                                echo "<label class='form-select__label'>แก้ไข ผลการตรวจท้อง</label>
                                                        <select id='results_check_upedit$re[ID_activity_record]' class='form-control' name='results_check_up' style='height:40px; width:100%; font-size:13px;padding: 0px 60px;'>
                                                        <option value=''>เลือกผลการตรวจ</option>";
                                                while ($re1 = mysqli_fetch_array($query1)) {
                                                    if($re['results_check_up']==$re1['checkbelly_c']){
                                                        echo "<option value='".$re1['checkbelly_c']."' selected>".$re1['checkbelly_c']."</option>";
                                                    }else{
                                                        echo "<option value=" . $re1['checkbelly_c'] . ">" . $re1['checkbelly_c'] . "</option>";
                                                    }
                                                }
                                                echo "</select>";
                                            }
                                        echo"</div>";
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข กำหนดคลอด </label>
                                        <input class='form-control' type='date' name='define_check_up' id='define_check_upedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[define_check_up]'>
                                        </div>";
                                    }else if($even1 == 'แท้ง'){
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข ข้อความ</label>
                                        <input class='form-control' type='text' name='text_abortion' id='text_abortionedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[text_abortion]'>
                                        </div>";
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข อายุที่แท้ง </label>
                                        <input class='form-control' type='text' name='abortion_abortion' id='abortion_abortionedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[abortion_abortion]'>
                                        </div>";
                                    }else if($even1 == 'คลอด'){
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข ลูกทั้งหมด</label>
                                        <input class='form-control' type='text' name='allpigs_deliver' id='allpigs_deliveredit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[allpigs_deliver]'>
                                        </div>";
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข ลูกมีชีวิต </label>
                                        <input class='form-control' type='text' name='piglet_alive_deliver' id='piglet_alive_deliveredit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[piglet_alive_deliver]'>
                                        </div>";
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข ตายแรกคลอด</label>
                                        <input class='form-control' type='text' name='dead_pig_birth_deliver' id='dead_pig_birth_deliveredit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[dead_pig_birth_deliver]'>
                                        </div>";
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข ลูกกรอก </label>
                                        <input class='form-control' type='text' name='eooukornou_deliver' id='eooukornou_deliveredit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[eooukornou_deliver]'>
                                        </div>";
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข นน.ครอก</label>
                                        <input class='form-control' type='text' name='pork_litter_deliver' id='pork_litter_deliveredit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[pork_litter_deliver]'>
                                        </div>";
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข เฉลี่ย นน.ลูกสุกร </label>
                                        <input class='form-control' type='text' name='average_piglets_deliver' id='average_piglets_deliveredit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[average_piglets_deliver]'>
                                        </div>";
                                    }else if($even1 == 'ฝากเลี้ยง'){
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข จำนวน</label>
                                        <input class='form-control' type='text' name='number_deposit_piglet' id='number_deposit_pigletedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$num2'>
                                        </div>";
                                        echo"<div class='col-md-6 form-group''>";
                                        $strsql2 = "select No_b from breeder where Isdelete = '0' ";
                                            include '../connect/connect.php';
                                            $query2 = mysqli_query($conn,$strsql2);
                                            if (mysqli_num_rows($query2) > 0) 
                                            {
                                                echo "<label>แก้ไข เบอร์แม่ที่ฝาก</label>
                                                <select id='breder_deposit_pigletedit$re[ID_activity_record]' name='breder_deposit_piglet' class='form-control' style='height:40px;width: 100%; font-size:16px;padding: 0px 60px;'>
                                                <option value=''>เลือกรายการ</option>";
                                                while($re2 = mysqli_fetch_assoc($query2)) {
                                                    if($num2==$re2['No_b']){
                                                        echo "<option value='".$re2['No_b']."' selected>".$re2['No_b']."</option>";
                                                    }else{
                                                        echo "<option value='".$re2['No_b']."'>".$re2['No_b']."</option>";
                                                    }
                                                }
                                                echo "</select>";
                                            }
                                        echo"</div>";
                                    }else if($even1 == 'รับเลี้ยง'){
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข จำนวน</label>
                                        <input class='form-control' type='text' name='number_piglet' id='number_pigletedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[number_piglet]'>
                                        </div>";
                                        echo"<div class='col-md-6 form-group''>";
                                            $strsql2 = "select No_b from breeder where Isdelete = '0' ";
                                            include '../connect/connect.php';
                                            $query2 = mysqli_query($conn,$strsql2);
                                            if (mysqli_num_rows($query2) > 0) 
                                            {
                                                echo "<label>แก้ไข เบอร์แม่ที่ฝาก</label>
                                                <select id='breder_pigletedit$re[ID_activity_record]' name='breder_piglet' class='form-control' style='height:40px;width: 100%; font-size:16px;padding: 0px 60px;'>
                                                <option value=''>เลือกรายการ</option>";
                                                while($re2 = mysqli_fetch_assoc($query2)) {
                                                    if($num3==$re2['No_b']){
                                                        echo "<option value='".$re2['No_b']."' selected>".$re2['No_b']."</option>";
                                                    }else{
                                                        echo "<option value='".$re2['No_b']."'>".$re2['No_b']."</option>";
                                                    }
                                                }
                                                echo "</select>";
                                            }
                                        echo"</div>";
                                    }else if($even1 == 'หย่านม'){
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข จำนวน</label>
                                        <input class='form-control' type='text' name='number_wean' id='number_weanedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[number_wean]'>
                                        </div>";
                                        echo"<div class='col-md-6 form-group''>
                                        <label>แก้ไข นน.ครอก </label>
                                        <input class='form-control' type='text' name='pork_litter_wean' id='pork_litter_weanedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[pork_litter_wean]'>
                                        </div>";
                                    }else if($even1 == 'ลูกหมูตาย'){
                                        echo"<div class='col-md-4 form-group''>
                                        <label>แก้ไข จำนวน</label>
                                        <input class='form-control' type='text' name='number_piglet_dies' id='number_piglet_diesedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[number_piglet_dies]'>
                                        </div>";
                                        echo"<div class='col-md-4 form-group''>";
                                            $sql1 = "SELECT resdie_r FROM resdie where Isdelete = '0' ";
                                            include '../connect/connect.php';
                                            $query1 = mysqli_query($conn, $sql1);
                                            if (mysqli_num_rows($query1) > 0) {
                                                echo "<label class='form-select__label'>แก้ไข สาเหตุ</label>
                                                        <select id='cause_piglet_diesedit$re[ID_activity_record]' class='form-control' name='cause_piglet_dies' style='height:40px; width:100%; font-size:13px;padding: 0px 60px;'>
                                                        <option value=''>เลือกสาเหตุการตาย</option>";
                                                while ($re1 = mysqli_fetch_array($query1)) {
                                                    if($re['cause_piglet_dies']==$re1['resdie_r']){
                                                        echo "<option value='".$re1['resdie_r']."' selected>".$re1['resdie_r']."</option>";
                                                    }else{
                                                        echo "<option value=" . $re1['resdie_r'] . ">" . $re1['resdie_r'] . "</option>";
                                                    }
                                                }
                                                echo "</select>";
                                            }
                                        echo"</div>";
                                        echo"<div class='col-md-4 form-group''>
                                        <label>แก้ไข หมายเหตุ </label>
                                        <input class='form-control' type='text' name='note_piglet_dies' id='note_piglet_diesedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 100%;' value='$re[note_piglet_dies]'>
                                        </div>";
                                    }else if($even1 == 'ท้องลม'){
                                        echo"<div class='col-md-12 form-group' align='center'>
                                        <label>แก้ไข ข้อความ</label>
                                        <input class='form-control' type='text' name='text_wind_belly' id='text_wind_bellyedit$re[ID_activity_record]' style='height:40px; font-size:16px;width: 30%;' value='$re[text_wind_belly]'>
                                        </div>";
                                    }
                                echo"</div>
                            </div>                    
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick=Saveedit('$re[ID_activity_record]','$even1')>บันทึก</button>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>ยกเลิก</button>
                        </div>
                        </div>
                    </div>
                </div>";
        }
    }else {
        echo "<tr id=''>";
        echo "<td><div align='center'>ไม่พบข้อมูล</div></td>";
        echo "<td><div align='center'>ไม่พบข้อมูล</div></td>";
        echo "<td><div align='center'>ไม่พบข้อมูล</div></td>";
        echo "<td><div align='center'>ไม่พบข้อมูล</div></td>";
        echo "<td><div align='center'>ไม่พบข้อมูล</div></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

function SaveEdit()
{
    isset($_REQUEST['even1']) ? $even1 = $_REQUEST['even1'] : $even1 = '';
    isset($_REQUEST['ID_activity_record']) ? $ID_activity_record = $_REQUEST['ID_activity_record'] : $ID_activity_record = '';
    isset($_REQUEST['breederdad_breededit']) ? $breederdad_breededit = $_REQUEST['breederdad_breededit'] : $breederdad_breededit = ''; 
    isset($_REQUEST['medicin_getmedicinedit']) ? $medicin_getmedicinedit = $_REQUEST['medicin_getmedicinedit'] : $medicin_getmedicinedit = ''; 
    isset($_REQUEST['volume_getmedicinedit']) ? $volume_getmedicinedit = $_REQUEST['volume_getmedicinedit'] : $volume_getmedicinedit = ''; 
    isset($_REQUEST['sick_sickedit']) ? $sick_sickedit = $_REQUEST['sick_sickedit'] : $sick_sickedit = ''; 
    isset($_REQUEST['note_sickedit']) ? $note_sickedit = $_REQUEST['note_sickedit'] : $note_sickedit = ''; 
    isset($_REQUEST['drug_drugedit']) ? $drug_drugedit = $_REQUEST['drug_drugedit'] : $drug_drugedit = ''; 
    isset($_REQUEST['note_inreturn_animaledit']) ? $note_inreturn_animaledit = $_REQUEST['note_inreturn_animaledit'] : $note_inreturn_animaledit = ''; 
    isset($_REQUEST['note_deadedit']) ? $note_deadedit = $_REQUEST['note_deadedit'] : $note_deadedit = ''; 
    isset($_REQUEST['results_check_upedit']) ? $results_check_upedit = $_REQUEST['results_check_upedit'] : $results_check_upedit = ''; 
    isset($_REQUEST['define_check_upedit']) ? $define_check_upedit = $_REQUEST['define_check_upedit'] : $define_check_upedit = ''; 
    isset($_REQUEST['text_abortionedit']) ? $text_abortionedit = $_REQUEST['text_abortionedit'] : $text_abortionedit = ''; 
    isset($_REQUEST['abortion_abortionedit']) ? $abortion_abortionedit = $_REQUEST['abortion_abortionedit'] : $abortion_abortionedit = ''; 
    isset($_REQUEST['allpigs_deliveredit']) ? $allpigs_deliveredit = $_REQUEST['allpigs_deliveredit'] : $allpigs_deliveredit = ''; 
    isset($_REQUEST['piglet_alive_deliveredit']) ? $piglet_alive_deliveredit = $_REQUEST['piglet_alive_deliveredit'] : $piglet_alive_deliveredit = ''; 
    isset($_REQUEST['dead_pig_birth_deliveredit']) ? $dead_pig_birth_deliveredit = $_REQUEST['dead_pig_birth_deliveredit'] : $dead_pig_birth_deliveredit = ''; 
    isset($_REQUEST['eooukornou_deliveredit']) ? $eooukornou_deliveredit = $_REQUEST['eooukornou_deliveredit'] : $eooukornou_deliveredit = ''; 
    isset($_REQUEST['pork_litter_deliveredit']) ? $pork_litter_deliveredit = $_REQUEST['pork_litter_deliveredit'] : $pork_litter_deliveredit = ''; 
    isset($_REQUEST['average_piglets_deliveredit']) ? $average_piglets_deliveredit = $_REQUEST['average_piglets_deliveredit'] : $average_piglets_deliveredit = ''; 
    isset($_REQUEST['number_deposit_pigletedit']) ? $number_deposit_pigletedit = $_REQUEST['number_deposit_pigletedit'] : $number_deposit_pigletedit = ''; 
    isset($_REQUEST['breder_deposit_pigletedit']) ? $breder_deposit_pigletedit = $_REQUEST['breder_deposit_pigletedit'] : $breder_deposit_pigletedit = '';
    isset($_REQUEST['number_pigletedit']) ? $number_pigletedit = $_REQUEST['number_pigletedit'] : $number_pigletedit = ''; 
    isset($_REQUEST['breder_pigletedit']) ? $breder_pigletedit = $_REQUEST['breder_pigletedit'] : $breder_pigletedit = '';
    isset($_REQUEST['number_weanedit']) ? $number_weanedit = $_REQUEST['number_weanedit'] : $number_weanedit = ''; 
    isset($_REQUEST['pork_litter_weanedit']) ? $pork_litter_weanedit = $_REQUEST['pork_litter_weanedit'] : $pork_litter_weanedit = '';
    isset($_REQUEST['number_piglet_diesedit']) ? $number_piglet_diesedit = $_REQUEST['number_piglet_diesedit'] : $number_piglet_diesedit = ''; 
    isset($_REQUEST['cause_piglet_diesedit']) ? $cause_piglet_diesedit = $_REQUEST['cause_piglet_diesedit'] : $cause_piglet_diesedit = ''; 
    isset($_REQUEST['note_piglet_diesedit']) ? $note_piglet_diesedit = $_REQUEST['note_piglet_diesedit'] : $note_piglet_diesedit = ''; 
    isset($_REQUEST['text_wind_bellyedit']) ? $text_wind_bellyedit = $_REQUEST['text_wind_bellyedit'] : $text_wind_bellyedit = '';  

    if($even1 == 'ผสม'){
        $strsql = "UPDATE activity_record SET breederdad_breed='" . $breederdad_breededit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'ได้รับยา'){
        $strsql = "UPDATE activity_record SET medicin_getmedicin='" . $medicin_getmedicinedit . "',volume_getmedicin='" . $volume_getmedicinedit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'ป่วย'){
        $strsql = "UPDATE activity_record SET sick_sick='" . $sick_sickedit . "',note_sick='" . $note_sickedit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'ทำวัคซีน'){
        $strsql = "UPDATE activity_record SET drug_drug='" . $drug_drugedit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'กลับสัด'){
        $strsql = "UPDATE activity_record SET note_inreturn_animal='" . $note_inreturn_animaledit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'ตาย'){
        $strsql = "UPDATE activity_record SET note_dead='" . $note_deadedit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'ตรวจท้อง'){
        $strsql = "UPDATE activity_record SET results_check_up='" . $results_check_upedit . "',define_check_up='" . $define_check_upedit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'แท้ง'){
        $strsql = "UPDATE activity_record SET text_abortion='" . $text_abortionedit . "',abortion_abortion='" . $abortion_abortionedit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'คลอด'){
        $strsql = "UPDATE activity_record SET allpigs_deliver='" . $allpigs_deliveredit . "',piglet_alive_deliver='" . $piglet_alive_deliveredit . "',dead_pig_birth_deliver='" . $dead_pig_birth_deliveredit . "',eooukornou_deliver='" . $eooukornou_deliveredit . "',pork_litter_deliver='" . $pork_litter_deliveredit . "',average_piglets_deliver='" . $average_piglets_deliveredit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'ฝากเลี้ยง'){
        $strsql = "UPDATE activity_record SET number_deposit_piglet='" . $number_deposit_pigletedit . "',breder_deposit_piglet='" . $breder_deposit_pigletedit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'รับเลี้ยง'){
        $strsql = "UPDATE activity_record SET number_piglet='" . $number_pigletedit . "',breder_piglet='" . $breder_pigletedit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'หย่านม'){
        $strsql = "UPDATE activity_record SET number_wean='" . $number_weanedit . "',pork_litter_wean='" . $pork_litter_weanedit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'ลูกหมูตาย'){
        $strsql = "UPDATE activity_record SET number_piglet_dies='" . $number_piglet_diesedit . "',cause_piglet_dies='" . $cause_piglet_diesedit . "',note_piglet_dies='" . $note_piglet_diesedit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else if($even1 == 'ท้องลม'){
        $strsql = "UPDATE activity_record SET text_wind_belly='" . $text_wind_bellyedit . "' WHERE  ID_activity_record = '" . $ID_activity_record . "'";
    }else{
        echo "Error save";
    } 

    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'แก้ไขข้อมูลสำเร็จ'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'แก้ไขข้อมูลไม่สำเร็จ'));
    }
}

function select_option1()
{

    $strsql = "select No_b from breeder where Isdelete = '0' ORDER BY No_b ASC";
    include '../connect/connect.php';
    $query = mysqli_query($conn, $strsql);
    if (mysqli_num_rows($query) > 0) {
        echo "
        <select id='breeder_b' name='breeder_b' onchange='select_showactivity();' class='form-control' style='height:43px; width:249px; font-size:16px;padding: 0px 43px;'>
        <option value=''>ดูเบอร์หูของสุกรแม่พันธุ์</option>";
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

function delete_activity_record()
{
    isset($_REQUEST['ID_activity_record']) ? $ID_activity_record = $_REQUEST['ID_activity_record'] : $ID_activity_record = '';

    include '../connect/connect.php';

    $strsql = "UPDATE activity_record SET IsDelete = '1' WHERE ID_activity_record = '" . $ID_activity_record . "'";
    $query = mysqli_query($conn, $strsql);
    if ($query) {
        echo json_encode(array('status' => '1', 'message' => 'ลบข้อมูลสำเร็จ', 'num' => $ID_activity_record));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'ลบข้อมูลไม่สำเร็จ'));
    }
}


?>