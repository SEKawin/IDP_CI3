<!-- header -->
<?php $this->load->view('templates/header'); ?>
<!-- header -->
<div class="container-fluid">
	<div class="jumbotron text-center">
		<h1>การจัดการผู้ใช้งาน</h1>
		<div class="jumbotron text-left" style="background-color: LightSteelBlue">
			<div class="btn-group" role="group" aria-label="Basic example">
				<a href="<?php echo site_url('account/manage'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i> รายการผู้ใช้งาน</a>
				<a href="<?php echo site_url('account/approver_list'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i>การจัดการผู้อนุมัติตามองค์กร</a>
				<a href="<?php echo site_url('account/hrd_list'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i>รายการผู้ตรวจสอบและผู้อนุมัติฝ่ายพัฒนาทรัพยากรมนุษย์</a>
			</div>
			<div class="row col-md-12">
				<div class="page-header">
					<h3>Account Database <small>รายการผู้ใช้งาน</small></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<a class="text-light btn btn-primary" onclick="add_account()" role="button">
						<i class="fa fa-user-plus"></i> เพิ่มรายชื่อผู้ใช้งาน</a>
				</div>
			</div>
			</br>

			<div class="table-responsive-sm">
				<table id="table_account" class="table table-striped table-bordered table-hover table-success">
					<thead>
						<tr>
							<th>รหัสพนักงาน</th>
							<th>ชื่อ-นามสกุล</th>
							<th>ตำแหน่ง</th>
							<th>รหัสฝ่าย ชื่อฝ่าย </th>
							<th>สถานะ</th>
							<th>เมนู</th>
						</tr>
					</thead>
					<tbody class="table-light">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php ?>

