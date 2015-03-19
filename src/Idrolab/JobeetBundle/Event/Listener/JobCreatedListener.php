<?php
namespace Idrolab\JobeetBundle\Event\Listener;

use Idrolab\JobeetBundle\Event\JobEvent;

class JobCreatedListener
{
  public function notifyInterestedUsers(JobEvent $event) {
    $job = $event->getJob();
    // Invio email a tutti gli utenti con la get del job
  }
}