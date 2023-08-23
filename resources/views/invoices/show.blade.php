@extends('layouts.app')

@section('content')
    <form action="{{ route('invoice.updateStatus', $invoice->id, $invoice) }}" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <button type="submit" name="action" value="approve" class="btn-link">Approve</button>
        <button type="submit" name="action" value="reject" class="btn-link">Reject</button>
    </form>

    <div class="head-title">
        <h1 class="text-center m-0 p-0">Invoice</h1>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Invoice # - <span class="gray-color">{{ $invoice->number }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Invoice Date - <span class="gray-color">{{ $invoice->date }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Due Date - <span class="gray-color">{{ $invoice->due_date }}</span></p>
        </div>
    </div>

    <div class="head-title">
        <h2 class="text-center m-0 p-0">Company</h2>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Name - <span class="gray-color">{{ $invoice->company->name }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Street Address - <span class="gray-color">{{ $invoice->company->street }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">City - <span class="gray-color">{{ $invoice->company->city }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Zip code - <span class="gray-color">{{ $invoice->company->zip }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Phone - <span class="gray-color">{{ $invoice->company->phone }}</span></p>
        </div>
    </div>

    <div class="head-title">
        <h2 class="text-center m-0 p-0">Billed Company</h2>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Name - <span class="gray-color">{{ $invoice->company->name }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Street Address - <span class="gray-color">{{ $invoice->company->street }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">City - <span class="gray-color">{{ $invoice->company->city }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Zip code - <span class="gray-color">{{ $invoice->company->zip }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Phone - <span class="gray-color">{{ $invoice->company->phone }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Email - <span class="gray-color">{{ $invoice->company->email }}</span></p>
        </div>
    </div>

    <div class="head-title">
        <h2 class="text-center m-0 p-0">Products</h2>
    </div>
    <div class="product-columns">
        <table>
            <tr>
                <th>QTY</th>
                <th>NAME</th>
                <th>UNIT PRICE</th>
                <th>TOTAL</th>
            </tr>
            @each('invoices/_product_show', $invoice->products, 'product', 'invoices/_empty')
        </table>
    </div>

    <div class="head-title">
        <h2 class="text-center m-0 p-0">Total - ${{ $invoice->total() }}</h2>
    </div>
@endsection
