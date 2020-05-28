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
                        <th>Admin</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="clearfix">
                        <div class="fl">
                            <a href="?p=pinjaman&act=add" class="btn">Tambah</a> <a id="hps" class="btn" style="display:none">Hapus</a>
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
                                            <td><?php echo $item->nama_admin ?> (<?php echo $item->id_admin ?>)</td>
                                            <td><?php echo $item->jumlah ?></td>
                                            <td><?php echo $item->status ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($item->tanggal_permohonan)) ?></td>
                                            <td><a href="?p=pinjaman&act=bill&id=<?php echo $item->id_pinjaman ?>&_token=<?php echo CSRF::token() ?>" class="btn">Print</a></td>
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