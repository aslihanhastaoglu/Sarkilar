<!DOCTYPE html>
<html lang="tr-TR">

<head>

	<meta charset='UTF-8'/>
	
	<title>Şarkı Listesi</title>
    
	<!-- META -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="tr" />
	<!-- CSS -->
	<link href="bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap-theme.min.css" rel="stylesheet">
	<link href="custom.css" rel="stylesheet">
	<!-- JS -->
	<script src="jquery.min.js"></script>
	<script src="bootstrap.min.js"></script>
	<script src="custom.js"></script>
</head>
<body background="arkaplan.jpg">
	
<!-- DATABASE CONNECTION -->
<?php
	include_once "ez_sql_core.php";
	include_once "ez_sql_mysqli.php";
	include_once "config.php";
	$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
	$db->query("SET NAMES utf8"); 
?>
<!-- //DATABASE CONNECTION -->

<div class="container" role="main">
  <div class="row rc">
    <div class="col-md-7 cc">
      <div class="page-header">
	  <h2>Şarkı Listesi</h2>	
      </div> 
      <div id="actions">
        <button type="button" class="btn btn-sm btn-info" id="ListAll">Tümünü Göster</button>
        <button type="button" class="btn btn-sm btn-info" id="show_new_form">Yeni Şarkı</button>
        <button type="button" class="btn btn-sm btn-info" id="show_search_form">Arama</button>
      </div>
      
      <div id="new_contact" class="forms">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">Yeni Şarkı</h3>
          </div>
          <div class="panel-body">
            <form name="newContactForm" id="newContactForm" method="post">
              <div class="input-group pull-left">
                <input type="text" name="sarkiadi" class="form-control" placeholder="Şarkı Adı">
              </div>
              <div class="input-group pull-left">
                <input type="text" name="besteci" class="form-control" placeholder="Besteci">
              </div>
              <div class="input-group pull-left">
                <input type="text" name="tarih" class="form-control" placeholder="Tarih">
              </div>
              <button type="button" class="btn btn-sm btn-info pull-left" id="addButton">Ekle</button>
          	</form>
          </div>
        </div>
      </div>
      
      <div id="searchBox" class="forms">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title">Ara</h3>
          </div>
          <div class="panel-body">
            <form name="searchForm" id="searchForm" method="post">
          		<div class="input-group pull-left">
                <input type="text" name="search" class="form-control" placeholder="Search">
              </div>
          		<button type="button" class="btn btn-sm btn-info pull-left" id="searchButton">Ara</button>
          	</form>
          </div>
        </div>
      </div>
      
      <div id="edit_contact" class="forms"></div>
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Tümünü Göster</h3>
        </div>
        <div class="panel-body" id="tableList">
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
            <tbody>
              <?php 
                if (!isset($_GET['b'])) { $b=0; } else { $b = $_GET['b']; } 
                if (isset($_POST['search'])) {$kosul=" WHERE sarkiadi LIKE '%".$_POST['search']."%' OR besteci LIKE '%".$_POST['search']."%' OR tarih LIKE '%".$_POST['search']."%'";}
                else	{$kosul='';}
                
                $sql="SELECT * FROM $db_table $kosul ORDER BY id ASC";
                $contacts = $db->get_results($sql);

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
        </div>
      </div>
   
    </div>
  </div>
</div>

</body>
</html>
