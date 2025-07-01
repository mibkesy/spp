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
                      <div class="panel-header mb-3 ml-3">
                        <a href="admin/pengaturan/tahun-pelajaran/new" class="btn btn-primary">New Data</a>
                      </div>
                        <div class="table table-responsive">
                          <table class="table table-bordered" id="example-table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Tahun Pelajaran</th>
                                <th>Status</th>
                                <th>Aktifkan</th>
                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach($tahun as $tah): ?>
                                <tr>
                                  <td><?php echo $i; ?>.</td>
                                  <td><?php echo $tah['ta_tahun']; ?></td>
                                  <td>
                                    <?php if($tah['ta_status'] == 'AKTIF') { ?>
                                      <span class="badge badge-success"><?php echo $tah['ta_status']; ?></span>
                                    <?php }else { ?>
                                      <span class="badge badge-warning"><?php echo $tah['ta_status']; ?></span>
                                    <?php } ?>
                                  </td>
                                  <td>
                                    <?php if($tah['ta_status'] == 'AKTIF') { ?>
                                    <?php }else { ?>
                                      <a href="admin/pengaturan/tahun-pelajaran/aktif/<?php echo $tah['ta_id']; ?>" class="btn btn-success btn-sm">Aktifkan</a>
                                    <?php } ?>
                                  </td>
                                  <td>
                                    <a href="admin/pengaturan/tahun-pelajaran/edit/<?php echo $tah['ta_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="admin/pengaturan/tahun-pelajaran/hapus/<?php echo $tah['ta_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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