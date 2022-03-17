<?php $this->load->view('templates/header'); ?>

<div class='container'>
	<h1 class="text-center">Job Description</h1>
	<button class="btn btn-sm btn-primary" onclick="add_flie_upload()"> Job Description</button>
	<table id="tbl_jd" class="table table-hover">
		<thead>
			<tr class="table-active">
				<th scope="col">ประจำปี </th>
				<th scope="col">รายละเอียด</th>
				<th scope="col">เมนู</th>
			</tr>
		</thead>
		<tbody>
			<td>2021</td>
			<td>Job Description</td>
			<td>
			</td>
		</tbody>
	</table>
</div>

<div class="modal" id="modal_form">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Job Description </h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="container mt-3">
					<h6>อัพโหลดไฟล์ Job Description</h6>
					<form id="form" method="post" enctype="multipart/form-data">
						<div class="custom-file mb-3">
							<input type="file" class="custom-file-input" id="file_upload" name="file_upload" aria-label="Default">
							<label class="custom-file-label" for="file_upload">Choose file</label>
						</div>
						<p class="text-danger"><b>***ต้องเป็นไฟล์ pdf, jpg และ png เท่านั้น ***</b></p>
					</form>
				</div>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">บันทึกข้อมูล</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
			</div>

		</div>
	</div>
</div>

<style>
	footer {
		position: fixed;
	}
</style>
<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		bsCustomFileInput.init()
	})

	$(document).ready(function() {
		//datatables
		table = $('#tbl_jd').DataTable({

			"searching": false,
			"ordering": false,
			"bInfo": false,
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.`

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('job_description/ajax_list') ?>",
				"type": "POST"
			},

			//Set column definition initialisation properties.
			"columnDefs": [{
					"targets": [-1], //last column
					"orderable": false, //set not orderable
				},
				{
					"targets": [-2], //2 last column (photo)
					"orderable": false, //set not orderable
				},
			],

		});

	});

	function reload_table() {
		table.ajax.reload(null, false); //reload datatable ajax
	}

	function add_flie_upload() {
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Job Description'); // Set Title to Bootstrap modal title
	}

	function save() {
		$('#btnSave').text('กำลังบันทึก...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		var url;

		if (save_method == 'add') {
			url = "<?php echo site_url('job_description/ajax_add') ?>";
		}
		// ajax adding data to database
		var formData = new FormData($('#form')[0]);
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
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
				}
				$('#btnSave').text('บันทึก'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable 
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('ไม่สามารถบันทึกข้อมูลลงในระบบได้');
				$('#btnSave').text('บันทึก'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable 

			}
		});
	}
</script>
<?php $this->load->view('form/jd_form/modal_form'); ?>
<?php $this->load->view('templates/footer'); ?>