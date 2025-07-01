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
                      <div class="panel-header mb-3 ml-3">
                        <a href="admin/agenda/new" class="btn btn-primary">New Data</a>
                      </div>
                        <div class="table table-responsive">
                          <table class="table table-bordered" id="example-table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Agenda</th>
                                <th>Mulai/Selesai</th>
                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach($agenda as $ag): ?>
                                <tr>
                                  <td><?php echo $i; ?>.</td>
                                  <td>
                                    <?php if($ag['sec_dateend'] == '0000-00-00') { ?>
                                      <?php echo date('d-m-Y', strtotime($ag['sec_datestart'])); ?>
                                    <?php }else { ?>
                                      <?php echo date('d-m-Y', strtotime($ag['sec_datestart'])); ?> s/d <?php echo date('d-m-Y', strtotime($ag['sec_dateend'])); ?>
                                    <?php } ?>
                                  </td>
                                  <td><?php echo $ag['title']; ?></td>
                                  <td><?php echo $ag['timestart']; ?> s/d <?php echo $ag['timeend']; ?></td>
                                  <td>
                                    <a href="admin/agenda/edit/<?php echo $ag['id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="admin/agenda/hapus/<?php echo $ag['id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

            