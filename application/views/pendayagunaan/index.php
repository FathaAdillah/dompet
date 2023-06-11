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
                        <br>
                        <form action="<?= base_url('Pendayagunaan');?>" class="d-sm-inline-block float-right" method="post">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Keyword..." autocomplete="off" name="keyword">
                            <div class="input-group-append">
                                <input class="btn btn-outline-primary" type="submit" id="button-addon2" name="submit">
                            </div>
                        </div>
                        </form>
                        
                        <div class="table table-responsive">
                        <?= $this->pagination->create_links();?>
                        <h6>Results : <?=$total_rows?></h6>
                                <table class="table table-bordered table-hover" id="" width="150%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="120px">Tanggal</th>
                                            <th>Berita Acara</th>
                                            <th>Kategori</th>
                                            <th width="100px">Penerima Manfaat</th>
                                            <th width="170px">Jumlah</th>
                                            <th>Link Dokumentasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pendayagunaan as $p) :?>
                                        <tr>
                                            <?php $date= $p['tanggal'];
                                             $newDate = date('d M Y', strtotime($date));?>
                                            <td><?= $newDate;?></td>
                                            <td><?= $p['berita_acara']; ?></td>
                                            <td><?= $p['kategori']; ?></td>
                                            <td><?= $p['penerima_manfaat']; ?> Orang</td>
                                            <td>Rp <?= number_format($p['jumlah'],0,","); ?></td>
                                            <td ><a class="btn btn-success mr-1" href="<?= $p['link_dokumentasi']; ?>">Link Bukti</a></td>
                                            <td>
                                                <a href="" class="btn btn-warning dropdown-toggle" id="dropdownButton" data-toggle="dropdown">Action</a>
                                                <div class="dropdown-menu animated--fade-in"
                                                    aria-labelledby="dropdownButton">
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#editPendayagunaan<?=$p['id'];?>" href="<?=$p['id'];?>" >Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        
                                        <!-- Edit -->

                                    <div class="modal fade" id="editPendayagunaan<?=$p['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <input id="id" name="id" value="<?=$p['id']; ?>" type="hidden" class="" autocomplete="off">
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?=$p['tanggal']; ?>" name="tanggal" class="form-control" data-provide="datepicker" placeholder="yyyy/mm/dd" data-date-format="yyyy-mm-dd" id="tanggal" autocomplete="off">
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
                                                        <?php foreach ($kategori as $k): ?>
                                                        <?php if( $k == $pendayagunaan['kategori'] ) : ?>
                                                            <option value="<?= $k; ?>" selected><?= $k; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $k; ?>"><?= $k; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="penerima_manfaat">Penerima Manfaat</label>
                                                    <input type="text" class="form-control" value="<?=$p['penerima_manfaat']; ?>" name="penerima_manfaat" id="penerima_manfaat" placeholder="0 Orang" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ml-auto">
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah</label>
                                                    <input id="jumlah" name="jumlah" value="<?=$p['jumlah']; ?>" type="text" class="form-control input-number"  placeholder="Rp 0,000" autocomplete="off">
                                                    <script>$('.input-number').number( true, 2 );</script>
                                                </div>
                                                <div class="form-group">
                                                    <label for="link_dokumentasi">Link Dokumentasi</label>
                                                    <input type="text" name="link_dokumentasi" value="<?=$p['link_dokumentasi']; ?>" class="form-control" id="link_dokumentasi" placeholder="Link" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="berita_acara">Berita Acara</label>
                                                    <textarea type="text" name="berita_acara"  class="form-control" id="berita_acara" placeholder=""><?=$p['berita_acara']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="ubah" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                                </div>
                            </div>
                        </div><?php endforeach; ?>
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
                          
                        </div>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">   
                            <h6 class="m-0 font-weight-bold text-primary">Fitur Total Pendayagunaan</h6>
                            </div>
                            <div class="card-body">
                                <div class="float-left d-inline-flex">
                                    <div class="form-group mr-2">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                        <?php foreach( $bulan as $b ) : ?>
                                                <option value="<?= $b; ?>" selected><?= $b; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group mr-2">
                                        <?php
                                            $now=date('Y');
                                            echo "<select class='form-control' id='exampleFormControlSelect1' name=’tahun’>";
                                            for ($a=2020;$a<=$now;$a++)
                                            {
                                                echo "<option value='$a'>$a</option>";
                                            }
                                            echo "</select>";
                                            ?> 
                                    </div>  
                                </div>
                                <a class="btn btn-primary">Submit</a>
                                <div class="float-right">
                                <b>Total : Rp <?= number_format($total,0,","); ?></b>
                            </div>
            </div>
        </div>