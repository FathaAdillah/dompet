<div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pendayagunaan</h6>
                        </div>
                        <div class="card-body">
                        <a href="" class="btn btn-primary mb-3">Tambah Data</a>
                        <form action="<?= base_url('Pendayagunaan');?>" method="post">
                            <div class="float-right form-inline">
                                <h6>Search :</h6>
                            <input type="text" class="form-control form-control-sm ml-2 mb-2" placeholder="search keyword..." autocomplete="off" name="keyword">
                            <input class="btn btn-primary btn-sm ml-1 mb-2" type="submit" name="submit">
                            </div>
                        </form> 
                        <div class="table table-responsive">
                        <?= $this->pagination->create_links();?>
                        <h6>Results : <?=$total_rows?></h6>
                                <table class="table table-bordered table-hover" id="" width="150%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="110px">Tanggal</th>
                                            <th>Berita Acara</th>
                                            <th>Kategori</th>
                                            <th width="100px">Penerima Manfaat</th>
                                            <th width="170px">Jumlah</th>
                                            <th width="50px">Link Dokumentasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pendayagunaan as $p) :?>
                                        <tr>
                                            
                                            <td><?= $p['tanggal']; ?></td>
                                            <td><?= $p['berita_acara']; ?></td>
                                            <td><?= $p['kategori']; ?></td>
                                            <td><?= $p['penerima_manfaat']; ?> Orang</td>
                                            <td>Rp <?= number_format($p['jumlah'],0,","); ?></td>
                                            <td ><a class="btn btn-success mr-1" href="<?= $p['link_dokumentasi']; ?>">Link Bukti</a></td>
                                            <td>
                                                <a href="" class="btn btn-warning dropdown-toggle" id="dropdownButton" data-toggle="dropdown">Action</a>
                                                <div class="dropdown-menu animated--fade-in"
                                                    aria-labelledby="dropdownButton">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>Tanggal</th>
                                            <th>Berita Acara</th>
                                            <th>Kategori</th>
                                            <th>Penerima Manfaat</th>
                                            <th>Jumlah</th>
                                            <th>Link Dokumentasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table> 
                            </div>
                            <div class="float-right">
                                <b>Total : Rp <?= number_format($total,0,","); ?></b>
                            </div>
                        </div>
                        </div>
            </div>
        </div>