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
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach($transaksi as $trx): ?>
                                <?php $cek = $this->db->get_where('tb_siswa',['siswa_nis' => $trx['transaksi_siswaid']])->row_array(); ?>
                                <tr>
                                  <td><?php echo $i; ?>.</td>
                                  <td><?php echo $cek['siswa_nama']; ?></td>
                                  <td><?php echo date('d-m-Y', strtotime($trx['transaksi_tgl'])); ?></td>
                                  <td>
                                    <a href="admin/kwitansi/cetak/<?php echo $trx['transaksi_siswaid']; ?>/<?php echo $trx['transaksi_tgl']; ?>" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a>
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