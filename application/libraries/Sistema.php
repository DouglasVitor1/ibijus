<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sistema  {
	
	protected $CI;
	public $tema = array();

	public  function __construct(){
		
		$this->CI =& get_instance();
		$this->CI->load->helper('funcoes');
        //$this->CI->load->helper('boletos/funcoes');
		
	}
	
	public  function enviar_email($para,$assunto,$mensagem, $formato='html'){
		
		$this->CI->load->library('email');
		$config['mailtype']=$formato;
		$this->CI->email->initialize($config);
		$this->CI->email->from('nao-responda@gastrovagas.com.br','Gastro Vagas');
		$this->CI->email->to($para);
		$this->CI->email->subject($assunto);
		$this->CI->email->message($mensagem);
				
		if($this->CI->email->send()){
			
			return TRUE;
		
		}else{
			
			$this->CI->email->print_debugger();
		}
		
	}
	
	public  function enviar_email2($para,$assunto,$mensagem,$reply=null,$nameReply=null,$comcopia=null,$comcopia2=null){
		
		// $this->load->library("my_phpmailer");
		$this->CI->load->library('my_phpmailer');
	   
		$font = "'Roboto'";

		$mail = new PHPMailer();
		$mail->IsSMTP(); //Definimos que usaremos o protocolo SMTP para envio.
		$mail->SMTPDebug = 0;
		$mail->CharSet = 'UTF-8';
		$mail->SMTPAuth = true; //Habilitamos a autentica��o do SMTP. (true ou false)
		$mail->SMTPSecure = "tls"; //Estabelecemos qual protocolo de seguran�a ser� usado.
		$mail->Host = "email-smtp.us-east-1.amazonaws.com"; //Podemos usar o servidor do gMail para enviar.
		$mail->Port = 587; //Estabelecemos a porta utilizada pelo servidor do gMail.
		$mail->Username = "//TODO"; //Usu�rio do gMail
		$mail->Password = "//TODO"; //Senha do gMail
		
		if($reply != null and $nameReply != null){
			$mail->AddReplyTo($reply, $nameReply);
		}
		
		if($comcopia != null and $comcopia != ''){
			//envia cópia do report de erro para editor
			$mail->AddAddress($comcopia, 'Editor Adrenaline');
		}
		
		if($comcopia2 != null and $comcopia2 != ''){
			//envia cópia do report para e-mails listados no cadastro do usu�rio (array com os e-mails)
			foreach($comcopia2 as $destino){
				$mail->AddAddress($destino, $destino);
			}
		}
		
		$mail->SetFrom('nao-responda@gastrovagas.com.br', 'Gastro Vagas'); //Quem est� enviando o e-mail.
		$mail->Subject =  $assunto; //Assunto do e-mail.
		$mail->IsHTML(true); 
		$mail->Body = $mensagem;
		//$mail->AltBody = "Corpo em texto puro.";
		$mail->AddAddress($para);
		 
		/*Também é possível adicionar anexos.*/
		//$mail->AddAttachment("images/phpmailer.gif");
		//$mail->AddAttachment("images/phpmailer_mini.gif");
		
		if (isset($_FILES['arquivo']) &&
			$_FILES['arquivo']['error'] == UPLOAD_ERR_OK) {
			$mail->AddAttachment($_FILES['arquivo']['tmp_name'],
								 $_FILES['arquivo']['name']);
		}
	 
		if(!$mail->Send()) {
			// echo "ocorreu um erro durante o envio: " . $mail->ErrorInfo;
			set_msg('msgerro', $mail->ErrorInfo, 'erro');
		} else {
			set_msg('msgok', 'E-mail enviado.', 'sucesso');
		}
		
	}
	
}