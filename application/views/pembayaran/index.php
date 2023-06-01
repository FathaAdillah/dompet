<div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Metode Pembayaran</h6>
                        </div>
                        <div class="card-body">
                        <a href="" class="btn btn-primary mb-3">Tambah Data</a>
                        <label for="" class="float-right form-inline">
                                <h6>Search :</h6>
                               <input type="search" class="form-control form-control-sm ml-2 mb-1" placeholder="" aria-controls="donaturTable">
                        </label>
                        <div class="table table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Logo</th>
                                            <th>Deskripsi</th>
                                            <th>Rekening</th>
                                            <th>Activation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;?>
                                        <?php foreach ($pembayaran as $p) {
                                            $nama = $p->nama;
                                            $logo = $p->logo;
                                            $deskripsi = $p->deskripsi;
                                            $rekening = $p->rekening;
                                            $isactive = $p->isactive;
                                            
                                         ?>
                                        <tr>
                                            <th scope="row"><?=$i?></th>
                                            <td><?= $nama; ?></td>
                                            <td><img width="80" height="30" src="<?= base_url('assets/logo/'),$logo; ?>" alt=""></td>
                                            <td><?= $deskripsi; ?></td>
                                            <td><?= $rekening; ?></td>
                                            <td><span class="badge badge-secondary align-items-center"><?= $isactive; ?></span></td>
                                            <td>
                                                <a href="" class="btn btn-primary">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Logo</th>
                                            <th>Deskripsi</th>
                                            <th>Rekening</th>
                                            <th>Activation</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                        </div>
                            </div>
                        </div>
            </div>
        </div>