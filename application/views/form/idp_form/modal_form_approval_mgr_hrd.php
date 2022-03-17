<!--modal Form -->
<div class="modal fade" id="modal_idp_plan_form_apporval_mgr_hrd" role="dialog">
    <div id="modal_dialog" class="modal-dialog modal-dialog-scrollable" style="max-width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal_title_idp_plan_form_apporval_mgr_hrd">Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form" id="append-modal-mgr_hrd">
            </div> <!-- modal-body form -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="hidden-modal-body-mgr-hrd" style="display: none;">
    <form action="#" id="idp_plan_form_apporval_mgr_hrd" class="form-horizontal">
        <input type="hidden" name="idp_form_id">
        <div class="form-row col-md-12">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="text-center"><b>ข้อมูลผู้จัดทำ IDP</b></p>
                        <div class="row">
                            <div class="col-8 col-sm-6">
                                <label><b>ชื่อ-นามสกุล :</b></label>
                                <label name="emp_name"></label>
                            </div>
                            <div class="col-4 col-sm-6">
                                <label><b>อายุ(ตัว) :</b></label>
                                <label name="birthdate"></label>
                            </div>
                            <div class="col-4 col-sm-6">
                                <label><b>ตำแหน่ง :</b></label>
                                <label name="position"></label>
                            </div>
                            <div class="col-4 col-sm-6">
                                <label><b>อายุงาน :</b></label>
                                <label name="workday"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-center"><b>ข้อมูลของผู้จัดการต้นสังกัด</b></p>
                        <div class="row">
                            <div class="col-8 col-sm-6">
                                <label><b>ชื่อ-นามสกุล :</b></label>
                                <label name="mgr_name"></label>
                            </div>
                            <div class="col-4 col-sm-6">
                                <label><b>ตำแหน่ง :</b></label>
                                <label name="mgr_position"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center table-secondary" width="100%">
                                <th scope="col">No</th>
                                <th scope="col">Competency</th>
                                <th scope="col" colspan="2">70:20:10 Learning Model
                                    <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" onclick="modal_tbl_learning_detail()">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </button>
                                </th>
                                <th scope="col">รายละเอียดเครื่องมือ</th>
                                <th scope="col">ระยะเวลา</th>
                                <th scope="col">เป้าหมายเชิงผลลัพธ์</th>
                                <th scope="col">งบประมาณ</th>
                                <th scope="col">การติดตามผลการพัฒนา</th>
                            </tr>
                        </thead>
                        <!-- Core Competency -->
                        <tr id="TopicCC">
                            <td colspan="9">
                                <h5><u>Core Competency</u></h5>
                            </td>
                        </tr>
                        <tbody id="tbody_CC">
                        </tbody>
                        <!-- Manageral Competency -->
                        <tr id="TopicMC">
                            <td colspan="9">
                                <h5><u>Manage Competency</u></h5>
                            </td>
                        </tr>
                        <tbody id="tbody_MC">
                        </tbody>

                        <tbody id="tbodyidp">
                            <tr>
                                <td colspan="9">
                                    <h5><b>Functional Competency</b></h5>
                                </td>
                            </tr>
                        </tbody>

                        <!-- ความรู้(Knowledge) -->
                        <tr id="TopicKnow">
                            <td colspan="9">
                                <h5><u>ความรู้(Knowledge)</u></h5>
                            </td>
                        </tr>
                        <tbody id="tbody_Know">
                        </tbody>

                        <!--ทักษะ(Skill)  -->
                        <tr id="TopicSkill">
                            <td colspan="9">
                                <h5><u>ทักษะ (Skill)</u></h5>
                            </td>
                        </tr>
                        <tbody id="tbody_Skill">
                        </tbody>

                        <!-- คุณลักษณะพิเศษส่วนบุคคล Personal Attributes -->
                        <tr id="PerAtt">
                            <td colspan="9">
                                <h5><u>คุณลักษณะพิเศษส่วนบุคคล (Personal Attributes)</u></h5>
                            </td>
                        </tr>
                        <tbody id="tbody_PerAtt">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
                <div class="col-sm-6">
                    <p class="text-center"><b>ต้นสังกัด</b></p>
                    <div class="row">
                        <div class="col-4 col-sm-6">
                            <label><b>MGR</b></label>
                            <br>
                            <label name="mgr_name">ชื่อ-นามสกุล</label>
                            <br>
                            <label id="mgr_status"><u>ผลสถานะ</u>&nbsp;</label>
                            <div class="txtbox_mgr" style="display: none">
                                <label>หมายเหตุ : </label><input type="text" class="form-control" id="remark_mgr" name="remark_mgr" placeholder="หมายเหตุ">
                            </div>
                        </div>
                        <div class="col-4 col-sm-6">
                            <label><b>AGM/GM</b></label>
                            <br>
                            <label name="gm_name">ชื่อ-นามสกุล</label>
                            <br>
                            <label id="gm_status"><u>ผลสถานะ</u>&nbsp;</label>
                            <div class="txtbox_gm" style="display: none">
                                <label>หมายเหตุ : </label><input type="text" class="form-control" id="remark_gm" name="remark_gm" placeholder="หมายเหตุ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <p class="text-center"><b>สำนักพัฒนาองค์กร</b></p>
                    <div class="row">
                        <div class="col-8 col-sm-6">
                            <label><b>MGR HRD</b></label>
                            <br>
                            <label name="mgr_hrd_name">ชื่อ-นามสกุล</label>
                            <br>
                            <label id="mgr_hrd_status"><u>ผลสถานะ</u>&nbsp;</label>
                            <div class="txtbox_mgr_hrd" style="display: none">
                                <label>หมายเหตุ : </label><input type="text" class="form-control" id="remark_mgr_hrd" name="remark_mgr_hrd" placeholder="หมายเหตุ">
                            </div>
                        </div>
                        <div class="col-4 col-sm-6">
                            <label><b>GM OD</b></label>
                            <br>
                            <label name="od_name">ชื่อ-นามสกุล</label>
                            <br>
                            <label id="od_status"><u>ผลสถานะ</u>&nbsp;</label>
                            <div class="txtbox_od" style="display: none">
                                <label>หมายเหตุ : </label><input type="text" class="form-control" id="remark_od" name="remark_od" placeholder="หมายเหตุ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>

