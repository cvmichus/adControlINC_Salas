<?php

	function desencriptar($q){

			$key='ADDCONTROLINCSALAS2020';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
			$result = '';
			$string = base64_decode($q);
			for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
			}
			return $result;

	}

	$encrypted  = 'nLCnpa+3vcfG';
	$encrypted2 = 'ea+npbO4wrW+gXx6hg==';
	$encrypted3 = 'o6I=';
	$encrypted4 = 'caWHs7HDwMO+rp+quqSdtrq1tKU=';

	
	$SERVER =  desencriptar( $encrypted );
	$PASS   =  desencriptar( $encrypted2 );
	$USER   =  desencriptar( $encrypted3 );
	$BASE   =  desencriptar( $encrypted4 );
	

	$info= array('Database'=>$BASE, 'UID'=>$USER, 'PWD'=>$PASS);
	$con= sqlsrv_connect($SERVER, $info);
	if(!$con)
		die( print_r(sqlsrv_errors(),true));
	else
	{
		
	}
	
?>
