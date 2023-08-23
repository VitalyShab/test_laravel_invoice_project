<?php

namespace App\Modules\Invoices\Infrastructure\Providers;

use App\Modules\Approval\Api\Events\EntityApproved;
use App\Modules\Approval\Api\Events\EntityRejected;
use App\Modules\Invoices\Listeners\ApproveListener;
use App\Modules\Invoices\Listeners\RejectListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        EntityApproved::class => [ApproveListener::class],
        EntityRejected::class => [RejectListener::class],
    ];
}
