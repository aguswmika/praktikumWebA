	</div>
	<div id="method">
		<div class="container">
			<div class="row">
				<div class="col md-6">
					<div class="title">Pembayaran</div>
					<center>
						<img src="<?php echo base_url('assets/img/payment/bca.png') ?>">
						<img src="<?php echo base_url('assets/img/payment/bni.png') ?>">
						<img src="<?php echo base_url('assets/img/payment/bri.png') ?>">
						<img src="<?php echo base_url('assets/img/payment/mandiri.png') ?>">
					</center>
				</div>
				<div class="col md-6">
					<div class="title">Pengiriman</div>
					<center>
						<img src="<?php echo base_url('assets/img/shipping/jne.png') ?>">
						<img src="<?php echo base_url('assets/img/shipping/pos.png') ?>">
						<img src="<?php echo base_url('assets/img/shipping/tiki.png') ?>">
					</center>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<center>
			<ul class="nav">
				<li><a href="<?php echo base_url() ?>">Home</a></li>
				<li><a href="<?php echo base_url('buku') ?>">Buku</a></li>
				<li><a href="<?php echo base_url('tentang') ?>">Tentang</a></li>
				<li><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>
			</ul>
			<p>Copyright &copy; <?php echo date('Y') ?> by Agus Wahyu</p>
		</center>
	</div>

	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/owl.carousel.min.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".owl-carousel").owlCarousel({
				items: 3,
				loop: true,
				autoplay: true,
				autoplayTimeout: 2000,
				autoplayHoverPause: true,
			});
		})
	</script>

</body>
</html>