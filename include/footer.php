			<section class="section-copyrights sec-moreless-padding">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<span>Copyright &copy; 2019 <a href="https://1.envato.market/hasta-html-by-codelayers">Hasta
							</a> By <a href="https://1.envato.market/codelayers">Codelayers</a> | All Rights Reserved.</span>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>

			<a href="#" class="scrollup yellow-green"></a>
		</div>
	</div>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/universal/jquery.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/mainmenu/customeUI.js"></script>
    <script src="assets/js/mainmenu/jquery.sticky.js"></script>
    <script src="assets/js/scrolltotop/totop.js"></script>
	<script src="assets/js/heightline/heightline.js"></script>

	<!-- toastr Alert -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script>
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}

		$('.sec-content-blk .post-txt-blk').heightLine({
			fontSizeCheck: true,
		}); 
	</script>
	
	<?php
		if( isset($_SESSION['alert']) ){
			echo $_SESSION['alert'];
			unset($_SESSION['alert']);
		}
	?>
</body>