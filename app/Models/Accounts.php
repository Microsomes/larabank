<?php

namespace App\Models;

use App\Events\AccountCreated;
use App\Events\AccountDeleted;
use App\Events\MoneyAdded;
use App\Events\MoneySubtracted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\EventSourcing\Projections\Projection;

class Accounts extends Projection
{
    
    protected $guarded = [];

    public static function createWithAttributes(array $attributes): Accounts
    {
        $attributes['uuid'] = (string) Str::uuid();

        event(new AccountCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    public function addMoney(int $amount){
        event(new MoneyAdded($this->uuid, $amount));
    }

    public function subtractMoney(int $amount){
        event(new MoneySubtracted($this->uuid, $amount));
    }

    public function remove(){
        event(new AccountDeleted($this->uuid));
    }


    public static function uuid(string $uuid): ?Accounts
    {
        return static::where('uuid', $uuid)->first();
    }


}
