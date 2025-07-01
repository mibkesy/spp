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
                        <div class="table table-responsive">
                          <table class="table table-bordered" id="example-table">
                            <thead>
                              <tr>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Aktifkan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach($semester as $sms): ?>
                                <tr>
                                  <td><?php echo $sms['sms_id']; ?></td>
                                  <td>
                                    <?php if($sms['sms_status'] == 'AKTIF') { ?>
                                      <span class="badge badge-success"><?php echo $sms['sms_status']; ?></span>
                                    <?php }else { ?>
                                      <span class="badge badge-warning"><?php echo $sms['sms_status']; ?></span>
                                    <?php } ?>
                                  </td>
                                  <td>
                                    <?php if($sms['sms_status'] == 'AKTIF') { ?>
                                    <?php }else { ?>
                                      <a href="admin/pengaturan/semester/aktif/<?php echo $sms['sms_id']; ?>" class="btn btn-success btn-sm">Aktifkan</a>
                                    <?php } ?>
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

            