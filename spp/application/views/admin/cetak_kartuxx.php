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
      <?php 
          $cekbulan ;
          foreach($siswaid as $sid) {
              $cekbulan[$sid['ps_bulan']] = $this->db->get_where('tb_bulan',['bulan_id' => $sid['ps_bulan']])->row_array();
          }
      ?>
      <?php $listbulan = $this->db->get('tb_bulan')->result_array(); ?>
      <?php foreach($listbulan as $lb): ?>
        <?php if(isset($cekbulan[$lb['bulan_id']])) { ?>
          <tr style="font-size: 12px;">
            <td><?php echo $cekbulan[$lb['bulan_id']]['bulan_nama']; ?></td>
            <td><?php echo date('d-m-Y', strtotime($sid['ps_tanggal'])); ?></td>
            <td><?php echo number_format($sid['ps_jumlah'],0,',','.'); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        <?php }else { ?>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        <?php } ?>
      <?php endforeach; ?>
  </table>
</div>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
