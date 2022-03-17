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
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive-sm">
						<table class="table table-hover table-success   ">
							<thead>
								<tr>
									<th>พนักงาน</th>
									<th>ชื่อ-นามสกุล</th>
									<th>ตำแหน่ง</th>
									<th>หน่วยงาน</th>
									<!-- <th>เมนู</th> -->
								</tr>
							</thead>
							<tbody>

							<tbody class="table-light">

								<?php foreach ($approver_mgr as $rows) : ?>
									<tr>
										<td><?php echo $rows->code; ?></td>
										<td> <?php echo $rows->salutation . ' ' . $rows->firstname_th . ' ' . $rows->lastname_th; ?></td>
										<td><?php echo $rows->position; ?></td>
										<td><?php echo $rows->department_code . ' ' . $rows->department_title; ?></td>
									</tr>
								<?php endforeach; ?>

								<?php foreach ($approver_super as $rows) : ?>
									<tr>
										<td><?php echo $rows->code; ?></td>
										<td> <?php echo $rows->salutation . ' ' . $rows->firstname_th . ' ' . $rows->lastname_th; ?></td>
										<td><?php echo $rows->position; ?></td>
										<td><?php echo $rows->department_code . ' ' . $rows->department_title; ?></td>
									</tr>
								<?php endforeach; ?>

							</tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- footer -->
<?php $this->load->view('templates/footer'); ?>
<!-- footer -->