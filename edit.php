<?php
include_once "includes/ez_sql_core.php";
include_once "includes/ez_sql_mysqli.php";
include_once "includes/config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 
	
$contact = $db->get_row("SELECT * FROM $db_table WHERE id='$_GET[id]'");
?>

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Yeni Şarkı</h3>
  </div>
  <div class="panel-body">
    <form name="editContactForm" id="editContactForm" method="post">
      <div class="input-group pull-left">
        <input type="text" name="sarkiadi" class="form-control" placeholder="Şarkı Adı" value="<?php echo $contact->sarkiadi; ?>">
      </div>
      <div class="input-group pull-left">
        <input type="text" name="besteci" class="form-control" placeholder="Besteci" value="<?php echo $contact->besteci; ?>">
      </div>
      <div class="input-group pull-left">
        <input type="text" name="tarih" class="form-control" placeholder="Tarih" value="<?php echo $contact->tarih; ?>">
      </div>
      <input type="hidden" name="id" value="<?php echo $contact->id; ?>"/>
      <button type="button" class="btn btn-sm btn-info pull-left" id="updateButton">Güncelle</button>
  	</form>
  </div>
</div>