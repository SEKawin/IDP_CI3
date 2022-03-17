<?php
$code             = $this->session->userdata('code');
$salutation       = $this->session->userdata('salutation');
$firstname_th     = $this->session->userdata('firstname_th');
$lastname_th      = $this->session->userdata('lastname_th');
$position         = $this->session->userdata('position');
$department_title = $this->session->userdata('department_title');
$department_code  = $this->session->userdata('department_code');
?>

<div class="modal fade" id="modal_form_self_competency_gap" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable modal-xl">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">จัดการ Self-Competency Gap Assessment</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<form action="#" id="form_self_competency" class="form-horizontal">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label><b>รหัสพนักงาน :</b></label>
							<label name="emp_code"><?php echo $code; ?></label>
						</div>
						<div class="form-group col-md-6">
							<label><b>ชื่อ-นามสกุล :</b></label>
							<label name="emp_name"><?php echo $salutation . '' . $firstname_th . ' ' . $lastname_th; ?></label>
						</div>
						<div class="form-group col-md-6">
							<label><b>ตำแหน่ง :</b></label>
							<label name="position"><?php echo $position; ?></label>
						</div>
						<div class="form-group col-md-6">
							<label><b>ฝ่าย/สำนัก :</b></label>
							<label name="department"><?php echo $department_code . ' ' . $department_title; ?></label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group input-group mb-3 col-md-5">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">ประจำปี (ค.ศ.):</span>
							</div>
							<input type="years" class="form-control" id="years" name="years" placeholder="ระบุประจำปี (ค.ศ.)" aria-describedby="basic-addon1">
							<span class="help-block text-danger"></span>
						</div>
					</div>

					<div class="form-group">
						<div class="table-sm table-responsive">
							<!-- Core Competency -->
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
										<th scope="col" style="width: 10%;">Actual <br> (A)</th>
										<th scope="col" style="width: 10%;">Result <br> (A-E)</th>
									</tr>
								</thead>
								<tbody id='firstCcTr'>
									<tr>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- Core Competency -->

						<?php $position = $this->session->userdata('position');
						if ($position !== 'เจ้าหน้าที่' && $position !== 'ล่าม' && $position !== 'ล่ามญี่ปุ่น' && $position !== 'พนักงานทั่วไป' && $position != 'ช่างเทคนิค' && $position != 'โปรแกรมเมอร์') : ?>
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
									<th scope="col" style="width: 10%;">Actual <br> (A)</th>
									<th scope="col" style="width: 10%;">Result <br> (A-E)</th>
								</tr>
							</thead>
							<tbody id="tbodyKnow">
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-sm btn-primary" id="addKnowRow" type="button"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่ม</button>
									<!-- <button type="button" class="btn btn-sm btn-danger" id="removeKnowRow"><i class="fa fa-minus-square" aria-hidden="true"></i> ลบ</button> -->
								</div>
								<tr>
									<td><input type="text" id="know_no" name="know[0][no]" class="form-control"></td>
									<td><input type="text" id="know_code" name="know[0][code]" class="form-control"></td>
									<td><input type="text" id="know_competency" name="know[0][competency]" class="form-control"></td>
									<td><input type="number" id="know_expected" name="know[0][expected]" class="form-control" min="1" max="5"></td>
									<td><input type="number" id="know_actual" name="know[0][actual]" class="form-control" min="1" max="5"></td>
									<td><input type="number" id="know_result" name="know[0][result]" class="form-control" disabled></td>
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
									<th scope="col" style="width: 10%;">Actual <br> (A)</th>
									<th scope="col" style="width: 10%;">Result <br> (A-E)</th>
								</tr>
							</thead>
							<tbody id="tbodySkill">
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-sm btn-primary" id="addSkillRow" type="button"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่ม</button>
									<!-- <button type="button" class="btn btn-sm btn-danger" id="removeSkillRow"><i class="fa fa-minus-square" aria-hidden="true"></i> ลบ</button> -->
								</div>
								<tr>
									<td><input type="text" id="skill_no" name="skill[0][no]" class="form-control"></td>
									<td><input type="text" id="skill_code[] " name="skill[0][code]" class="form-control"></td>
									<td><input type="text" id="skill_competency" name="skill[0][competency]" class="form-control"></td>
									<td><input type="number" id="skill_expected" name="skill[0][expected]" class="form-control" min="1" max="5"></td>
									<td><input type="number" id="skill_actual" name="skill[0][actual]" class="form-control" min="1" max="5"></td>
									<td><input type="number" id="skill_result" name="skill[0][result]" class="form-control" disabled></td>
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
									<th scope="col" style="width: 10%;">Actual <br> (A)</th>
									<th scope="col" style="width: 10%;">Result <br> (A-E)</th>
								</tr>
							</thead>
							<tbody id="tbodyPerAttr">
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-sm btn-primary" id="addPerAttrRow" type="button"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่ม</button>
									<!-- <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-minus-square" aria-hidden="true"></i> ลบ</button> -->
								</div>
								<tr>
									<td><input type="text" id="perattr_no" name="perattr[0][no]" class="form-control"></td>
									<td><input type="text" id="perattr_code" name="perattr[0][code]" class="form-control"></td>
									<td><input type="text" id="perattr_competency" name="perattr[0][competency]" class="form-control"></td>
									<td><input type="number" id="perattr_expected" name="perattr[0][expected]" class="form-control" min="1" max="5"></td>
									<td><input type="number" id="perattr_actual" name="perattr[0][actual]" class="form-control" min="1" max="5"></td>
									<td><input type="number" id="perattr_result" name="perattr[0][result]" class="form-control" disabled></td>
								</tr>
							</tbody>
						</table>
						<!-- คุณลักษณะพิเศษส่วนบุคคล(Personal Attributes) -->

						<!-- กรุณาเลือกหัวหน้าผู้ประเมิน -->
						<h6 colspan="3" style="padding-left: 5.4em;"><label><b>ระบุหัวหน้าผู้ประเมิน</b></label></h6>
						<div class="form-group">
							<span class="help-block text-danger"></span>
							<input class="form-group form-control col-md-4" list="list_code" id="assessor_code" name="assessor_code" placeholder="ระบุรหัสพนักงาน หรือ ชื่อ หัวหน้าผู้ประเมิน">
							<datalist id="list_code">
								<?php foreach ($list_emp as $rows) {
									echo "<option value=\"{$rows->code} {$rows->salutation} {$rows->firstname_th} {$rows->lastname_th}\">{$rows->code} {$rows->salutation} {$rows->firstname_th} {$rows->lastname_th}</option>";
								}
								?>
							</datalist>
						</div>
						<!-- กรุณาเลือกหัวหน้าผู้ประเมิน -->

						<!-- กรุณาเลือกผู้ขอจ้างให้ตรงกับต้นสังกัด -->
						<h6 colspan="3" style="padding-left: 5.4em;"><label><b>ระบุผู้อนุมัติต้นสังกัด</b></label></h6>
						<div class="form-group"> 	
							<span class="help-block text-danger"></span>
							<input class="form-control col-md-4" list="list_mgr_code" id="mgr_code" name="mgr_code" placeholder="ระบุระบุรหัสพนักงาน หรือ ชื่อ ผู้อนุมัติต้นสังกัด">
							<datalist id="list_mgr_code">
								<?php foreach ($list_emp as $rows) {
									echo "<option value=\"{$rows->code} {$rows->salutation} {$rows->firstname_th} {$rows->lastname_th}\">{$rows->code} {$rows->salutation} {$rows->firstname_th} {$rows->lastname_th}</option>";
								}
								?>
							</datalist>
						</div>
						<!-- กรุณาเลือกผู้ขอจ้างให้ตรงกับต้นสังกัด -->

					</div>
				</form>
			</div>
			<p class="text-center text-danger">**กรุณาตรวจสอบข้อมูลที่ทำกรอกให้เรียบร้อยก่อนกด"ส่งคำขออนุมัติ"</p>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="Send_Form()" class="btn btn-primary">
					<i class="fa fa-floppy-o"> ส่งแบบฟอร์ม</i> </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> ยกเลิก</i> </button>
			</div>

		</div>
	</div>
