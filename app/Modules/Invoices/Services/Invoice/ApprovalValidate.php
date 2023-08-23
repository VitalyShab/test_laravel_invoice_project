<?php

namespace App\Modules\Invoices\Services\Invoice;

use App\Domain\Enums\StatusEnum;
use App\Modules\Approval\Api\ApprovalFacadeInterface;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Invoices\Api\Interfaces\InvoiceRepositoryInterface;
use LogicException;
use Ramsey\Uuid\Uuid;

readonly class ApprovalValidate
{
    public function __construct(
        private InvoiceRepositoryInterface $invoiceRepository,
        private ApprovalFacadeInterface    $approvalFacade
    ) {
    }

    public function execute(string $id, string $action): string
    {
        $invoice = $this->invoiceRepository->getInvoiceById($id);
        $approvalDto = new ApprovalDto(
            Uuid::fromString($id),
            StatusEnum::tryFrom($invoice->status),
            'invoice'
        );

        $error = '';
        try {
            match ($action) {
                'approve' => $this->approvalFacade->approve($approvalDto),
                'reject' => $this->approvalFacade->reject($approvalDto),
            };
        } catch (LogicException $exception) {
            $error = $exception->getMessage();
        }

        return $error;
    }
}
