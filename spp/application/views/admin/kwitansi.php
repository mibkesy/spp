<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <base href="<?php echo base_url(); ?>"/>
<style>
body{
background:#eee;
margin-top:20px;
}
.text-danger strong {
          color: #9f181c;
    }
    .receipt-main {
      background: #ffffff none repeat scroll 0 0;
      border-bottom: 12px solid #333333;
      border-top: 12px solid #9f181c;
      margin-top: 10px;
      margin-bottom: 10px;
      padding: 30px 20px !important;
      position: relative;
      box-shadow: 0 1px 21px #acacac;
      color: #333333;
      font-family: open sans;
    }
    .receipt-main p {
      color: #333333;
      font-family: open sans;
      line-height: 1.42857;
    }
    .receipt-footer h1 {
      font-size: 15px;
      font-weight: 400 !important;
      margin: 0 !important;
    }
    .receipt-main::after {
      background: #414143 none repeat scroll 0 0;
      content: "";
      height: 5px;
      left: 0;
      position: absolute;
      right: 0;
      top: -13px;
    }
    .receipt-main thead {
      background: #414143 none repeat scroll 0 0;
    }
    .receipt-main thead th {
      color:#fff;
    }
    .receipt-right h5 {
      font-size: 16px;
      font-weight: bold;
      margin: 0 0 7px 0;
    }
    .receipt-right p {
      font-size: 12px;
      margin: 0px;
    }
    .receipt-right p i {
      text-align: center;
      width: 18px;
    }
    .receipt-main td {
      padding: 9px 20px !important;
    }
    .receipt-main th {
      padding: 10px 17px !important;
    }
    .receipt-main td {
      font-size: 13px;
      font-weight: initial !important;
    }
    .receipt-main td p:last-child {
      margin: 0;
      padding: 0;
    } 
    .receipt-main td h2 {
      font-size: 20px;
      font-weight: 900;
      margin: 0;
      text-transform: uppercase;
    }
    .receipt-header-mid .receipt-left h1 {
      font-weight: 100;
      margin: 34px 0 0;
      text-align: right;
      text-transform: uppercase;
    }
    .receipt-header-mid {
      margin: 24px 0;
      overflow: hidden;
    }
    
    #container {
      background-color: #dcdcdc;
    }
</style>
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<!-- <body> -->
<body onLoad="printCetak()">
<div class="col-md-12">   
 <div class="row">
    <?php $ceksis = $this->db->get_where('tb_siswa',['siswa_nis' => $transaksi['transaksi_siswaid']])->row_array(); ?>
    <?php $cekls = $this->db->get_where('tb_kelas',['id' => $ceksis['siswa_kelas']])->row_array(); ?>
    <?php $cektrabu = $this->db->get_where('tb_transaksi_bulan',['trabu_transaksiid' => $transaksi['transaksi_id']])->row_array(); ?>
    <?php $cekbulan = $this->db->get_where('tb_bulan',['bulan_id' => $cektrabu['trabu_bulan']])->row_array(); ?>
    <?php $cekinfaq = $this->db->get_where('tb_biaya_infaq',['binf_siswaid' => $transaksi['transaksi_siswaid']])->row_array(); ?>
    <?php $cekakdm = $this->db->get_where('tb_biaya_akademik',['baka_kelas' => $ceksis['siswa_kelas']])->row_array(); ?>
    <?php $cekreg = $this->db->get_where('tb_biaya_registrasi',['bare_kelas' => $ceksis['siswa_kelas']])->row_array(); ?>
    <?php $tag1 = $transaksi['tratagih_infaq']; ?>
    <?php $tag2 = $transaksi['tratagih_akademik']; ?>
    <?php $tag3 = $transaksi['tratagih_registrasi']; ?>
    <?php $totaltag = $tag1+$tag2+$tag3; ?>
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
          <div class="receipt-header">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="receipt-left">
              <img class="img-responsive" alt="iamgurdeeposahan" src="assets/img/logo-sma-lazuardi.png" style="width: 31px; border-radius: 43px;">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 text-right">
            <div class="receipt-right">
              <h5>SMA Lazuardi GCS Depok</h5>
            </div>
          </div>
        </div>
            </div>
      
      <div class="row">
        <div class="receipt-header receipt-header-mid">
          <div class="col-xs-8 col-sm-8 col-md-8 text-left">
            <div class="receipt-right">
              <h5><?php echo $ceksis['siswa_nama']; ?> </h5>
              <p><b>NIS :</b> <?php echo $transaksi['transaksi_siswaid']; ?></p>
              <p><b>Kelas :</b> <?php echo $cekls['kelas']; ?></p>
              <p><b>Tanggal :</b> <?php echo $transaksi['transaksi_tgl']; ?></p>
            </div>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="receipt-left">
              <h3><?php echo $title; ?></h3>
            </div>
          </div>
        </div>
            </div>
      
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Tagihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-6">SPP bulan <?php echo $cekbulan['bulan_nama']; ?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo number_format($transaksi['transaksi_spp'],0,',','.'); ?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> 0</td>

                        </tr>
                        <tr>
                            <td class="col-md-6">Infaq</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo number_format($transaksi['transaksi_infaq'],0,',','.'); ?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo number_format($transaksi['tratagih_infaq'],0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-6">Akademik</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo number_format($transaksi['transaksi_akademik'],0,',','.'); ?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo number_format($transaksi['tratagih_akademik'],0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-6">Registrasi</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo number_format($transaksi['transaksi_registrasi'],0,',','.'); ?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo number_format($transaksi['tratagih_registrasi'],0,',','.'); ?></td>
                        </tr>
                        <tr>
                           
    <?php $totaltra = $transaksi['transaksi_spp']+$transaksi['transaksi_infaq']+$transaksi['transaksi_akademik']+$transaksi['transaksi_registrasi']; ?>
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> <?php echo number_format($totaltra,0,',','.'); ?></strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> <?php echo number_format($totaltag,0,',','.'); ?></strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
      
      <div class="row">
        <div class="receipt-header receipt-header-mid receipt-footer">
          <div class="col-xs-8 col-sm-8 col-md-8 text-left">
            <div class="receipt-right">
              <h1>Stamp</h1>
            </div>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="receipt-left">
              <p><b>Depok </b> <?php echo date('d-m-Y'); ?><br>
                <b>Bendahara</b></p><br><br><br>
              <h5 style="color: rgb(140, 140, 140);"><?php echo $me['admin_nama']; ?></h5>
            </div>
          </div>
        </div>
            </div>
      
        </div>    
  </div>
</div>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
