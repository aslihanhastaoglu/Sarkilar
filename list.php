<?php

include_once "ez_sql_core.php";
include_once "ez_sql_mysqli.php";
include_once "config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 

?>

<div id="loading"></div>
<table class="table" id="contactsTable">
    <thead>
      <tr>
        <th>#</th>
        <th>Şarkı Adı</th>
        <th>Besteci</th>
        <th>Tarih</th>
        <th>Durum</th>
      </tr>
    </thead>
    <tbody id="result">

<?php
if (isset($_POST['search'])) {
	$kosul="WHERE sarkiadi LIKE '%".$_POST['search']."%' 
	        OR besteci LIKE '%".$_POST['search']."%' 
	        OR tarih LIKE '%".$_POST['search']."%'";
} else {$kosul='';}

$sqlGet="SELECT * FROM $db_table $kosul ORDER BY id ASC";
$contacts = $db->get_results($sqlGet);

if ($contacts!='') {
    foreach ( $contacts as $contact )	{
?>
  	<tr id="<?php echo $contact->id; ?>">
  		<td><?php echo $contact->id; ?></td>
  		<td><?php echo $contact->sarkiadi; ?></td>
  		<td><?php echo $contact->besteci; ?></td>
  		<td><?php echo $contact->tarih; ?></td>
  		<td>
		    <button type="submit" value="<?php echo $contact->id;?>" class="btn btn-sm btn-info pull-left editButton">Güncelle</button> 
		    <button type="submit" value="<?php echo $contact->id;?>" class="btn btn-sm btn-info pull-left delButton">Sil</button>
  		</td>
  	</tr>
<?php
  	}
  }
?>
	</tbody>
</table>
