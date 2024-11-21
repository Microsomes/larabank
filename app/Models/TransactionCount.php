<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;
use Spatie\EventSourcing\Projections\Projection;

class TransactionCount extends Projection
{
    protected $table = 'transaction_counts';
    protected $guarded = [];
}
