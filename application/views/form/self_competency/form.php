<div class="container">
	<h1 class="text-center">Self-Competency Gap Assessment</h1>
	<div class="form-group">
		<h5 class="text-left">แบบฟอร์มประจำปีของฉัน</h5>
		<a class="text-light btn btn-sm btn-primary" onclick="form_self_competency_gap()" role="button">
			<i class="fa fa-pencil-square"></i> กรอกแบบฟอร์ม Self-Competency Gap Assessment ประจำปี
		</a>
		<div class="table-responsive-sm">
			<table id="tbl_self_competency" class="table table-striped table-bordered table-hover table-success">
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

	<?php
	$code = $this->session->userdata('code');
	$data = $this->account_m->check_role($code);
	foreach ($data as $r) :
		$name_role = $r->name_role;
		if ($name_role == 'ADMIN' || $name_role == 'MANAGER') : ?>

			<div class="form-group">
				<h5 class="text-left">แบบฟอร์มสำหรับผู้บังคับบัญชาอนุมัติ
					<label class="badge badge-warning">รออนุมัติ &nbsp;
						<span class="badge badge-light" id="notify_self" style="font-size:11px;"></span> &nbsp;รายการ</label>
				</h5>
				<div class="table-responsive-sm">
					<table id="tbl_self_competency_approval" class="table table-striped table-bordered table-hover table-success">
						<thead>
							<tr class="table-active">
								<th scope="col">ประจำปี</th>
								<th scope="col">ชื่อ-นามสกุล</th>
								<th scope="col">ฝ่าย</th>
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
	endforeach; ?>

</div>

<!--modal Form -->
<div class="modal fade" id="modal_standard_form" role="dialog" style="z-index:99999">
	<div id="modal_dialog" class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal_title">Form</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;
					</span>
				</button>
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

<!-- standard of Core & Management Competency-->
<div id="hidden-modal-body" style="display: none;">
	<form action="#" id="standard_form" class="form-horizontal">
		<input type="hidden" value="" name="">
		<div class="form-body">
			<div class="form-group">
				<div class="table-responsive">
					<table class="table table-hover table-borderless table-sm">
						<thead>
							<tr class="table-warning">
								<th scope="col">ระดับความสามารถ</th>
								<th scope="col">ความหมายโดยรวม</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>ระดับ 4<br>
									ระดับดีมาก
								</td>
								<td>มีความรู้ความสามารถในทักษะนั้นได้เป็นอย่างดีมาก ปฎิบัติงานได้ทันที ไม่ต้องมีผู้ควบคุมหรือจัดการและสามารถชี้แนะบุคคลอื่นได้</td>
							</tr>
							<tr>
								<td>ระดับ 3 <br>
									ระดับดี
								</td>
								<td>มีความรู้ความสามารถในทักษะนั้นได้ดี ปฏิบัติงานได้ทันที ภายใต้การควบคุมดูแลของผู้บังคับบัญชาเป็นบางกรณี และสามารถให้คำแนะนำบุคคลอื่ได้บางกรณี</td>
							</tr>
							<tr>
								<td>ระดับ 2<br>
									ระดับปานกลาง
								</td>
								<td>มีความรู้ความสามารถในทักษะนั้นๆพอสมควร ปฏิบัติงานด้วยการรับคำสั่ง แต่ต้องอยู่ภายใต้การควบคุมดูแลอย่างใกล้ชิด</td>
							</tr>
							<tr>
								<td>ระดับ 1<br>
									ระดับน้อย
								</td>
								<td>มีความรู้ความสามารถในทักษะนั้นๆน้อย ปฏิบัติงานด้วยการรับคำสั่ง หรือการมอบหมายจากผู้บังคับบัญชาเท่านั้น</td>
							</tr>
							<tr>
								<td>ระดับ R<br>
									Require
								</td>
								<td>กำหนดให้มี(ไม่มีการกำหนดระดับ ใช้เป็นเกณฑ์กำหนดให้มีหรือไม่มี)</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- standard of Core & Management Competency-->

