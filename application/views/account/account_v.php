<!-- header -->
<?php $this->load->view('templates/header'); ?>
<!-- header -->
<div class="container-fluid ">
	<div class="jumbotron justify-content-between text-center">
		<h1>การจัดการผู้ใช้งาน</h1>
		<div class="jumbotron text-left" style="background-color: LightStee-lBlue">
			<a href="<?php echo site_url('account/manage'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i> รายการผู้ใช้งาน</a>
			<a href="<?php echo site_url('account/approver_list'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i>การจัดการผู้อนุมัติตามองค์กร</a>
			<a href="<?php echo site_url('account/hrd_list'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i>รายการผู้ตรวจสอบและผู้อนุมัติฝ่ายพัฒนาทรัพยากรมนุษย์</a>
		</div>
	</div>
</div>
<!-- End container-fluid -->

<?php $this->load->view('templates/footer'); ?>
<!-- footer -->
