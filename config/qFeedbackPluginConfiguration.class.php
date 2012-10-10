<?php

/**
 * qFeedbackPlugin configuration.
 * 
 * @package     qFeedbackPlugin
 * @subpackage  config
 * @author      Alex Panshin <alex@quadrata.ru>
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class qFeedbackPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.0-DEV';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
      qPluginRoutingConfigurator::configureListeners($this->dispatcher, array('feedback'));
  }
}
