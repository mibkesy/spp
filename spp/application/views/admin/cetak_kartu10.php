<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php $cek = $this->db->get_where('tb_tahun_pelajaran',['ta_status' => 'AKTIF'])->row_array(); ?>
<!-- <body onLoad="window.print()"> -->

<div align="center">
  <p>&nbsp;</p>
  <br>
  <br>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr align="center">
      <td width="9%" height="60" rowspan="2"><font color="#FFFFFF"><br><br><br></td>
      <td width="12%" rowspan="2"><font color="#FFFFFF"></td>
      <td width="9%" rowspan="2"><font color="#FFFFFF"></td>
      <td width="10%" rowspan="2">&nbsp;</td>
      <td width="10%" rowspan="2"><font color="#FFFFFF"></td>
      <td width="10%" rowspan="2">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td width="14%" rowspan="2">&nbsp;</td>
    </tr>
    <tr align="center">
      <td width="11%">&nbsp;</td>
      <td width="9%">&nbsp;</td>
      <td width="9%">&nbsp;</td>
    </tr>
    <tr align="center">
      <td valign="top"><font size='2' color="ffffff">.</td>
        <td valign="top"></td>
        <td valign="top"></td>
        <td valign="top"></td>
        <td valign="top"></td>
        <td valign="top"></td>
        <td valign="top"></td>
        <td valign="top"></td>
        <td valign="top"></td>
      </tr>
   <?php foreach($bulan as $sis): ?>
  <?php $cek1 = $this->db->get_where('tb_transaksi_bulan',['trabu_bulan' => $sis['bulan_id']])->result_array(); ?>
    <tr align="center">
      <td valign="top"><font size='2'>
        <?php foreach($cek1 as $c1): ?>
            <?php $cek2 = $this->db->get_where('tb_bulan',['bulan_id' => $c1['trabu_bulan']])->row_array(); ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_tgl' => date('Y-m-d'), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
            <?php echo $cek2['bulan_nama']; ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
      </td>
      <td valign="top"><font size='2'>
        <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_tgl' => date('Y-m-d'), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo date('d-m-Y', strtotime($cek3['transaksi_tgl'])); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
      </td>
      <td valign="top"><font size='2'>
        <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_tgl' => date('Y-m-d'), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_spp'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
      </td>
      <td valign="top"><font size='2'>
        <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_tgl' => date('Y-m-d'), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_infaq'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
      </td>
      <td valign="top"><font size='2'>
        <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_tgl' => date('Y-m-d'), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_akademik'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
      </td>
      <td valign="top"><font size='2'>
        <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_tgl' => date('Y-m-d'), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_registrasi'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
      </td>
      <td valign="top"><font size='2'>
        <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_tgl' => date('Y-m-d'), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['tratagih_infaq'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
      </td>
      <td valign="top"><font size='2'>
        <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_tgl' => date('Y-m-d'), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['tratagih_akademik'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
      </td>
      <td valign="top"><font size='2'>
        <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_tgl' => date('Y-m-d'), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['tratagih_registrasi'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
      </td>
      <td valign="top"><font size='2'>
        <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_tgl' => date('Y-m-d'), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_total'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
      </font></td>
    </tr>
<?php endforeach; ?>
  </table>
  <p align="left">&nbsp;</p>
</div>
</body>
</body>
</html>