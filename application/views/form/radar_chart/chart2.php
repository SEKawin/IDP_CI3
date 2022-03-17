<!--modal Form -->
<div class="modal fade" id="modal_form_radar_chart" role="dialog" style="z-index:9999;">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 100%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal_title_radar_chart">Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form" id="append-modal">
            </div> <!-- modal-body form -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i>
                    ยกเลิก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="hidden-modal-body" style="display: none;">
    <form action="#" id="form_radar_chart" class="form-horizontal">
        <input type="hidden" value="" name="">
        <div class="form-body">
            <div class="form-group">


            
            </div>
        </div>
    </form>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script src=" <?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
<script src=" <?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="<?php echo base_url('assets/chartjs/chart.js') ?>"></script>

<script type="text/javascript">
    function view_radarChart(code, years) {
        // console.log(code, years)
        $('#append-modal').html($('#hidden-modal-body').html());
        $('body').find('#form_radar_chart')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('#modal_form_radar_chart').modal({
            backdrop: 'static',
            keyboard: false
        }); // show bootstrap modal
        $('.modal_title_radar_chart').text(' Radar Chart IDP'); // Set Title to Bootstrap modal title
        $.ajax({
            url: "<?php echo site_url('Radar_chart/view_radar_chart') ?>/" + code + "/" + years,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // console.log(data)
                var core_competency = data.superviosr.core_competency;
                var manage_competency = data.superviosr.manage_competency;
                var knowledge = data.superviosr.knowledge;
                var skill = data.superviosr.skill;
                var per_attr = data.superviosr.personal_attributes;

                $('td[name="emp_code"]').text(data.emp_code);
                $('td[name="name"]').text(data.name);
                $('td[name="position"]').text(data.position);
                $('td[name="department"]').text(data.department);
                $('td[name="startwork"]').text(data.startwork);
                // $('td[name="core_num"]').text(data.core_num + ' ข้อ');
                $('td[name="manage_num"]').text(data.manage_num + ' ข้อ');
                // $('td[name="func_num"]').text(data.func_num + ' ข้อ');

                function isInRange(value) {
                    if (typeof value !== 'number') {
                        return false;
                    }
                    return value >= this.lower && value <= this.upper;
                }
                let range = {
                    lower: 1,
                    upper: 10
                };

                // Core Competetncy 
                let cc_map_competency = core_competency.map(({
                    competency
                }) => {
                    if (competency !== 'ความมีคุณธรรม') {
                        return competency;
                    }
                });
                const cc_competency = cc_map_competency.filter(Boolean);
                $('td[name="core_num"]').text(cc_competency.length + ' ข้อ');

                let cc_map_expected = core_competency.map(({
                    expected
                }) => parseInt(expected));

                let cc_expected = cc_map_expected.filter(isInRange, range);

                let cc_map_actual = core_competency.map(({
                    actual
                }) => parseInt(actual));

                let cc_actual = cc_map_actual.filter(isInRange, range);

                const ctxc = document.getElementById('cc_chart');
                const Cc_Chart = new Chart(ctxc, {
                    type: 'radar',
                    data: {
                        labels: cc_competency,
                        datasets: [{
                            label: 'Expected',
                            data: cc_expected,
                            // fill: true,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 99, 132)'
                        }, {
                            label: 'Actual',
                            data: cc_actual,
                            // fill: true,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            pointBackgroundColor: 'rgb(54, 162, 235)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 162, 235)'
                        }]
                    },
                    options: {
                        scale: {
                            min: 0,
                            max: 5,

                        },
                        elements: {
                            line: {
                                borderWidth: 2
                            }
                        }
                    },
                });
                // Core Competetncy

                // Manage Competency
                if (manage_competency == null) {
                    $('#chart_mc').hide();
                } else {
                    let mc_competency = manage_competency.map(({
                        competency
                    }) => competency)
                    // $('td[name="manage_num"]').text(mc_competency.length + ' ข้อ');

                    let mc_map_expected = manage_competency.map(({
                        expected
                    }) => parseInt(expected));

                    let mc_expected = mc_map_expected.filter(isInRange, range);

                    let mc_map_actual = manage_competency.map(({
                        actual
                    }) => parseInt(actual));
                    let mc_actual = mc_map_actual.filter(isInRange, range);

                    const ctxm = document.getElementById('mc_chart');
                    const Mc_Chart = new Chart(ctxm, {
                        type: 'radar',
                        data: {
                            labels: mc_competency,
                            datasets: [{
                                label: 'Expected',
                                data: mc_expected,
                                // fill: true,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgb(255, 99, 132)',
                                pointBackgroundColor: 'rgb(255, 99, 132)',
                                pointBorderColor: '#fff',
                                pointHoverBackgroundColor: '#fff',
                                pointHoverBorderColor: 'rgb(255, 99, 132)'
                            }, {
                                label: 'Actual',
                                data: mc_actual,
                                // fill: true,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgb(54, 162, 235)',
                                pointBackgroundColor: 'rgb(54, 162, 235)',
                                pointBorderColor: '#fff',
                                pointHoverBackgroundColor: '#fff',
                                pointHoverBorderColor: 'rgb(54, 162, 235)'
                            }]
                        },
                        options: {

                            scale: {
                                min: 0,
                                max: 5,
                            },
                            elements: {
                                line: {
                                    borderWidth: 2
                                }
                            }
                        },
                    });
                }
                // Manage Competency
                // console.log(data)
                // Functional Competency

                let k_competency = knowledge.map(({
                    competency
                }) => competency)
                let k_expected = knowledge.map(({
                    expected
                }) => expected)
                let k_actual = knowledge.map(({
                    actual
                }) => actual)

                let skill_competency = skill.map(({
                    competency
                }) => competency)
                let skill_expected = skill.map(({
                    expected
                }) => expected)
                let skill_actual = skill.map(({
                    actual
                }) => actual)

                let pa_competency = per_attr.map(({
                    competency
                }) => competency)
                let pa_expected = per_attr.map(({
                    expected
                }) => expected)
                let pa_actual = per_attr.map(({
                    actual
                }) => actual)

                let fc_competency = k_competency.concat(skill_competency, pa_competency);

                $('td[name="func_num"]').text(fc_competency.length + ' ข้อ');

                let fc_expected = k_expected.concat(skill_expected, pa_expected);

                // console.log(fc_expected)
                let fc_actual = k_actual.concat(skill_actual, pa_actual);
                // console.log(fc_actual)

                const ctxf = document.getElementById('fc_chart');
                const Fc_Chart = new Chart(ctxf, {
                    type: 'radar',
                    data: {
                        labels: fc_competency,
                        datasets: [{
                            label: 'Expected',
                            data: fc_expected,
                            // fill: true,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 99, 132)'
                        }, {
                            label: 'Actual',
                            data: fc_actual,
                            // fill: true,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            pointBackgroundColor: 'rgb(54, 162, 235)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 162, 235)'
                        }]
                    },
                    options: {
                        scale: {
                            min: 0,
                            max: 5,
                        },
                        elements: {
                            line: {
                                borderWidth: 2
                            }
                        }
                    },
                });
                // Functional Competency

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('ไม่สามารถแสดงข้อมูลได้ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 ');
            }
        });
    }
</script>