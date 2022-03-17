<div class="container">
    <h1 class="text-center">Individual Development Plan</h1>
    <div class="form-group">
        <h5 class="text-left">แผนประจำปีของฉัน</h5>
        <div class="table-responsive-sm">
            <table id="tbl_idp_plan_emp" class="table table-striped table-bordered table-hover table-success">
                <thead>
                    <tr class="table-active">
                        <th scope="col">ประจำปี</th>
                        <th scope="col">สถานะของแบบฟอร์ม</th>
                        <th scope="col">เมนู</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                </tbody>
            </table>
        </div>
    </div>

    <?php $code = $this->session->userdata('code');
    $data = $this->idp_form_m->check_approval();
    foreach ($data as $r) :
        $mgr_code = $r->mgr_code;
        $gm_code = $r->gm_code;
    endforeach;
    if (empty($mgr_code)) :
    elseif ($code == $mgr_code) : ?>
        <div class="form-group">
            <h5 class="text-left">รายการที่คุณต้องอนุมัติแบบฟอร์มในฐานะ MGR</h5>
            <label class="badge badge-warning">รออนุมัติ &nbsp;
                <span class="badge badge-light" id="noticy_idp_form_mgr" style="font-size:11px;">
                </span> &nbsp;รายการ
            </label>
            <div class="table-responsive-sm">
                <table id="tbl_approval_mgr" class="table table-striped table-bordered table-hover table-success">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">ชื่อ-นามสกุล</th>
                            <th scope="col">ประจำปี</th>
                            <th scope="col">สถานะของแบบฟอร์ม</th>
                            <th scope="col">เมนู</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                    </tbody>
                </table>
            </div>
        </div>
    <?php elseif ($code == $gm_code) : ?>
        <div class="form-group">
            <h5 class="text-left">รายการที่คุณต้องอนุมัติแบบฟอร์มในฐานะ AGM/GM</h5>
            <label class="badge badge-warning">รออนุมัติ &nbsp;
                <span class="badge badge-light" id="noticy_idp_form_gm" style="font-size:11px;">
                </span> &nbsp;รายการ
            </label>
            <div class="table-responsive-sm">
                <table id="tbl_approval_gm" class="table table-striped table-bordered table-hover table-success">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">ชื่อ-นามสกุล</th>
                            <th scope="col">ประจำปี</th>
                            <th scope="col">สถานะของแบบฟอร์ม</th>
                            <th scope="col">เมนู</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif;
    $data = $this->account_m->check_role($code);
    foreach ($data as $r) :
        $name_role = $r->name_role;
        if ($name_role == 'MANAGER_HRD') :
        ?>
            <div class="form-group">
                <h5 class="text-left">รายการที่คุณต้องอนุมัติแบบฟอร์มในฐานะ MGR HRD</h5>
                <label class="badge badge-warning">รออนุมัติ &nbsp;
                    <span class="badge badge-light" id="noticy_idp_form_mgr_hrd" style="font-size:11px;">
                    </span> &nbsp;รายการ
                </label>
                <div class="table-responsive-sm">
                    <table id="tbl_approval_mgr_hrd" class="table table-striped table-bordered table-hover table-success">
                        <thead>
                            <tr class="table-active">
                                <th scope="col">ชื่อ-นามสกุล</th>
                                <th scope="col">ประจำปี</th>
                                <th scope="col">สถานะของแบบฟอร์ม</th>
                                <th scope="col">เมนู</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                        </tbody>
                    </table>
                </div>
            </div>

        <?php elseif ($name_role == 'OD') : ?>
            <div class="form-group">
                <h5 class="text-left">รายการที่คุณต้องอนุมัติแบบฟอร์มในฐานะ GM OD</h5>
                <label class="badge badge-warning">รออนุมัติ &nbsp;
                    <span class="badge badge-light" id="noticy_idp_form_od" style="font-size:11px;">
                    </span> &nbsp;รายการ
                </label>
                <div class="table-responsive-sm">
                    <table id="tbl_approval_od" class="table table-striped table-bordered table-hover table-success">
                        <thead>
                            <tr class="table-active">
                                <th scope="col">ชื่อ-นามสกุล</th>
                                <th scope="col">ประจำปี</th>
                                <th scope="col">สถานะของแบบฟอร์ม</th>
                                <th scope="col">เมนู</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                        </tbody>
                    </table>
                </div>
            </div>
    <?php endif;
    endforeach;
    ?>

