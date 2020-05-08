<div class="container middle-align">
    <h1>Sorting & Filtering</h1>
    <div class="box">
        <h3>Filter</h3>
        <form method="GET">
            <?php $page = empty(get('page')) ? 1 : abs((int) get('page')); ?>
            <input type="hidden" name="page" value="<?php e($page) ?>">
            <select name="filter">
                <option value="id_buku" <?php e(get('filter') === 'id_buku' ? 'selected' : '') ?>>ID</option>
                <option value="judul" <?php e(get('filter') === 'judul' ? 'selected' : '') ?>>Judul</option>
                <option value="noisbn" <?php e(get('filter') === 'noisbn' ? 'selected' : '') ?>>Noisbn</option>
                <option value="penulis" <?php e(get('filter') === 'penulis' ? 'selected' : '') ?>>Penulis</option>
                <option value="penerbit" <?php e(get('filter') === 'penerbit' ? 'selected' : '') ?>>Penerbit</option>
                <option value="tahun" <?php e(get('filter') === 'tahun' ? 'selected' : '') ?>>Tahun</option>
            </select>
            <input type="text" class="form-input" name="key" placeholder="Cari ..." value="<?php e(get('key')) ?>">

            <h3>Sorting</h3>
            <input type="hidden" name="page" value="<?php e($page) ?>">
            <select name="sort">
                <option value="id_buku" <?php e(get('sort') === 'id_buku' ? 'selected' : '') ?>>ID</option>
                <option value="judul" <?php e(get('sort') === 'judul' ? 'selected' : '') ?>>Judul</option>
                <option value="noisbn" <?php e(get('sort') === 'noisbn' ? 'selected' : '') ?>>Noisbn</option>
                <option value="penulis" <?php e(get('sort') === 'penulis' ? 'selected' : '') ?>>Penulis</option>
                <option value="penerbit" <?php e(get('sort') === 'penerbit' ? 'selected' : '') ?>>Penerbit</option>
                <option value="tahun" <?php e(get('sort') === 'tahun' ? 'selected' : '') ?>>Tahun</option>
            </select>
            <select name="order">
                <option value="asc" <?php e(get('order') === 'asc' ? 'selected' : '') ?>>Ascending</option>
                <option value="desc" <?php e(get('order') === 'desc' ? 'selected' : '') ?>>Descending</option>
            </select>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
    <div class="box">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Noisbn</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                </tr>
                <?php
                try {
                    $limit = 5;
                    $offset = empty(get('page')) ? 0 : (abs((int) get('page')) - 1) * $limit;
                    $filter = empty(get('filter')) ? '' : ' WHERE ' . get('filter') . ' LIKE ? ';
                    $sort = empty(get('sort')) ? '' : ' ORDER BY ' . get('sort') . ' ' . get('order');
                    $key = empty($filter) ? [] : ['%' . get('key') . '%'];

                    // query untuk memanggil isi dari tabel mahasiswa
                    $sql    = "SELECT * FROM buku{$filter}";

                    // prepare query dari sql injection
                    $prep     = $db->prepare($sql);
                    $prep->execute($key);
                    // eksekusi query

                    $max = $prep->rowCount();
                    $jmlPage = ceil($max / $limit);

                    $sql    = "SELECT * FROM buku{$filter}{$sort} LIMIT " . $offset . "," . $limit;
                    $prep2 = $db->prepare($sql);
                    $prep2->execute($key);

                    // konversi data dari table mahasiswa menjadi object dalam php
                    $data    = $prep2->fetchAll(PDO::FETCH_OBJ);
                } catch (PDOException $e) {
                    die("Error : " . $e->getMessage());
                }


                if ($prep2->rowCount()) {
                    // tampilkan data mahasiswa
                    foreach ($data as $item) {
                ?>
                        <tr>
                            <td><?php echo e($item->id_buku) ?></td>
                            <td title="<?php echo $item->judul ?>"><?php echo strlen($item->judul) > 20 ? substr($item->judul, 0, 20) . "..." : e($item->judul)   ?></td>
                            <td><?php echo e($item->noisbn) ?></td>
                            <td><?php echo e($item->penulis) ?></td>
                            <td><?php echo e($item->penerbit) ?></td>
                            <td><?php echo e($item->tahun) ?></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7"><strong>tidak ada data</strong></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <ul class="menu">
            <?php
            $currentPage = empty(get('page')) ? 1 : abs((int) get('page'));
            for ($i = 1; $i < $jmlPage; $i++) {
            ?>
                <li><a <?php echo $currentPage === $i ? 'class="active"' : '' ?> href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>