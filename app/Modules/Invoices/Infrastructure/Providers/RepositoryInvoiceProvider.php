<?php

namespace App\Modules\Invoices\Infrastructure\Providers;

use App\Modules\Invoices\Api\Interfaces\InvoiceRepositoryInterface;
use App\Modules\Invoices\Repositories\InvoiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryInvoiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
    }

    public function provides(): array
    {
        return [
            InvoiceRepositoryInterface::class,
        ];
    }
}
