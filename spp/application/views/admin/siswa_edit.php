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
                                        <div class="form-group col-md-6">
                                            <label>NIS</label>
                                            <input class="form-control" type="text" name="nis" value="<?php echo $siswaid['siswa_nis'] ?>" autofocus="">
                                            <small class="text-danger"><?php echo form_error('nis'); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                           <label>Nama</label>
                                            <input class="form-control" type="text" name="nama" value="<?php echo $siswaid['siswa_nama']; ?>">
                                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Jenis Kelamin</label>
                                            <select name="jk" class="form-control">
                                                <?php if($siswaid['siswa_jk'] == 'Laki-Laki') { ?>
                                                    <option value="Laki-Laki" selected="">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                <?php }else { ?>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan" selected="">Perempuan</option>
                                                <?php } ?>
                                            </select>
                                            <small class="text-danger"><?php echo form_error('jk'); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                           <label>Kelas</label>
                                            <select name="kelas" class="form-control">
                                                <?php foreach($kelas as $kls): ?>
                                                <option <?php if($siswaid['siswa_kelas'] == $kls['id']) {echo 'selected="selected"'; } ?> value="<?php echo $kls['id']; ?>"><?php echo $kls['kelas']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger"><?php echo form_error('kelas'); ?></small>
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