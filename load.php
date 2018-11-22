 <?php

session_start();

include ("includes/db.php");

include ("funciones/funciones.php");

switch ($_REQUEST['sAction']) {

	default:

		getProductos();

		break;

	case 'getPaginator';

		getPaginator();

		break;

}

?>