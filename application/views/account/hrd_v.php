<!-- header -->
<?php $this->load->view('templates/header'); ?>
<!-- header -->
<div class="container-fluid">
	<div class="jumbotron text-center">
		<h1>การจัดการผู้ใช้งาน</h1>
		<div class="jumbotron text-left" style="background-color: LightSteelBlue">
			<a href="<?php echo site_url('account/manage'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i> รายการผู้ใช้งาน</a>
			<a href="<?php echo site_url('account/approver_list'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i>การจัดการผู้อนุมัติตามองค์กร</a>
			<a href="<?php echo site_url('account/hrd_list'); ?>" class="btn btn-info" role="button"><i class="fa fa-user" aria-hidden="true"></i>รายการผู้ตรวจสอบและผู้อนุมัติฝ่ายพัฒนาทรัพยากรมนุษย์</a>
			<div class="row col-md-12">
				<div class="page-header">
					<h3><small>รายการผู้อนุมัติผู้จัดการทั่วไปสำนักพัฒนาองค์กร</small></h3>
				</div>
			</div>
			<?php if ($responce = $this->session->flashdata('alert')) : ?>
				<?php if ($responce === 'success') : ?>
					<div class="alert alert-success"><?php echo $this->session->flashdata('message') ?></div>
				<?php else : ?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('message') ?></div>
				<?php endif; ?>
			<?php endif; ?>

			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<?php echo form_open('account/hrd_manager_add'); ?>
					<div class="input-group">
						<input type="text" class="form-control" name="code" placeholder="กรอกรหัสพนักงานเพื่อเพิ่มรายการ">
						<span class="input-group-btn">
							<input type="submit" value="+ เพิ่ม" class="btn btn-primary">
						</span>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive-sm">
						<table class="table table-hover table-success   ">
							<thead>
								<tr>
									<th>รหัสพนักงาน</th>
									<th>ชื่อ-นามสกุล</th>
									<th>หน่วยงาน</th>
									<th>เมนู</th>
								</tr>
							</thead>
							<tbody>
							<tbody class="table-light">
								<?php foreach ($hrd_manager as $rows) : ?>
									<tr>
										<td><?php echo $rows->code; ?></td>
										<td> <?php echo $rows->salutation . ' ' . $rows->firstname_th . ' ' . $rows->lastname_th; ?>
										</td>
										<td><?php echo $rows->department_code . ' ' . $rows->department_title; ?></td>
										<td></td>
										<!-- <td>
											<a title="ลบ" class="btn btn-sm btn-danger" href="<?php echo site_url('account/hrd_manager_remove/'); ?><?php echo $rows->code ?>" onClick="return confirm('คุณต้องการลบข้อมูลออกใช่หรือไม่')"><i class="fa fa-trash-o"></i></i> ลบ</a>
										</td> -->
									</tr>
								<?php endforeach; ?>
							</tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="row col-md-12">
				<div class="page-header">
					<h3><small>รายการผู้ตรวจสอบและผู้อนุมัติฝ่ายทรัพยากรมนุษย์</small></h3>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<?php echo form_open('account/hrd_mgr_add'); ?>
					<div class="input-group">
						<input type="text" class="form-control" name="code" placeholder="กรอกรหัสพนักงานเพื่อเพิ่มรายการ">
						<span class="input-group-btn">
							<input type="submit" value="+ เพิ่ม" class="btn btn-primary">
						</span>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<p>ผู้จัดการฝ่ายพัฒนาทรัพยากรมนุษย์</p>
					<div class="table-responsive-sm">
						<table class="table table-hover table-success   ">
							<thead>
								<tr>
									<th>รหัสพนักงาน</th>
									<th>ชื่อ-นามสกุล</th>
									<th>หน่วยงาน</th>
									<th>เมนู</th>
								</tr>
							</thead>
							<tbody class="table-light">
								<?php foreach ($hrd_mgr as $rows) : ?>
									<tr>
										<td><?php echo $rows->code; ?></td>
										<td> <?php echo $rows->salutation . ' ' . $rows->firstname_th . ' ' . $rows->lastname_th; ?>
										</td>
										<td><?php echo $rows->department_code . ' ' . $rows->department_title; ?></td>
										<td>
											<a title="ลบ" class="btn btn-sm btn-danger" href="<?php echo site_url('account/hrd_mgr_remove/'); ?><?php echo $rows->code ?>" onClick="return confirm('คุณต้องการลบข้อมูลออกใช่หรือไม่')"><i class="fa fa-trash-o"></i></i> ลบ</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<?php echo form_open('account/hrd_add'); ?>
					<div class="input-group">
						<input type="text" class="form-control" name="code" placeholder="กรอกรหัสพนักงานเพื่อเพิ่มรายการ">
						<span class="input-group-btn">
							<input type="submit" value="+ เพิ่ม" class="btn btn-primary">
						</span>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<p>เจ้าหน้าที่พนักงานฝ่ายพัฒนาทรัพยากรมนุษย์</p>
					<div class="table-responsive-sm">
						<table class="table table-hover table-success   ">
							<thead>
								<tr>
									<th>รหัสพนักงาน</th>
									<th>ชื่อ-นามสกุล</th>
									<th>หน่วยงาน</th>
									<th>เมนู</th>
								</tr>
							</thead>
							<tbody class="table-light">
								<?php foreach ($hrd_staff as $rows) : ?>
									<tr>
										<td><?php echo $rows->code; ?></td>
										<td> <?php echo $rows->salutation . ' ' . $rows->firstname_th . ' ' . $rows->lastname_th; ?>
										</td>
										<td><?php echo $rows->department_code . ' ' . $rows->department_title; ?></td>
										<td>
											<a title="ลบ" class="btn btn-sm btn-danger" href="<?php echo site_url('account/hrd_remove/'); ?><?php echo $rows->code ?>" onClick="return confirm('คุณต้องการลบข้อมูลออกใช่หรือไม่')"><i class="fa fa-trash-o"></i></i> ลบ</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>


		</div>

	</div>
</div>

</div>
<!-- End container-fluid -->

<!-- footer -->
<?php $this->load->view('templates/footer'); ?>
<!-- footer -->
