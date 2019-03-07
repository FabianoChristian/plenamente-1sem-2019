<?php 




/*** ----------------------------
Atenção este trecho  está dando erro de load na linha 5 do autoload
ficará salvo como antigo para teste com GMail ***/

require_once("vendor/autoload.php");

/* apenas dispara o envio do formulário caso exista $_POST['enviarFormulario']*/
 
if (isset($_POST['enviarForm'])){
 
 
/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
 
$enviaFormularioParaNome = 'Fabiano';
$enviaFormularioParaEmail = 'seminarioplenamente@rogomes.com.br';
 
$caixaPostalServidorNome = 'WebSite | Formulário';
$caixaPostalServidorEmail = 'seminarioplenamente@rogomes.com.br';
$caixaPostalServidorSenha = ''; /** incluir senha **/
 
/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
 
 
/* abaixo as veriaveis principais, que devem conter em seu formulario*/
 
$assunto  = $_POST['assunto'];
$remetenteNome  = $_POST['remetenteNome'];
$remetenteSobrenome  = $_POST['remetenteSobrenome'];
$remetenteNascimento  = $_POST['remetenteNascimento'];
$remetenteProfissao  = $_POST['remetenteProfissao'];
$remetenteEstcivil  = $_POST['remetenteEstcivil'];
$remetenteEmail = $_POST['remetenteEmail'];
$remetenteWhats = $_POST['remetenteWhats'];
$remetenteCidade = $_POST['remetenteCidade'];
$remetenteEnd = $_POST['remetenteEnd'];
$remetenteCep = $_POST['remetenteCep'];
$remetenteAlergia = $_POST['remetenteAlergia'];
 
$mensagemConcatenada = 'Formulário gerado via website'.'<br/>'; 
$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
$mensagemConcatenada .= 'Assunto: '.$assunto.'<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
$mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>'; 
$mensagemConcatenada .= 'Sobrenome: "'.$remetenteSobrenome.'"<br/>';
$mensagemConcatenada .= 'E-mail: '.$remetenteEmail.'<br/>'; 
$mensagemConcatenada .= 'WhatsApp: '.$remetenteWhats.'<br/>'; 
$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
$mensagemConcatenada .= 'Data de Nascimento: '.$remetenteNascimento.'<br/>';
$mensagemConcatenada .= 'Profissão: '.$remetenteProfissao.'<br/>';
$mensagemConcatenada .= 'Estado Civil: '.$remetenteEstcivil.'<br/>';
$mensagemConcatenada .= 'Cidade: '.$remetenteCidade.'<br/>';
$mensagemConcatenada .= 'Endereço: '.$remetenteEnd.'<br/>';
$mensagemConcatenada .= 'CEP: '.$remetenteCep.'<br/>';
$mensagemConcatenada .= 'Alergia a alimento: '.$remetenteAlergia.'<br/>';
 
 
/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
 
/* estou alterando por minha conta 

require_once('PHPMailer-master/PHPMailerAutoload.php');

 */
 
$mail = new PHPMailer();
 
$mail->IsSMTP();
$mail->SMTPAuth  = true;
$mail->Charset   = 'utf8_decode()';
$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
$mail->Port  = '587';
$mail->Username  = $caixaPostalServidorEmail;
$mail->Password  = $caixaPostalServidorSenha;
$mail->From  = $caixaPostalServidorEmail;
$mail->FromName  = utf8_decode($caixaPostalServidorNome);
$mail->IsHTML(true);
$mail->Subject  = utf8_decode($assunto);
$mail->Body  = utf8_decode($mensagemConcatenada);
 
 
$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
 
if(!$mail->Send()){
$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
echo $mensagemRetorno;
}else{
header("location: sucessoenvio.html");
/*
$mensagemRetorno = 'sucessoenvio.html';
echo $mensagemRetorno;
*/
} 
 
 
}


 ?>