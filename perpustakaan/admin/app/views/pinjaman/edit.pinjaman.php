<?php view('__header', $data) ?>
<ul class="nav-link">
    <li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
    <li><a href="?p=pinjaman">Pinjaman</a></li>
    <li>Add</li>
</ul>
<?php echo msg() ?>
<form method="post" id="frmBuku">
    <div class="row">
        <div class="col md-8">
            <div class="panel">
                <div class="panel-title">Data Pinjaman</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>ID Pinjaman</label>
                        <input type="text" disabled class="form-control md-4" value="<?php echo $id ?>">
                    </div>
                    <div class="form-group">
                        <label>Buku</label>
                        <input type="text" disabled class="form-control md-4 fl">
                        <a class="btn fl" data-modal="cariBuku">Cari</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tbl-responsive">
                        <table class="tbl" id="tblBuku">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col md-4">
            <div class="panel">
                <div class="panel-title">Data Pinjaman</div>
                <div class="panel-body" style="padding:0px;">
                    <label style="text-align: center; margin:0;">Peminjam</label>
                    <div class="pinjam" style="background-color: #e57373;padding: 10px 10px 20px 10px">
                        <select name="id_peminjam" class="form-control" required style="border: none;border-radius: 0px;">
                            <option value="">-- Pilih Peminjam --</option>
                            <?php foreach ($user as $item) { ?>
                                <option value="<?php echo $item->id_user ?>" <?php echo $item->id_user == $item->id_peminjam?>><?php echo $item->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <label style="text-align: center; margin:0;">Status</label>
                    <div class="pinjam" style="background-color: #7392e5;padding: 10px 10px 20px 10px">
                        <select name="status" class="form-control" required style="border: none;border-radius: 0px;">
                            <option value="">-- Pilih Status --</option>
                            <option value="1">Diterima</option>
                            <option value="2">Ditolak</option>
                        </select>
                    </div>
                    <label style="text-align: center; margin:0;">Tanggal</label>
                    <div class="pinjam" style="background-color: #607d8b; padding: 10px 10px 20px 10px"><input type="date" class="form-control" style="border:0;" name="tanggal" value="<?php echo date('Y-m-d') ?>"></div>
                    <input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
                    <button class="btn btn-buy">Pinjam</button>
                </div>
            </div>
        </div>
    </div>
</form>


<?php view('__footer') ?>
<div class="modal-container" id="cariBuku">
    <center>
        <div class="modal">
            <div class="modal-title">Data Buku</div>
            <div class="modal-body">
                <table class="tbl">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($buku as $item) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $item->id_buku ?></td>
                                <td><?php echo $item->judul ?></td>
                                <td><?php echo $item->stok ?></td>
                                <td><a class="selectBuku btn" style="min-width: 25px;" data-id="<?php echo $item->id_buku ?>" data-judul="<?php echo $item->judul ?>" data-stok="<?php echo $item->stok ?>">Pilih</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer"><a class="btn closeModal">Tutup</a></div>
        </div>
    </center>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var no = 1;
        $(document).on('click', '.selectBuku', function() {
            var id = $(this).attr('data-id'),
                judul = $(this).attr('data-judul'),
                stok = $(this).attr('data-stok');
            if ($('#' + id).length == 0) {
                $('#tblBuku tbody').append('<tr data-id="' + id + '"><td>' + no + '</td><td>' + id + '</td><td>' + judul + '</td><td><input type="number" name="jumlah[' + no + ']" class="form-control juml" min="1" max="' + stok + '" value="1" id="' + id + '"></td><td><a class="delBuku btn" style="min-width: 25px;"><i class="fa fa-times"></i></a></td></tr><input type="hidden" name="id[' + no + ']" value="' + id + '">');
                no += 1;
            } else {
                $('#' + id).val(parseInt($('#' + id).val()) + 1);
            }

            $(this).parent().parent().parent().parent().parent().parent().find('.closeModal').click();

        })

        $(document).on('change', 'input.juml', function() {
            var max = parseInt($(this).attr('max'));
            jml = parseInt($(this).val())

            if (jml > max) {
                alert('Melebihi Stok!');
                $(this).val(max);
            }
        })

        $(document).on('click', '.delBuku', function() {
            $(this).parent().parent().remove();
        })

        $('#frmBuku').submit(function() {
            if ($('tr[data-id]').length > 0) {
                if (confirm('Yakin dengan pilihan ini?')) {
                    return true;
                } else {
                    return false;
                }
            } else {
                alert('Belum ada buku!');
                return false;
            }

        })
    });
</script>