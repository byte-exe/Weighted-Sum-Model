<?php  

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tb_kriteria SET nama_kriteria=%s, bobot_kriteria=%s WHERE id_kriteria=%s",
                       GetSQLValueString($koneksi, $_POST['nama_kriteria'], "text"),
                       GetSQLValueString($koneksi, $_POST['bobot_kriteria'], "double"),
                       GetSQLValueString($koneksi, $_POST['id_kriteria'], "int"));

  mysqli_select_db($koneksi, $database_koneksi);
  $Result1 = mysqli_query($koneksi, $updateSQL) or die(mysqli_error($koneksi));
  
  pesan('warning','Data berhasil diubah');
}

$colname_rs_kriteria = "-1";
if (isset($_GET['id_kriteria'])) {
  $colname_rs_kriteria = $_GET['id_kriteria'];
}
mysqli_select_db($koneksi, $database_koneksi);
$query_rs_kriteria = sprintf("SELECT * FROM tb_kriteria WHERE id_kriteria = %s", GetSQLValueString($koneksi, $colname_rs_kriteria, "int"));
$rs_kriteria = mysqli_query($koneksi, $query_rs_kriteria) or die(mysqli_error($koneksi));
$row_rs_kriteria = mysqli_fetch_assoc($rs_kriteria);
$totalRows_rs_kriteria = mysqli_num_rows($rs_kriteria);
?>

<p>UPDATE DATA KRITERIA</p>
<p><a href="?page=kriteria/view" class="btn btn-xs btn-success"><span class="fa fa-eye"> </span> Lihat Data </a></p>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
 <table width="100%" height="157">
    <tr valign="baseline">
      <td><div align="left"><strong>Nama Kriteria</strong></div>
      <input type="text" name="nama_kriteria" value="<?php echo htmlentities($row_rs_kriteria['nama_kriteria'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control input-sm"/></td>
    </tr>
    <tr valign="baseline">
      <td><div align="left"><strong>Nilai Bobot</strong></div>
      <input type="text" name="bobot_kriteria" value="<?php echo htmlentities($row_rs_kriteria['bobot_kriteria'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control input-sm"/></td>
    </tr>
    <tr valign="baseline">
      <td height="48" valign="bottom"><input type="submit" value="Simpan Perubahan" class="btn btn-block btn-warning" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_kriteria" value="<?php echo $row_rs_kriteria['id_kriteria']; ?>" />
</form> 