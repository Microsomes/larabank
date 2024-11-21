<?php

namespace App\Projectors;

use App\Events\MoneyAdded;
use App\Events\MoneySubtracted;
use App\Models\TransactionCount;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class TransactionCountProjector extends Projector
{
    public function onMoneyAdded(MoneyAdded $event)
    {
       //check if the account has a transaction counter
        $transactionCounter = TransactionCount::firstOrNew(['account_uuid' => $event->accountUuid]);
        $transactionCounter->count++;
        $transactionCounter->writeable()->save();


        //increment the transaction counter if the account has one
        $tc = TransactionCount::where('account_uuid', $event->accountUuid)->first();
        if($tc){
            $tc->count++;
            $tc->writeable()->save();
        }

        

    }

    public function onMoneySubtracted(MoneySubtracted $event)
    {
        $transactionCounter = TransactionCount::firstOrNew(['account_uuid' => $event->accountUuid]);
        $transactionCounter->count++;
        $transactionCounter->writeable()->save(); 
    }
}
