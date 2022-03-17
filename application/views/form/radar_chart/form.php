<div class="container">
    <h1 class="text-center">Radar Chart IDP</h1>
    <div class="form-group">
        <div class="table-responsive-sm">
            <table id="tbl_radarcahrt_emp" class="table table-striped table-bordered table-hover table-success">
                <thead>
                    <tr class="table-active">
                        <th scope="col">ประจำปี</th>
                        <th scope="col">เมนู</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                </tbody>
            </table>
        </div>
    </div>

    <?php
    $code = $this->session->userdata('code');
    $data = $this->account_m->check_role($code);
    foreach ($data as $r) :
        $name_role = $r->name_role;
        if ($name_role == 'ADMIN') : ?>
            <div class="form-group">
                <h5 class="text-left">Radar Chart ทั้งหมด
                </h5>
                <div class="table-responsive-sm">
                    <table id="tbl_chart_all" class="table table-striped table-bordered table-hover table-success">
                        <thead>
                            <tr class="table-active">
                                <th scope="col">ประจำปี</th>
                                <th scope="col">ชื่อ-นามสกุล</th>
                                <th scope="col">ฝ่าย</th>
                                <th scope="col">เมนู</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                        </tbody>
                    </table>
                </div>
            </div>
    <?php endif;
    endforeach; ?>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>

<script type="text/javascript">
    var table
    $(document).ready(function() {

        //datatables
        table = $('#tbl_radarcahrt_emp').DataTable({
            "searching": false,
            "ordering": false,
            "bInfo": false,
            "paging": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.`

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Radar_chart/ajax_list') ?>",
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

        table = $('#tbl_chart_all').DataTable({
            "searching": false,
            "ordering": false,
            "bInfo": false,
            "paging": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.`

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Radar_chart/ajax_all') ?>",
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
    });

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax
    }
</script>

<!-- <?php //$this->load->view('form/radar_chart/chart'); ?> -->
<?php $this->load->view('form/radar_chart/chart2'); ?>


<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script src=" <?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
<script src=" <?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>