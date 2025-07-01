<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <base href="<?php echo base_url(); ?>"/>
</head>
<body onLoad="printCetak()">
  <?php $cek = $this->db->get_where('tb_kelas',['id' => $siswa['siswa_kelas']])->row_array(); ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr align="center" valign="top">
      <td width="50%" ><p>&nbsp;</p>
      <p><strong>JANJI PELAJAR
      </strong></p>
      <p><strong><img src="assets/img/bismillah.png" width="20%">      </strong></p>
      <table width="100%" border="0" cellpadding="9">
        <tr>
          <td><p>1. Taqwa terhadap Tuhan Yang Maha Esa </p>
            <p>2. Setia pada Pancasila dan UUD 1945</p>
            <p>3. Mengabdi terhadap tanah air, bangsa dan negara </p>
            <p>4. Adab terhadap orangtua, hormat terhadap guru, serta menjunjung tinggi derajat dan martabat sekolah</p>
            <p>5. Belajar sungguh-sungguh sebagai bekal masa depan bangsa</p>
            <p>6. Berprestasi dalam rangka mengisi kemerdekaan</p>
            <p>7. Mematuhi tata tertib sekolah, mempererat persatuan dan kesatuan di antara pelajar </p></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td width="50%">&nbsp;</td>
          <td>
            <p>Depok, <?php echo date('d M Y'); ?></p>
            <p>Tanda Tangan</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>(<?php echo $siswa['siswa_nama']; ?>)</p></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
      <td width="50%" rowspan="2">
        <table width="100%" height="58" border="0">
          <tr>
            <td>&nbsp;</td>
            <td align="right"></td>
          </tr>
    </table>
        <p><img src="assets/img/logo-sma-lazuardi.png" width="200" height="109">
          <br>
    <strong>KARTU SPP / DANA</strong></p>
        <table style="margin-left: 78px;" width="100%" border="0" cellpadding="2">
          <tr>
            <td width="30%">Nama</td>
            <td >: <?php echo $siswa['siswa_nama']; ?></td>
          </tr>
          <tr>
            <td>No. Induk</td>
            <td>: <?php echo $siswa['siswa_nis']; ?></td>
          </tr>
          <tr>
            <td>Kelas</td>
            <td>: <?php echo $cek['kelas']; ?></td>
          </tr>
        </table>
    <p><strong></strong></p>
    <table width="100%" border="0">
      <tr valign="top">
        <td align="center"><p>Kepala Sekolah</p>
          <p><img src="assets/img/<?php echo $kepsek['ttd']; ?>" width="100"> <br> (<?php echo $kepsek['kepsek']; ?>) <br>NIK. <?php echo $kepsek['nik']; ?></p></td>
      </tr>
    </table></td>
      
    </tr>
   
  </table>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