<!-- standard of Functional Competency-->
<div id="hidden-modal-body2" style="display: none;">
	<form action="#" id="standard_form2" class="form-horizontal">
		<input type="hidden" value="" name="">
		<div class="form-body">
			<div class="form-group">
				<div class="table-responsive">
					<table class="table table-hover table-borderless table-sm">
						<thead>
							<tr class="table-info ">
								<th scope="col">ระดับความสามารถ</th>
								<th scope="col">ความหมายโดยรวม</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>ระดับ 1 <br>
									ฺBasic Level
								</td>
								<td><b>ขั้นเรียนรู้ : </b>
									การเริ่มต้นฝึกหัดซึ่งสามารถปฏิบัติงานได้โดยต้องอยู่ภายใต้กรอบหรือแนวทางที่กำหนดขึ้น หรือเป็นสถานการณ์ที่ไม่ยุ่งยากซับซ้อน แสดงออกถึงความรู้ความเข้าใจในงานที่รับผิดชอบ และปฏิบัติงานได้ภายใต้กรอบหรือแนวทางที่กำหนด
								</td>
							</tr>
							<tr>
								<td>ระดับ 2 <br>
									Doing Level
								</td>
								<td><b>ขั้นปฏิบัติ : </b>
									การแสดงพฤติกรรมที่กำหนดขึ้นได้ด้วยตัวเอง หรือ ช่วยเหลือสมาชิกในทีมให้สามารถปฏิบัติงานตามที่ได้รับมอบหมายแสดงออกถึงทักษะในการให้ความช่วยเหลือ สอนแนะ สามารถแก้ไขปัญหาและตัดสินใจในงานที่รับผิดชอบได้
								</td>
							</tr>
							<tr>
								<td>ระดับ 3 <br>
									Developing Level
								</td>
								<td><b>ขั้นพัฒนา :</b>
									ความสามารถในการนำสมาชิกในทีม รวมถึงการออกแบบและคิดริเริ่มสิ่งใหม่ ๆ เพื่อประโยชน์และเป้าหมายของทีมงาน แสดงออกถึงทักษะในการเสนอแนะ สอนงาน ให้คำปรึกษาและพัฒนาทีมงาน
								</td>
							</tr>
							<tr>
								<td>ระดับ 4 <br>
									Advanced Level
								</td>
								<td><b>ขั้นก้าวหน้า :</b>
									การคิดวิเคราะห์และนำสิ่งใหม่ ๆ มาใช้เพื่อเสริมสร้างประสิทธิภาพการทำงานของหน่วยงาน และความสามารถในการสอนผู้อื่นให้สามารถแสดงพฤติกรรมนั้น ๆ ได้ตามที่กำหนดขึ้น แสดงออกถึงการสนับสนุน ส่งเสริม ผลักดัน กระตุ้นจูงใจให้เกิดบรรยากาศการทำงานที่ดี
								</td>
							</tr>
							<tr>
								<td>ระดับ 5 <br>
									Expert Level
								</td>
								<td><b>ขั้นผู้เชี่ยวชาญ : </b>
									การมุ่งเน้นที่กลยุทธ์และแผนงานในระดับองค์กร รวมถึงความสามารถในการให้คำปรึกษาแนะนำแก่ผู้อื่นถึงแนวทางหรือขั้นตอนการทำงาน และวิธีการแก้ไขปัญหาที่เกิดขึ้น แสดงออกถึงการกำหนดนโยบาย เป้าหมาย และกลยุทธ์การทำงานของหน่วยงานหรือองค์กร
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- standard of Functional Competency-->

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>

