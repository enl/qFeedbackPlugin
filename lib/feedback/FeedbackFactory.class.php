<?php
/**
 * 
 * @author Alex Panshin <alex@saitostroiteli.ru>
 * @package 
 * @subpackage 
 */
class FeedbackFactory 
{
    public static function buildForm()
    {
        $className = csSettings::get('feedback_form_class');

        if (!class_exists($className, true)) {
            throw new RuntimeException("Invalid `feedback_form_class` value. Check your preferences.");
        }

        $form = new $className();

        if (!($form instanceof FeedbackForm)) {
            throw new RuntimeException("class given in `feedback_form_class` must be inherited from FeedbackForm class.");
        }

        return $form;
    }

    public static function buildEmail($feedback)
    {
        $className = csSettings::get('feedback_email_class');

        if (!class_exists($className, true)) {
            throw new RuntimeException("Invalid `feedback_email_class` value. Check your preferences.");
        }

        $email = new $className(
            csSettings::get('feedback_admin_email'),
            csSettings::get('feedback_mailer_address'),
            csSettings::get('feedback_email_subject'),
            $feedback
        );

        if (!($email instanceof FeedbackMail)) {
            throw new RuntimeException("Class given in `feedback_email_class` option must be inherited from FeedbackEmail class.");
        }

        return $email;
    }
}
