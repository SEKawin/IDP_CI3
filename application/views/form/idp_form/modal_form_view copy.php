<!--modal Form -->
<div class="modal fade" id="modal_idp_plan_form_view" role="dialog">
    <div id="modal_dialog" class="modal-dialog modal-dialog-scrollable" style="max-width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal_title_idp_plan_form_view">Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form" id="append-modal-view">
            </div> <!-- modal-body form -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="hidden-modal-body-view" style="display: none;">
    <form action="#" id="idp_plan_form_view" class="form-horizontal">
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
                        <tbody id='tbodyidp'>
                        </tbody>
                        </thead>
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
                            <label><u>ผลสถานะ</u>&nbsp;<label id="mgr_status"> wait</label></label>
                        </div>
                        <div class="col-4 col-sm-6">
                            <label><b>AGM/GM</b></label>
                            <br>
                            <label name="gm_name">ชื่อ-นามสกุล</label>
                            <br>
                            <label><u>ผลสถานะ</u>&nbsp;<label id="gm_status"> wait</label></label>
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
                            <label><u>ผลสถานะ</u>&nbsp;<label id="mgr_hrd_status"> wait</label></label>
                        </div>
                        <div class="col-4 col-sm-6">
                            <label><b>GM OD</b></label>
                            <br>
                            <label name="od_name">ชื่อ-นามสกุล</label>
                            <br>
                            <label><u>ผลสถานะ</u>&nbsp;<label id="od_status"> wait</label></label>
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

    var messenger = 'ระบบมีปัญหา โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ ช่องทาง Chat ของ MS TEAM (kawin_a@thaisummit-harness.co.th';

    function view_idp_form(idp_form_id) {
        $('#append-modal-view').html($('#hidden-modal-body-view').html());
        $('body').find('#idp_plan_form_view')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('#modal_idp_plan_form_view').modal('show'); // show bootstrap modal
        $('.modal_title_idp_plan_form_view').text('รายละเอียดแผนพัฒนาบุคลากรรายบุคคล'); // Set Title to Bootstrap modal title

        $.ajax({
            url: "<?php echo site_url('idp_form/view_idp_plan_form') ?>/" + idp_form_id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $.each(data.data_idp_form, function(key, value) {

                    $('#modal_idp_plan_form_view #tbodyidp').html('');
                    for (var i = 0; i < value.length; i++) {
                        $('#modal_idp_plan_form_view #tbodyidp').append(`<tr>
                        <td>${value[i].idp_no}</td>
                        <td>${value[i].idp_competency}</td>
                        <td>${value[i].idp_learning}</td>
                        <td>${value[i].idp_model}</td>
                        <td>${value[i].idp_tool_deital}</td>
                        <td>${value[i].idp_dev_time}</td>
                        <td>${value[i].idp_target}</td>
                        <td>${new Intl.NumberFormat('th-TH', {maximumSignificantDigits: 3}).format(value[i].idp_budget)}</td>
                        <td>${value[i].idp_tracking}</td>
                        </tr>`);
                    }
                })
                $.each(data.data_status, function(key, value) {
                    if (value.mgr_status == null) {} else if (value.mgr_status == 0) {
                        $('#mgr_status').html(`<span style="font-size: 15px" class=" badge badge-secondary">รอดำเนินการ</span>`);
                    } else if (value.mgr_status == 1) {
                        $('#mgr_status').html(`<span style="font-size: 15px" class=" badge badge-success">อนุมัติ</span>`);
                    } else if (value.mgr_status == 2) {
                        $('#mgr_status').html(`<span style="font-size: 15px" class=" badge badge-danger">ไม่อนุมัติ</span>`);
                    }

                    if (value.gm_status == null || value.gm_status == 0) {
                        $('#gm_status').html(`<span style="font-size: 15px" class=" badge badge-secondary">รอดำเนินการ</span>`);
                    } else if (value.gm_status == 1) {
                        $('#gm_status').html(`<span style="font-size: 15px" class=" badge badge-success">อนุมัติ</span>`);
                    } else if (value.gm_status == 2) {
                        $('#gm_status').html(`<span style="font-size: 15px" class=" badge badge-danger">ไม่อนุมัติ</span>`);
                    }

                    if (value.mgr_hrd_status == null || value.mgr_hrd_status == 0) {
                        $('#mgr_hrd_status').html(`<span style="font-size: 15px" class=" badge badge-secondary">รอดำเนินการ</span>`);

                    } else if (value.mgr_hrd_status == 1) {
                        $('#mgr_hrd_status').html(`<span style="font-size: 15px" class=" badge badge-success">อนุมัติ</span>`);
                    } else if (value.mgr_hrd_status == 2) {
                        $('#mgr_hrd_status').html(`<span style="font-size: 15px" class=" badge badge-danger">ไม่อนุมัติ</span>`);
                    }

                    if (value.od_status == null || value.od_status == 0) {
                        $('#od_status').html(`<span style="font-size: 15px" class=" badge badge-secondary">รอดำเนินการ</span>`);

                    } else if (value.od_status == 1) {
                        $('#od_status').html(`<span style="font-size: 15px" class=" badge badge-success">อนุมัติ</span>`);
                    } else if (value.od_status == 2) {
                        $('#od_status').html(`<span style="font-size: 15px" class=" badge badge-danger">ไม่อนุมัติ</span>`);
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
                alert(messenger);
            }
        });
    }
</script>