<script type="text/javascript">
	function standard_form() {
		$('#append-modal').html($('#hidden-modal-body').html());
		$('body').find('#standard_form')[0].reset(); // reset form on modals
		$('#modal_standard_form').modal('show'); // show bootstrap modal
		$('.modal_title').text('เกณฑ์การวัดความสามารถสำหรับ Core&Management Competency'); // Set Title to Bootstrap modal title
	}

	function standard_form2() {
		$('#append-modal').html($('#hidden-modal-body2').html());
		$('body').find('#standard_form2')[0].reset(); // reset form on modals
		$('#modal_standard_form').modal('show'); // show bootstrap modal
		$('.modal_title').text('เกณฑ์การวัดความสามารถ Functional Competency Criteria'); // Set Title to Bootstrap modal title
	}

	var table
	$(document).ready(function() {

		var getData =
			$.ajax({ //Alerts 
				url: "<?php echo site_url('Notifications/noticy_self_competency') ?>",
				data: "",
				async: false,
				success: function(getData) {
					$("span#notify_self").html(getData);
				}
			}).responseText;

		//datatables
		table = $('#tbl_self_competency').DataTable({
			"searching": false,
			"ordering": false,
			"bInfo": false,
			"paging": false,
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.`

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('self_competency/ajax_list') ?>",
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

		table = $('#tbl_self_competency_approval').DataTable({
			"searching": false,
			"ordering": false,
			"bInfo": false,
			"paging": false,
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.`

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('self_competency/ajax_self_competency_approval') ?>",
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

	function form_self_competency_gap() {

		save_method = 'add';
		$('#form_self_competency')[0].reset(); // reset form on modals
		$('#modal_form_self_competency_gap').modal('show');
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('.modal-title').text(
			'แบบประเมินช่องว่างความสามารถของตนเอง (Self-Competency Gap Assessment) ประจำปี'); // Set Title to Bootstrap modal title
		$.ajax({
			url: "<?php echo site_url('Self_competency/comeptency_mapping') ?>",
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$.each(data.data1, function(key, value) {
					const {
						cc_competency,
						mc_competency,
					} = value;

					if (cc_competency !== undefined) {
						$('#modal_form_self_competency_gap #firstCcTr').html('');
						for (i = 0; i < cc_competency.length; i++) {
							$('#modal_form_self_competency_gap #firstCcTr').append('<tr>' +
								'<td><input type="text" id="cc_no" name="cc_no[]" class="form-control" value ="' + [i + 1] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="cc_code" name="cc_code[]" class="form-control" value =""></td>' +
								'<td><input type="text" id="cc_competency" name="cc_competency[]" class="form-control" value= "' + value.cc_competency[i] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="cc_expected" name="cc_expected[]" class="form-control" value= "' + value.cc_mapping[i] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="cc_actual" name="cc_actual[]" class="form-control" value= ""></td>' +
								'<td><input type="text" id="cc_result" name="cc_result[]" class="form-control" readonly="readonly" /></td>' +
								'</tr>' +
								'');
						}
					}

					if (mc_competency !== undefined) {
						$('#modal_form_self_competency_gap #firstMcTr').html('');
						for (i = 0; i < mc_competency.length; i++) {
							$('#modal_form_self_competency_gap #firstMcTr').append('<tr>' +
								'<td><input type="text" id="mc_no" name="mc_no[]" class="form-control" value ="' + [i + 1] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="mc_code" name="mc_code[]" class="form-control" value = ""></td>' +
								'<td><input type="text" id="mc_competency" name="mc_competency[]" class="form-control" value= "' + value.mc_competency[i] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="mc_expected" name="mc_expected[]" class="form-control" value= "' + value.mc_mapping[i] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="mc_actual" name="mc_actual[]" class="form-control" value= ""></td>' +
								'<td><input type="text" id="mc_result" name="mc_result[]" class="form-control" readonly="readonly" /></td>' +
								'</tr>' +
								'');
						}
					}

				})
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('ไม่สามารถแสดงข้อมูลได้ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 ');
			}
		});
	}
</script>

<?php $position = $this->session->userdata('position'); ?>

<?php $this->load->view('form/self_competency/modal_form'); ?>
<?php $this->load->view('form/self_competency/modal_form_view'); ?>
<?php $this->load->view('form/self_competency/modal_form_approval'); ?>

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script src=" <?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
<script src=" <?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>