<?php
    try {

        setcookie('userid', "",time() - 3600,"/");
       
		echo "success";
    } catch (\Throwable $e) {
    	echo $e->getMessage();
    }
?>