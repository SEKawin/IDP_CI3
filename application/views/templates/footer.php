<!-- footer -->
<footer class="footer rounded" style="font-size: 12px; background-color: #12343b;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-1 text-white">
			</div>
			<div class="col text-white">
				<h5>Company</h5>
				<p>Thai Summit Harness Co.,Ltd.</p>
				<p class="rights"><span>©</span><span class="copyright-year">2021</span><span> </span><span>Thai Summit
						Harness Co.,Ltd.</span><span>. </span></p>
			</div>

			<div class="col text-white">
				<h5>Address:</h5>
				<p>Thai Summit Harness Co.,Ltd.
					202 moo 3 Laemchabang Industrial Estate,Sriracha, Chonburi 20230, Thailand.</p>
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalCenter_Map">
					Google Map
				</button>
			</div>

			<div class="col text-white ">
				<h5>Email:</h5>
				<p><a href="mailto:#" class="text-white">wanwalit_k@thaisummit-harness.co.th</a>
					<br> <a>Phone : 1110 <a href="tel:#" class="text-white"> </a>
				</p>
				<p><a href="mailto:#" class="text-white">apatsarapha_s@thaisummit-harness.co.th</a>
					<br> <a>Phone : 1164 <a href="tel:#" class="text-white"> </a>
				</p>
			</div>
		</div>
	</div>
</footer>

<!-- Modal GoogleMap -->
<div class="modal fade" id="ModalCenter_Map" tabindex="-1" role="dialog" aria-labelledby="ModalCenter_MapTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h5 class="modal-title text-dark" id="ModalCenter_MapTitle">Google Map</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- Modal Header -->
			<!-- Modal body -->
			<div class="modal-body">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.0693692034574!2d100.89747051435478!3d13.094790115707266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102b86908c2c079%3A0xdd3144bf6a9e519b!2z4Lia4Lij4Li04Lip4Lix4LiXIOC5hOC4l-C4ouC4i-C4seC4oeC4oeC4tOC4lyDguK7guLLguKPguYzguYDguJnguKog4LiI4Liz4LiB4Lix4LiUICjguKHguKvguLLguIrguJkp!5e0!3m2!1sth!2sth!4v1619579315204!5m2!1sth!2sth" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen="" loading="lazy"></iframe>
			</div>
			<!-- Modal body -->
			<!-- Modal footer -->
			<div class=" modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
			</div>
			<!-- Modal footer -->
		</div>
	</div>
</div>
</body>

<style>
	footer {
		/* position: fixed; */
		left: 0;
		bottom: 0;
		width: 100%;
		color: white;
		/* text-align: center; */
	}
</style>

<!-- Optional JavaScript -->
<!-- jquery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script src=" <?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
<script src=" <?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

</html>