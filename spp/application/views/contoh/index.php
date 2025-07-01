<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>  
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>HTML Table</h2>

<table>
  <tr>
    <th>Bulan</th>
    <th>Dibayar</th>
    <th>SPP</th>
    <th>Infaq</th>
  </tr>
  <?php foreach($pembayaran as $pby): ?>
    <?php $cek = $this->db->get_where('tb_bulan',['bulan_id' => $pby['pb_bulan']])->row_array(); ?>
  <tr>
    <td>
      <?php if($pby['pb_total'] == '') { ?>
        <?php $cek['bulan_nama']; ?>
      <?php }else { ?>
        <?php echo $cek['bulan_nama']; ?>
      <?php } ?>
    </td>
    <td><?php echo $pby['pb_tanggal']; ?></td>
    <td><?php echo $pby['pb_total']; ?></td>
    <td><?php echo $pby['pb_infaq']; ?></td>
  </tr>
  <?php endforeach; ?>
</table>

</body>
</html>

