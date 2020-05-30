<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li>Buku</li>
</ul>
<?php echo msg() ?>
<div class="panel">
	<div class="panel-title">Data Buku</div>
	<div class="panel-body">
		<div class="tbl-responsive">
			<table class="tbl">
				<thead>
					<tr>
						<th>No</th>
						<th width="120">ID</th>
						<th>Judul</th>
						<th>Penulis</th>
						<th>Penerbit</th>
						<th>Stok</th>
						<?php if(Session::sess('akses') == 1 || Session::sess('akses') == 2){ ?><th>Aksi</th><?php } ?>
					</tr>
				</thead>
				<tbody>
				
				<div class="clearfix">
					<?php if(Session::sess('akses') == 1 || Session::sess('akses') == 2){ ?>
					<div class="fl">
						<a href="?p=buku&act=add" class="btn">Tambah</a> <a id="hps" class="btn" style="display:none">Hapus</a>
					</div>
					<?php } ?>
					<div class="fr">
						<form method="get">
							<input type="hidden" name="p" value="buku">
							<input type="search" class="form-control" name="search" placeholder="Cari sesuatu?">
							<?php if(!empty(Input::get('search'))){ ?><a class="btn" href="?p=<?php echo Input::get('p') ?>"><< Back</a><?php } ?>
						</form>
					</div>
				</div>

				<?php 
					$no = 1;
					foreach ($buku as $item) {
				?>
					<tr data-id="<?php echo $item->id_buku ?>">
						<td><?php echo $no++ ?></td>
						<td><a target="_blank" href="../buku/<?php echo $item->slug ?>"><?php echo $item->id_buku ?></a></td>
						<td><?php echo $item->judul ?> (<?php echo $item->noisbn ?>)</td>
						<td><?php echo $item->penulis ?></td>
						<td><?php echo $item->penerbit ?></td>
						<td><?php echo $item->stok ?></td>
						<td><?php if(Session::sess('akses') == 1 || Session::sess('akses') == 2) { ?><a href="?p=buku&act=edit&id=<?php echo $item->id_buku ?>" class="btn">Edit</a><?php } ?></td>
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
					url  : '?p=buku&act=del',
					data : {id: id, _token : '<?php echo CSRF::token() ?>'},
					success : function(data){
						window.location = '?p=buku';
					
					}
				})
			}
		})
	})
</script>