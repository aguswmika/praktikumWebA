<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li>User</li>
</ul>
<?php echo msg() ?>
<div class="panel">
	<div class="panel-title">Data User</div>
	<div class="panel-body">
		<div class="tbl-responsive">
			<table class="tbl">
				<thead>
					<tr>
						<th>No</th>
						<th>ID</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Telepon</th>
						<th>Status</th>
						<th>Akses</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<div class="clearfix">
					<div class="fl">
						<a href="?p=user&act=add" class="btn">Tambah</a> <a id="hps" class="btn" style="display:none">Hapus</a>
					</div>
					<div class="fr">
						<form method="get">
							<input type="hidden" name="p" value="user">
							<input type="search" class="form-control" name="search" placeholder="Cari sesuatu?">
							<?php if(!empty(Input::get('search'))){ ?><a class="btn" href="?p=<?php echo Input::get('p') ?>"><< Back</a><?php } ?>
						</form>
					</div>
				</div>

				<?php 
					$no = 1;
					foreach ($user as $item) {
				?>
					<tr data-id="<?php echo $item->id_user ?>">
						<td><?php echo $no++ ?></td>
						<td><?php echo $item->id_user ?></td>
						<td><?php echo $item->nama ?> (<?php echo $item->username ?>)</td>
						<td><?php echo $item->alamat ?></td>
						<td><?php echo $item->status ?></td>
						<td><?php echo $item->telepon ?></td>
						<td><?php echo ($item->akses == 2) ? 'Admin' : 'Peminjam' ?></td>
						<td><a href="?p=user&act=edit&id=<?php echo $item->id_kasir ?>" class="btn">Edit</a></td>
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
					url  : '?p=user&act=del',
					data : {id: id, _token : '<?php echo CSRF::token() ?>'},
					success : function(data){
						window.location = '?p=user';
					
					}
				})
			}
		})
	})
</script>