</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script type="text/javascript">
    var table;

    $(document).ready(function() {

        var getData =
            $.ajax({ //Alerts 
                url: "<?php echo site_url('notifications/noticy_approval_idp_form_emp')                         ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_self").html(getData);
                }
            }).responseText;

        //datatables
        table = $('#tbl_idp_plan_emp').DataTable({
            "searching": false,
            "ordering": false,
            "bInfo": false,
            "paging": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.`

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Idp_form/ajax_list_emp') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [-2], //2 last column (file)
                    "orderable": false, //set not orderable
                },
            ],
        });

        var getData =
            $.ajax({ //Alerts 
                url: "<?php echo site_url('notifications/noticy_approval_idp_form_emp')                         ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_self").html(getData);
                }
            }).responseText;

        //datatables
        table = $('#tbl_approval_mgr').DataTable({
            "searching": false,
            "ordering": false,
            "bInfo": false,
            "paging": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.`

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Idp_form/ajax_list_mgr') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [-2], //2 last column (file)
                    "orderable": false, //set not orderable
                },
            ],
        });

        var getData =
            $.ajax({ //Alerts 
                url: "<?php echo site_url('notifications/noticy_approval_idp_form_gm')                         ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_self").html(getData);
                }
            }).responseText;

        //datatables
        table = $('#tbl_approval_gm').DataTable({
            "searching": false,
            "ordering": false,
            "bInfo": false,
            "paging": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.`

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Idp_form/ajax_list_gm') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [-2], //2 last column (file)
                    "orderable": false, //set not orderable
                },
            ],
        });

        var getData =
            $.ajax({ //Alerts 
                url: "<?php echo site_url('notifications/noticy_approval_idp_form_mgr_hrd')                         ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_self").html(getData);
                }
            }).responseText;

        //datatables
        table = $('#tbl_approval_mgr_hrd').DataTable({
            "searching": false,
            "ordering": false,
            "bInfo": false,
            "paging": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.`

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Idp_form/ajax_list_mgr_hrd') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [-2], //2 last column (file)
                    "orderable": false, //set not orderable
                },
            ],
        });

        var getData =
            $.ajax({ //Alerts 
                url: "<?php echo site_url('notifications/noticy_approval_idp_form_od')                         ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_self").html(getData);
                }
            }).responseText;

        //datatables
        table = $('#tbl_approval_od').DataTable({
            "searching": false,
            "ordering": false,
            "bInfo": false,
            "paging": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.`

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Idp_form/ajax_list_od') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [-2], //2 last column (file)
                    "orderable": false, //set not orderable
                },
            ],
        });

        var getData =
            $.ajax({ //Alerts 
                url: "<?php echo site_url('Notifications/noticy_idp_form_mgr') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#noticy_idp_form_mgr").html(getData);
                }
            }).responseText;

        var getData =
            $.ajax({ //Alerts 
                url: "<?php echo site_url('Notifications/noticy_idp_form_gm') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#noticy_idp_form_gm").html(getData);
                }
            }).responseText;

        var getData =
            $.ajax({ //Alerts 
                url: "<?php echo site_url('Notifications/noticy_idp_form_mgr_hrd') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#noticy_idp_form_mgr_hrd").html(getData);
                }
            }).responseText;

        var getData =
            $.ajax({ //Alerts 
                url: "<?php echo site_url('Notifications/noticy_idp_form_od') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#noticy_idp_form_od").html(getData);
                }
            }).responseText;

        var getData =
            $.ajax({ //Alerts 
                url: "<?php echo site_url('Notifications/noticy_self_competency') ?>",
                data: "",
                async: false,
                success: function(getData) {
                    $("span#notify_self").html(getData);
                }
            }).responseText;

    });

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax
    }
</script>

<?php $this->load->view('form/idp_form/script'); ?>
<?php $this->load->view('form/idp_form/modal_form'); ?>
<?php $this->load->view('form/idp_form/modal_form_edit'); ?>
<?php $this->load->view('form/idp_form/modal_form_view'); ?>
<?php $this->load->view('form/idp_form/modal_form_approval_mgr'); ?>
<?php $this->load->view('form/idp_form/modal_form_approval_gm'); ?>
<?php $this->load->view('form/idp_form/modal_form_approval_mgr_hrd'); ?>
<?php $this->load->view('form/idp_form/modal_form_approval_od'); ?>

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script src=" <?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
<script src=" <?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>