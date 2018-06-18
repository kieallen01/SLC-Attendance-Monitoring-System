
<?php
include("back-up.php");
include("../connection.php");
$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_SESSION["user"]." performed database backup ','".date('Y-m-d')."','".date('h:i:s a')."')");


$db_host = 'localhost';
$db_name = 'db_sams';
$db_user = 'root';
$db_pass= '';

$db_backup = new DBBackup();
$db_backup->backup_db($db_host,$db_name,$db_user,$db_pass);

//And here is the class
class DBBackup{

private $db_host;

private $db_name;

private $db_user;

private $db_pass;

public function __construct() {

$this->db_host = "localhost";

$this->db_name = "db_sams";

$this->db_user = "root";

$this->db_pass = "";

}

function backup_db($db_host,$db_name,$db_user,$db_pass){

$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$return = '';

$allTables = array();

$result = $db->prepare("SHOW TABLES");

$result->execute();

$result = $result->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {

$allTables[] = $row['Tables_in_'.$db_name];

}

foreach($allTables as $table){

$result = $db->prepare("SELECT * FROM $table");

$result->execute();

$num_fields = $result->columnCount();

$result = $result->fetchAll(PDO::FETCH_BOTH);

$return.= 'DROP TABLE IF EXISTS '.$table.';';

$row2 = $db->prepare("SHOW CREATE TABLE $table");

$row2->execute();

$row2 = $row2->fetchAll(PDO::FETCH_ASSOC);

$return.= "\n\n".$row2[0]['Create Table'].";\n\n";

foreach ($result as $row) {

$return.= 'INSERT INTO '.$table.' VALUES(';

for($j=0; $j<$num_fields; $j++){

$row[$j] = addslashes($row[$j]);

$row[$j] = str_replace("\n","\\n",$row[$j]);

if (isset($row[$j])) {

$return.= '"'.$row[$j].'"' ;

} else {

$return.= '""';

}

if ($j<($num_fields-1)) { $return.= ','; }

}

$return.= ");\n";

}

$return.="\n\n";

}

$folder = 'backup_files/';

if (!is_dir($folder)){

mkdir($folder, 0777, true);

chmod($folder, 0777);

}

$date = date('m-d-Y-H-i-s', time());

$filename = $folder."db_sams-".$date;

$handle = fopen($filename.'.sql','w+');

fwrite($handle,$return);

fclose($handle);

//create .htaccess file to deny public access to db backups

if(!is_file($folder.'/.htaccess')){

$htaccess = fopen($folder.'/.htaccess','w+');

$htaccessDeny = 'deny from all';

fwrite($htaccess,$htaccessDeny);

fclose($htaccess);

}
}
}
echo '<script>
    setTimeout(function() {
		swal({
		  title: "Backup Database",
		  text: "Press OK to continue.",
		  type: "info",
		  showCancelButton: true,
		  closeOnConfirm: false,
		  showLoaderOnConfirm: true,
		  animation:false
		},
		function(){
		  setTimeout(function(){
		    swal("Backup Successful", "File Location C:/xampp/htdocs/sams/php/backup_files.", "success");
		  }, 2000);
		});
    }, 250);
</script>';
?>

