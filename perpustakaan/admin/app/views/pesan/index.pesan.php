<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li>Pesan</li>
</ul>
<?php echo msg() ?>
<div class="panel">
	<div class="panel-title">Data Pesan</div>
	<div class="panel-body">
		<div class="tbl-responsive">
			<table class="tbl">
				<thead>
					<tr>
						<th>No</th>
						<th>Perihal</th>
						<th>Nama</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
				<div class="clearfix">
					<div class="fl">
						<a id="hps" class="btn" style="display:none">Hapus</a>
					</div>
					<div class="fr">
						<form method="get">
							<input type="hidden" name="p" value="distributor">
							<input type="search" class="form-control" name="search" placeholder="Cari sesuatu?">
							<?php if(!empty(Input::get('search'))){ ?><a class="btn" href="?p=<?php echo Input::get('p') ?>"><< Back</a><?php } ?>
						</form>
					</div>
				</div>

				<?php 
					$no = 1;
					foreach ($pesan as $item) {
				?>
					<tr data-id="<?php echo $item->id_pesan ?>">
						<td><?php echo $no++ ?></td>
						<td><a href="?p=pesan&act=detail&id=<?php echo $item->id_pesan ?>"><?php echo $item->perihal ?></a></td>
						<td><?php echo $item->nama ?></td>
						<td><?php echo $item->email ?></td>
					</tr>
				<?php } ?>


				</tbody>
			</table>
			<?php echo $paginate; ?>
		</div>
	</div>
</div>

<?php view('__footer') ?>

<script type="text/javascript">
	$(document).ready(function(){
		var id = '';


		$('#hps').click(function(){
			$('tr.selected').each(function(){
				id += ','+$(this).attr('data-id');
			});

			if(confirm('Yakin ingin mengahapus?')){
				$.ajax({
					type : 'POST',
					url  : '?p=pesan&act=del',
					data : {id: id, _token : '<?php echo CSRF::token() ?>'},
					success : function(data){
						window.location = '?p=pesan';
					
					}
				})
			}
		})
	})
</script>