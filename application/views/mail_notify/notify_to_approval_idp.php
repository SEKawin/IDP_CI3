<?php
foreach ($emp as $rows) :
    $emp_code = $rows->code;
    $emp_firstname_th = $rows->firstname_th;
    $emp_lastname_th = $rows->lastname_th;
    $emp_department_code = $rows->department_code;
    $emp_department_title = $rows->department_title;
    $emp_position = $rows->position;
endforeach;
?>

<div style="font-family: tahoma; font-size: 10pt;">
    <p>
        <b style="color: Orange;">ถึง <u style="color:green"><?php echo $position; ?></u> ต้อง Approval IDP Plan Form<br>
    </p>

    <table style="font-family: tahoma; font-size: 10pt;">
        <tr>
            <td align="left" valign="top">แผนพัฒนาบุคลากรรายบุคลล (IDP Plan) :</td>
            <td valign="top">
                <?php echo $emp_code . ' ' . 'คุณ ' . $emp_firstname_th . ' ' . $emp_lastname_th; ?>
            </td>
        </tr>
        <tr>
            <td align="left" valign="top">ตำแหน่ง : </td>
            <td valign="top"><?php echo $emp_position; ?></td>
        </tr>
        <tr>
            <td align="left" valign="top">ฝ่าย/สำนัก : </td>
            <td valign="top"><?php echo $emp_department_code . ' ' . $emp_department_title; ?></td>
        </tr>
    </table>
    <p>
        <i>
            <b>เข้าระบบ Individual Development Plan Online ได้ที :</b>
            <b><a href="https://www.hrd.tshpcl.com/IDP_Online"> LINK</a></b><br>
            <b><a href="https://www.hrd.tshpcl.com/IDP_Online">https://www.hrd.tshpcl.com/IDP_Online</a></b>
        </i>
    </p>
</div>