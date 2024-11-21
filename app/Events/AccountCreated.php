<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class AccountCreated extends ShouldBeStored
{

    public $accountAttributes;


    /**
     * Create a new event instance.
     */
    public function __construct(array $accountAttributes)
    {
        //
        $this->accountAttributes = $accountAttributes;
    }

   
}
