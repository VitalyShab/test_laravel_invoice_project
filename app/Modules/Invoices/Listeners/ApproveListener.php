<?php

namespace App\Modules\Invoices\Listeners;

use App\Modules\Approval\Api\Events\EntityApproved;
use App\Modules\Invoices\Api\Interfaces\InvoiceRepositoryInterface;

readonly class ApproveListener
{
    public function __construct(
        private readonly InvoiceRepositoryInterface $invoiceRepository
    ) {}

    public function handle(EntityApproved $event): void
    {
        $this->invoiceRepository->changeStatus($event->approvalDto->id->toString(), 'approved');
    }
}
