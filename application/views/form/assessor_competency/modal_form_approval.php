<div class="modal fade" id="modal_form_approval_assessor_competency" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title-approval-form">แบบประเมินช่องว่างความสามารถของตนเอง (Competency Gap Assessment) ประจำปี <label name="years"></label></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="#" id="form_approval_assessor_competency" class="form-horizontal">
                    <input type="hidden" value="" name="form_id" />
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><b>รหัสพนักงาน :</b></label>
                            <label name="emp_code"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label><b>ชื่อ-นามสกุล :</b></label>
                            <label name="emp_name"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label><b>ตำแหน่ง :</b></label>
                            <label name="position"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label><b>ฝ่าย/สำนัก :</b></label>
                            <label name="department"></label>
                        </div>
                        <input type="hidden" id="years" name="years" class="form-control" readonly="readonly" />
                        <input type="hidden" id="emp_code" name="emp_code" class="form-control" readonly="readonly" />
                    </div>

                    <div class="table-sm table-responsive">
                        <!-- Core Competency -->
                        <h4 colspan="6" style="padding-left: 5.4em;"><b>ประจำปี <label name="years"></label></b></h4>
                        <h5 colspan="6" style="padding-left: 5.4em;"><b>Core Competency</b>
                            <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" onclick="standard_form()">
                                <i class="fa fa-exclamation-circle" aria-hidden="true">
                                    เกณฑ์การวัดความสามารถ
                                </i>
                            </button>
                        </h5>
                        <table id="myTblCC" class="table table-hover">
                            <thead>
                                <tr class="bg-light text-center">
                                    <!-- <th scope="col">No.</th> -->
                                    <th scope="col" style="width: 5%;">No</th>
                                    <th scope="col" style="width: 8%;">Code</th>
                                    <th scope="col" style="width: 25%;">Competency</th>
                                    <th scope="col" style="width: 10%;">Expected <br>Level (E)</th>
                                    <th scope="col" style="width: 10%;">Self Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Supervisory Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Result <br> (A-E)</th>
                                </tr>
                            </thead>
                            <tbody id='firstCcTr'>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Core Competency -->

                        <?php $position = $this->session->userdata('position');
                        if ($position !== 'เจ้าหน้าที่' && $position !== 'พนักงานทั่วไป' && $position != 'ช่างเทคนิค' && $position != 'โปรแกรมเมอร์' && $position != 'เว็บมาสเตอร์') : ?>
                            <!-- Management Competency -->
                            <h5 colspan="6" style="padding-left: 5.4em;"><b>Management Competency</b>
                                <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" onclick="standard_form()">
                                    <i class="fa fa-exclamation-circle" aria-hidden="true">
                                        เกณฑ์การวัดความสามารถ
                                    </i>
                                </button>
                            </h5>
                            <table id="myTblMC" class="table table-hover">
                                <thead>
                                    <tr class="bg-light text-center">
                                        <!-- <th scope="col">No.</th> -->
                                        <th scope="col" style="width: 5%;">No</th>
                                        <th scope="col" style="width: 8%;">Code</th>
                                        <th scope="col" style="width: 25%;">Competency</th>
                                        <th scope="col" style="width: 10%;">Expected <br>Level (E)</th>
                                        <th scope="col" style="width: 10%;">Self Actual <br> (A)</th>
                                        <th scope="col" style="width: 10%;">Supervisory Actual <br> (A)</th>
                                        <th scope="col" style="width: 10%;">Actual <br> (A)</th>
                                        <th scope="col" style="width: 10%;">Result <br> (A-E)</th>
                                    </tr>
                                </thead>
                                <tbody id='firstMcTr'>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Management Competency -->
                        <?php
                        endif;
                        ?>
                        <!-- ความรู้(Knowledge) -->
                        <h4 colspan="6" style="padding-left: 5.4em;"><b>Functional Competency</b></h4>
                        <h5 colspan="6" style="padding-left: 5.4em;"><b>ความรู้(Knowledge)</b>
                            <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" onclick="standard_form2()">
                                <i class="fa fa-exclamation-circle" aria-hidden="true">
                                    เกณฑ์การวัดความสามารถสำหรับ Functional Competency
                                </i>
                            </button>
                        </h5>
                        <table id="myTblKnow" class="table table-hover">
                            <thead>
                                <tr class="bg-light text-center">
                                    <th scope="col" style="width:5%;">No.</th>
                                    <th scope="col" style="width: 8%;">Code</th>
                                    <th scope="col" style="width: 25%;">Competency</th>
                                    <th scope="col" style="width: 10%;">Expected <br>Level (E)</th>
                                    <th scope="col" style="width: 10%;">Self Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Supervisory Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Result <br> (A-E)</th>
                                </tr>
                            </thead>
                            <tbody id="firstKnowTr">
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                        <!-- ความรู้(Knowledge) -->

                        <!-- ทักษะ(Skill) -->
                        <h5 colspan="6" style="padding-left: 5.4em;"><b>ทักษะ(Skill)</b>
                            <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" onclick="standard_form2()">
                                <i class="fa fa-exclamation-circle" aria-hidden="true">
                                    เกณฑ์การวัดความสามารถสำหรับ Functional Competency
                                </i>
                            </button>
                        </h5>
                        <table id="myTblSkill" class="table table-hover">
                            <thead>
                                <tr class="bg-light text-center">
                                    <th scope="col" style="width:5%;">No.</th>
                                    <th scope="col" style="width: 8%;">Code</th>
                                    <th scope="col" style="width: 25%;">Competency</th>
                                    <th scope="col" style="width: 10%;">Expected <br>Level (E)</th>
                                    <th scope="col" style="width: 10%;">Self Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Supervisory Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Result <br> (A-E)</th>
                                </tr>
                            </thead>
                            <tbody id="firstSkillTr">
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                        <!-- ทักษะ(Skill) -->

                        <!-- คุณลักษณะพิเศษส่วนบุคคล(Personal Attributes) -->
                        <h5 colspan="6" style="padding-left: 5.4em;"><b>คุณลักษณะพิเศษส่วนบุคคล(Personal Attributes)</b>
                            <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" onclick="standard_form2()">
                                <i class="fa fa-exclamation-circle" aria-hidden="true">
                                    เกณฑ์การวัดความสามารถสำหรับ Functional Competency
                                </i>
                            </button>
                        </h5>
                        <table id="myTblPerAttr" class="table table-hover">
                            <thead>
                                <tr class="bg-light text-center">
                                    <th scope="col" style="width:5%;">No.</th>
                                    <th scope="col" style="width: 8%;">Code</th>
                                    <th scope="col" style="width: 25%;">Competency</th>
                                    <th scope="col" style="width: 10%;">Expected <br>Level (E)</th>
                                    <th scope="col" style="width: 10%;">Self Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Supervisory Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Actual <br> (A)</th>
                                    <th scope="col" style="width: 10%;">Result <br> (A-E)</th>
                                </tr>
                            </thead>
                            <tbody id="firstPerAttrTr">
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                        <!-- คุณลักษณะพิเศษส่วนบุคคล(Personal Attributes) -->
                        <hr class=" w-100 ml-0 text-center">

                        <!-- ผู้จัดทำแบบฟอร์ม -->
                        <div class="form-group col-md-4">
                            <h6 colspan="3" style="padding-left: 1.5em;">
                                <label><b>ผู้จัดทำ</b></label>
                                <label name="form_assessor"></label>
                                <label name="create_on"></label>
                            </h6>
                        </div>
                        <!-- ผู้จัดทำแบบฟอร์ม -->
                        <hr class=" w-100 ml-0 text-center">

                        <!-- ผู้อนุัมติต้นสังกัด -->
                        <div class="input-group form-group col-md-6" id="approval_form">
                            <h6 colspan="3" style="padding-left: 1.5em;">
                                <label><b>ผู้อนุัมติต้นสังกัด</b></label>
                                <label name="form_mgr_name"></label><br>
                            </h6>
                        </div>
                        <div class="input-group form-group col-md-4" id="approval_form">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect">เลือกผลอนุมัติ</label>
                            </div>
                            <select class="choice_agm custom-select" id="inputGroupSelect" name="status">
                                <option selected>เลือก...</option>
                                <option value="1">อนุมัติ</option>
                                <option value="2">ไม่อนุมัติ</option>
                            </select>
                            <button type="button" class="btn btn-sm btn-primary" id="btnApproval_form" onclick="approval_form()">ยืนยัน</button>
                        </div>
                        <hr class=" w-100 ml-0 text-center">

                        <div class="form-group col-md-6" style="display: none" id="approval_status">
                            <h6 colspan="3" style="padding-left: 1.5em;">
                                <label><b>ผู้อนุัมติต้นสังกัด</b></label>
                                <label name="form_mgr_name"></label><br>
                                <label name="mgr_status"></label><br>
                                <label name="mgr_create_on"></label>
                            </h6>
                        </div>
                        <!-- ผู้อนุัมติต้นสังกัด -->

                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>

        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script type="text/javascript">
    function form_approval_mgr(form_id) {

        $('#form_approval_assessor_competency')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form_approval_assessor_competency').modal({
            backdrop: 'static',
            keyboard: false
        }); // show bootstrap modal
        $('.modal-title-approval-form').text(
            'แบบประเมินช่องว่างความสามารถของตนเอง (Competency Gap Assessment) ประจำปี'); // Set Title to Bootstrap modal title
        $.ajax({
            url: "<?php echo site_url('assessor_competency/view_approval_competency') ?>/" + form_id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $.each(data.core_competency, function(key, value) {

                    $('#modal_form_approval_assessor_competency #firstCcTr').html('');
                    for (var i = 0; i < value.length; i++) {
                        $('#modal_form_approval_assessor_competency #firstCcTr').append(`<tr>
                            <td><input type="text" id="no" name="core[${i}][no]" class="form-control" value ="${value[i].no}"readonly="readonly" /></td>
                            <td><input type="text" id="code" name="core[${i}][code]" class="form-control" value ="${value[i].code}"></td>
                            <td><input type="text" id="competency" name="core[${i}][competency]" class="form-control" value= "${value[i].competency}"readonly="readonly" /></td>
                            <td><input type="text" id="expected" name="core[${i}][expected]" class="form-control" value= "${value[i].expected}"readonly="readonly" /></td>
                            <td><input type="text" id="self_actual" name="core[${i}][self_actul]" class="form-control" value= "${value[i].self_actul}"readonly="readonly" /></td>
                            <td><input type="text" id="sup_actual" name="core[${i}][sup_actual]" class="form-control" value= "${value[i].actual}" readonly="readonly" /></td>
                            <td><input type="text" id="actual" name="core[${i}][actual]" class="form-control" value= ""></td>
                            <td><input type="text" id="result" name="core[${i}][result]" class="form-control" value ="${value[i].actual-value[i].expected}" readonly="readonly" /></td>
                        </tr>`);
                    }
                })

                $.each(data.manage_competency, function(key, value) {
                    if (value == null) {
                        $('#modal_form_approval_assessor_competency #firstMcTr').html('');

                    } else {
                        $('#modal_form_approval_assessor_competency #firstMcTr').html('');
                        for (var i = 0; i < value.length; i++) {
                            $('#modal_form_approval_assessor_competency #firstMcTr').append(`<tr>
                                <td><input type="text" id="no" name="manage[${i}][no]" class="form-control" value = "${value[i].no}"readonly="readonly" /></td>
                                <td><input type="text" id="code" name="manage[${i}][code]" class="form-control" value = "${value[i].code}"></td>
                                <td><input type="text" id="competency" name="manage[${i}][competency]" class="form-control" value= "${value[i].competency}"readonly="readonly" /></td>
                                <td><input type="text" id="expected" name="manage[${i}][expected]" class="form-control" value= "${value[i].expected}"readonly="readonly" /></td>
                                <td><input type="text" id="self_actual" name="manage[${i}][self_actual]" class="form-control" value= "${value[i].self_actual}"readonly="readonly" /></td>
                                <td><input type="text" id="sup_actual" name="manage[${i}][sup_actual]" class="form-control" value= "${value[i].actual}" readonly="readonly" /></td>
                                <td><input type="text" id="actual" name="manage[${i}][actual]" class="form-control"  ></td>
                                <td><input type="text" id="result" name="manage[${i}][result]" class="form-control" value= "${value[i].actual-value[i].expected}" readonly="readonly" /></td>
                            </tr>`);
                        }
                    }
                })

                $.each(data.knowledge, function(key, value) {
                    $('#modal_form_approval_assessor_competency #firstKnowTr').html('');
                    for (var i = 0; i < value.length; i++) {
                        $('#modal_form_approval_assessor_competency #firstKnowTr').append(`<tr>
                            <td><input type="text" id="no" name="know[${i}][no]" class="form-control" value = "${value[i].no}"readonly="readonly" /></td>
                            <td><input type="text" id="code" name="know[${i}][code]" class="form-control" value = "${value[i].code}"></td>
                            <td><input type="text" id="competency" name="know[${i}][competency]" class="form-control" value = "${value[i].competency}"readonly="readonly" /></td>
                            <td><input type="text" id="expected" name="know[${i}][expected]" class="form-control" value = "${value[i].expected}"readonly="readonly" /></td>
                            <td><input type="text" id="self_actual" name="know[${i}][self_actual]" class="form-control" value = "${value[i].self_actual}"readonly="readonly" /></td>
                            <td><input type="text" id="sup_actual" name="know[${i}][sup_actual]" class="form-control" value = "${value[i].actual}" readonly="readonly" /></td>
                            <td><input type="text" id="actual" name="know[${i}][actual]" class="form-control" ></td>
                            <td><input type="text" id="result" name="know[${i}][result]" class="form-control" value = "${value[i].actual-value[i].expected}" readonly="readonly" /></td>
                        </tr>`);
                    }
                })

                $.each(data.skill, function(key, value) {
                    $('#modal_form_approval_assessor_competency #firstSkillTr').html('');
                    for (var i = 0; i < value.length; i++) {
                        $('#modal_form_approval_assessor_competency #firstSkillTr').append(`<tr>
                            <td><input type="text" id="no" name="skill[${i}][no]" class="form-control" value = "${value[i].no}"readonly="readonly" /></td>
                            <td><input type="text" id="code" name="skill[${i}][code]" class="form-control" value = "${value[i].code}"></td>
                            <td><input type="text" id="competency" name="skill[${i}][competency]" class="form-control" value = "${value[i].competency}"readonly="readonly" /></td>
                            <td><input type="text" id="expected" name="skill[${i}][expected]" class="form-control" value = "${value[i].expected}"readonly="readonly" /></td>
                            <td><input type="text" id="self_actual" name="skill[${i}][self_actual]" class="form-control" value = "${value[i].slef_actual}"readonly="readonly" /></td>
                            <td><input type="text" id="sup_actual" name="skill[${i}][sup_actual]" class="form-control" value = "${value[i].actual}" readonly="readonly" /></td>
                            <td><input type="text" id="actual" name="skill[${i}][actual]" class="form-control" ></td>
                            <td><input type="text" id="result" name="skill[${i}][result]" class="form-control" value = "${value[i].actual-value[i].expected}" readonly="readonly" /></td>
                        </tr>`);
                    }
                })

                $.each(data.personal_attributes, function(key, value) {
                    $('#modal_form_approval_assessor_competency #firstPerAttrTr').html('');
                    for (var i = 0; i < value.length; i++) {
                        $('#modal_form_approval_assessor_competency #firstPerAttrTr').append(`<tr>
                            <td><input type="text" id="no" name="perattr[${i}][no]" class="form-control" value = "${value[i].no}"readonly="readonly" /></td>
                            <td><input type="text" id="code" name="perattr[${i}][code]" class="form-control" value = "${value[i].code}"></td>
                            <td><input type="text" id="competency" name="perattr[${i}][competency]" class="form-control" value = "${value[i].competency}"readonly="readonly" /></td>
                            <td><input type="text" id="expected" name="perattr[${i}][expected]" class="form-control" value = "${value[i].expected}"readonly="readonly" /></td>
                            <td><input type="text" id="slef_actual" name="perattr[${i}][slef_actual]" class="form-control" value = "${value[i].slef_actual}"readonly="readonly" /></td>
                            <td><input type="text" id="sup_actual" name="perattr[${i}][sup_actual]" class="form-control" value = "${value[i].actual}" readonly="readonly" /></td>
                            <td><input type="text" id="actual" name="perattr[${i}][actual]" class="form-control"   /></td>
                            <td><input type="text" id="result" name="perattr[${i}][result]" class="form-control" value = "${value[i].actual-value[i].expected}" readonly="readonly" /></td>
                        </tr>`);
                    }
                })
                $.each(data.data, function(key, value) {
                    $('label[name="years"]').text(value.years);
                    $('[name="years"]').val(value.years);
                    $('[name="form_id"]').val(value.self_form_id);
                })
                $.each(data.form_maker, function(key, value) {
                    $('[name="emp_code').val(value.code);
                    $('label[name="emp_code').text(value.code);
                    $('label[name="emp_name').text('คุณ' + value.firstname_th + ' ' + value.lastname_th);
                    $('label[name="position').text(value.position);
                    $('label[name="department').text(value.department_code + ' ' + value.department_title);
                    $('label[name="form_maker').text('คุณ' + value.firstname_th + ' ' + value.lastname_th);
                    $('label[name="create_on').html('<b>วันที่</b>:' + value.create_on);
                })

                $.each(data.form_assessor, function(key, value) {
                    $('label[name="form_assessor').text('คุณ' + value.firstname_th + ' ' + value.lastname_th);
                    if (value.create_on == null) {
                        $('label[name="create_on').html('');
                    } else {
                        $('label[name="create_on').html('<b>วันที่</b>:' + value.create_on);
                    }
                })

                $.each(data.status_form, function(key, value) {
                    $('label[name="form_mgr_name').text('คุณ' + value.firstname_th + ' ' + value.lastname_th);
                    if (value.mgr_status == 0) {
                        // รอดำเนินการ
                        $('label[name="mgr_status"]').html('<b>ผลการอนุมัติ: </b><span style="font-size: 15px;" class="badge badge-secondary">รอดำเนินการ</span>');

                    } else if (value.mgr_status == 1) {
                        // อนุมัติ
                        $('#approval_form').hide('');
                        $('#approval_status').show('');
                        $('label[name="mgr_status"]').html(
                            '<b>ผลการอนุมัติ: </b><span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
                        );
                        $('label[name="mgr_create_on').html('<b>วันที่: </b>:' + value.create_on);

                    } else {
                        $('#approval_form').hide('');
                        $('#approval_status').show('');
                        $('label[name="mgr_status"]').html(
                            '<b>ผลการอนุมัติ: </b><span style="font-size: 15px;" class="badge badge-danger">ไม่อนุมัติ</span>'
                        );
                        $('label[name="mgr_create_on').html('<b>วันที่: </b>:' + value.create_on);
                    }
                })

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ไม่สามารถแสดงข้อมูลได้ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 ');
            }
        });
    }

    function approval_form() {
        $('#btnApproval').text('กำลังทำการยืนยัน...'); //change button text
        $('#btnApproval').attr('disabled', true); //set button disable

        var url = "<?php echo site_url('assessor_competency/approval_form_mgr') ?>";

        var formData = new FormData($(document).find('#form_approval_assessor_competency')[0]);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(value) {
                if (value.status) //if success close modal and reload ajax table
                {
                    $('#tbl_competency_approval').DataTable().ajax.reload(null, false);
                    $('#tbl_competency_form').DataTable().ajax.reload(null, false);
                    $('#modal_form_approval_assessor_competency').modal('hide');
                    $('#form_approval_assessor_competency')[0].reset(); // reset form on modals

                    alert('คุณทำการอนุมัติเรียบร้อยแล้ว');

                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
                            'has-error'
                        ); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
                            i]); //select span help-block class set text error string
                    }
                }
                $('#btnApproval').text('กำลังทำการยืนยัน'); //change button text
                $('#btnApproval').attr('disabled', false); //set button enable 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ไม่สามารถกดอนุมัติ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 หรือ ช่องทางแชทของ MS TEAM (kawin_a@thaisummit-harness.co.th');
            }
        });
    }
</script>