<script type="text/javascript">
    function getAge_work(date) {
        var startDate = new Date(date);
        var diffDate = new Date(new Date() - startDate);
        var age = (diffDate.toISOString().slice(0, 4) - 1970) + " ปี " +
            diffDate.getMonth() + " เดือน "
        // + (diffDate.getDate() - 1) + "วัน";
        return age;
    }

    function idp_form_approval_mgr_hrd(idp_form_id) {
        $('#append-modal-mgr_hrd').html($('#hidden-modal-body-mgr-hrd').html());
        $('body').find('#idp_plan_form_apporval_mgr_hrd')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('#modal_idp_plan_form_apporval_mgr_hrd').modal('show'); // show bootstrap modal
        $('.modal_title_idp_plan_form_apporval_mgr_hrd').html('<p>แผนพัฒนาบุคลากรรายบุคคล</p>'); // Set Title to Bootstrap modal title

        $.ajax({
            url: "<?php echo site_url('idp_form/view_idp_plan_form') ?>/" + idp_form_id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $(function() {
                    $(".choice_mgr_hrd").change(function() {
                        if ($(this).val() == 1) {
                            $('#remark_mgr_hrd').val('').change();
                            $(".txtbox_mgr_hrd").hide('slow');
                        } else {

                            $(".txtbox_mgr_hrd").show('slow');
                        }
                    });
                });

                $('[name="idp_form_id"]').val(idp_form_id);
                var formatter = new Intl.NumberFormat();
                //  Core Competency 
                $('#modal_idp_plan_form_apporval_mgr_hrd #tbody_CC').html('');
                $.each(data.idp_cc, function(key, value) {
                    $('#modal_idp_plan_form_apporval_mgr_hrd #tbody_CC').append(`
						<tr>
							<td>${[value.no]}</td>
							<td>${[value.competency]}</td>
							<td>${[value.learning]}</td>
							<td>${[value.model]}</td>
							<td>${[value.tool_deital]}</td>
							<td>${[value.dev_time]}</td>
							<td>${[value.target]}</td>
							<td>${formatter.format([value.budget])}</td>
							<td>${[value.tracking]}</td>
						</tr>
					    `);
                })
                // Core Competency 
                // Manage Competency 
                $('#modal_idp_plan_form_apporval_mgr_hrd #tbody_MC').html('');
                if (data.idp_mc == null) {
                    $('#TopicMC').hide();
                    $('#tbody_MC').hide();
                } else {
                    $.each(data.idp_mc, function(key, value) {
                        $('#TopicMC').show();
                        $('#modal_idp_plan_form_apporval_mgr_hrd #tbody_MC').append(`
						<tr>
							<td>${[value.no]}</td>
							<td>${[value.competency]}</td>
							<td>${[value.learning]}</td>
							<td>${[value.model]}</td>
							<td>${[value.tool_deital]}</td>
							<td>${[value.dev_time]}</td>
							<td>${[value.target]}</td>
							<td>${formatter.format([value.budget])}</td>
							<td>${[value.tracking]}</td>
						</tr>
					    `);

                    })
                }
                // Manage Competency 

                // ความรู้ Knowledge
                $('#modal_idp_plan_form_apporval_mgr_hrd #tbody_Know').html('');
                $.each(data.idp_know, function(key, value) {
                    $('#modal_idp_plan_form_apporval_mgr_hrd #tbody_Know').append(`
						<tr>
							<td>${[value.no]}</td>
							<td>${[value.competency]}</td>
							<td>${[value.learning]}</td>
							<td>${[value.model]}</td>
							<td>${[value.tool_deital]}</td>
							<td>${[value.dev_time]}</td>
							<td>${[value.target]}</td>
							<td>${formatter.format([value.budget])}</td>
							<td>${[value.tracking]}</td>
						</tr>
					    `);
                })
                // ความรู้ Knowledge

                // Skill 
                $('#modal_idp_plan_form_apporval_mgr_hrd #tbody_Skill').html('');
                $.each(data.idp_skill, function(key, value) {
                    $('#modal_idp_plan_form_apporval_mgr_hrd #tbody_Skill').append(`
						<tr>
							<td>${[value.no]}</td>
							<td>${[value.competency]}</td>
							<td>${[value.learning]}</td>
							<td>${[value.model]}</td>
							<td>${[value.tool_deital]}</td>
							<td>${[value.dev_time]}</td>
							<td>${[value.target]}</td>
							<td>${formatter.format([value.budget])}</td>
							<td>${[value.tracking]}</td>
						</tr>
					    `);
                })
                // Skill 

                // Personal Attributes
                $('#modal_idp_plan_form_apporval_mgr_hrd #tbody_PerAtt').html('');
                $.each(data.idp_perattr, function(key, value) {
                    $('#modal_idp_plan_form_apporval_mgr_hrd #tbody_PerAtt').append(`
						<tr>
							<td>${[value.no]}</td>
							<td>${[value.competency]}</td>
							<td>${[value.learning]}</td>
							<td>${[value.model]}</td>
							<td>${[value.tool_deital]}</td>
							<td>${[value.dev_time]}</td>
							<td>${[value.target]}</td>
							<td>${formatter.format([value.budget])}</td>
							<td>${[value.tracking]}</td>
						</tr>
					    `);
                })
                // Personal Attributes

                $.each(data.data_status, function(key, value) {
                    if (value.mgr_status == 0) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #mgr_status').html(`<span style="font-size: 15px" class=" badge badge-secondary">รอดำเนินการ</span>`);
                    } else if (value.mgr_status == 1) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #mgr_status').html(`<label>ผลสถานะ</label><span style="font-size: 15px" class=" badge badge-success">อนุมัติ</span>`);
                    } else if (value.mgr_status == 2) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #mgr_status').html(`<label>ผลสถานะ</label><span style="font-size: 15px" class=" badge badge-danger">ไม่อนุมัติ</span>`);
                    }

                    if (value.gm_status == null || value.gm_status == 0) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #gm_status').html(`<span style="font-size: 15px" class=" badge badge-secondary">รอดำเนินการ</span>`);
                    } else if (value.gm_status == 1) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #gm_status').html(`<span style="font-size: 15px" class=" badge badge-success">อนุมัติ</span>`);
                    } else if (value.gm_status == 2) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #gm_status').html(`<span style="font-size: 15px" class=" badge badge-danger">ไม่อนุมัติ</span>`);
                    }

                    if (value.mgr_hrd_status == null || value.mgr_hrd_status == 0) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #mgr_hrd_status').html(`
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon">ผลสถานะ</span>
                                </div>
                                <select class="choice_mgr_hrd custom-select" id="inputGroupSelect" name="mgr_hrd_status">
                                    <option selected>เลือก...</option>
                                    <option value="1">อนุมัติ</option>
                                    <option value="2">ไม่อนุมัติ</option>
                            </select>
                            <button type="button" class="btn btn-sm btn-primary" id="btnApprovalMgrHrd" onclick="approval_form_mgr_hrd()">ยืนยัน</button>
                            </div>
                        `);
                    } else if (value.mgr_hrd_status == 1) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #mgr_hrd_status').html(`<span style="font-size: 15px" class=" badge badge-success">อนุมัติ</span>`);
                    } else if (value.mgr_hrd_status == 2) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #mgr_hrd_status').html(`<span style="font-size: 15px" class=" badge badge-danger">ไม่อนุมัติ</span>`);
                    }

                    if (value.od_status == null || value.od_status == 0) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #od_status').html(`<span style="font-size: 15px" class=" badge badge-secondary">รอดำเนินการ</span>`);
                    } else if (value.od_status == 1) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #od_status').html(`<span style="font-size: 15px" class=" badge badge-success">อนุมัติ</span>`);
                    } else if (value.od_status == 2) {
                        $('#modal_idp_plan_form_apporval_mgr_hrd #od_status').html(`<span style="font-size: 15px" class=" badge badge-danger">ไม่อนุมัติ</span>`);
                    }
                })

                $.each(data.emp, function(key, value) {
                    $('label[name="emp_name').text('คุณ ' + value.firstname_th + ' ' + value.lastname_th);
                    $('label[name="position').text(value.position);
                    $('label[name="birthdate').text(getAge_work(value.birthdate));
                    $('label[name="workday').text(getAge_work(value.startwork));
                })

                $.each(data.mgr, function(key, value) {
                    $('label[name="mgr_name').text('คุณ ' + value.firstname_th + ' ' + value.lastname_th);
                    $('label[name="mgr_position').text(value.position);
                })

                $.each(data.gm, function(key, value) {
                    $('label[name="gm_name').text('คุณ ' + value.firstname_th + ' ' + value.lastname_th);
                })

                $.each(data.mgr_hrd, function(key, value) {
                    $('label[name="mgr_hrd_name').text('คุณ ' + value.firstname_th + ' ' + value.lastname_th);
                })

                $.each(data.gm_od, function(key, value) {
                    $('label[name="gm_od_name').text('คุณ ' + value.firstname_th + ' ' + value.lastname_th);
                })

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ไม่สามารถแสดงข้อมูลได้ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 ');
            }
        });
    }

    function approval_form_mgr_hrd() {
        $('#btnApprovalMgrHrd').text('กำลังอนุัมติแบบฟอร์ม...'); //change button text
        $('#btnApprovalMgrHrd').attr('disabled', true); //set button disable

        var formdata = $('#idp_plan_form_apporval_mgr_hrd').serialize();

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('idp_form/idp_approval_form_mgr_hrd') ?>",
            data: formdata,
            dataType: 'JSON',
            success: function(data) {
                $('#tbl_approval_mgr_hrd').DataTable().ajax.reload(null, false);
                $('#idp_plan_form_apporval_mgr_hrd')[0].reset(); // reset form on modals
                $('#modal_idp_plan_form_apporval_mgr_hrd').modal('hide');
                alert('คุณทำการอนุมัติเรียบร้อยแล้ว');

                $('#btnApprovalMgrHrd').text('ยืนยัน'); //change button text
                $('#btnApprovalMgrHrd').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(messenger);
            }
        });
    }
</script>