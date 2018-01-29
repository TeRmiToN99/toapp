<?php

namespace App\Controllers;


class SendMail
{
    protected $smtp_username;
    protected $smtp_password;
    protected $smtp_host;
    protected $smtp_from;
    protected $smtp_port;
    protected $smtp_charset;

    
    function send($mailTo, $subject, $message, $headers) {
        $contentMail = "Date: " . date("D, d M Y H:i:s") . " UT\r\n";
        $contentMail .= 'Subject: =?' . $this->smtp_charset . '?B?' . base64_encode($subject) . "=?=\r\n";
        $contentMail .= $headers . "\r\n";
        $contentMail .= $message . "\r\n";

        try {
            if(!$socket = @fsockopen($this->smtp_host, $this->smtp_port, $errorNumber, $errorDescription, 30)){
                throw new Exception($errorNumber.".".$errorDescription);
            }
            if (!$this->_parseServer($socket, "220")){
                throw new Exception('Connection error');
            }

            fputs($socket, "HELO " . $this->smtp_host . "\r\n");
            if (!$this->_parseServer($socket, "250")) {
                fclose($socket);
                throw new Exception('Error of command sending: HELO');
            }

            fputs($socket, "AUTH LOGIN\r\n");
            if (!$this->_parseServer($socket, "334")) {
                fclose($socket);
                throw new Exception('Autorization error');
            }

            fputs($socket, base64_encode($this->smtp_username) . "\r\n");
            if (!$this->_parseServer($socket, "334")) {
                fclose($socket);
                throw new Exception('Autorization error');
            }

            fputs($socket, base64_encode($this->smtp_password) . "\r\n");
            if (!$this->_parseServer($socket, "235")) {
                fclose($socket);
                throw new Exception('Autorization error');
            }

            fputs($socket, "MAIL FROM: ".$this->smtp_username."\r\n");
            if (!$this->_parseServer($socket, "250")) {
                fclose($socket);
                throw new Exception('Error of command sending: MAIL FROM');
            }

            fputs($socket, "RCPT TO: " . $mailTo . "\r\n");
            if (!$this->_parseServer($socket, "250")) {
                fclose($socket);
                throw new Exception('Error of command sending: RCPT TO');
            }

            fputs($socket, "DATA\r\n");
            if (!$this->_parseServer($socket, "354")) {
                fclose($socket);
                throw new Exception('Error of command sending: DATA');
            }

            fputs($socket, $contentMail."\r\n.\r\n");
            if (!$this->_parseServer($socket, "250")) {
                fclose($socket);
                throw new Exception("E-mail didn't sent");
            }

            fputs($socket, "QUIT\r\n");
            fclose($socket);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    function mail(){

        $to = "termit <termit99@bk.ru>";
        $subject = "Новый заказ на доставку №";

        $message = '
            <html>
            <head>
             <title>Новый заказ на доставку № </title>
            </head>
            <body>
            <p>Дата и время доставки: </p>
            <p>Адрес доставки:</p>
            <p>Состав нового заказа:</p>
            </body>
            </html>
        ';

        $headers= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

        mail($to, $subject, $message);
    }
}