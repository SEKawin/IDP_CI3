<div class="modal fade" id="modal_form_view_assessor_competency" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable modal-xl">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h5 class="modal-title-view-form">แบบประเมินช่องว่างความสามารถของตนเอง (Competency Gap Assessment) ประจำปี <label name="years"></label></h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<form action="#" id="form_view_assessor_competency" class="form-horizontal">
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
					</div>

					<div class="table-sm table-responsive">
						<!-- Core Competency -->
						<h4 colspan="6" style="padding-left: 5.4em;"><b>Core Competency</b>
							<button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" onclick="standard_form()">
								<i class="fa fa-exclamation-circle" aria-hidden="true">
									เกณฑ์การวัดความสามารถ
								</i>
							</button>
						</h4>
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
						<!-- Core Competency -->

						<?php $position = $this->session->userdata('position');
						if ($position !== 'เจ้าหน้าที่' && $position !== 'พนักงานทั่วไป' && $position != 'ช่างเทคนิค' && $position != 'โปรแกรมเมอร์' && $position != 'เว็บมาสเตอร์') : ?>
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
						<h4 colspan="6" style="padding-left: 5.4em;"><b>Functional Competency</b>
							<button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" onclick="standard_form2()">
								<i class="fa fa-exclamation-circle" aria-hidden="true">
									เกณฑ์การวัดความสามารถสำหรับ Functional Competency
								</i>
							</button>
						</h4>
						<h5 colspan="6" style="padding-left: 5.4em;"><b>ความรู้(Knowledge)</b></h5>
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
							<tbody id="firstKnowTr">
								<tr>
								</tr>
							</tbody>
						</table>
						<!-- ความรู้(Knowledge) -->

						<!-- ทักษะ(Skill) -->
						<h5 colspan="6" style="padding-left: 5.4em;"><b>ทักษะ(Skill)</b></h5>
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
							<tbody id="firstSkillTr">
								<tr>
								</tr>
							</tbody>
						</table>
						<!-- ทักษะ(Skill) -->

						<!-- คุณลักษณะพิเศษส่วนบุคคล(Personal Attributes) -->
						<h5 colspan="6" style="padding-left: 5.4em;"><label><b>คุณลักษณะพิเศษส่วนบุคคล(Personal Attributes)</b></label></h5>
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
						<div class="form-group col-md-6">
							<h6 colspan="3" style="padding-left: 1.5em;">
								<label><b>ผู้อนุัมติต้นสังกัด</b></label>
								<label name="form_mgr_name"></label><br>
								<label name="mgr_status"></label><br>
								<label name="mgr_create_on"></label>
							</h6>
						</div>
						<!-- ผู้อนุัมติต้นสังกัด -->
						<hr class=" w-100 ml-0 text-center">

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
	function view_assessor_competency_form(form_id) {
		$('#form_view_assessor_competency')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form_view_assessor_competency').modal({
			backdrop: 'static',
			keyboard: false
		}); // show bootstrap modal
		$('.modal-title-view-form').text(
			'แบบประเมินช่องว่างความสามารถของตนเอง (Competency Gap Assessment) ประจำปี'); // Set Title to Bootstrap modal title
		$.ajax({
			url: "<?php echo site_url('assessor_competency/view_assessor_competency') ?>/" + form_id,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				console.log(data.core_competency)
				$.each(data.core_competency, function(key, value) {
					
					$('#modal_form_view_assessor_competency #firstCcTr').html('');
					for (var i = 0; i < value.length; i++) {
						$('#modal_form_view_assessor_competency #firstCcTr').append(`<tr>
                        <td>${value[i].no}</td>
                        <td>${value[i].code}</td>
                        <td>${value[i].competency}</td>
                        <td>${value[i].expected}</td>
                        <td>${value[i].actual}</td>
                        <td>${value[i].actual-value[i].expected}</td>
                        </tr>`);
					}
				})

				$.each(data.manage_competency, function(key, value) {
					if (value == null) {
						$('#modal_form_view_assessor_competency #firstMcTr').html('');

					} else {
						$('#modal_form_view_assessor_competency #firstMcTr').html('');
						for (var i = 0; i < value.length; i++) {
							$('#modal_form_view_assessor_competency #firstMcTr').append(`<tr>
								<td>${value[i].no}</td>
								<td>${value[i].code}</td>
								<td>${value[i].competency}</td>
								<td>${value[i].expected}</td>
								<td>${value[i].actual}</td>
								<td>${value[i].actual-value[i].expected}</td>
								</tr>`);
						}
					}
				})

				$.each(data.knowledge, function(key, value) {
					$('#modal_form_view_assessor_competency #firstKnowTr').html('');
					for (var i = 0; i < value.length; i++) {
						$('#modal_form_view_assessor_competency #firstKnowTr').append(`<tr>
                        <td>${value[i].no}</td>
                        <td>${value[i].code}</td>
                        <td>${value[i].competency}</td>
                        <td>${value[i].expected}</td>
                        <td>${value[i].actual}</td>
                        <td>${value[i].actual-value[i].expected}</td>
                        </tr>`);
					}
				})

				$.each(data.skill, function(key, value) {
					$('#modal_form_view_assessor_competency #firstSkillTr').html('');
					for (var i = 0; i < value.length; i++) {
						$('#modal_form_view_assessor_competency #firstSkillTr').append(`<tr>
                        <td>${value[i].no}</td>
                        <td>${value[i].code}</td>
                        <td>${value[i].competency}</td>
                        <td>${value[i].expected}</td>
                        <td>${value[i].actual}</td>
                        <td>${value[i].actual-value[i].expected}</td>
                        </tr>`);
					}
				})

				$.each(data.personal_attributes, function(key, value) {
					$('#modal_form_view_assessor_competency #firstPerAttrTr').html('');
					for (var i = 0; i < value.length; i++) {
						$('#modal_form_view_assessor_competency #firstPerAttrTr').append(`<tr>
                        <td>${value[i].no}</td>
                        <td>${value[i].code}</td>
                        <td>${value[i].competency}</td>
                        <td>${value[i].expected}</td>
                        <td>${value[i].actual}</td>
                        <td>${value[i].actual-value[i].expected}</td>
                        </tr>`);
					}
				})

				$.each(data.data, function(key, value) {})

				$.each(data.form_maker, function(key, value) {
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
						$('label[name="mgr_status"]').html(
							'<b>ผลการอนุมัติ: </b><span style="font-size: 15px;" class="badge badge-success">อนุมัติ</span>'
						);
						$('label[name="mgr_create_on').html('<b>วันที่: </b>:' + value.create_on);

					} else {
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
</script>