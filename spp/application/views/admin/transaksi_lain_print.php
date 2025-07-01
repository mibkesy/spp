<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
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
<body onload="printCetak()">
  <?php $cek = $this->db->get_where('tb_siswa',['siswa_nis' => $this->uri->segment(4)])->row_array();
   ?>
<?php if($keter == '') { ?>
<p style="text-align: center;"><?php echo $title; ?> <br>Atas Nama <?php echo $cek['siswa_nama']; ?></p>
<h5 style="text-align: center;"></h5>
<?php }else { ?>
<h2 style="text-align: center;"><?php echo $title; ?></h2>
<h5 style="text-align: center;">Untuk pembayaran <?php echo $keter; ?></h5>
<?php } ?>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Jumlah</th>
      <th>Ket</th>
    </tr>
    <?php $i = 1; ?>
    <?php $total = 0; ?>
    <?php foreach($transaksi as $trx): ?>
    <?php $total += $trx['trala_jml']; ?>
      <tr>
        <td><?php echo $i; ?>.</td>
        <td><?php echo date('d-m-Y', strtotime($trx['trala_tgl'])); ?></td>
        <td><?php echo number_format($trx['trala_jml'],0,',','.'); ?></td>
        <td><?php echo $trx['trala_ket']; ?></td>
    </tr>
    <?php $i++; ?>
  <?php endforeach; ?>
  <tr>
    <th colspan="2">Total</th>
    <th><?php echo number_format($total,0,',','.'); ?></th>
    <th></th>
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
