<?php

namespace App\Modules\Invoices\Listeners;

use App\Modules\Approval\Api\Events\EntityRejected;
use App\Modules\Invoices\Api\Interfaces\InvoiceRepositoryInterface;

readonly class RejectListener
{
    public function __construct(
        private InvoiceRepositoryInterface $invoiceRepository
    ) {}

    public function handle(EntityRejected $event): void
    {
        $this->invoiceRepository->changeStatus($event->approvalDto->id->toString(), 'rejected');
    }
}
