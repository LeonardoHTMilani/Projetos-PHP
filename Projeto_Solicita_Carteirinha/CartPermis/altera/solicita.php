<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../config/connora.php");

/* Recebendo dados do formulario html */

$V_CD_PESSOA = $_POST['V_CD_PESSOA'];
$V_NR_CPF = $_POST['V_NR_CPF'];
$V_DT_NASCI  = $_POST['V_DT_NASCI'];
$V_CD_SOLIC_CART = $_POST['V_SOLIC_LIST'];
$orgDate = $V_DT_NASCI;
$date = str_replace('/"','-',$orgDate);
$V_DT_NASCI = date("d/m/Y", strtotime($date));
$v_codi_carteira = "";

	/* 2ª Validação de carteirinha nula. */
	if($V_CD_PESSOA == "")
	{
		echo "Carteirinha não informada.";
	}
	
	/* Validação de carteirinha existente ou não no sistema Solus. */
	$consulta_carteira = "SELECT CCODIUSUA FROM SOLUS.HSSUSUA WHERE HSSUSUA.CSITUUSUA = 'A' AND HSSUSUA.CCODIUSUA = '".$V_CD_PESSOA."'";
	$parse_consulta_carteira = oci_parse($ora_conexao, $consulta_carteira);
	oci_execute($parse_consulta_carteira);
	
	while(oci_fetch($parse_consulta_carteira)){
		$v_codi_carteira = oci_result($parse_consulta_carteira,'CCODIUSUA');		
	}
	if(!$v_codi_carteira){
		
		 echo "Carteirinha não existente.";
	}
	else {

 /* Verifico se houve falha na conexão com o banco de dados. */
    if(!$ora_conexao)
    {
      echo "Falha ao conectar com o banco.";
    }
     else 
          {/* Entra no else caso não exista falha de conexão com o banco. */
        
            
                 /* Executa a inserção de Solicitação de carteirinha que sera validada após 24h no sistema Solus, no cadastro do beneficiario. */
                 
				 $q_insere_solicitacao = "insert into SCGP.CST_CARTEIRINHA_SOLICITADA (ccodiusua, c_cpfusua, dnascusua, csoliccar, ddatsolic) VALUES ('$V_CD_PESSOA','$V_NR_CPF','$V_DT_NASCI','$V_CD_SOLIC_CART', sysdate)";
                 $parse_insere_solicitacao = oci_parse($ora_conexao, $q_insere_solicitacao);
                 oci_execute($parse_insere_solicitacao);
				
					/*Chama a tela de sucesso. */
                 echo '<script type="text/javascript">                 
				 abreTelaSucesso()
                 </script>';
                //  echo "<center><font color='blue'>Solicitação enviada com sucesso.</font></center>";
            
          }
	}

  /* Finaliza a conexao com o banco. */
	oci_close($ora_conexao);

?>
