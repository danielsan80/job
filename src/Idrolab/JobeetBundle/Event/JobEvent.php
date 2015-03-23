<?php

namespace Idrolab\JobeetBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Idrolab\JobeetBundle\Entity\Job;

class JobEvent extends Event
{

    protected $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function getJob()
    {
        return $this->job;
    }

}
