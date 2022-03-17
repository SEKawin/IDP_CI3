<?php
$name_role = $this->session->userdata('name_role');
?>
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<?php if ($name_role == 'ADMIN') : ?>
			<div class="row">
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<a href="<?php echo site_url('self_competency'); ?>">
							<img src="<?php echo base_url(); ?>assets/picture/self.jpg" class="card-img-top" width="100%" height="225" alt="Self-Competency Gap Assessment">
						</a>
						<div class="card-body">
							<p class="card-text text-center">Self-Competency Gap Assessment
							<h6 class="badge badge-warning">New &nbsp;
								<span class="badge badge-light" id="notify_self" style="font-size:14px;">
								</span>
								&nbsp; รายการ
							</h6>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<a href="<?php echo site_url('assessor_competency'); ?>">
							<img src="<?php echo base_url(); ?>assets/picture/competency.jpg" class="card-img-top" width="100%" height="225" alt="Competency Gap Assessment">
						</a>
						<div class="card-body">
							<p class="card-text text-center">Competency Gap Assessment
							<h6 class="badge badge-warning">New &nbsp;
								<span class="badge badge-light" id="notify_com" style="font-size:14px;">
								</span>
								&nbsp; รายการ
							</h6>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<a href="<?php echo site_url('idp_form'); ?>">
							<img src="<?php echo base_url(); ?>assets/picture/idp_plan.png" class="card-img-top" width="100%" height="225" alt="Individual Development Plan (IDP)">
						</a>
						<div class="card-body">
							<p class="card-text text-center">Individual Development Plan (IDP)
							<h6 class="badge badge-warning">New &nbsp;
								<span class="badge badge-light" id="notify_idp" style="font-size:14px;">
								</span>
								&nbsp; รายการ
							</h6>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<a href="<?php echo site_url('job_description'); ?>">
							<img src="<?php echo base_url(); ?>assets/picture/job2-min.png" class="card-img-top" width="100%" height="225" alt="Job Description">
						</a>
						<div class="card-body">
							<p class="card-text text-center">Job Description </p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<a href="<?php echo site_url('radar_chart'); ?>">
							<img src="<?php echo base_url(); ?>assets/picture/radar.png" class="card-img-top" width="100%" height="225" alt="Radar Chart">
						</a>
						<div class="card-body">
							<p class="card-text text-center">Radar Chart</p>
						</div>
					</div>
				</div>
			</div>

		<?php else : ?>
			<div class="row">
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<a href="<?php echo site_url('self_competency'); ?>">
							<img src="<?php echo base_url(); ?>assets/picture/self.jpg" class="card-img-top" width="100%" height="225" alt="Self-Competency Gap Assessment">
						</a>
						<div class="card-body">
							<p class="card-text text-center">Self-Competency Gap Assessment
							<h6 class="badge badge-warning">New &nbsp;
								<span class="badge badge-light" id="notify_self" style="font-size:14px;">
								</span>
								&nbsp; รายการ
							</h6>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<a href="<?php echo site_url('assessor_competency'); ?>">
							<img src="<?php echo base_url(); ?>assets/picture/competency.jpg" class="card-img-top" width="100%" height="225" alt="Competency Gap Assessment">
						</a>
						<div class="card-body">
							<p class="card-text text-center">Competency Gap Assessment
							<h6 class="badge badge-warning">New &nbsp;
								<span class="badge badge-light" id="notify_com" style="font-size:14px;">
								</span>
								&nbsp; รายการ
							</h6>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<a href="<?php echo site_url('idp_form'); ?>">
							<img src="<?php echo base_url(); ?>assets/picture/idp_plan.png" class="card-img-top" width="100%" height="225" alt="Individual Development Plan (IDP)">
						</a>
						<div class="card-body">
							<p class="card-text text-center">Individual Development Plan (IDP)
							<h6 class="badge badge-warning">New &nbsp;
								<span class="badge badge-light" id="notify_idp" style="font-size:14px;">
								</span>
								&nbsp; รายการ
							</h6>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<a href="<?php echo site_url('job_description'); ?>">
							<img src="<?php echo base_url(); ?>assets/picture/job2-min.png" class="card-img-top" width="100%" height="225" alt="Job Description">
						</a>
						<div class="card-body">
							<p class="card-text text-center">Job Description </p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<a href="<?php echo site_url('radar_chart'); ?>">
							<img src="<?php echo base_url(); ?>assets/picture/radar.png" class="card-img-top" width="100%" height="225" alt="Radar Chart">
						</a>
						<div class="card-body">
							<p class="card-text text-center">Radar Chart</p>
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>
	</div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script type="text/javascript">
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


		var getData =
			$.ajax({ //Alerts ของพนักงาน
				url: "<?php echo site_url('Notifications/notify_competency') ?>",
				data: "",
				async: false,
				success: function(getData) {
					$("span#notify_com").html(getData);
				}
			}).responseText;
		var getData =
			$.ajax({ //Alerts ของพนักงาน
				url: "<?php echo site_url('Notifications/notify_idp') ?>",
				data: "",
				async: false,
				success: function(getData) {
					$("span#notify_idp").html(getData);
				}
			}).responseText;
	});
</script>