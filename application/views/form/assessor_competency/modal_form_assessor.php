<div class="modal fade" id="modal_form_assessor_competency" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable modal-xl">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h5 class="modal-title-approval-form">แบบประเมินช่องว่างความสามารถของตนเอง (Competency Gap Assessment) ประจำปี <label name="years"></label></h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<form action="#" id="form_assessor_competency" class="form-horizontal">
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
						<h5 colspan="5" style="padding-left: 5.4em;"><b>Core Competency</b>
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
									<th scope="col" style="width: 10%;">Result <br> (A-E)</th>
								</tr>
							</thead>
							<tbody id='firstCcTr'>
								<tr>
								</tr>
							</tbody>
						</table>
						<!-- Core Competency -->

						<!-- Management Competency -->
						<h4 colspan="6" style="padding-left: 5.4em;"><b>Management Competency</b>
							<button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" onclick="standard_form()">
								<i class="fa fa-exclamation-circle" aria-hidden="true">
									เกณฑ์การวัดความสามารถ
								</i>
							</button>
						</h4>
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
									<th scope="col" style="width: 10%;">Result <br> (A-E)</th>
								</tr>
							</thead>
							<tbody id='firstMcTr'>
								<tr>
								</tr>
							</tbody>
						</table>
						<!-- Management Competency -->

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
						<hr class=" w-100 ml-0 text-center">
						<!-- กรุณาเลือกผู้ขอจ้างให้ตรงกับต้นสังกัด -->
						<h6 colspan="3" style="padding-left: 5.4em;">
							<label>
								<b>*ระบุผู้อนุมัติต้นสังกัด </b>
							</label>
						</h6>
						<div class="form-group col-md-6">
							<input class="form-control" list="list_mgr_code" id="mgr_code" name="mgr_code" placeholder="ระบุระบุรหัสพนักงาน หรือ ชื่อ ผู้อนุมัติต้นสังกัด">
							<datalist id="list_mgr_code">
								<?php foreach ($list_emp as $rows) {
									echo "<option value=\"{$rows->code} {$rows->salutation} {$rows->firstname_th} {$rows->lastname_th}\">{$rows->code} {$rows->salutation} {$rows->firstname_th} {$rows->lastname_th}</option>";
								}
								?>
							</datalist>
						</div>
						<span class="help-block text-danger"></span>
						<!-- กรุณาเลือกผู้ขอจ้างให้ตรงกับต้นสังกัด -->
					</div>
				</form>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal" id="btnSaveAssessor" onclick="Send_Form()">ส่งแบบฟอร์ม</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
			</div>

		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script type="text/javascript">
	function form_assessor(form_id) {
		$('#form_assessor_competency')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_assessor_competency').modal('show'); // show bootstrap modal
		$('.modal-title-approval-form').text(
			'แบบประเมินช่องว่างความสามารถของตนเอง (Competency Gap Assessment) ประจำปี'); // Set Title to Bootstrap modal title
		$.ajax({
			url: "<?php echo site_url('assessor_competency/view_assessor_competency') ?>/" + form_id,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$.each(data.core_competency, function(key, value) {

					$('#modal_form_assessor_competency #firstCcTr').html('');
					for (var i = 0; i < value.length; i++) {
						$('#modal_form_assessor_competency #firstCcTr').append(`<tr>
							<td><input type="text" id="cc_no" name="core[${i}][no]" class="form-control" value ="${value[i].no}"readonly="readonly" /></td>
							<td><input type="text" id="cc_code" name="core[${i}][code]" class="form-control" value ="${value[i].code}"></td>
							<td><input type="text" id="cc_competency" name="core[${i}][competency]" class="form-control" value= "${value[i].competency}"readonly="readonly" /></td>
							<td><input type="text" id="cc_expected" name="core[${i}][expected]" class="form-control" value= "${value[i].expected}"readonly="readonly" /></td>
							<td><input type="text" id="selfcc_actual" name="core[${i}][self_actul]" class="form-control" value= "${value[i].actual}"readonly="readonly" /></td>
							<td><input type="text" id="cc_actual" name="core[${i}][actual]" class="form-control" value= "${value[i].actual}"></td>
							<td><input type="text" id="cc_result" name="core[${i}][result]" class="form-control" value= "${value[i].actual - value[i].expected}"readonly="readonly" /></td>
                        </tr>`);
					}
				})

				$.each(data.manage_competency, function(key, value) {
					if (value == null) {
						$('#modal_form_assessor_competency #firstMcTr').html('');

					} else {
						$('#modal_form_assessor_competency #firstMcTr').html('');
						for (var i = 0; i < value.length; i++) {
							$('#modal_form_assessor_competency #firstMcTr').append(`<tr>
								<td><input type="text" id="mc_no" name="manage[${i}][no]" class="form-control" value = "${value[i].no}"readonly="readonly" /></td>
								<td><input type="text" id="mc_code" name="manage[${i}][code]" class="form-control" value = "${value[i].code}"></td>
								<td><input type="text" id="mc_competency" name="manage[${i}][competecy]" class="form-control" value= "${value[i].competency}"readonly="readonly" /></td>
								<td><input type="text" id="mc_expected" name="manage[${i}][expected]" class="form-control" value= "${value[i].expected}"readonly="readonly" /></td>
								<td><input type="text" id="selfmc_actual" name="manage[${i}][self_actual]" class="form-control" value= "${value[i].actual}"readonly="readonly" /></td>
								<td><input type="text" id="mc_actual" name="manage[${i}][actual]" class="form-control" value= "${value[i].actual}"></td>
								<td><input type="text" id="mc_result" name="manage[${i}][result]" class="form-control" readonly="readonly" /></td>
							</tr>`);
						}
					}
				})

				$.each(data.knowledge, function(key, value) {
					$('#modal_form_assessor_competency #firstKnowTr').html('');
					for (var i = 0; i < value.length; i++) {
						$('#modal_form_assessor_competency #firstKnowTr').append(`<tr>
								<td><input type="text" id="know_no" name="know[${i}][no]" class="form-control" value = "${value[i].no}"readonly="readonly" /></td>
								<td><input type="text" id="know_code" name="know[${i}][code]" class="form-control" value = "${value[i].code}"></td>
								<td><input type="text" id="know_competency" name="know[${i}][competency]" class="form-control" value = "${value[i].competency}"readonly="readonly" /></td>
								<td><input type="text" id="know_expected" name="know[${i}][expected]" class="form-control" value = "${value[i].expected}"readonly="readonly" /></td>
								<td><input type="text" id="selfknow_actual" name="know[${i}][self_actual]" class="form-control" value = "${value[i].actual}"readonly="readonly" /></td>
								<td><input type="text" id="know_actual" name="know[${i}][actual]" class="form-control" value = "${value[i].actual}"></td>
								<td><input type="text" id="know_result" name="know[${i}][result]" class="form-control" readonly="readonly" /></td>
							</tr>`);
					}
				})

				$.each(data.skill, function(key, value) {
					$('#modal_form_assessor_competency #firstSkillTr').html('');
					for (var i = 0; i < value.length; i++) {
						$('#modal_form_assessor_competency #firstSkillTr').append(`<tr>
								<td><input type="text" id="skill_no" name="skill[${i}][no]" class="form-control" value = "${value[i].no}"readonly="readonly" /></td>
								<td><input type="text" id="skill_code" name="skill[${i}][code]" class="form-control" value = "${value[i].code}"></td>
								<td><input type="text" id="skill_competency" name="skill[${i}][competency]" class="form-control" value = "${value[i].competency}"readonly="readonly" /></td>
								<td><input type="text" id="skill_expected" name="skill[${i}][expected]" class="form-control" value = "${value[i].expected}"readonly="readonly" /></td>
								<td><input type="text" id="selfskill_actual" name="skill[${i}][self_actual]" class="form-control" value = "${value[i].expected}"readonly="readonly" /></td>
								<td><input type="text" id="skill_actual" name="skill[${i}][actual]" class="form-control" value = "${value[i].expected}"></td>
								<td><input type="text" id="skill_result" name="skill[${i}][result]" class="form-control" readonly="readonly" /></td>
							</tr>`);
					}
				})

				$.each(data.personal_attributes, function(key, value) {
					$('#modal_form_assessor_competency #firstPerAttrTr').html('');
					for (var i = 0; i < value.length; i++) {
						$('#modal_form_assessor_competency #firstPerAttrTr').append(`<tr>
								<td><input type="text" id="perattr_no" name="perattr[${i}][no]" class="form-control" value = "${value[i].no}"readonly="readonly" /></td>
								<td><input type="text" id="perattr_code" name="perattr[${i}][code]" class="form-control" value = "${value[i].code}"></td>
								<td><input type="text" id="perattr_competency" name="perattr[${i}][competency]" class="form-control" value = "${value[i].competency}"readonly="readonly" /></td>
								<td><input type="text" id="perattr_expected" name="perattr[${i}][expected]" class="form-control" value = "${value[i].expected}"readonly="readonly" /></td>
								<td><input type="text" id="slefperattr_actual" name="perattr[${i}][slef_actual]" class="form-control" value = "${value[i].actual}"readonly="readonly" /></td>
								<td><input type="text" id="perattr_actual" name="perattr[${i}][actual]" class="form-control" value = "${value[i].actual}"></td>
								<td><input type="text" id="perattr_result" name="perattr[${i}][result]" class="form-control" readonly="readonly" /></td>
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

				$.each(data.status_form, function(key, value) {
					$('label[name="form_mgr_name').text('คุณ' + value.firstname_th + ' ' + value.lastname_th);
					if (value.mgr_status == 0) {
						// รอดำเนินการ
						$('label[name="mgr_status"]').html('<b>ผลการอนุมัติ: </b><span style="font-size: 15px;" class="badge badge-secondary">รอดำเนินการ</span>');

					} else if (value.mgr_status == 1) {
						// อนุมัติ
						$('#assessor_form').hide('');
						$('#approval_status').show('');
						$('label[name="mgr_status"]').html(
							'<b>ผลการอนุมัติ: </b><span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
						);
						$('label[name="mgr_create_on').html('<b>วันที่: </b>:' + value.create_on);

					} else {
						$('#assessor_form').hide('');
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

	function Send_Form() {
		$('#btnSaveAssessor').text('กำลังส่งแบบฟอร์ม...'); //change button text
		$('#btnSaveAssessor').attr('disabled', false); //set button disable 

		var url = "<?php echo site_url('assessor_competency/update_competency_form') ?>";
		// ajax adding data to database\
		var formData = new FormData($(document).find('#form_assessor_competency')[0]);

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
					$('#tbl_assessor_competency').DataTable().ajax.reload(null, false);
					$('#modal_form_assessor_competency').modal('hide');
					$('#form_assessor_competency')[0].reset(); // reset form on modals

					alert('ผู้ประเมินได้ทำการส่งแบบฟอร์ม Competency Gap Assessment เรียบร้อยแล้วครับ');

				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
							'has-error'
						); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
							i]); //select span help-block class set text error string
					}
				}
				$('#btnSaveAssessor').text('กำลังส่งแบบฟอร์ม'); //change button text
				$('#btnSaveAssessor').attr('disabled', false); //set button enable 
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('มีการปัญหารในการใช้งานติดต่อเจ้าหน้าที่ที่ระบบนี้ โทร 1104');
				$('#btnSaveAssessor').text('กำลังส่งแบบฟอร์ม'); //change button text
				$('#btnSaveAssessor').attr('disabled', false); //set button enable 
			}
		});
	}
</script>