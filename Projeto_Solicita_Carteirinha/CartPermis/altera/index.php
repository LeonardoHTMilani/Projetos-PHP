<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
    
   
  <title>Solicitação de Carteirinha</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	

<!-- O java script a seguir tem por objetivo validar o conteúdo dos campos e ... -->

<script>


		function valida() {

			if (document.form.V_CD_PESSOA.value=="")
				{
					elemento = document.getElementById('mensagem');
					elemento.innerHTML = '<div id="textosRetorno"><font color="red"><b>Informe a carteirinha do paciente</b></font><div>';
					document.form.V_CD_PESSOA.focus();

        } else if (document.form.V_NR_CPF.value=="") {
					elemento = document.getElementById('mensagem');
					elemento.innerHTML = '<div id="textosRetorno"><font color="red"><b>Informe o CPF</b></font><div>';
					document.form.V_NR_CPF.focus();

        } else if (document.form.V_DT_NASCI.value=="") {
					elemento = document.getElementById('mensagem');
					elemento.innerHTML = '<div id="textosRetorno"><font color="red" ><b>Informe a data de nascimento</b></font><div>';
					document.form.V_DT_NASCI.focus();

				} /*else if (document.V_SOLIC_LIST.value == ""){ 
					elemento = document.getElementById('mensagem');
					elemento.innerHTML = '<div id="textosRetorno"><font color="red" ><b>Informe a opção de solicitação</b></font><div>';
					document.form.V_SOLIC_LIST.focus(); }*/
				
				else {
				

				   $("#mensagem").load('./solicita.php',{
                             'V_CD_PESSOA':document.getElementById('V_CD_PESSOA').value,
                             'V_NR_CPF':document.getElementById('V_NR_CPF').value,
                             'V_DT_NASCI':document.getElementById('V_DT_NASCI').value,
							 'V_SOLIC_LIST':document.getElementById('V_SOLIC_LIST').value,		
							 });
				}
		}

	
	
	function mascara(campo,e,tipo){
		var kC = (document.all) ? event.keyCode : e.keyCode;
		var data = campo.value;

		switch(tipo){
			case'data':
				 var mydata = ''; 
				  mydata = mydata + data; 
				  if (mydata.length == 2){ 
					  mydata = mydata + '/';
					  document.forms['form'].datacons.value = mydata; 
				  } 
				  if (mydata.length == 5){ 
					  mydata = mydata + '/'; 
					   document.forms['form'].datacons.value = mydata; 
				  } 
				  if (mydata.length == 10){ 
					  verifica_data(); 
				  } 
			break;
			case'numero':
				var ponto=/[,]/g;
				var regex=/[^0-9]/g;
					campo.value=campo.value.replace(regex,'');
					campo.value=campo.value.replace(ponto,'.');
				
				break;
			case'text':var regex=/\d/g;break;
		}
		
	}
				/* Mascara para a data.*/
function mascaraData( campo, e )
{
	var kC = (document.all) ? event.keyCode : e.keyCode;
	var data = campo.value;
	
	if( kC!=8 && kC!=46 )
	{
		if( data.length==2 )
		{
			campo.value = data += '/';
		}
		else if( data.length==5 )
		{
			campo.value = data += '/';
		}
		else
			campo.value = data;
	}
}
   /* Função fecha a tela */
function fechaTela(){
	window.close();
}

function mascaraData(){
	$(document).ready(function () {
});
}
		/* Função para abrir a tela de sucesso após oci_execute, com temporizador para fechar a tela usando a função fechaTela.*/
function abreTelaSucesso(){
	document.getElementById("corpoGeral").innerHTML = "<div style='font-size:25px; vertical-align: middle; text-align: center;margin-top:35%;'> Solicitação enviada com <br> <a style='font-size:35px; color:green;' >SUCESSO!</a> <br><br> <a style='font-size:25px; color:red;'>Você tem até 24 horas para editar sua solicitação.</a> <br> <a style='font-size:20px;'><br>Está janela sera fechada em 60 segundos...</a> </div ";
	setTimeout(fechaTela, 60000);
}
		/* Mascara para a data de nascimento.*/
function mascaraData2( campo, e )
{
	var kC = (document.all) ? event.keyCode : e.keyCode;
	var data = campo.value;
	
	if( kC!=8 && kC!=46 )
	{
		 if( data.length==2 )
		{
			campo.value = data += '-';
		}
		else if( data.length==5 )
		{
			campo.value = data += '-';
		}
		else if(data.length>=10)
		{
			final = data.length
			campo.value = campo.value
		}
		else
			campo.value = data;
			
	}
}




		
</script>

	<!-- Configuração das classes de style. -->
