<?php $cektaon = $this->db->get_where('tb_tahun_pelajaran',['ta_status' => 'AKTIF'])->row_array(); ?>
              <?php $spp = $this->db->get_where('tb_biaya_spp',['bspp_ta' => $cektaon['ta_tahun'],'bspp_siswaid' => $sis['siswa_nis']])->row_array(); ?>
              <?php $infaq = $this->db->get_where('tb_biaya_infaq',['binf_ta' => $cektaon['ta_tahun'],'binf_siswaid' => $sis['siswa_nis']])->row_array(); ?>
              <?php $akademik = $this->db->get_where('tb_biaya_akademik',['baka_ta' => $cektaon['ta_tahun'],'baka_kelas' => $sis['siswa_kelas']])->row_array(); ?>
              <?php $regis = $this->db->get_where('tb_biaya_registrasi',['bare_ta' => $cektaon['ta_tahun'],'bare_kelas' => $sis['siswa_kelas']])->row_array(); ?>
              <?php $cektagihan = $this->db->get_where('tb_tagihan',['tagihan_ta' => $cektaon['ta_tahun'],'tagihan_siswa' => $sis['siswa_nis']])->row_array(); ?>
              <?php $cekstatus = $this->db->get_where('tb_transaksi',['transaksi_ta' => $cektaon['ta_tahun'],'transaksi_siswaid' => $sis['siswa_nis']])->result_array(); ?>
              <?php $lstatus = 0; ?>
              <?php $lstatus2 = 0; ?>
              <?php $lstatus3 = 0; ?>
              <?php foreach($cekstatus as $cst): ?>
              <?php $lstatus += $cst['transaksi_infaq']; ?>
              <?php $lstatus2 += $cst['transaksi_akademik']; ?>
              <?php $lstatus3 += $cst['transaksi_registrasi']; ?>
            <?php endforeach; ?>
        <div class="content-wrapper">
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
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
                                <form action="" method="post">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Siswa</label>
                                                    <input type="text" class="form-control" name="siswa" value="<?php echo $sis['siswa_nama']; ?>" readonly>
                                                    <small class="text-danger"><?php echo form_error('siswa'); ?></small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tanggal</label>
                                                    <input class="form-control" type="date" max="<?php echo date('Y-m-d'); ?>" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                                                    <small class="text-danger"><?php echo form_error('tanggal'); ?></small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Besar Tanggungan Infaq</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input class="form-control" type="text" name="tinfaq" value="<?php echo $infaq['binf_biaya']; ?>" readonly>
                                                    <small class="text-danger"><?php echo form_error('tinfaq'); ?></small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Sisa Infaq yang belum dibayar</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php if($cektagihan['tagihan_infaq'] == 0) { ?>
                                                      <?php if($lstatus == $infaq['binf_biaya']) { ?>
                                                        <input class="form-control" type="text" value="LUNAS" readonly>
                                                      <?php }else { ?>
                                                        <input class="form-control" type="text" name="sinfaq" value="<?php echo $infaq['binf_biaya']; ?>" readonly>
                                                      <?php } ?>
                                                    <?php }else { ?>
                                                    <input class="form-control" type="text" name="sinfaq" value="<?php echo $cektagihan['tagihan_infaq']; ?>" readonly>
                                                    <?php } ?>
                                                    <small class="text-danger"><?php echo form_error('sinfaq'); ?></small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Membayar Sebesar <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="Jika pada kolom Sisa Infaq yang belum dibayar berstatus LUNAS, silahkan kosongkan kolom input ini."></i></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <?php if($cektagihan['tagihan_infaq'] == 0) { ?>
                                                    <input class="form-control" type="number" min="0" name="jinfaq" max="<?php echo $infaq['binf_biaya']; ?>">
                                                    <?php }else { ?>
                                                    <input class="form-control" type="number" min="0" name="jinfaq" max="<?php echo $cektagihan['tagihan_infaq']; ?>">
                                                    <?php } ?>
                                                    <small class="text-danger"><?php echo form_error('jinfaq'); ?></small>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Besar Tanggungan Biaya Akademik</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input class="form-control" type="text" name="takademik" value="<?php echo $akademik['baka_biaya']; ?>" readonly>
                                                    <small class="text-danger"><?php echo form_error('takademik'); ?></small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Sisa Akademik yang belum dibayar</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php if($cektagihan['tagihan_akademik'] == 0) { ?>
                                                      <?php if($lstatus2 == $akademik['baka_biaya']) { ?>
                                                        <input class="form-control" type="text" value="LUNAS" readonly>
                                                      <?php }else { ?>
                                                        <input class="form-control" type="number" name="sakademik" value="<?php echo $akademik['baka_biaya']; ?>" readonly>
                                                      <?php } ?>
                                                    <?php }else { ?>
                                                    <input class="form-control" type="number" name="sakademik" value="<?php echo $cektagihan['tagihan_akademik']; ?>" readonly>
                                                    <?php } ?>
                                                    <small class="text-danger"><?php echo form_error('sakademik'); ?></small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Membayar Sebesar <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="Jika pada kolom Sisa Akademik yang belum dibayar berstatus LUNAS, silahkan kosongkan kolom input ini."></i></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <?php if($cektagihan['tagihan_akademik'] == 0) { ?>
                                                    <input class="form-control" type="number" min="0" name="jakademik" max="<?php echo $akademik['baka_biaya']; ?>">
                                                    <?php }else { ?>
                                                    <input class="form-control" type="number" min="0" name="jakademik" max="<?php echo $cektagihan['tagihan_akademik']; ?>">
                                                    <?php } ?>
                                                    <small class="text-danger"><?php echo form_error('jakademik'); ?></small>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Besar Tanggungan Biaya Registrasi</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input class="form-control" type="text" name="tregistrasi" value="<?php echo $regis['bare_biaya']; ?>" readonly>
                                                    <small class="text-danger"><?php echo form_error('tregistrasi'); ?></small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Sisa Registrasi yang belum dibayar</label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php if($cektagihan['tagihan_registrasi'] == 0) { ?>
                                                      <?php if($lstatus3 == $regis['bare_biaya']) { ?>
                                                        <input class="form-control" type="text" value="LUNAS" readonly>
                                                      <?php }else { ?>
                                                    <input class="form-control" type="text" name="sregistrasi" value="<?php echo $regis['bare_biaya']; ?>" readonly>
                                                      <?php } ?>
                                                    <?php }else { ?>
                                                    <input class="form-control" type="text" name="sregistrasi" value="<?php echo $cektagihan['tagihan_registrasi']; ?>" readonly>
                                                    <?php } ?>
                                                    <small class="text-danger"><?php echo form_error('sregistrasi'); ?></small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Membayar Sebesar <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="Jika pada kolom Sisa Registrasi yang belum dibayar berstatus LUNAS, silahkan kosongkan kolom input ini."></i></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <?php if($cektagihan['tagihan_registrasi'] == 0) { ?>
                                                    <input class="form-control" type="number" min="0" name="jregistrasi" max="<?php echo $regis['bare_biaya']; ?>">
                                                    <?php }else { ?>
                                                    <input class="form-control" type="number" min="0" name="jregistrasi" max="<?php echo $cektagihan['tagihan_registrasi']; ?>">
                                                    <?php } ?>
                                                    <small class="text-danger"><?php echo form_error('jregistrasi'); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>SPP</label>
                                                    <input class="form-control" type="text" name="spp" value="<?php echo $spp['bspp_biaya']; ?>" readonly>
                                                    <small class="text-danger"><?php echo form_error('spp'); ?></small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Bulan<small class="text-danger">*</small></label> <br>
                                                    <?php foreach($bulan as $bln): ?>
                                  <?php $cekbulan = $this->db->get_where('tb_transaksi_bulan',['trabu_bulan' => $bln['bulan_id'], 'trabu_siswa' => $sis['siswa_nis']])->row_array(); ?>
                                  <?php if($cekbulan) { ?>
                                  <?php if($cekbulan['trabu_bulan'] == $bln['bulan_id']) { ?>
                                  <input type="checkbox" id="<?php echo $bln['bulan_id']; ?>" value="<?php echo $bln['bulan_id']; ?>" checked disabled>
                                  <label for="<?php echo $bln['bulan_id']; ?>"> <?php echo $bln['bulan_nama']; ?></label><br>
                                                      <?php }else { ?>
                                                        <input type="checkbox" id="<?php echo $bln['bulan_id']; ?>" name="bulan" value="<?php echo $bln['bulan_id']; ?>">
                                                        <label for="<?php echo $bln['bulan_id']; ?>"> <?php echo $bln['bulan_nama']; ?></label><br>
                                                      <?php } ?>

                                                    <?php }else { ?>
                                                      <input type="checkbox" id="<?php echo $bln['bulan_id']; ?>" name="bulan" value="<?php echo $bln['bulan_id']; ?>">
                                                        <label for="<?php echo $bln['bulan_id']; ?>"> <?php echo $bln['bulan_nama']; ?></label><br>
                                                    <?php } ?>
                                                    <?php endforeach; ?>
                                                    <small class="text-danger">* Hanya pilih salah satu bulan</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <a onclick="window.open('admin/siswa/cetak-transaksi/<?php echo $sis['siswa_nis']; ?>','nama window','width=1000,height=700,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no,resizable=yes,copyhistory=no')" class="btn btn-warning text-white">Cetak semua transaksi</a>
                                        <button type="button" class="btn btn-secondary" onclick="goBack();">Tutup</button>
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin akan melanjutkan?');">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>