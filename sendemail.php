<?php
  class SendEmail {
    public static function SendMail ($to, $toName, $subject, $content) {
      // $api_key = $_ENV['API_KEY'];
      $api_key = getenv('API_KEY');
      $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $api_key);
      
      $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
        new GuzzleHttp\Client(),
        $config
      );

      $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
      $sendSmtpEmail['subject'] = $subject;
      $sendSmtpEmail['htmlContent'] = $content;
      $sendSmtpEmail['sender'] = array('name' => 'Shubhang Gupta', 'email' => 'shubhsahu1805@gmail.com');
      $sendSmtpEmail['to'] = array(
        array('email' => $to, 'name' => $toName)
      );

      try {
        $response = $apiInstance->sendTransacEmail($sendSmtpEmail);
      } catch (Exception $e) {
        echo 'Email Exception Caught: ', $e -> getMessage(), PHP_EOL;
        return false;
      }
    }
  }
?>