<!--modal  Employee -->
<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog modal-lg" style="width:100%">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">account Form</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div><!-- modal-header -->

			<div class="modal-body form">
				<form action="#" id="form_account" class="form-horizontal">
					<input type="hidden" value="" name="emp_code">
					<div class="form-body">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="code">รหัสพนักงาน</label>
									<input type="text" id="is_text" class="form-control" name="code" placeholder="กรุณาระบุ รหัสพนักงาน">
									<span class="help-block text-danger"></span>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>คำนำหน้า</label>
									<select class="form-control" placeholder="เลือก..." name="salutation" placeholder="นาย นาง นางสาว หรือ อื่น ๆ" id="salutation">
										<option value="">เลือก...</option>
										<option value="นาย">นาย</option>
										<option value="นาง">นาง</option>
										<option value="นางสาว">นางสาว</option>
									</select>
									<span class="help-block text-danger"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstname_th">ชื่อ</label>
									<input type="text" id="is_text" class="form-control" name="firstname_th" placeholder="กรุณาระบุ ชื่อ">
									<span class="help-block text-danger"></span>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="lastname_th">นามสกุล</label>
									<input type="text" id="is_text" class="form-control" name="lastname_th" placeholder="กรุณาระบุ นามสกุล">
									<span class="help-block text-danger"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>รหัสฝ่าย</label>
									<div class="col-md2">
										<input class="form-control" list="dept_code" id="department_code" name="department_code" placeholder="กรุณาระบุ รหัสฝ่าย">
										<datalist id="dept_code">
											<?php foreach ($list_department as $rows) {
												echo '<option value="' . $rows->department_code . '"> ' . $rows->department_code . '</option>';
											}
											?>
										</datalist>

										<span class="help-block text-danger"></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>ชื่อฝ่าย</label>
									<div class="col-md2">
										<input class="form-control" list="dept_title" id="department_title" name="department_title" placeholder="กรุณาระบุ ชื่อฝ่าย">
										<datalist id="dept_title">
											<?php foreach ($list_department as $rows) {
												echo '<option value="' . $rows->department_title . '"> ' . $rows->department_title . '</option>';
											}
											?>
										</datalist>
										<span class="help-block text-danger"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>รหัสบัตรประจำตัวประชาชน</label>
									<input type="text" id="is_text" class="form-control" name="idcard" placeholder="กรุณาระบุ รหัสบัตรประจำตัวประชาชน">
									<span class="help-block text-danger"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>ชื่อ (อังกฤษ)</label>
									<input type="text" id="is_text" class="form-control" name="firstname_en" placeholder="กรุณาระบ ชื่อ (อังกฤษ)">
									<span class="help-block text-danger"></span>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>นามสกุล (อังกฤษ)</label>
									<input type="text" id="is_text" class="form-control" name="lastname_en" placeholder="กรุณาระบุ นามสกุล (อังกฤษ)">
									<span class="help-block text-danger"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>เพศ</label>
									<select class="form-control" placeholder="เลือก..." name="sex" placeholder="กรุณาระบุ เพศ">
										<option value="">เพศ...</option>
										<option value="1">ชาย</option>
										<option value="0">หญิง</option>
									</select>
									<span class="help-block text-danger"></span>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>ตำแหน่ง</label>
									<input class="form-control" list="posi_list" id="position" name="position" placeholder="ระบุตำแหน่ง ...">
									<datalist id="posi_list">
										<option value="">ตำแหน่ง...</option>
										<option value="กรรมการบริษัท">กรรมการบริษัท</option>
										<option value="ช่างเทคนิค">ช่างเทคนิค</option>
										<option value="ผู้จัดการทั่วไป">ผู้จัดการทั่วไป</option>
										<option value="ผู้จัดการฝ่าย">ผู้จัดการฝ่าย</option>
										<option value="ผู้ชำนาญการพิเศษ">ผู้ชำนาญการพิเศษ</option>
										<option value="ผู้ช่วยผู้จัดการทั่วไป">ผู้ช่วยผู้จัดการทั่วไป</option>
										<option value="รองประธานกรรมการ">รองประธานกรรมการ</option>
										<option value="รองประธานกรรมการอาวุโส">รองประธานกรรมการอาวุโส</option>
										<option value="รักษาการผู้จัดการทั่วไป">รักษาการผู้จัดการทั่วไป</option>
										<option value="รักษาการผู้ช่วยผู้จัดการทั่วไป">รักษาการผู้ช่วยผู้จัดการทั่วไป</option>
										<option value="ล่าม">ล่าม</option>
										<option value="วิศวกร">วิศวกร</option>
										<option value="หัวหน้ากลุ่ม">หัวหน้ากลุ่ม</option>
										<option value="หัวหน้าส่วน">หัวหน้าส่วน</option>
										<option value="หัวหน้าแผนก">หัวหน้าแผนก</option>
										<option value="เจ้าหน้าที่">เจ้าหน้าที่</option>
										<option value="พนักงานทั่วไป">พนักงานทั่วไป</option>
									</datalist>

									<span class="help-block text-danger"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>วันที่เริ่มงาน</label>
									<input type="date" class="form-control" name="startwork">
									<span class="help-block text-danger"></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>วันเกิด</label>
									<input type="date" class="form-control" name="birthdate">
									<span class="help-block text-danger"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>การศึกษา</label>
									<input class="form-control" list="educ_list" id="education" name="education" placeholder="ระบุการศึกษา ...">
									<datalist id="educ_list">
										<option value="">การศึกษา...</option>
										<option value="ปริญญาตรี">ปริญญาตรี</option>
										<option value="ปริญญาโท">ปริญญาโท</option>
										<option value="ปริญญาเอก">ปริญญาเอก</option>
										<option value="ประกาศนียบัตรวิชาชีพ">ประกาศนียบัตรวิชาชีพ</option>
										<option value="ประกาศนียบัตรวิชาชีพชั้นสูง">ประกาศนียบัตรวิชาชีพชั้นสูง</option>
										<option value="ปวท.">ปวท.</option>
										<option value="ประถมศึกษา">ประถมศึกษา</option>
										<option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
										<option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
									</datalist>

									<span class="help-block text-danger"></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>E-Mail</label>
									<input type="email" class="form-control" name="email" placeholder="กรุณาระบุ E-Mail">
									<span class="help-block text-danger"> </span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>รหัสแผนก</label>
									<div class="col-md2">
										<input class="form-control" list="sect_code" id="section_code" name="section_code" placeholder="กรุณาระบุ รหัสแผนก">
										<datalist id="sect_code">
											<?php foreach ($list_section as $rows) {
												echo '<option value="' . $rows->section_code . '"> ' . $rows->section_code . '</option>';
											}
											?>
										</datalist>
										<span class="help-block text-danger"></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>ชื่อแผนก</label>
									<div class="col-md2">
										<input class="form-control" list="sect_title" id="section_title" name="section_title" placeholder="กรุณาระบุ ชื่อแผนก">
										<datalist id="sect_title">
											<?php foreach ($list_section as $rows) {
												echo '<option value="' . $rows->section_title . '"> ' . $rows->section_title . '</option>';
											}
											?>
										</datalist>
										<span class="help-block text-danger"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>รหัสส่วน</label>
									<div class="col-md2">
										<input class="form-control" list="divi_code" id="division_code" name="division_code" placeholder="กรุณาระบุ รหัสส่วน">
										<datalist id="divi_code">
											<?php foreach ($list_division as $rows) {
												echo '<option value="' . $rows->division_code . '"> ' . $rows->division_code . '</option>';
											}
											?>
										</datalist>
										<span class="help-block text-danger"></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>ชื่อส่วน</label>
									<div class="col-md2">
										<input class="form-control" list="divi_title" id="division_title" name="division_title" placeholder="กรุณาระบุ ชื่อส่วน">
										<datalist id="divi_title">
											<?php foreach ($list_division as $rows) {
												echo '<option value="' . $rows->division_title . '"> ' . $rows->division_title . '</option>';
											}
											?>
										</datalist>
										<span class="help-block text-danger"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>รหัสสำนัก</label>
									<div class="col-md2">
										<input class="form-control" list="office_code" id="office_code" name="office_code" placeholder="กรุณาระบุ รหัสสำนัก">
										<datalist id="office_code">
											<?php foreach ($list_office as $rows) {
												echo '<option value="' . $rows->office_code . '"> ' . $rows->office_code . '</option>';
											}
											?>
										</datalist>
										<span class="help-block text-danger"></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>ชื่อสำนัก</label>
									<div class="col-md2">
										<input class="form-control" list="office_title" id="office_title" name="office_title" placeholder="กรุณาระบุ ชื่อสำนัก">
										<datalist id="office_title">
											<?php foreach ($list_office as $rows) {
												echo '<option value="' . $rows->office_title . '"> ' . $rows->office_title . '</option>';
											}
											?>
										</datalist>
										<span class="help-block text-danger"></span>
									</div>
								</div>
							</div>
						</div>
					</div><!-- form-body -->
				</form>
			</div> <!-- modal-body -->

			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="fa fa-floppy-o"></i>
					บันทึก</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
					ยกเลิก</button>
			</div><!-- modal-footer -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End modal Add Employee-->

