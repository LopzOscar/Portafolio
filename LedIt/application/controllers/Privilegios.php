<?php
	session_start();

	if (!$_SESSION) {
		 redirect('Admin/index/1');
	}else{
		if ($_SESSION['privilegios_Usuario']==0 || $_SESSION['privilegios_Usuario']==1) {
		 redirect('Admin/index/9');
		}elseif($_SESSION['privilegios_Usuario']==2){
		 redirect('ControlFrontEnd/index/1');
		}
	}
}
?>