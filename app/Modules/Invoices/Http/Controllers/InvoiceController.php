<?php

namespace App\Modules\Invoices\Http\Controllers;

use App\Infrastructure\Controller;
use App\Modules\Invoices\Api\Interfaces\InvoiceRepositoryInterface;
use App\Modules\Invoices\Services\Invoice\ApprovalValidate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function __construct(
        private readonly InvoiceRepositoryInterface $invoiceRepository,
        private readonly ApprovalValidate $approvalValidate
    ) {
    }

    public function index(): View
    {
        return view('invoices.index', [
            'invoices' => $this->invoiceRepository->getAllInvoices()
        ]);
    }

    public function show(string $id): View
    {
        return view('invoices.show', [
            'invoice' => $this->invoiceRepository->getInvoiceById($id)
        ]);
    }

    public function updateStatus(Request $request, string $id): RedirectResponse
    {
        return redirect(route('home'))
            ->withErrors($this->approvalValidate->execute($id, $request->get('action')));
    }
}
