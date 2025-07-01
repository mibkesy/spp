<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <base href="<?php echo base_url(); ?>"/>
<style>
table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 5px;
}

th {
  background-color: #4CAF50;
  font-weight: bold;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid grey;
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  border: 1px solid black;
}

.responsive {
  width: 100%;
  height: auto;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<?php if($this->uri->segment(2) == 'pembayaran') { ?>
<body>
<?php }else { ?>
<body onload="printCetak()">
<?php } ?>
  <?php $cek = $this->db->get_where('tb_tahun_pelajaran',['ta_status' => 'AKTIF'])->row_array(); ?>
<h2 style="text-align: center;">KARTU BUKTI PEMBAYARAN SPP DAN DANA <br> TAHUN PELAJARAN <?php echo $cek['ta_tahun']; ?></h2>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th rowspan="2" style="text-align: center;">Bulan</th>
      <th rowspan="2" style="text-align: center;">Dibayar</th>
      <th rowspan="2" style="text-align: center;">SPP</th>
      <th rowspan="2" style="text-align: center;">Infaq</th>
      <th rowspan="2" style="text-align: center;">Dana Akademik</th>
      <th colspan="3" style="text-align: center;">Tagihan</th>
      <th rowspan="2" style="text-align: center;">Total Bayar</th>
    </tr>
    <tr>
      <th style="text-align: center;">Infaq</th>
      <th style="text-align: center;">Dana Akademik</th>
      <th style="text-align: center;">Registrasi</th>
    </tr>
    <tr>
      <?php if($siswaid['ps_juli'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>Juli</td>
        <td><?php echo $siswaid['tgl_juli']; ?></td>
        <td><?php echo number_format($siswaid['ps_juli'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($siswaid['ps_agustus'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>Agustus</td>
        <td><?php echo $siswaid['tgl_agus']; ?></td>
        <td><?php echo number_format($siswaid['ps_agustus'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($siswaid['ps_september'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>September</td>
        <td><?php echo $siswaid['tgl_sep']; ?></td>
        <td><?php echo number_format($siswaid['ps_september'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($siswaid['ps_oktober'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>Oktober</td>
        <td><?php echo $siswaid['tgl_okt']; ?></td>
        <td><?php echo number_format($siswaid['ps_oktober'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($siswaid['ps_november'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>November</td>
        <td><?php echo $siswaid['tgl_nov']; ?></td>
        <td><?php echo number_format($siswaid['ps_november'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($siswaid['ps_desember'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>Desember</td>
        <td><?php echo $siswaid['tgl_des']; ?></td>
        <td><?php echo number_format($siswaid['ps_desember'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($siswaid['ps_januari'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>Januari</td>
        <td><?php echo $siswaid['tgl_jan']; ?></td>
        <td><?php echo number_format($siswaid['ps_januari'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($siswaid['ps_februari'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>Februari</td>
        <td><?php echo $siswaid['tgl_feb']; ?></td>
        <td><?php echo number_format($siswaid['ps_februari'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($siswaid['ps_maret'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>Maret</td>
        <td><?php echo $siswaid['tgl_mar']; ?></td>
        <td><?php echo number_format($siswaid['ps_maret'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($siswaid['ps_april'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>April</td>
        <td><?php echo $siswaid['tgl_apr']; ?></td>
        <td><?php echo number_format($siswaid['ps_april'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($siswaid['ps_mei'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>Mei</td>
        <td><?php echo $siswaid['tgl_mei']; ?></td>
        <td><?php echo number_format($siswaid['ps_mei'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($siswaid['ps_juni'] == '') { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php }else { ?>
        <td>Juni</td>
        <td><?php echo $siswaid['tgl_juni']; ?></td>
        <td><?php echo number_format($siswaid['ps_juni'],0,',','.'); ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } ?>
    </tr>
  </table>
</div>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
