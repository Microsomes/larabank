<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class MoneySubtracted extends ShouldBeStored
{

    public $accountUuid;
    public $amount;


    /**
     * Create a new event instance.
     */
    public function __construct(string $accountUuid, int $amount)
    {
        //
        $this->accountUuid = $accountUuid;
        $this->amount = $amount;
    }

}
