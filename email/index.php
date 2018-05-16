<?php
    /*require '../PHPMailerAutoload.php';
    $mail = new PHPMailer(true);*/


    /*$mail->isSMTP();
    $mail->Host = 'smtp.sipag.com.br';
    $mail->SMTPAuth = true;
    $mail->Username = 'contato@sipag.com.br';
    $mail->Password = 'senhadoemail';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;*/

$txtname         = $_POST['txtname'];
$txtemail         = $_POST['txtemail'];
$txtphone        = $_POST['txtphone'];
$txtproduct        = $_POST['txtproduct'];
$txtdescription  = $_POST['txtmessage'];

$from = $txtemail;
$headers = "From: " . $from. "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$to = 'alfjuniorbh.web@gmail.com';
$subject = 'Contato pelo site MGGRAF.COM';
$message = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>SIPAG</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#dbdbdb" background="#dbdbdb" style="background:#dbdbdb;padding: 0px;margin: 0px;">
	<table align="center" bgcolor="#ffffff" background="#ffffff" style="background:#ffffff;text-align: center;padding: 10px;" border="0" cellpadding="0" cellspacing="0" width="650">
		<tr>
			<td><img  src="http://www.mggraf.com/img/logo.png" border="0" alt=""></td>
		</tr>
		<tr bgcolor="#ffffff" background="#ffffff" style="background:#ffffff">
			<td><h1 style="font-family: Arial, Helvetica, sans-serif;color: #74C043;font-size: 18px;margin: 30px;margin-bottom: 15px;">Contato recebido pelo site!</h1></td>
		</tr>
		<tr bgcolor="#ffffff" background="#ffffff" style="background:#ffffff">
			<td>
				<p style="font-family: Arial, Helvetica, sans-serif;color: #003C43;font-size: 12px;margin: 15px;text-align: justify!important;"><strong>Nome:</strong> '.$txtname.'</p>
				<p style="font-family: Arial, Helvetica, sans-serif;color: #003C43;font-size: 12px;margin: 15px;text-align: justify!important;"><strong>E-mail:</strong> '.$txtemail.'</p>
				<p style="font-family: Arial, Helvetica, sans-serif;color: #003C43;font-size: 12px;margin: 15px;text-align: justify!important;"><strong>Telefone:</strong> '.$txtphone.'</p>
				<p style="font-family: Arial, Helvetica, sans-serif;color: #003C43;font-size: 12px;margin: 15px;text-align: justify!important;"><strong>Produto:</strong> '.$txtproduct.'</p>
				<p style="font-family: Arial, Helvetica, sans-serif;color: #003C43;font-size: 12px;margin: 15px;text-align: justify!important;"><strong>Mensagem:</strong> '.$txtdescription.'</p>
			</td>
		</tr>
	</table>
</body>
</html>
';
$sended = mail($to,$subject,$message, $headers);				

 //       $mail->AltBody = 'Contato pelo site SIPAG.COM.BR';


if (!$sended) {
	echo 'Nao foi possivel enviar a mensagem.';
} else {
	echo json_decode(true);
}



///validacoes
function validar_cpf($cpf)
{
	$cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
	// Valida tamanho
	if (strlen($cpf) != 11)
		return false;
	// Calcula e confere primeiro dígito verificador
	for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
		$soma += $cpf{$i} * $j;
	$resto = $soma % 11;
	if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Calcula e confere segundo dígito verificador
	for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
		$soma += $cpf{$i} * $j;
	$resto = $soma % 11;
	return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
}

//cnpj
function isCnpjValid($cnpj)
{
   //Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cnpj em diferentes formatos como "00.000.000/0000-00", "00000000000000", "00 000 000 0000 00" etc...
   $j=0;
   for($i=0; $i<(strlen($cnpj)); $i++)
	   {
		   if(is_numeric($cnpj[$i]))
			   {
				   $num[$j]=$cnpj[$i];
				   $j++;
			   }
	   }
   //Etapa 2: Conta os dígitos, um Cnpj válido possui 14 dígitos numéricos.
   if(count($num)!=14)
	   {
		   $isCnpjValid=false;
	   }
   //Etapa 3: O número 00000000000 embora não seja um cnpj real resultaria um cnpj válido após o calculo dos dígitos verificares e por isso precisa ser filtradas nesta etapa.
   if ($num[0]==0 && $num[1]==0 && $num[2]==0 && $num[3]==0 && $num[4]==0 && $num[5]==0 && $num[6]==0 && $num[7]==0 && $num[8]==0 && $num[9]==0 && $num[10]==0 && $num[11]==0)
	   {
		   $isCnpjValid=false;
	   }
   //Etapa 4: Calcula e compara o primeiro dígito verificador.
   else
	   {
		   $j=5;
		   for($i=0; $i<4; $i++)
			   {
				   $multiplica[$i]=$num[$i]*$j;
				   $j--;
			   }
		   $soma = array_sum($multiplica);
		   $j=9;
		   for($i=4; $i<12; $i++)
			   {
				   $multiplica[$i]=$num[$i]*$j;
				   $j--;
			   }
		   $soma = array_sum($multiplica);	
		   $resto = $soma%11;			
		   if($resto<2)
			   {
				   $dg=0;
			   }
		   else
			   {
				   $dg=11-$resto;
			   }
		   if($dg!=$num[12])
			   {
				   $isCnpjValid=false;
			   } 
	   }
   //Etapa 5: Calcula e compara o segundo dígito verificador.
   if(!isset($isCnpjValid))
	   {
		   $j=6;
		   for($i=0; $i<5; $i++)
			   {
				   $multiplica[$i]=$num[$i]*$j;
				   $j--;
			   }
		   $soma = array_sum($multiplica);
		   $j=9;
		   for($i=5; $i<13; $i++)
			   {
				   $multiplica[$i]=$num[$i]*$j;
				   $j--;
			   }
		   $soma = array_sum($multiplica);	
		   $resto = $soma%11;			
		   if($resto<2)
			   {
				   $dg=0;
			   }
		   else
			   {
				   $dg=11-$resto;
			   }
		   if($dg!=$num[13])
			   {
				   $isCnpjValid=false;
			   }
		   else
			   {
				   $isCnpjValid=true;
			   }
	   }
   //Trecho usado para depurar erros.
   /*
   if($isCnpjValid==true)
	   {
		   echo "<p><font color="GREEN">Cnpj é Válido</font></p>";
	   }
   if($isCnpjValid==false)
	   {
		   echo "<p><font color="RED">Cnpj Inválido</font></p>";
	   }
   */
   //Etapa 6: Retorna o Resultado em um valor booleano.
   return $isCnpjValid;			
}