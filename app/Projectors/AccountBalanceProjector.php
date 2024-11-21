<?php

namespace App\Projectors;

use App\Events\AccountCreated;
use App\Events\AccountDeleted;
use App\Events\MoneyAdded;
use App\Events\MoneySubtracted;
use App\Models\Accounts;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class AccountBalanceProjector extends Projector
{
    public function onAccountCreated(AccountCreated $event)
    {
        (new Accounts($event->accountAttributes))->writeable()->save();
        
    }

    public function onMoneyAdded(MoneyAdded $event){
        $account = Accounts::uuid($event->accountUuid);
        $account->balance += $event->amount;
        $account->writeable()->save();
    }

    public function onMoneySubtracted(MoneySubtracted $event){
        $account = Accounts::uuid($event->accountUuid);
        $account->balance -= $event->amount;
        $account->writeable()->save();
    }

    public function onAccountDeleted(AccountDeleted $event){
        Accounts::uuid($event->accountUuid)->writeable()->delete();
    }
}
