<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class AccountDeleted extends ShouldBeStored
{

    public $accountUuid;
    /**
     * Create a new event instance.
     */
    public function __construct(string $accountUuid)
    {
        //
        $this->accountUuid = $accountUuid;  
    }

    
}
