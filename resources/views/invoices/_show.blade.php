<div class="card">
    <div class="card-body">
        <h4 v-pre class="card-title"><a href="{{ route('invoice.show', $invoice->id, $invoice) }}">{{ $invoice->number }}</a></h4>

        <p class="card-text"><small v-pre class="text-muted">{{ $invoice->company->name }}</small></p>

        <div class="card-text">
            <small class="text-muted">{{ $invoice->date }}</small><br>
        </div>
    </div>
</div>
