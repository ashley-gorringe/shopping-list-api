<?php
//All traffic is redirected to this index.php file via the .htaccess file.
require_once dirname($_SERVER['DOCUMENT_ROOT']).'/execute.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']).'/routes.php';
?>
