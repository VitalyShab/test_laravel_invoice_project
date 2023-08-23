<?php

namespace App\Modules\Invoices\Repositories;

use App\Modules\Invoices\Api\Interfaces\InvoiceRepositoryInterface;
use App\Modules\Invoices\Models\Invoice;
use Illuminate\Database\Eloquent\Collection;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function getAllInvoices(): Collection
    {
        return Invoice::all();
    }

    public function getInvoiceById(string $id): Invoice
    {
        return Invoice::findOrFail($id);
    }

    public function updateInvoice(Invoice $invoice): void
    {
        $invoice->updateOrFail();
    }

    public function changeStatus(string $id, string $status): void
    {
        $invoice = $this->getInvoiceById($id);
        $invoice->status = $status;
        $this->updateInvoice($invoice);
    }
}