<!-- Jquery & Datatable -->
<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.min.js') ?>"></script>

<script type="text/javascript">
	var save_method; //for save method string
	var table

	$(document).ready(function() {
		//datatables
		table = $('#table_account').DataTable({
			// "searching": true,
			"bInfo": false,
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('account/ajax_list') ?>",
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

	function add_account() {
		save_method = 'add';
		$('#form_account')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('เพิ่มข้อมูลผู้ใช้งาน'); // Set Title to Bootstrap modal title
	}

	function edit_account(emp_code) {
		save_method = 'update';
		$('#form_account')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string

		//Ajax Load data from ajax
		$.ajax({
			url: "<?php echo site_url('account/ajax_edit_account') ?>/" + emp_code,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$.each(data, function(key, value) {
					$('[name="emp_code"]').val(value.code);
					$('[name="idcard"]').val(value.idcard);
					$('[name="code"]').val(value.code);
					$('[name="salutation"]').val(value.salutation);
					$('[name="firstname_th"]').val(value.firstname_th);
					$('[name="lastname_th"]').val(value.lastname_th);
					$('[name="firstname_en"]').val(value.firstname_en);
					$('[name="lastname_en"]').val(value.lastname_en);
					$('[name="sex"]').val(value.sex);
					$('[name="position"]').val(value.position);
					$('[name="startwork"]').val(value.startwork);
					$('[name="birthdate"]').val(value.birthdate);
					$('[name="education"]').val(value.education);
					$('[name="email"]').val(value.email);
					$('[name="section_code"]').val(value.section_code);
					$('[name="section_title"]').val(value.section_title);
					$('[name="division_code"]').val(value.division_code);
					$('[name="division_title"]').val(value.division_title);
					$('[name="department_code"]').val(value.department_code);
					$('[name="department_title"]').val(value.department_title);
					$('[name="office_code"]').val(value.office_code);
					$('[name="office_title"]').val(value.office_title);

					$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
					$('.modal-title').text('ปรับปรุงข้อมูลผู้ใช้งาน'); // Set title to Bootstrap modal title
				})
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function save() {

		$('#btnSave').text('กำลังบันทึก...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable

		var url;
		if (save_method == 'add') {
			url = "<?php echo site_url('account/ajax_add_account') ?>";
		} else {
			url = "<?php echo site_url('account/ajax_update_account') ?>";
		}

		// ajax adding data to database
		var formData = new FormData($('#form_account')[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {

				if (data.status) //if success close modal and reload ajax table
				{
					$('#modal_form').modal('hide');
					reload_table();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
							'has-error'
						); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
							i]); //select span help-block class set text error string
					}
				}
				$('#btnSave').text('บันทึก'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('ไม่สามารถบันทึกข้อมูลโปรดแจ้งหน้าที่ที่รับผิดชอบระบบ โทร 1104');
				$('#btnSave').text('บันทึก'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable

			}
		});
	}

	function delete_account(emp_code) {

		if (confirm('คุณต้องการนำข้อมูลนี้ออกจากระบบใช่หรือไม่')) {
			// ajax delete data to database
			$.ajax({
				url: "<?php echo site_url('account/remove') ?>/" + emp_code,
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					//if success reload ajax table
					$('#modal_form').modal('hide');
					reload_table();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('ไม่สามารถลบข้อมูลโปรดแจ้งหน้าที่ที่รับผิดชอบระบบ โทร 1104');
				}
			});

		}
	}
</script>

<!-- footer -->
<?php $this->load->view('templates/footer'); ?>
<!-- footer
