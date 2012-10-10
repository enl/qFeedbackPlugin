<?php
/**
 * 
 * @author Alex Panshin <alex@saitostroiteli.ru>
 * @package 
 * @subpackage 
 */
class FeedbackRouting extends qModuleRouting
{
    public static function loadRoutes(sfEvent $event)
    {
        /** @var $routing sfPatternRouting */
        $routing = $event->getSubject();

        $routing->prependRoute('feedback', new sfRoute('/feedback', array('module' => 'feedback', 'action' => 'form')));
        $routing->prependRoute('feedback_submit', new sfRoute('feedback/submit', array('module' => 'feedback', 'action' => 'submit')));
        $routing->prependRoute('feedback_thanks', new sfRoute('feedback/thanks', array('module' => 'feedback', 'action' => 'thanks')));
    }
}
