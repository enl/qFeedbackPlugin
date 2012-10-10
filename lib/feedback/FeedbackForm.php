<?php
/**
 * 
 * @author Alex Panshin <alex@saitostroiteli.ru>
 * @package 
 * @subpackage 
 */
class FeedbackForm extends BaseForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'name' => new sfWidgetFormInputText(),
            'email' => new sfWidgetFormInputText(),
            'message' => new sfWidgetFormTextarea()
        ));

        $this->setValidators(array(
            'name' => new sfValidatorString(array('required' => true, 'max_length'=> 100)),
            'email' => new sfValidatorEmail(array('required' => true, 'max_length' => 255)),
            'message' => new sfValidatorString(array('required' => true, 'max_length' => 3000))
        ));

        $this->widgetSchema->setLabels(array(
            'name' => 'Ваше имя',
            'email' => 'Ваш адрес электронной почты',
            'message' => 'Сообщение'
        ));

        $this->widgetSchema->setNameFormat('feedback[%s]');
    }

}
