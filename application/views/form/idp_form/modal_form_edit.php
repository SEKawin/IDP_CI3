<?php
$code             = $this->session->userdata('code');
$salutation       = $this->session->userdata('salutation');
$firstname_th     = $this->session->userdata('firstname_th');
$lastname_th      = $this->session->userdata('lastname_th');
$position         = $this->session->userdata('position');
$workday         = $this->session->userdata('workday');
$birthdate         = $this->session->userdata('birthdate');
?>

<div class="modal fade" id="modal_form_idp_plan_edit" role="dialog">
	<!-- <div class="modal-dialog modal-xl"> -->
	<div class="modal-dialog" style="max-width: 100%;" role="document">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">จัดทำแผนพัฒนาบุคลากรรายบุคคล</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<form action="#" id="form_idp_plan_edit" class="form-horizontal">
					<input type="hidden" name="idp_form_id">
					<div class="form-row col-md-12">
						<div class="container">
							<div class="row">
								<div class="col-sm-6">
									<p class="text-center"><b>ข้อมูลผู้จัดทำ IDP</b></p>
									<div class="row">
										<div class="col-8 col-sm-6">
											<label><b>ชื่อ-นามสกุล :</b></label>
											<label name="emp_name"><?php echo $salutation . '' . $firstname_th . ' ' . $lastname_th; ?></label>
										</div>
										<div class="col-4 col-sm-6">
											<label><b>อายุ(ตัว) :</b></label>
											<label name="birthdate"><?php echo $birthdate ?></label>
										</div>
										<div class="col-4 col-sm-6">
											<label><b>ตำแหน่ง :</b></label>
											<label name="position"><?php echo $position; ?></label>
										</div>
										<div class="col-4 col-sm-6">
											<label><b>อายุงาน :</b></label>
											<label name="workday"><?php echo $workday ?></label>
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
					<div class="form-row col-md-12">
						<div class="table-sm table-responsive">
							<!-- Core Competency -->
							<table id="myTblIDP" class="table table-bordered table-hover ">
								<thead>
									<tr class="bg-light text-center" width="100%">
										<th scope="col" style="width:4%;">No</th>
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
										<h5>Core Competency</h5>
									</td>
								</tr>
								<tbody id="tbody_CC">
								</tbody>
								<!-- Manageral Competency -->
								<tr id="TopicMC">
									<td colspan="9">
										<h5>Manage Competency</h5>
									</td>
								</tr>
								<tbody id="tbody_MC">
								</tbody>

								<tbody id="tbodyidp">
									<tr>
										<td colspan="9">
											<h5>Functional Competency</h5>
										</td>
									</tr>
								</tbody>

								<!-- ความรู้(Knowledge) -->
								<tr id="TopicKnow">
									<td colspan="9">
										<h5>ความรู้(Knowledge)</h5>
									</td>
								</tr>
								<tbody id="tbody_Know">
								</tbody>

								<!--ทักษะ(Skill)  -->
								<tr id="TopicSkill">
									<td colspan="9">
										<h5>ทักษะ Skill</h5>
									</td>
								</tr>
								<tbody id="tbody_Skill">
								</tbody>

								<!-- คุณลักษณะพิเศษส่วนบุคคล Personal Attributes -->
								<tr id="PerAtt">
									<td colspan="9">
										<h5>คุณลักษณะพิเศษส่วนบุคคล Personal Attributes</h5>
									</td>
								</tr>
								<tbody id="tbody_PerAtt">
								</tbody>
							</table>
							<!-- <div class="btn-group" role="group">
								<button type="button" class="btn btn-sm btn-primary" id="AddIDPForm" type="button"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
							</div> -->
							<!-- Core Competency -->

							<!-- ต้นสังกัด -->
							<div class="row">
								<div class="col-md-4">ระบุผู้อนุมัติต้นสังกัด
									<input class="form-control" list="list_mgr_code" id="mgr_code" name="mgr_code" placeholder="ระบุระบุรหัสพนักงาน หรือ ชื่อ ผู้อนุมัติต้นสังกัด">
									<datalist id="list_mgr_code">
										<?php foreach ($list_emp as $rows) {
											echo "<option value=\"{$rows->code} {$rows->salutation}{$rows->firstname_th} {$rows->lastname_th}\">{$rows->code} {$rows->salutation} {$rows->firstname_th} {$rows->lastname_th}</option>";
										}
										?>
									</datalist>
								</div>
							</div>
							<!-- ต้นสังกัด -->
						</div>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" id="BtnSave_Edit" onclick="Send_Form_Edit()" class="btn btn-primary">
					<i class="fa fa-floppy-o"> ส่งแบบฟอร์ม</i> </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> ยกเลิก</i> </button>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script type="text/javascript">
	var messenger = 'ระบบมีปัญหา โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ ช่องทาง Chat ของ MS TEAM (kawin_a@thaisummit-harness.co.th';

	function form_idp_plan_edit(idp_form_id) {
		console.log(idp_form_id)
		save_method = 'add';
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#form_idp_plan_edit')[0].reset(); // reset form on modals
		$('#modal_form_idp_plan_edit').modal({
			backdrop: 'static',
			keyboard: false
		});
		$('.modal-title').text(
			'แก้ไขจัดทำแผนพัฒนาบุคลลากรรายบุคลลประจำปี (IDP)'); // Set Title to Bootstrap modal title

		$('[name="idp_form_id"]').val(idp_form_id);

		$.ajax({
			url: "<?php echo site_url('idp_form/view_idp_plan_form') ?>/" + idp_form_id,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var formatter = new Intl.NumberFormat();
				//  Core Competency 
				$('#modal_form_idp_plan_edit #tbody_CC').html('');
				let a = 1;
				$.each(data.idp_cc, function(key, value) {
					$('#modal_form_idp_plan_edit #tbody_CC').append(`
						<tr>
							<td><input type="text" class="form-control" id="no" name="params_cc[${[a]}][no]" value="${[value.no]}"></td>
							<td>
								<textarea class ="form-control "name="params_cc[${[a]}][competency]" id="competency" cols="20" rows="2" value="${[value.competency]}">${[value.competency]}</textarea>
							</td>
							<td>
								<select id="learning" class="custom-select select_learning_cc" data-index="${[a]}" name="params_cc[${[a]}][learning]">
									<option selected>ระบุ... </option>
									<option value="70%">70%</option>
									<option value="20%">20%</option>
									<option value="10%">10%</option>
								</select>
							</td>
							<td><span id="textbox_model_cc"></span></td>
							<td><textarea id="tool_deital" name="params_cc[${[a]}][tool_deital]" class="form-control">${[value.tool_deital]}</textarea></td>
							<td><input type="text" id="dev_time" name="params_cc[${[a]}][dev_time]" class="form-control" placeholder="ระบุ Q1-Q4" value="${[value.dev_time]}"></td>
							<td><textarea id="target" name="params_cc[${[a]}][target]" class="form-control" >${[value.target]}</textarea></td>
							<td><input type="number" min="1" step="any" id="budget" name="params_cc[${[a]}][budget]" class="form-control" value="${[value.budget]}"></td>
							<td><textarea id="tracking" name="params_cc[${[a]}][tracking]" class="form-control" readonly="readonly" value="${[value.tracking]}"></textarea></td>
						</tr>
					    `);
					a++;
				})
				// Core Competency 
				// Manage Competency 
				$('#modal_form_idp_plan_edit #tbody_MC').html('');
				let m = 1;
				if (data.idp_mc == null) {
					$('#TopicMC').hide();
					$('#tbody_MC').hide();
				} else {
					$.each(data.idp_mc, function(key, value) {
						$('#TopicMC').show();
						$('#modal_form_idp_plan_edit #tbody_MC').append(`
						<tr>
							<td><input type="text" class="form-control" id="no" name="params_mc[${[m]}][no]" value="${[value.no]}"></td>
							<td>
								<textarea class ="form-control "name="params_mc[${[m]}][competency]" id="competency" cols="20" rows="2" value="${[value.competency]}">${[value.competency]}</textarea>
							</td>
							<td>
								<select id="learning" class="custom-select select_learning_mc" data-index="${[m]}" name="params_mc[${[m]}][learning]">
									<option selected>ระบุ... </option>
									<option value="70%">70%</option>
									<option value="20%">20%</option>
									<option value="10%">10%</option>
								</select>
							</td>
							<td><span id="textbox_model_mc"></span></td>
							<td><textarea id="tool_deital" name="params_mc[${[m]}][tool_deital]" class="form-control">${[value.tool_deital]}</textarea></td>
							<td><input type="text" id="dev_time" name="params_mc[${[m]}][dev_time]" class="form-control" placeholder="ระบุ Q1-Q4" value="${[value.dev_time]}"></td>
							<td><textarea id="target" name="params_mc[${[m]}][target]" class="form-control" >${[value.target]}</textarea></td>
							<td><input type="number" min="1" step="any" id="budget" name="params_mc[${[m]}][budget]" class="form-control" value="${[value.budget]}"></td>
							<td><textarea id="tracking" name="params_mc[${[m]}][tracking]" class="form-control" readonly="readonly" value="${[value.tracking]}">${[value.tracking]}</textarea></td>
						</tr>
					    `);
						m++;
					})
				}
				// Manage Competency 

				// ความรู้ Knowledge
				$('#modal_form_idp_plan_edit #tbody_Know').html('');
				let b = 1;
				$.each(data.idp_know, function(key, value) {
					$('#modal_form_idp_plan_edit #tbody_Know').append(`
						<tr>
							<td><input type="text" class="form-control" id="no" name="params_know[${[b]}][no]" value="${[value.no]}"></td>
							<td>
								<textarea class ="form-control "name="params_know[${[b]}][competency]" id="competency" cols="20" rows="2" value="${[value.competency]}">${[value.competency]}</textarea>
							</td>
							<td>
								<select id="learning" class="custom-select select_learning_know" data-index="${[b]}" name="params_know[${[b]}][learning]">
									<option selected>ระบุ... </option>
									<option value="70%">70%</option>
									<option value="20%">20%</option>
									<option value="10%">10%</option>
								</select>
							</td>
							<td><span id="textbox_model_know"></span></td>
							<td><textarea id="tool_deital" name="params_know[${[b]}][tool_deital]" class="form-control">${[value.tool_deital]}</textarea></td>
							<td><input type="text" id="dev_time" name="params_know[${[b]}][dev_time]" class="form-control" placeholder="ระบุ Q1-Q4" value="${[value.dev_time]}"></td>
							<td><textarea id="target" name="params_know[${[b]}][target]" class="form-control" >${[value.target]}</textarea></td>
							<td><input type="number" min="1" step="any" id="budget" name="params_know[${[b]}][budget]" class="form-control" value="${[value.budget]}"></td>
							<td><textarea id="tracking" name="params_know[${[b]}][tracking]" class="form-control" readonly="readonly" value="${[value.tracking]}">${[value.tracking]}</textarea></td>
						</tr>
					    `);
					b++;
				})
				// ความรู้ Knowledge

				// Skill 
				$('#modal_form_idp_plan_edit #tbody_Skill').html('');
				let c = 1;
				$.each(data.idp_skill, function(key, value) {
					$('#modal_form_idp_plan_edit #tbody_Skill').append(`
						<tr>
							<td><input type="text" class="form-control" id="no" name="params_skill[${[c]}][no]" value="${[value.no]}"></td>
							<td>
								<textarea class ="form-control "name="params_skill[${[c]}][competency]" id="competency" cols="20" rows="2" value="${[value.competency]}">${[value.competency]}</textarea>
							</td>
							<td>
								<select id="learning" class="custom-select select_learning_skill" data-index="${[c]}" name="params_skill[${[c]}][learning]">
									<option selected>ระบุ... </option>
									<option value="70%">70%</option>
									<option value="20%">20%</option>
									<option value="10%">10%</option>
								</select>
							</td>
							<td><span id="textbox_model_skill"></span></td>
							<td><textarea id="tool_deital" name="params_skill[${[c]}][tool_deital]" class="form-control">${[value.tool_deital]}</textarea></td>
							<td><input type="text" id="dev_time" name="params_skill[${[c]}][dev_time]" class="form-control" placeholder="ระบุ Q1-Q4" value="${[value.dev_time]}"></td>
							<td><textarea id="target" name="params_skill[${[c]}][target]" class="form-control" >${[value.target]}</textarea></td>
							<td><input type="number" min="1" step="any" id="budget" name="params_skill[${[c]}][budget]" class="form-control" value="${[value.budget]}"></td>
							<td><textarea id="tracking" name="params_skill[${[c]}][tracking]" class="form-control" readonly="readonly" value="${[value.tracking]}">${[value.tracking]}</textarea></td>
						</tr>
					    `);
					c++;
				})
				// Skill 

				// Personal Attributes
				$('#modal_form_idp_plan_edit #tbody_PerAtt').html('');
				let d = 1;
				$.each(data.idp_perattr, function(key, value) {
					$('#modal_form_idp_plan_edit #tbody_PerAtt').append(`
						<tr>
							<td><input type="text" class="form-control" id="no" name="params_perattr[${[d]}][no]" value="${[value.no]}"></td>
							<td>
								<textarea class ="form-control "name="params_perattr[${[d]}][competency]" id="competency" cols="20" rows="2" value="${[value.competency]}">${[value.competency]}</textarea>
							</td>
							<td>
								<select id="learning" class="custom-select select_learning_perattr" data-index="${[d]}" name="params_perattr[${[d]}][learning]" >
									<option selected>ระบุ... </option>
									<option value="70%">70%</option>
									<option value="20%">20%</option>
									<option value="10%">10%</option>
								</select>
							</td>
							<td><span id="textbox_model_perattr">${[value.model]}</span></td>
							<td><textarea id="tool_deital" name="params_perattr[${[d]}][tool_deital]" class="form-control">${[value.tool_deital]}</textarea></td>
							<td><input type="text" id="dev_time" name="params_perattr[${[d]}][dev_time]" class="form-control" placeholder="ระบุ Q1-Q4" value="${[value.dev_time]}"></td>
							<td><textarea id="target" name="params_perattr[${[d]}][target]" class="form-control" >${[value.target]}</textarea></td>
							<td><input type="number" min="1" step="any" id="budget" name="params_perattr[${[d]}][budget]" class="form-control" value="${[value.budget]}"></td>
							<td><textarea id="tracking" name="params_perattr[${[d]}][tracking]" class="form-control" readonly="readonly" value="${[value.tracking]}">${[value.tracking]}</textarea></td>
						</tr>
					    `);
					d++;
				})
				// Personal Attributes
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('ไม่สามารถแสดงข้อมูลได้ โปรดแจ้งเจ้าหน้าที่รับผิดชอบระบบนี้ เบอร์ 1104 ');
			}
		});
	}

	function Send_Form_Edit() {

		$('#BtnSave_Edit').text('กำลังส่งแบบฟอร์ม'); //change button text
		$('#BtnSave_Edit').attr('disabled', false); //set button disable 

		// ajax adding data to database\
		var formData = new FormData($(document).find('#form_idp_plan_edit')[0]);

		$.ajax({
			url: "<?php echo site_url('idp_form/update_idp_plan_form') ?>",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(value) {
				if (value.status) //if success close modal and reload ajax table
				{
					$('#modal_form_idp_plan_edit').modal('hide');
					$('#form_idp_plan_edit')[0].reset(); // reset form on modals
					$('#tbl_idp_plan_emp').DataTable().ajax.reload();
					// load the url and show modal on success
					alert('คุณได้ส่งแบบฟอร์ม IDP Plan เรียบร้อยแล้ว');
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
				$('#BtnSave_Edit').text('กำลังส่งแบบฟอร์ม'); //change button text
				$('#BtnSave_Edit').attr('disabled', false); //set button enable
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(messenger);
				$('#BtnSave_Edit').text('ส่งคำขออนุมัติ'); //change button text
				$('#BtnSave_Edit').attr('disabled', false); //set button enable
			}
		});
		// end ajax
	}

	// function modal_tbl_learning_detail() {
	// 	$('#append-modal').html($('#hidden-modal-body').html());
	// 	$('body').find('#learning_model_form')[0].reset(); // reset form on modals
	// 	$('.form-group').removeClass('has-error'); // clear error class
	// 	$('#modal_learning_model_form').modal('show'); // show bootstrap modal
	// 	$('.modal_title_learning_model').text('เกณฑ์การวัดความสามารถ'); // Set Title to Bootstrap modal title
	// }
</script>

<!-- Modal Detail Competency -->
<!--modal Form -->
<div class="modal fade" id="modal_learning_model_form" role="dialog" style="z-index:9999;">
	<div id="modal_dialog" class="modal-dialog modal-dialog-scrollable modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal_title_learning_model">Form</h3>
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

<!-- Learning Detail-->
<div id="hidden-modal-body" style="display: none;">
	<form action="#" id="learning_model_form" class="form-horizontal">
		<input type="hidden" value="" name="">
		<div class="form-body">
			<div class="form-group">
				<div class="table-responsive">
					<table class="table table-hover table-borderless table-sm">
						<thead>
							<tr class="table">
								<th scolspan="2">เครื่องมือการพัฒนาบุคคลากรแบบ 70% (Learning by Experience)</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-warning">
								<th scope="col">เครื่องมือในการพัฒนา</th>
								<th scope="col">รายละเอียดของเครื่องมือการพัฒนา</th>
							</tr>
							<tr>
								<td>1.Job Shadowing/Observation:การติดตาม/สังเกตแม่แบบ</td>
								<td>การติดตามแม่แบบที่เป็นบุคคลที่ได้รับการยอมรับหรือเป็น Role Model
									ในเรื่องที่ต้องการติดตามหรือสังเกตพฤติกรรมการทำงานของแม่แบบ
									เน้นการเรียนรู้งานจากการเลียนแบบ และการติดตามหัวหน้างานหรือ
									ผู้รู้ในงานนั้นๆ เป็นเครื่องมือไม่ต้องใช้เวลามากนักในการพัฒนา
									ความสามารถของบุคลากร เนื่องจากบุคลากรจะต้องทำหน้าที่สังเกต
									ติดตามพฤติกรรมของหัวหน้างาน</td>
							</tr>
							<tr>
								<td>2.Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร</td>
								<td>การติดตามแม่แบบที่เน้นผู้บริหารระดับสูงเพื่อสังเกตการทำงานและ
									พฤติกรรมการแสดงออกของแม่แบบซึ่งแม่แบบที่เลือกต้องได้รับการยอมรับในเรื่องที่ติดตาม</td>
							</tr>
							<tr>
								<td>3.Job Enrichment การเพิ่มคุณค่าในงาน</td>
								<td>เนันการมอบหมายงานที่ยาก หรือท้าทายมากขึ้น ต้องใช้ความคิดวิเริ่ม
									การคิดเซิงวิเคราะห์ การวางแผ่นงานมากกว่าเดิม เนื่องจากเป็นงานที่
									แตกต่างจากงานเดิมที่เคยปฏิบัติ</td>
							</tr>
							<tr>
								<td>4.Job Enlargement การเพิ่มปริมาณงาน</td>
								<td>เน้นการมอบหมายงานที่มากขึ้น เป็นงานที่มีขั้นตอนงานคล้ายกับงาน
									เดิมที่เคยปฏิบัติหรืออาจจะเป็นงานที่แตกต่างจากเดิม แต่งานที่ได้รับ
									มอบหมายจะไม่ยากหรือไม่ต้องใช้ความคิดเชิงวิเคราะห์มากนัก</td>
							</tr>
							<tr>
								<td>5.Job Rotation การหมุนเวียน</td>
								<td>เน้นให้บุคลากรเวียนงานจากงานหนึ่งไปอีกงานหนึ่ง เพื่อเรียนรู้งานนั้น
									ตามระยะเวลาที่กำหนด โดยส่วนใหญ่มักใช้เป็นเครื่องมือในการพัฒนา
									ความสามารถของบุคลากรให้มีความรู้หลากหลาย</td>
							</tr>
							<tr>
								<td>6.Know ledge Sharing การแลกเปลี่ยนความรู้</td>
								<td>การรวมกลุ่มของบุคลากรภายในองค์กรเพื่อแลกเปลี่ยนความรู้
									หลักการ และแนวคิดที่เกี่ยวข้องและสามารถนำมาใช้ประโยชน์ในการทำงาน</td>
							</tr>
							<tr>
								<td>7.On the job Training การฝึกอบรมในงาน</td>
								<td>เน้นการฝึกในการปฏิบัติงานจริงโดยมีผู้สอนที่เป็นหัวหน้างานหรือ
									บุคคลที่ได้รับมอบหมายให้ทำหน้าที่จะต้องติดตามเพื่ออธิบายและชี้แนะ</td>
							</tr>
							<tr>
								<td>8.Work with Consultants or Internal Experts การทำงานกับที่ปรึกษาหรือผู้เชียวชาญภายใน</td>
								<td>การร่วมงานกับที่ปรึกษาที่มาปฏิบัติงานภายในองค์กร รวมถึงได้มี
									โอกาสทำงานร่วมกับผู้เชี่ยวชาญที่เป็นบุคคลภายในองค์กร</td>
							</tr>
							<tr>
								<td>9.Activity การทำกิจกรรม</td>
								<td>เน้นการมอบหมายกิจกรรมระยะสั้น ไม่ต้องมีระยะเวลาหรือขั้นตอนการ
									ดำเนินงานมากนัก ความสำเร็จของเครื่องมือดังกล่าวนี้ต้องอาศัยความ
									ร่วมมือจากบุคลากรในการรับผิดชอบกิจกรรมให้บรรลุเป้าหมายที่กำหนด</td>
							</tr>
							<tr>
								<td>10.Site Visit การดูงานนอกสถานที่</td>
								<td>การศึกษาดูงานนอกสถานที่เพื่อเรียนรู้แนวทางปฏิบัติขั้นตอนการ
									ทำงานขององค์กรที่เป็น Best Practice ในเรื่องที่ต้องการดูงาน</td>
							</tr>
							<tr>
								<td>11.Special Projects การรับผิดชอบโครงการพิเศษ</td>
								<td>การทำโครงการพิเศษที่ไม่ใช่งานหรือโครงการประจำที่ได้กำหนดขึ้น
									ใน Job Description</td>
							</tr>

						</tbody>
					</table>
					<table class="table table-hover table-borderless table-sm">
						<thead>
							<tr class="table">
								<th scolspan="2">เครื่องมือการพัฒนาบุคคลากร แบบ 20% (Learning by Others)</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-warning">
								<th scope="col">เครื่องมือในการพัฒนา</th>
								<th scope="col">รายละเอียดของเครื่องมือการพัฒนา</th>
							</tr>
							<tr>
								<td>1.Coaching การสอนแนะ </td>
								<td>การสอนแนะเพื่อจุดประกายให้เกิดการเรียนรู้โดยผู้บังคับบัญชา
									โดยตรงหรือบุคคลอื่นที่ผู้ถูกสอนยอมรับและมีความพร้อมที่จะเรียนรู้ไป
									กับผู้สอน</td>
							</tr>
							<tr>
								<td>2.Mentoring การเป็นพี่เลี้ยง </td>
								<td>การพูดคุยกันระหว่างพี่เลี้ยงและบุคคลที่พี่เลี้ยงต้องดูแล เน้นเรื่องจิตใจ
									อารมณ์ความรู้สึก และการปรับตัวเมื่อต้องทำงานร่วมกันกับผู้อื่นใน</td>
							</tr>
							<tr>
								<td>3.Teaching การสอน </td>
								<td>การบอกให้ผู้ถูกสอนรับรู้และรับฟัง โดยเน้นขั้นตอนวิธีการ รูปแบบและ
									ระบบงานที่ผู้ถูกสอนสามารถนำไปปฏิบัติ</td>
							</tr>
							<tr>
								<td>4.Informal Coaching การสอนแนะแบบไม่เป็นทางการ </td>
								<td>การสอนงานแบบไม่มีโครงสร้างที่สามารถเกิดขึ้นได้ตลอดเวลา
									ส่วนใหญ่เน้นการสอนแบบ Life Coach ที่ผู้สอนทำหน้าที่จุดประกายให้ผู้
									ถูกสอนมีมุมมองและแนวคิดในการดำเนินชีวิตประจำวัน</td>
							</tr>
							<tr>
								<td>5.Learning Through Team/Networks การเรียนรู้ผ่านทีม/เครือข่าย </td>
								<td>การเข้าร่วมกลุ่มเพื่อเป็นสมาชิกหรือเครือข่ายโดยเน้นกลุ่มภายใน
									เพื่อให้เป็นข้อมูลเกี่ยวกับหลักการและแนวคิดในเรื่องใดเรื่อง
									หนึ่งที่กลุ่มมีความสนใจร่วมกัน</td>
							</tr>
							<tr>
								<td>6.Meeting/ Seminar การประชุม/สัมมนา </td>
								<td>เน้นการพูดคุยระดมความคิดเห็นของทีมงาน
									มุมมองที่หลากหลาย ผู้นำกรประชุม/สัมมนาจึงมีบทบาทสำคัญมากใน
									ให้เกิดการแลกเปลี่ยนการกระตุ้นจูงใจให้ผู้เข้าร่วมประชุม/สัมมนานำเสนอความคิดเห็นร่วมกัน</td>
							</tr>
						</tbody>
					</table>
					<table class="table table-hover table-borderless table-sm">
						<thead>
							<tr class="table">
								<th scolspan="2">เครื่องมือการพัฒนาบุคคลากรแบบ 10% (Learning by Course)</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-warning">
								<th scope="col">เครื่องมือในการพัฒนา</th>
								<th scope="col">รายละเอียดของเครื่องมือการพัฒนา</th>
							</tr>
							<tr>
								<td>1.In-House Training การฝึกอบรมภายใน</td>
								<td>การฝึกอบรมที่ผู้เรียนมาจากองค์กรเดียวกันเรียนรู้ร่วมกันในหลักสูตร
									อบรมที่องค์กรจัดขึ้น เป็นการจัดอบรมทั้งภายในและ/หรือภายนอกองค์กร</td>
							</tr>
							<tr>
								<td>2.Public Training การฝึกอบรมภายนอก</td>
								<td>การฝึกอบรมที่ผู้เรียนมาจากต่างองค์กรกัน มีความสนใจในหลักสูตร
									เดียวกัน จัดขึ้นโดยสถาบันอบรมภายนอกเป็นการจัดอบรมภายนอกองค์กร</td>
							</tr>
							<tr>
								<td>3.Seminar การเข้าร่วมสัมมนา</td>
								<td>การเข้าร่วมประชุมกลุ่มที่สมาชิกมีความสนใจหรือมีความชำนาญใน
									เรื่องเดียวกันเข้าร่วมรับฟัง รับรู้ และแลกเปลี่ยนมุมมองความคืดเห็น
									เพื่อหาข้อสรุปในเรื่องใดเรื่องหนึ่ง ซึ่งข้อสรุปที่ได้จากการสัมมนาจะถูก
									ดำเนินการต่อหรือไม่ก็ได้</td>
							</tr>
							<tr>
								<td>4.Self-Learning การเรียนรู้ด้วยตนเอง</td>
								<td>การเรียนรู้ด้วยตนเองโดยผ่านสื่อต่าง ๆ เช่น อินเทอร์เน็ต, Youtube,
									การเรียนออนไลน์, การอ่านหนังสือ คู่มือ บทความ บทวิจัย เป็นต้น เป็น
									การเรียนรู้ด้วยตนเองในเรื่องที่สนใจเพื่อเพิ่มมุมมอง ความคิด ความรู้
									ของตนเอง</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- Learning Detail-->