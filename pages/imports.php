<?php 
  include('includes/issetSession.php'); 
  require('csv/import.php'); 
  require('json/import_json.php');
?>

  <div class="imports">
    <h3 class="csv">Import CSV</h3>
    <form method="post" name="uploadCsv" enctype="multipart/form-data"    class="form-horizontal">
      <div>
        <input type="file" name="file" accept=".csv">
        <button type="submit" name="import">Import CSV</button>
      </div>
    </form>
    <h3 class="json">Import JSON</h3>
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="jsonFile" accept=".json">
			<button type="submit" name="buttomImport">Import JSON</button>
    </form>
  </div>