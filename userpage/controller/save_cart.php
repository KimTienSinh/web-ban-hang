<?php
	session_start();
		if(isset($_POST['save'])){
			for( $i = 0; $i<count($_POST['indexes']); $i++){
				$_SESSION['qty_array'][$i] = $_POST['sl_'.$i];
			}
			header('location: ../view/shopping-cart.php');
		}
?>

