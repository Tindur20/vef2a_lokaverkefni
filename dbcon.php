<?php  
try {
	$source = 'mysql:host=tsuts.tskoli.is;dbname=2811992349_skraningarform';
	$user = '2811992349';
	$password = 'mypassword';

	# tegund og nafn á server, nafn á db og aðgangur
	$conn = new PDO($source, $user, $password);

	# stillum hann af hvernig hann með höndlar villur
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	# Við getum notað exec fyrir INSERT; UPDATE og DELETE
	#  notum utf-8 og gerum það með SQL fyrirspurn exec sendir sql fyrirspurnir til database
	$conn->exec('SET NAMES "utf8"');

}		
catch (PDOException $e) {
	
	echo "tenging tókst ekki". "<br>" . $e->getMessage();
}
?>