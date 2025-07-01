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
                                        <div class="form-group col-md-4">
                                            <label>Siswa</label>
                                            <input type="text" class="form-control" value="<?php echo $siswa['siswa_nama']; ?>" readonly>
                                            <small class="text-danger"><?php echo form_error('siswa'); ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Tahun Pelajaran</label>
                                            <select name="tahun" class="form-control">
                                                <?php foreach($tahun as $ta): ?>
                                                <option <?php if($trx['transaksi_ta'] == $ta['ta_tahun']) {echo 'selected="selected"'; } ?> value="<?php echo $ta['ta_tahun']; ?>"><?php echo $ta['ta_tahun']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger"><?php echo form_error('tahun'); ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Tanggal</label>
                                            <input class="form-control" type="date" max="<?php echo date('Y-m-d'); ?>" name="tanggal" value="<?php echo $trx['transaksi_tgl']; ?>">
                                            <small class="text-danger"><?php echo form_error('tanggal'); ?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>SPP</label>
                                            <input class="form-control" type="text" name="spp" value="<?php echo $spp['bspp_biaya']; ?>" readonly>
                                            <small class="text-danger"><?php echo form_error('spp'); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Bulan</label>
                                            <select name="bulan" class="form-control">
                                                <?php foreach($bulan as $bln): ?>
                                                <option <?php if($trabu['trabu_bulan'] == $bln['bulan_id']) {echo 'selected="selected"'; } ?> value="<?php echo $bln['bulan_nama']; ?>"><?php echo $bln['bulan_nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger"><?php echo form_error('bulan'); ?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Infaq</label>
                                            <input class="form-control" type="text" name="infaq" value="<?php echo $trx['transaksi_infaq']; ?>">
                                            <small class="text-danger"><?php echo form_error('infaq'); ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Akademik</label>
                                            <input class="form-control" type="text" name="akademik" value="<?php echo $trx['transaksi_akademik']; ?>">
                                            <small class="text-danger"><?php echo form_error('akademik'); ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Registrasi</label>
                                            <input class="form-control" type="text" name="registrasi" value="<?php echo $trx['transaksi_registrasi']; ?>">
                                            <small class="text-danger"><?php echo form_error('registrasi'); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-warning" type="button" onclick="goBack();">Batal</button>
                                        <button class="btn btn-info" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>