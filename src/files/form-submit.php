<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './phpmailer/src/Exception.php';
    require './phpmailer/src/PHPMailer.php';
    require './phpmailer/src/SMTP.php';

	ini_set('display_errors', 0);
	// Включение записи ошибок в файл error_log
	ini_set('log_errors', 1);
	// Путь к файлу error_log
	ini_set('error_log', './error_log');

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.beget.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'zayvka@osmino.ru';
    $mail->Password = 'Sonik1980+';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 2525;
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', './phpmailer/language/');
    $mail->IsHTML(true);

    // от кого письмо
    $mail->setFrom('zayvka@osmino.ru', 'osmino');
    // кому отправить
    $mail->addAddress('7615915@mail.ru');
    // тема письмо
    $mail->Subject = 'Обратная связь c сайта osmino';

    // тело письмо
    $body = '<h1>Письмо с сайта osmino</h1>';

    if(trim(!empty($_POST['title']))){
        $body.='<p><strong>Заголовок:</strong> '.$_POST['title'].'</p>';
    }
    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['lastname']))){
        $body.='<p><strong>Фамилия:</strong> '.$_POST['lastname'].'</p>';
    }
    if(trim(!empty($_POST['phone']))){
        $body.='<p><strong>Номер телефона:</strong> '.$_POST['phone'].'</p>';
    }
    if(trim(!empty($_POST['date']))){
        $body.='<p><strong>Удобное время для звонка:</strong> '.$_POST['date'].'</p>';
    }
    if(trim(!empty($_POST['refname']))){
        $body.='<p><strong>Имя и фамилия того, кому вы нас порекомендовали:</strong> '.$_POST['refname'].'</p>';
    }
    if(trim(!empty($_POST['refphone']))){
        $body.='<p><strong>Телефон того, кому вы нас порекомендовали:</strong> '.$_POST['refphone'].'</p>';
    }
    if(trim(!empty($_POST['from']))){
        $body.='<p><strong>Откуда:</strong> '.$_POST['from'].'</p>';
    }
    if(trim(!empty($_POST['where']))){
        $body.='<p><strong>Куда:</strong> '.$_POST['where'].'</p>';
    }
    if(trim(!empty($_POST['ves']))){
        $body.='<p><strong>Вес груза (тн):</strong> '.$_POST['ves'].'</p>';
    }

    $mail->Body = $body;

    // Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];


    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>