<div class="content-wrapper">
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?php echo $title; ?></div>
                    </div>
                    <div class="ibox-body">
                      <?php if($this->session->flashdata('flash')): ?>
                      <div class="alert alert-success">
                          <strong><i class="fa fa-check-circle"></i></strong> <?php echo $this->session->flashdata('flash'); ?>
                      </div>
                      <?php endif; ?>
                      <?php if($this->session->flashdata('error')): ?>
                      <div class="alert alert-danger">
                          <strong><i class="fa fa-times-circle"></i></strong> <?php echo $this->session->flashdata('error'); ?>
                      </div>
                      <?php endif; ?>
                      <div class="panel-header mb-3 ml-3">
                        <a href="admin/siswa/new" class="btn btn-primary">New Data</a>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Import</button>
                        <button onclick="window.open('admin/siswa/kartu-belakang/','nama window','width=1000,height=700,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no,resizable=yes,copyhistory=no')" class="btn btn-success">Kartu Belakang</button>
                      </div>
                        <div class="table table-responsive">
                          <table class="table table-bordered" id="example-table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach($siswa as $sis): ?>
                                <tr>
                                  <td><?php echo $i; ?>.</td>
                                  <td><?php echo $sis['siswa_nis']; ?></td>
                                  <td><?php echo $sis['siswa_nama']; ?></td>
                                  <td><?php echo $sis['siswa_jk']; ?></td>
                                  <td><?php echo $sis['kelas']; ?></td>
                                  <td>
                                    <a href="admin/siswa/edit/<?php echo $sis['siswa_nis']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="admin/siswa/hapus/<?php echo $sis['siswa_nis']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    <button onclick="window.open('admin/siswa/cetak-kartu/<?php echo $sis['siswa_nis']; ?>','nama window','width=1000,height=700,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no,resizable=yes,copyhistory=no')" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                    <a href="admin/siswa/bayar/<?php echo $sis['siswa_nis']; ?>" class="btn btn-success btn-sm">Bayar</a>
                                    <button onclick="window.open('admin/siswa/kartu-depan/<?php echo $sis['siswa_nis']; ?>','nama window','width=1000,height=700,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no,resizable=yes,copyhistory=no')" class="btn btn-warning btn-sm">Kartu Depan</button>
                                    <button onclick="window.open('admin/siswa/tagihan/<?php echo $sis['siswa_nis']; ?>','nama window','width=1000,height=700,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no,resizable=yes,copyhistory=no')" class="btn btn-danger btn-sm">Tagihan</button>
                                    
                                  </td>
                                </tr>
                                <?php $i++; ?>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
                  </div>
                  <div class="modal-body">
                    <form action="admin/action_import" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                      <div class="form-group">
                        <label>File Excel</label>
                        <input type="file" class="form-control" name="userfile" required="">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                    </form>
                </div>
              </div>
            </div>