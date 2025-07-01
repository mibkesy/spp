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
<?php if($mulai == '' AND $sampai == '') { ?>
<h2 style="text-align: center;"><?php echo $title; ?></h2>
<?php }else { ?>
<h2 style="text-align: center;"><?php echo $title; ?></h2>
<h5>Periode <?php echo date('d-m-Y', strtotime($mulai)); ?> s/d <?php echo date('d-m-Y', strtotime($sampai)); ?></h5>
<?php } ?>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Jumlah</th>
      <th>Ket</th>
    </tr>
    <?php $i = 1; ?>
    <?php $total = 0; ?>
    <?php foreach($transaksi as $trx): ?>
    <?php $total += $trx['trala_jml']; ?>
    <?php $cek = $this->db->get_where('tb_siswa',['siswa_nis' => $trx['trala_nis']])->row_array(); ?>
    <?php $kls = $this->db->get_where('tb_kelas',['id' => $cek['siswa_kelas']])->row_array(); ?>
    <tr>
      <td><?php echo $i; ?>.</td>
      <td><?php echo date('d-m-Y', strtotime($trx['trala_tgl'])); ?></td>
      <td><?php echo $cek['siswa_nis']; ?></td>
      <td><?php echo $cek['siswa_nama']; ?></td>
      <td><?php echo $kls['kelas']; ?></td>
      <td><?php echo number_format($trx['trala_jml'],0,',','.'); ?></td>
      <td><?php echo $trx['trala_ket']; ?></td>
    </tr>
    <?php $i++; ?>
  <?php endforeach; ?>
  <tr>
    <th colspan="5">Total</th>
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
