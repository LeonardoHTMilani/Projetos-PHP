<?php

$ora_user = "#OWNER"; 
$ora_senha = "#SENHA"; 
$ora_bd = "(DESCRIPTION =
			(ADDRESS_LIST =
			(ADDRESS = (PROTOCOL = TCP)(HOST = #HOSTNAME )(PORT = #PORTA ))
			)
			(CONNECT_DATA =
			(SERVICE_NAME = #DATABASE)
			)
		)";
		
if ($ora_conexao = OCILogon($ora_user,$ora_senha,$ora_bd,'AL32UTF8') )
{
	//echo "Conex�o bem sucedida. Usu�rio conectado: ".$ora_user."<br>";
	//echo $ora_conexao;

}else														   
{
	echo "Erro na conex�o com o Oracle.".oci_error();					   
}	
?>