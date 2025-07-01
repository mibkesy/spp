
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $csiswa; ?></h2>
                                <div class="m-b-5">Siswa</div><i class="ti-user widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $ckelas; ?></h2>
                                <div class="m-b-5">Kelas</div><i class="fa fa-cube widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($this->session->flashdata('error')): ?>
              <div class="alert alert-danger">
                  <strong><i class="fa fa-times-circle"></i></strong> <?php echo $this->session->flashdata('error'); ?>
              </div>
              <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Transaksi Terakhir</div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Dari/Wali</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($transaksi as $tra): ?>
                                            <?php $ceksis = $this->db->get_where('tb_siswa',['siswa_nis' => $tra['transaksi_siswaid']])->row_array(); ?>
                                            <tr>
                                                <td><?php echo $i; ?>.</td>
                                                <td><?php echo date('d-m-Y', strtotime($tra['transaksi_tgl'])); ?></td>
                                                <td><?php echo $ceksis['siswa_nama']; ?></td>
                                                <td><?php echo number_format($tra['transaksi_total'],0,',','.'); ?></td>
                                            </tr>   
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Kalender</div>
                            </div>
                            <div class="ibox-body">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <style>
                    .visitors-table tbody tr td:last-child {
                        display: flex;
                        align-items: center;
                    }

                    .visitors-table .progress {
                        flex: 1;
                    }

                    .visitors-table .progress-parcent {
                        text-align: right;
                        margin-left: 10px;
                    }
                </style>
            </div>