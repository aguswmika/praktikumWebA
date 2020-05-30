<?php view('__header', $data) ?>
<ul class="nav-link">
    <li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
    <li>Pinjaman</li>
</ul>
<?php echo msg() ?>
<div class="panel">
    <div class="panel-title">Data Pinjaman</div>
    <div class="panel-body">
        <div class="tbl-responsive">
            <table class="tbl">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Peminjam</th>
                        <?php if(Session::sess('akses') == 1 || Session::sess('akses') == 2) { ?>
                        <th>Admin</th>
                        <?php } ?>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <?php if(Session::sess('akses') == 1 || Session::sess('akses') == 2) { ?>
                        <th>Aksi</th>
                        <?php  } ?>
                    </tr>
                </thead>
                <tbody>
                    <div class="clearfix">
                        <div class="fl">
                            <a href="?p=pinjaman&act=add" class="btn">Tambah</a> 
                            <?php if(Session::sess('akses') == 1 || Session::sess('akses') == 2) { ?>
                            <a id="hps" class="btn" style="display:none">Hapus</a>
                            <?php } ?>
                        </div>
                        <div class="fr">
                            <form method="get">
                                <input type="hidden" name="p" value="pinjaman">
                                <input type="search" class="form-control" name="search" placeholder="Cari sesuatu?">
                                <?php if (!empty(Input::get('search'))) { ?><a class="btn" href="?p=<?php echo Input::get('p') ?>">
                                        << Back</a><?php } ?> </form> </div> </div> <?php
                                                                                    $no = 1;
                                                                                    foreach ($pinjaman as $item) {
                                                                                    ?> <tr data-id="<?php echo $item->id_pinjaman ?>">
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $item->id_pinjaman ?></td>
                                            <td><?php echo $item->nama_peminjam ?> (<?php echo $item->id_peminjam ?>)</td>
                                            <?php if(Session::sess('akses') == 1 || Session::sess('akses') == 2) { ?>
                                            <td><?php echo $item->nama_admin ?> (<?php echo $item->id_admin ?>)</td>
                                            <?php } ?>
                                            <td><?php echo $item->jumlah ?></td>
                                            <td><?php echo $item->status == 0 ? 'Pending' : ($item->status == 1 ?  'Diterima' : 'Ditolak')  ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($item->tanggal_permohonan)) ?></td>
                                            <?php if(Session::sess('akses') == 1 || Session::sess('akses') == 2) { ?>
                                            <td>
                                                <?php if ($item->status == 0) { ?>
                                                    <form action="?p=pinjaman&act=changestatus" method="POST" style="display: inline-block">
                                                        <input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
                                                        <input type="hidden" name="id_pinjaman" value="<?php echo $item->id_pinjaman ?>">
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit" class=" btn">Terima</button>
                                                    </form>
                                                    <form action="?p=pinjaman&act=changestatus" method="POST" style="display: inline-block">
                                                        <input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
                                                        <input type="hidden" name="id_pinjaman" value="<?php echo $item->id_pinjaman ?>">
                                                        <input type="hidden" name="status" value="2">
                                                        <button type="submit" class=" btn btn-red">Tolak</button>
                                                    </form>
                                                <?php } ?>
                                                <a href="#" class="btn">Lihat</a>
                                            </td>
                                            <?php } ?>
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
    $(document).ready(function() {
        var id = '';


        $('#hps').click(function() {
            $('tr.selected').each(function() {
                id += ',' + $(this).attr('data-id');
            });

            if (confirm('Yakin ingin menghapus?')) {
                $.ajax({
                    type: 'POST',
                    url: '?p=pinjaman&act=del',
                    data: {
                        id: id,
                        _token: '<?php echo CSRF::token() ?>'
                    },
                    success: function(data) {
                        window.location = '?p=pinjaman';
                    }
                })
            }
        })
    })
</script>