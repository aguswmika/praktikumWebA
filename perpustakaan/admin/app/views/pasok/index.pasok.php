<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li>Pasok</li>
</ul>
<?php echo msg() ?>
<div class="panel">
	<div class="panel-title">Data Pasok</div>
	<div class="panel-body">
		<div class="tbl-responsive">
			<table class="tbl">
				<thead>
					<tr>
						<th>No</th>
						<th width="120">ID</th>
						<th>Buku</th>
						<th>Distributor</th>
						<th>Jumlah</th>
						<th>Tanggal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<div class="clearfix">
					<?php if(Session::sess('akses') == 1) { ?>
					<div class="fl">
						<a href="?p=pasok&act=add" class="btn">Tambah</a> <a id="hps" class="btn" style="display:none">Hapus</a>
					</div>
					<?php } ?>
					<div class="fr">
						<form method="get">
							<input type="hidden" name="p" value="pasok">
							<input type="search" class="form-control" name="search" placeholder="Cari sesuatu?">
							<?php if(!empty(Input::get('search'))){ ?><a class="btn" href="?p=<?php echo Input::get('p') ?>"><< Back</a><?php } ?>
						</form>
					</div>
				</div>

				<?php
					$no = 1;
					foreach ($pasok as $item) {
				?>
					<tr data-id="<?php echo $item->id_pasok ?>">
						<td><?php echo $no++ ?></td>
						<td><?php echo $item->id_pasok ?></td>
						<td><?php echo $item->judul ?> (<?php echo $item->id_buku ?>)</td>
						<td><?php echo $item->nama_distributor ?> (<?php echo $item->id_distributor ?>)</td>
						<td><?php echo $item->jumlah ?></td>
						<td><?php echo date('Y-m-d', strtotime($item->tanggal)) ?></td>
						<td> <?php if(Session::sess('akses') == 1){ ?><a href="?p=pasok&act=edit&id=<?php echo $item->id_pasok ?>" class="btn">Edit</a><?php } ?></td>
						<!-- <a href="?p=pasok&act=transfer&id=<?php echo $item->id_pasok ?>" class="btn">Transfer</a> -->
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
					url  : '?p=pasok&act=del',
					data : {id: id, _token : '<?php echo CSRF::token() ?>'},
					success : function(data){
						window.location = '?p=pasok';

					}
				})
			}
		})
	})
</script>
