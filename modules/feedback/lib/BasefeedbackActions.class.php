<?php

/**
 * Base actions for the qFeedbackPlugin feedback module.
 * 
 * @package     qFeedbackPlugin
 * @subpackage  feedback
 * @author      Alex Panshin <alex@quadrata.ru>
 * @version     SVN: $Id: BaseActions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class BasefeedbackActions extends sfActions
{
    public function executeForm()
    {
        $this->form = FeedbackFactory::buildForm();

        $this->dispatcher->notify(new sfEvent($this->form, 'feedback.form_generated'));
    }

    public function executeSubmit(sfWebRequest $request)
    {
        if (!$request->isMethod('POST')) {
            $this->redirect($this->generateUrl('feedback'));
        }

        $this->form = FeedbackFactory::buildForm();

        $this->dispatcher->notify(new sfEvent($this->form, 'feedback.form_generated'));

        $this->form->bind($request->getParameter('feedback'), $request->getFiles('feedback'));

        if ($this->form->isValid())
        {
            $email = FeedbackFactory::buildEmail($this->form->getValues());
            $this->dispatcher->notify(new sfEvent($email, 'feedback.email_generated'));

            $this->getMailer()->send($email);
        }

        $this->setTemplate('form');
    }

    public function executeThanks(sfWebRequest $request)
    {
        //Nothing to do here by default.
    }
}
