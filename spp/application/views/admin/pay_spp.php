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
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $sis['siswa_nis']; ?>">Bayar</button>
                                    <a href="admin/pembayaran/spp/lihat/<?php echo $sis['siswa_nis']; ?>" target="_blank" class="btn btn-info">Lihat</a>
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
<?php foreach($siswa as $sis): ?>
  <?php $cek = $this->db->get_where('tb_biaya_spp',['bspp_siswaid' => $sis['siswa_nis']])->row_array(); ?>
  <?php $cekpay = $this->db->get_where('tb_pay_bulan',['pb_siswa' => $sis['siswa_nis']])->row_array(); ?>
            <div class="modal fade bd-example-modal-lg" id="exampleModal<?php echo $sis['siswa_nis']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran SPP <?php echo $sis['siswa_nama']; ?></h5>
      </div>
      <div class="modal-body">
        <form action="admin/simpan_pay_spp" method="post" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          <input type="hidden" name="nis" value="<?php echo $sis['siswa_nis']; ?>">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Biaya SPP / Bulan</label>
            <div class="col-sm-9">
              <input type="number" readonly class="form-control" value="<?php echo number_format($cek['bspp_biaya'],0,',','.'); ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Infaq</label>
            <div class="col-sm-9">
              <input type="number" name="infaq" class="form-control" value="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Bulan</label>
            <div class="col-sm-9">
              <?php if($cekpay['pb_bulan'] == 1) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_januari" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_jan" value="<?php echo $cekpay['pb_tanggal']; ?>">
                  <label class="form-check-label">
                    Januari
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_januari" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_jan" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    Januari
                  </label>
                </div>
              <?php } ?>

              <?php if($cekpay['pb_bulan'] == 2) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_februari" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_feb" value="<?php echo $cekpay['pb_tanggal']; ?>">
                  <label class="form-check-label">
                    Februari
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_februari" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_feb" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    Februari
                  </label>
                </div>
              <?php } ?>

              <?php if($cekpay['ps_maret']) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_maret" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_mar" value="<?php echo $cekpay['tgl_mar']; ?>">
                  <label class="form-check-label">
                    Maret
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_maret" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_mar" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    Maret
                  </label>
                </div>
              <?php } ?>

              <?php if($cekpay['ps_april']) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_april" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_apr" value="<?php echo $cekpay['tgl_apr']; ?>">
                  <label class="form-check-label">
                    April
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_april" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_apr" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    April
                  </label>
                </div>
              <?php } ?>

              <?php if($cekpay['ps_mei']) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_mei" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_mei" value="<?php echo $cekpay['tgl_mei']; ?>">
                  <label class="form-check-label">
                    Mei
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_mei" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_mei" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    Mei
                  </label>
                </div>
              <?php } ?>

              <?php if($cekpay['ps_juni']) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_juni" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_juni" value="<?php echo $cekpay['tgl_juni']; ?>">
                  <label class="form-check-label">
                    Juni
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_juni" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_juni" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    Juni
                  </label>
                </div>
              <?php } ?>

              <?php if($cekpay['ps_juli']) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_juli" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_juli" value="<?php echo $cekpay['tgl_juli']; ?>">
                  <label class="form-check-label">
                    Juli
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_juli" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_juli" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    Juli
                  </label>
                </div>
              <?php } ?>

              <?php if($cekpay['ps_agustus']) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_agustus" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_agus" value="<?php echo $cekpay['tgl_agus']; ?>">
                  <label class="form-check-label">
                    Agustus
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_agustus" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_agus" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    Agustus
                  </label>
                </div>
              <?php } ?>

              <?php if($cekpay['ps_september']) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_september" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_sep" value="<?php echo $cekpay['tgl_sep']; ?>">
                  <label class="form-check-label">
                    September
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_september" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_sep" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    September
                  </label>
                </div>
              <?php } ?>

              <?php if($cekpay['ps_oktober']) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_oktober" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_okt" value="<?php echo $cekpay['tgl_okt']; ?>">
                  <label class="form-check-label">
                    Oktober
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_oktober" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_okt" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    Oktober
                  </label>
                </div>
              <?php } ?>

              <?php if($cekpay['ps_november']) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_november" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_nov" value="<?php echo $cekpay['tgl_nov']; ?>">
                  <label class="form-check-label">
                    November
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_november" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_nov" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    November
                  </label>
                </div>
              <?php } ?>

              <?php if($cekpay['ps_desember']) { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_desember" value="<?php echo $cek['bspp_biaya']; ?>" checked>
                  <input type="hidden" name="tgl_des" value="<?php echo $cekpay['tgl_des']; ?>">
                  <label class="form-check-label">
                    Desember
                  </label>
                </div>
              <?php }else { ?>
                <div style="margin-left: 15px;" class="form-check">
                  <input class="form-check-input" type="checkbox" name="ps_desember" value="<?php echo $cek['bspp_biaya']; ?>">
                  <input type="hidden" name="tgl_des" value="<?php echo date('Y-m-d'); ?>">
                  <label class="form-check-label">
                    Desember
                  </label>
                </div>
              <?php } ?>
            </div>
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
<?php endforeach; ?>