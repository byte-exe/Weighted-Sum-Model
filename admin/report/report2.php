<?php require_once('../require/lap_header.php'); 

$colname_rs_search = "-1";
if (isset($_GET['cari'])) {
  $colname_rs_search = $_GET['cari'];
}
mysqli_select_db($koneksi, $database_koneksi);
$query_rs_id = sprintf("SELECT * FROM tb_surat WHERE norujukan = %s", GetSQLValueString($koneksi, $colname_rs_search, "text"));
$rs_id = mysqli_query($koneksi, $query_rs_id) or die(mysqli_error($koneksi));
$row_id = mysqli_fetch_assoc($rs_id);
$totalRows_rs_id = mysqli_num_rows($rs_id); 
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body onload="window.print()">
<style type="text/css">
	.bingkai {
		border : 1px #000 solid;
		padding : 5px 5px;
	}
	.bingkai-awal {
		border : 1px #000 solid;
		padding : 10px 10px;
	}
</style>
<?php if ($totalRows_rs_id > 0) { ?>
<table width="100%">
  <tr>
    <th width="713" rowspan="2" align="left" scope="row"><img src="../../assets/dist/img/bpjs.PNG" width="228" height="47" /></th>
    <th width="140" align="left" scope="row">Kedeputian Wilayah</th>
    <td width="193">&nbsp; <?php echo $row_id['wilayah']; ?></td>
  </tr>
  <tr>
    <th align="left" scope="row">Kantor Cabang</th>
    <td> <?php echo $row_id['cabang']; ?> </td>
  </tr>
</table>
<h4 align="center"><strong>Surat Rujukan FKTP</strong></h4>
<div class="bingkai-awal">
<div class="bingkai">
<table width="100%" height="98">
  <tr>
    <td width="15%" align="left" scope="row">No. Rujukan</td>
    <td width="35%">: <?php echo $row_id['cabang']; ?></td>
    <td width="3%">&nbsp;</td>
    <td width="47%" rowspan="3" align="center"><?php echo $row_id['nobpjs']; ?></td>
  </tr>
  <tr>
    <td align="left" scope="row">FKTP</td>
    <td>: <?php echo $row_id['fktp']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" scope="row">Kabupaten / Kota</td>
    <td>: <?php echo $row_id['kabupaten']; ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<br />
<table width="638" height="78">
  <tr>
    <td width="168" align="left" scope="row">Kepada Yth. TS Dokter</td>
    <td width="458">: <?php echo $row_id['kepada']; ?></td>
  </tr>
  <tr>
    <td align="left" scope="row">Di</td>
    <td>: <?php echo $row_id['di']; ?></td>
  </tr>
</table>
<p>Mohon pemeriksaan dan penangan lebih lanjut pasien :</p>
<table width="100%" height="177">
  <tr>
    <td width="13%" align="left" scope="row">Nama</td>
    <td width="32%">: <?php echo $row_id['nama']; ?></td>
    <td width="7%"> Umur</td>
    <td width="5%">: <?php echo $row_id['umur']; ?></td>
    <td width="2%">&nbsp;</td>
    <td width="12%"><div align="right">Tahun</div></td>
    <td colspan="2">: <?php echo $row_id['tahun']; ?></td>
  </tr>
  <tr>
    <td align="left" scope="row">No. Kartu BPJS</td>
    <td>: <?php echo $row_id['nobpjs']; ?></td>
    <td>Status</td>
    <td>: <?php echo $row_id['stt']; ?></td>
    <td>&nbsp;</td>
    <td><div align="left">Utama/Tanggungan</div></td>
    <td width="20%">: <?php echo $row_id['jk']; ?></td>
    <td width="9%"> ( L / P )</td>
  </tr>
  <tr>
    <td align="left" scope="row">Diagnosa</td>
    <td>: <?php echo $row_id['diagnosa']; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" scope="row">Telah diberikan</td>
    <td>: <?php echo $row_id['diberikan']; ?></td>
    <td>Catatan </td>
    <td colspan="5">: <?php echo $row_id['catatan']; ?></td>
  </tr>
</table>
<p>#alasan</p>
<p>Atas bantuannya, diucapkan terima kasih</p>
<table width="100%" height="119">
  <tr>
    <td width="17%" scope="row">Tgl. Rencana Berkunjung</td>
    <td width="57%">: <?php if ($row_id['tglberkunjung'] == "0000-00-00") {
	echo "";
	}else{
	echo $row_id['tglberkunjung'];
	} ?></td>
    <td width="1%">&nbsp;</td>
    <td width="25%" align="center">Salam Sejawat, <?= $tglsekarang; ?></td>
  </tr>
  <tr>
    <td scope="row">Jadwal Praktek</td>
    <td>: <?php echo $row_id['jadwal']; ?></td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" scope="row">Surat rujukan berlaku 1 [satu] kali kunjungan, berlaku sampai dengan : </td>
    <td>&nbsp;</td>
    <td align="center"><?php echo $row_id['namadokter']; ?></td>
  </tr>
</table>
<p align="center"><hr /></p>
<p align="center"><strong>SURAT RUJUKAN BALIK</strong></p>
<table width="100%" height="347">
  <tr>
    <th width="3%" scope="row">&nbsp;</th>
    <td colspan="5">Teman sejawat Yth,</td>
    <td width="1%">&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td colspan="5">Mohon kontrol selanjutnya penderita</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td width="4%">&nbsp;</td>
    <td width="19%">Nama</td>
    <td colspan="3">: <?php echo $row_id['nama']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>Diagnosa</td>
    <td colspan="3">: ..............................................................................................................</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>Terapi</td>
    <td colspan="3">: ..............................................................................................................</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td colspan="5">Tindak lanjut yang dianjurkan</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td colspan="2"> Pengobatan dengan obat-obatan</td>
    <td width="5%">&nbsp;</td>
    <td width="34%"> Perlu rawat inap</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td colspan="2">..............................................................................................................</td>
    <td>&nbsp;</td>
    <td> Konsultasi selesai</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>Kontrol kembali ke RS tanggal</td>
    <td width="34%">: ..........................................................</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>Lain-lain</td>
    <td>: ..........................................................</td>
    <td>&nbsp; </td>
    <td> ............... tgl ..........................................</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="24%" height="102" align="right">
  <tr>
    <td align="center" scope="row">Dokter RS,</td>
  </tr>
  <tr>
    <td align="center" scope="row">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" scope="row">( ................................................. )</td>
  </tr>
</table>
<br />

<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
 
</div>
<?php } ?>
<?php if ($totalRows_rs_id == 0) { ?>

<div class="alert alert-danger">Oops data tidak ditemukan!</div>
<?php } ?>
</body>

</html> 