<div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                        <h6 class="m-0 font-weight-bold text-primary">Data Pendayagunaan</h6>
                        </div>
                        <div class="card-body">
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPendayagunaan">Tambah Data</a>
                        <div class="modal fade" id="newPendayagunaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pendayagunaan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?=validation_errors(); ?>
                                <form action="<?=base_url('Pendayagunaan')?>" method="post">
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <div class="input-group">
                                                        <input type="text" name="tanggal" class="form-control" data-provide="datepicker" placeholder="yyyy/mm/dd" data-date-format="yyyy-mm-dd" id="tanggal" autocomplete="off">
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fas fa-fw fa-calendar"></i></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">  
                                                    $('.datepicker').datepicker({});
                                                    </script>
                                                <div class="form-group">
                                                    <label for="kategori">Kategori</label>
                                                    <select class="form-control" name="kategori" id="kategori" autocomplete="off">
                                                        <option selected>Choose...</option>
                                                        <option value="Ekonomi">Ekonomi</option>
                                                        <option value="Kesehatan">Kesehatan</option>
                                                        <option value="Pendidikan">Pendidikan</option>
                                                        <option value="Dakwah">Dakwah</option>
                                                        <option value="Sosial">Sosial</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="penerima_manfaat">Penerima Manfaat</label>
                                                    <input type="text" class="form-control" name="penerima_manfaat" id="penerima_manfaat" placeholder="0 Orang" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ml-auto">
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah</label>
                                                    <input id="jumlah" name="jumlah" type="text" class="form-control input-number"  placeholder="Rp 0,000" autocomplete="off">
                                                    <script>$('.input-number').number( true, 2 );</script>
                                                </div>
                                                <div class="form-group">
                                                    <label for="link_dokumentasi">Link Dokumentasi</label>
                                                    <input type="text" name="link_dokumentasi" class="form-control" id="link_dokumentasi" placeholder="Link" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="berita_acara">Berita Acara</label>
                                                    <textarea type="text" name="berita_acara" class="form-control" id="berita_acara" placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                                </div>
                            </div>
                        </div>


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
                                                    <a class="dropdown-item" data-toggle="modal" href="#editPendayagunaan">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <?php endforeach; ?>
                                        <!-- Edit -->
                                        <?php foreach($pendayagunaan as $g) :  ?>
                                    <div class="modal fade" id="editPendayagunaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Pendayagunaan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?=validation_errors(); ?>
                                <form action="<?=base_url('Pendayagunaan')?>" method="post">
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <div class="input-group">
                                                        <input type="text" value="" name="tanggal" class="form-control" data-provide="datepicker" placeholder="yyyy/mm/dd" data-date-format="yyyy-mm-dd" id="tanggal" autocomplete="off">
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fas fa-fw fa-calendar"></i></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">  
                                                    $('.datepicker').datepicker({});
                                                    </script>
                                                <div class="form-group">
                                                    <label for="kategori">Kategori</label>
                                                    <select class="form-control" name="kategori" id="kategori" autocomplete="off">
                                                        <option selected>Choose...</option>
                                                        <option value="Ekonomi">Ekonomi</option>
                                                        <option value="Kesehatan">Kesehatan</option>
                                                        <option value="Pendidikan">Pendidikan</option>
                                                        <option value="Dakwah">Dakwah</option>
                                                        <option value="Sosial">Sosial</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="penerima_manfaat">Penerima Manfaat</label>
                                                    <input type="text" class="form-control" name="penerima_manfaat" id="penerima_manfaat" placeholder="0 Orang" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ml-auto">
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah</label>
                                                    <input id="jumlah" name="jumlah" type="text" class="form-control input-number"  placeholder="Rp 0,000" autocomplete="off">
                                                    <script>$('.input-number').number( true, 2 );</script>
                                                </div>
                                                <div class="form-group">
                                                    <label for="link_dokumentasi">Link Dokumentasi</label>
                                                    <input type="text" name="link_dokumentasi" class="form-control" id="link_dokumentasi" placeholder="Link" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="berita_acara">Berita Acara</label>
                                                    <textarea type="text" name="berita_acara" class="form-control" id="berita_acara" placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                                </div>
                            </div>
                        </div>


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