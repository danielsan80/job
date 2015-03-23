<?php

namespace Idrolab\JobeetBundle\Event\Listener;

use Idrolab\JobeetBundle\Event\JobEvent;

class JobCreatedListener
{

    private $logger;
    
    // Aggiungiamo la voce calls nella definizione del servizio ed settiamo il logger
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    private function log($message, $params = array())
    {
        if ($this->logger) {
            //Un messaggio di log sarà visibile nel file /app/logs/<env>.log
            //In Linux si può "ascoltare" un file scrivendo tail -f <nomefile>
            //In questo caso greppiamo su JOB: tail -f /app/logs/test.log | grep "JOB"
            $this->logger->info('[JOB] ' . $message, $params);
        }
    }

    public function notifyInterestedUsers(JobEvent $event)
    {
        $job = $event->getJob();
        $this->log('Invio email a tutti gli utenti con la get del job');
        // Invio email a tutti gli utenti con la get del job
    }

}
