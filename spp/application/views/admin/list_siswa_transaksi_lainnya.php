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
                                    <a href="admin/transaksi-lainnya/bayar/<?php echo $sis['siswa_nis']; ?>" class="btn btn-success btn-sm text-white">Bayar</a>
                                    <a href="admin/transaksi-lainnya/detail/<?php echo $sis['siswa_nis']; ?>" class="btn btn-warning btn-sm">Detail</a>
                                    
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