</div>


<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script type="text/javascript">
	var messenger = 'มีการปัญหารในการใช้งานติดต่อเจ้าหน้าที่ที่ระบบนี้ โทร 1104 หรือ ช่องทางแชทของ MS TEAM (kawin_a@thaisummit-harness.co.th)';

	$(function() {
		let index = 1;
		let index1 = 1;
		let index2 = 1;

		$("#addKnowRow").click(function() {
			$('#form_self_competency').find('#tbodyKnow').append(`
				<tr>
					<td><input type="text" id="know_no" name="know[${index}][no]" class="form-control"></td>
					<td><input type="text" id="know_code" name="know[${index}][code]" class="form-control"></td>
					<td><input type="text" id="know_competency" name="know[${index}][competency]" class="form-control"></td>
					<td><input type="number" id="know_expected" name="know[${index}][expected]" class="form-control" min="1" max="5"></td>
					<td><input type="number" id="know_actual" name="know[${index}][actual]" class="form-control" min="1" max="5"></td>
					<td><input type="number" id="know_result" name="know[${index}][result]" class="form-control" disabled></td>
				</tr>
			`);
			index++;
		});
		$("#removeKnowRow").click(function() {});

		$("#addSkillRow").click(function() {
			$('#form_self_competency').find('#tbodySkill').append(`
			<tr>
				<td><input type="text" id="skill_no" name="skill[${index1}][no]" class="form-control"></td>
				<td><input type="text" id="skill_code[] " name="skill[${index1}][code]" class="form-control"></td>
				<td><input type="text" id="skill_competency" name="skill[${index1}][competency]" class="form-control"></td>
				<td><input type="number" id="skill_expected" name="skill[${index1}][expected]" class="form-control" min="1" max="5"></td>
				<td><input type="number" id="skill_actual" name="skill[${index1}][actual]" class="form-control" min="1" max="5"></td>
				<td><input type="number" id="skill_result" name="skill[${index1}][result]" class="form-control" disabled></td>
			</tr>
			`);
			index1++;
		});
		$("#removeSkillRow").click(function() {});

		$("#addPerAttrRow").click(function() {
			$('#form_self_competency').find('#tbodyPerAttr').append(`
			<tr>
				<td><input type="text" id="perattr_no" name="perattr[${index2}][no]" class="form-control"></td>
				<td><input type="text" id="perattr_code" name="perattr[${index2}][code]" class="form-control"></td>
				<td><input type="text" id="perattr_competency" name="perattr[${index2}][competency]" class="form-control"></td>
				<td><input type="number" id="perattr_expected" name="perattr[${index2}][expected]" class="form-control" min="1" max="5"></td>
				<td><input type="number" id="perattr_actual" name="perattr[${index2}][actual]" class="form-control" min="1" max="5"></td>
				<td><input type="number" id="perattr_result" name="perattr[${index2}][result]" class="form-control" disabled></td>
	       </tr>
			`);
			index2++;
		});
		$("#removePerAttrRow").click(function() {});

	});

	function form_self_competency_gap() {

		save_method = 'add';
		$('#form_self_competency')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_self_competency_gap').modal({
			backdrop: 'static',
			keyboard: false,
		});
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('.modal-title').text(
			'แบบประเมินช่องว่างความสามารถของตนเอง (Self-Competency Gap Assessment) ประจำปี'); // Set Title to Bootstrap modal title
		$.ajax({
			url: "<?php echo site_url('Self_competency/comeptency_mapping') ?>",
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				// let index = 0;
				$.each(data.data1, function(key, value) {
					const {
						cc_competency,
						mc_competency,
					} = value;

					if (cc_competency !== undefined) {
						$('#modal_form_self_competency_gap #firstCcTr').html('');
						for (i = 0; i < cc_competency.length; i++) {
							$('#modal_form_self_competency_gap #firstCcTr').append('<tr>' +
								'<td><input type="text" id="cc_no" name="core[' + i + '][no]" class="form-control" value ="' + [i + 1] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="cc_code" name="core[' + i + '][code]" class="form-control" value =""></td>' +
								'<td><input type="text" id="cc_competency" name="core[' + i + '][competency]" class="form-control" value= "' + value.cc_competency[i] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="cc_expected" name="core[' + i + '][expected]" class="form-control" value= "' + value.cc_mapping[i] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="cc_actual" name="core[' + i + '][actual]" class="form-control" value= "" min="1" max="4"></td>' +
								'<td><input type="text" id="cc_result" name="core[' + i + '][result]" class="form-control" readonly="readonly" /></td>' +
								'</tr>' +
								'');
						}
					}

					if (mc_competency !== undefined) {
						$('#modal_form_self_competency_gap #firstMcTr').html('');
						for (i = 0; i < mc_competency.length; i++) {
							$('#modal_form_self_competency_gap #firstMcTr').append('<tr>' +
								'<td><input type="text" id="mc_no" name="manage[' + i + '][no]" class="form-control" value ="' + [i + 1] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="mc_code" name="manage[' + i + '][code]" class="form-control" value = ""></td>' +
								'<td><input type="text" id="mc_competency" name="manage[' + i + '][competency]" class="form-control" value= "' + value.mc_competency[i] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="mc_expected" name="manage[' + i + '][expected]" class="form-control" value= "' + value.mc_mapping[i] + '" readonly="readonly" /></td>' +
								'<td><input type="text" id="mc_actual" name="manage[' + i + '][actual]" class="form-control" value= ""min="1" max="4"></td>' +
								'<td><input type="text" id="mc_result" name="manage[' + i + '][result]" class="form-control" readonly="readonly" /></td>' +
								'</tr>' +
								'');
						}
					}
					// index++;

				})
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(messenger);
			}
		});
	}

	function Send_Form() {

		$('#btnSave').text('กำลังส่งแบบฟอร์ม'); //change button text
		$('#btnSave').attr('disabled', false); //set button disable 

		// ajax adding data to database\
		var formData = new FormData($(document).find('#form_self_competency')[0]);

		$.ajax({
			url: "<?php echo site_url('self_competency/add_selef_competency_form') ?>",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(value) {
				if (value.status) //if success close modal and reload ajax table
				{
					$('#modal_form_self_competency_gap').modal('hide');
					$('#form_self_competency')[0].reset(); // reset form on modals
					$('#tbl_self_competency').DataTable().ajax.reload();
					// load the url and show modal on success
					alert('คุณส่งแบบฟอร์ม Self Competency Gap Assessment เรียบร้อยแล้ว');
				} else {
					for (var i = 0; i < value.inputerror.length; i++) {
						$('[name="' + value.inputerror[i] + '"]').parent().parent().addClass(
							'has-error'
						); //select parent twice to select div form-group class and add has-error class
						$('[name="' + value.inputerror[i] + '"]').next().text(value.error_string[
							i]); //select span help-block class set text error string
					}
					alert(messenger);
				}
				$('#btnSave').text('กำลังส่งแบบฟอร์ม'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(messenger);
				$('#btnSave').text('ส่งคำขออนุมัติ'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable
			}
		});
		// end ajax
	}

	function delete_self_competency_form(id) {
		console.log('Delete: ' + id);
	}
</script>