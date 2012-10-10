<?php
/**
 * 
 * @author Alex Panshin <alex@saitostroiteli.ru>
 * @package 
 * @subpackage 
 */
class FeedbackMail extends Swift_Message
{
    public function __construct($to, $from, $subject, $feedback)
    {
        parent::__construct($subject);

        $this->setTo($to)
             ->setFrom($from)
             ->setReplyTo($feedback['email'])
             ->setBody($this->render($feedback), 'text/plain');
    }

    protected function render($feedback)
    {
        $message = <<<EOF
Здравствуйте!

Это сообщение было создано формой обратной связи.

Данные пользователя
Имя: {$feedback['name']}
Электронная почта: {$feedback['email']}

Сообщение:
{$feedback['message']}

_____________________________

Чтобы отправить ответ пользователю, оставившему это сообщение просто ответьте на это письмо.

EOF;

        return $message;
    }
}
