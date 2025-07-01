<div class="content-wrapper">
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?php echo $title; ?></div>
                    </div>
                    <div class="ibox-body">
                      <form action="" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="row">
                          <div class="form-group col-md-2">
                            <label>Mulai</label>
                            <input type="date" class="form-control" name="start" value="<?php echo $mulai; ?>" required="">
                          </div>
                          <div class="form-group col-md-2">
                            <label>Sampai</label>
                            <input type="date" class="form-control" name="end" value="<?php echo $sampai; ?>" required="">
                          </div>
                          <div class="form-group col-md-8">
                            <label></label>
                            <button type="submit" class="btn btn-primary" style="margin-top: 28px;"><i class="fa fa-eye"></i></button>
                            <?php if($mulai == '' AND $sampai == '') { ?>
                              <a onclick="window.open('admin/laporan/transaksi/print','nama window','width=1000,height=700,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no,resizable=yes,copyhistory=no')" class="btn btn-warning text-white" style="margin-top: 28px;"><i class="fa fa-print"></i></a>
                              <a href="admin/laporan/transaksi/excel" class="btn btn-success" style="margin-top: 28px;"><i class="fa fa-file-excel-o"></i></a>
                            <?php }else { ?>
                              <a onclick="window.open('admin/laporan/transaksi/print/<?php echo $mulai; ?>/<?php echo $sampai; ?>','nama window','width=1000,height=700,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no,resizable=yes,copyhistory=no')" class="btn btn-warning text-white" style="margin-top: 28px;"><i class="fa fa-print"></i></a>
                              <a href="admin/laporan/transaksi/excel/<?php echo $mulai; ?>/<?php echo $sampai; ?>" class="btn btn-success" style="margin-top: 28px;"><i class="fa fa-file-excel-o"></i></a>
                            <?php } ?>
                          </div>
                        </div>
                      </form>
                      <?php if($mulai == '' AND $sampai == '') { ?>
                      <?php }else { ?>
                      <h6 class="mt-2"><?php echo $title; ?> Tanggal <?php echo date('d/m/Y', strtotime($mulai)); ?> Sampai <?php echo date('d/m/Y', strtotime($sampai)); ?></h6>  
                      <?php } ?>
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
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php $totalspp = 0; ?>
                              <?php $totalinfaq = 0; ?>
                              <?php $totalaka = 0; ?>
                              <?php $totalregi = 0; ?>
                              <?php $totaltaginfaq = 0; ?>
                              <?php $totaltagaka = 0; ?>
                              <?php $totaltagregi = 0; ?>
                              <?php $total = 0; ?>
                              <?php foreach($transaksi as $trx): ?>
                              <?php $totalspp += $trx['transaksi_spp']; ?>
                              <?php $totalinfaq += $trx['transaksi_infaq']; ?>
                              <?php $totalaka += $trx['transaksi_akademik']; ?>
                              <?php $totalregi += $trx['transaksi_registrasi']; ?>
                              <?php $totaltaginfaq += $trx['tratagih_infaq']; ?>
                              <?php $totaltagaka += $trx['tratagih_akademik']; ?>
                              <?php $totaltagregi += $trx['tratagih_registrasi']; ?>
                              <?php $total += $trx['transaksi_total']; ?>
                                <?php $cek = $this->db->get_where('tb_siswa',['siswa_nis' => $trx['transaksi_siswaid']])->row_array(); ?>
                                <?php $kls = $this->db->get_where('tb_kelas',['id' => $cek['siswa_kelas']])->row_array(); ?>
                                <?php $trabu = $this->db->get_where('tb_transaksi_bulan',['trabu_transaksiid' => $trx['transaksi_id']])->row_array(); ?>
                                <?php $cekbulan = $this->db->get_where('tb_bulan',['bulan_id' => $trabu['trabu_bulan']])->row_array(); ?>
                                <tr>
                                  <td><?php echo $i; ?>.</td>
                                  <td><?php echo date('d-m-Y', strtotime($trx['transaksi_tgl'])); ?></td>
                                  <td><?php echo $trx['transaksi_siswaid']; ?></td>
                                  <td><?php echo $cek['siswa_nama']; ?></td>
                                  <td><?php echo $kls['kelas']; ?></td>
                                  <td><?php echo $cekbulan['bulan_nama']; ?></td>
                                  <td><?php echo number_format($trx['transaksi_spp'],0,',','.'); ?></td>
                                  <td><?php echo number_format($trx['transaksi_infaq'],0,',','.'); ?></td>
                                  <td><?php echo number_format($trx['transaksi_akademik'],0,',','.'); ?></td>
                                  <td><?php echo number_format($trx['transaksi_registrasi'],0,',','.'); ?></td>
                                  <td><?php echo number_format($trx['transaksi_total'],0,',','.'); ?></td>
                                </tr>
                                <?php $i++; ?>
                              <?php endforeach; ?>
                              <tr>
                                <th colspan="6">Total</th>
                                <th><?php echo number_format($totalspp,0,',','.'); ?></th>
                                <th><?php echo number_format($totalinfaq,0,',','.'); ?></th>
                                <th><?php echo number_format($totalaka,0,',','.'); ?></th>
                                <th><?php echo number_format($totalregi,0,',','.'); ?></th>
                                <th><?php echo number_format($total,0,',','.'); ?></th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>