			<div class="footer">Copyright &copy; <?php echo date('Y') ?> by Agus Wahyu</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('[data-modal]').click(function(){
			var modal = $(this).attr('data-modal');
			$('#'+modal).css({
				'display': 'block'
			})
		})

		$('.closeModal').click(function(){
			$(this).parent().parent().parent().parent().css({
				'display': 'none'
			})
		})

		$('tr[data-id]').click(function(){
			$(this).toggleClass('selected');

			if($('.selected').length > 0){
				$('#hps').css({'display': 'inline-block'})
			}else{
				$('#hps').css({'display': 'none'})
			}
		})

	})
</script>
</body>
</html>