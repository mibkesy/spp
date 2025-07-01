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
<body onload="printCetak()">
<div class="col-md-12">   
 <div class="row">
    <?php $ceksis = $this->db->get_where('tb_siswa',['siswa_nis' => $trala['trala_nis']])->row_array(); ?>
    <?php $cekls = $this->db->get_where('tb_kelas',['id' => $ceksis['siswa_kelas']])->row_array(); ?>
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
          <div class="receipt-header">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="receipt-left">
              <img class="img-responsive" alt="iamgurdeeposahan" src="assets/img/logo-smp-muh-1-pwt.png" style="width: 71px; border-radius: 43px;">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 text-right">
            <div class="receipt-right">
              <h5>SMP Muhammadiyah 1 Purwokerto</h5>
            </div>
          </div>
        </div>
            </div>
      
      <div class="row">
        <div class="receipt-header receipt-header-mid">
          <div class="col-xs-8 col-sm-8 col-md-8 text-left">
            <div class="receipt-right">
              <h5><?php echo $ceksis['siswa_nama']; ?> </h5>
              <p><b>NIS :</b> <?php echo $trala['trala_nis']; ?></p>
              <p><b>Kelas :</b> <?php echo $cekls['kelas']; ?></p>
              <p><b>Tanggal :</b> <?php echo $trala['trala_tgl']; ?></p>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-6"><?php echo $trala['trala_ket']; ?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo number_format($trala['trala_jml'],0,',','.'); ?></td>
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
              <p><b>Purwokerto </b> <?php echo date('d-m-Y'); ?><br><b>Bendahara</b></p><br><br><br>
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
