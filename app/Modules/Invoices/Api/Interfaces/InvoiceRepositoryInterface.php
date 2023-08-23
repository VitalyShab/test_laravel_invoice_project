<?php

namespace App\Modules\Invoices\Api\Interfaces;

use App\Modules\Invoices\Models\Invoice;
use Illuminate\Database\Eloquent\Collection;

interface InvoiceRepositoryInterface
{
    public function getAllInvoices(): Collection;

    public function getInvoiceById(string $id): Invoice;

    public function updateInvoice(Invoice $invoice): void;

    public function changeStatus(string $id, string $status): void;
}
