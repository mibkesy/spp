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
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>SPP Bulan</th>
                                <th>SPP</th>
                                <th>Infaq</th>
                                <th>Akademik</th>
                                <th>Registrasi</th>
                                <th>Tagihan Infaq</th>
                                <th>Tagihan Akademik</th>
                                <th>Tagihan Registrasi</th>
                                <th>Total</th>
                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach($transaksi as $trx): ?>
                                <?php $cek = $this->db->get_where('tb_siswa',['siswa_nis' => $trx['transaksi_siswaid']])->row_array(); ?>
                                <?php $cekls = $this->db->get_where('tb_kelas',['id' => $cek['siswa_kelas']])->row_array(); ?>
                                <?php $trabu = $this->db->get_where('tb_transaksi_bulan',['trabu_transaksiid' => $trx['transaksi_id']])->row_array(); ?>
                                <?php $cekbulan = $this->db->get_where('tb_bulan',['bulan_id' => $trabu['trabu_bulan']])->row_array(); ?>
                                <tr>
                                  <td><?php echo $i; ?>.</td>
                                  <td><?php echo date('d-m-Y', strtotime($trx['transaksi_tgl'])); ?></td>
                                  <td><?php echo $cek['siswa_nis']; ?></td>
                                  <td><?php echo $cek['siswa_nama']; ?></td>
                                  <td><?php echo $cekls['kelas']; ?></td>
                                  <td><?php echo $cekbulan['bulan_nama']; ?></td>
                                  <td><?php echo number_format($trx['transaksi_spp'],0,',','.'); ?></td>
                                  <td><?php echo number_format($trx['transaksi_infaq'],0,',','.'); ?></td>
                                  <td><?php echo number_format($trx['transaksi_akademik'],0,',','.'); ?></td>
                                  <td><?php echo number_format($trx['transaksi_registrasi'],0,',','.'); ?></td>
                                  <td><?php echo number_format($trx['tratagih_infaq'],0,',','.'); ?></td>
                                  <td><?php echo number_format($trx['tratagih_akademik'],0,',','.'); ?></td>
                                  <td><?php echo number_format($trx['tratagih_registrasi'],0,',','.'); ?></td>
                                  <td><?php echo number_format($trx['transaksi_total'],0,',','.'); ?></td>
                                  <td>
                                    <a href="admin/transaksi/hapus/<?php echo $trx['transaksi_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    <button onclick="window.open('admin/transaksi/kwitansi/<?php echo $trx['transaksi_id']; ?>','nama window','width=1000,height=700,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no,resizable=yes,copyhistory=no')" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></button>
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