<style>
#btn_Solicitar{ /* especifica o botão com ID */
    border-collapse: separate;
    color: #3D51B9;
    font-family: "MS Sans Serif";
    font-size: 14px;
	width:103%;
	height: 2rem;
};
#btn_Solicitar:hover { /* Quando passar o mouse em cima do botão */
    border-style: solid;
    border-collapse: separate; /* 'separate' separa as bordas, e 'collapse' fica uma unica borda */
	background-color: #E5F0FF;
    border-width:   0px 1px 1px 0px;
    border-color: gray black black gray;
}
#btn_Solicitar:active{ /* Quando clicar  (ATIVADO) no botão */
    border-style: solid;
	border-collapse: separate;
    text-decoration: underline;
	border-width:   1px 0px 0px 1px;
    border-color: black gray  gray black ;	
}

#textos{ 
	justify-content: center; /* Justifica o texto  */
	text-align:center; /* Alinha o texto no centro  */
	width:100;
	font-size: 17px;
	margin-bottom: 2px;
}
#textosRetorno{
justify-content: center; /* Justifica o texto  */
	text-align:center;
	font-size: 14.8px;
}

#V_NR_CPF,#V_CD_PESSOA{
	width:100%;
	height: 1.5rem;
	font-size:15px
}

.box {
 width: 1%;
 float: left;
 height: 310px; /*Altura da linha*/
}

.linha-vertical {
 border-left: 1px solid; /* Adiciona borda esquerda na div como ser fosse uma linha.*/
 box-sizing: border-box;
}


</style>

</head>

<body>
	
    <div id='corpoGeral' align="center" style='align-items: center'>

      <center><img src="..\img\banner_prestador.png" width="300" name="logo" id="logo">	</center>
	  
      <table border=0 style='border-spacing: 20px;'>
        
        <td width='60'>
         <!-- Formulário com os campos que serão preenchidos no front-end. -->
          <form method="post" action="reinicia.php" name="form" onSubmit="return valida()">
	
			<p id='textos'>Carteirinha</p>
			<input name="V_CD_PESSOA" id="V_CD_PESSOA"  maxlength="16" type="text" required="" OnKeyUp="mascara( this,event,'numero');" />
			<div id="textosRetorno"><font color="red"><b>*Por favor, retirar o primeiro '0' da carteirinha. Ex: 0140.. - 140..</b></font><div>
            <p id='textos'>CPF</p>
            <input name="V_NR_CPF" id="V_NR_CPF"   maxlength="11" type="text" required="" OnKeyUp="mascara( this,event,'numero');" />
            <p id='textos'>Data de Nascimento</p>
	        <input name="V_DT_NASCI" id="V_DT_NASCI" maxlength="10" type="text" class="form-control" OnKeydown="mascaraData2(this,event)" style='width:102%; height: 1.7rem; font-size:15px'/>
			<br>
			<p id='textos'>Deseja que sua carteirinha seja impressa?</p>
			<div style=" text-align:center">
			<select for="solicita" id="V_SOLIC_LIST">
				<option value=" "></option>
				<option value="S">Sim, desejo a impressão de minha carteirinha.</option>
				<option value="N">Não desejo a impressão de minha carteirinha.</option>
			</select>
			
			<!--<input name="rdiobtn" id='V_RD_BTN_S'type="list" value="S">Sim</input>
			<input name="rdiobtn"  id='V_RD_BTN_N' type="radio" value="N">Não</input>-->
			</div>
              <br>
			<center>
              <input  style='width:190px;' id='btn_Solicitar' type="button" value="Solicitar" onclick='valida();'>
            </center>        
              <br><br>
              <div id="mensagem" name="mensagem"></div>
           
           
          </form>
        </td>
		<!-- Linha vertical inserida como separador. -->
		<td>

		<div class="box linha-vertical"></div>

		</td>
		<!-- Secção com informações instrutivas sobre o formulário -->
        <td width='300'>
            <div width='50' style='text-align:left'>
			<br>
				Para fazer sua solicitação de carteirinha é simples, vamos te ajudar!<br>
				<br>
				<li style="text-align:justify;">Digite  sua carteirinha, seu CPF e sua Data de Nascimento.</li>
				<li style="text-align:justify;">Selecione se deseja ou não a impressão de sua carteirinha.</li>				
				<li style="text-align:justify;">Após o preenchimento aperte em Confirmar para realizar o envio da solicitação.</li>
				</p>
			</div>
        </td>

      <table>
    </div>

</body>
</html>
