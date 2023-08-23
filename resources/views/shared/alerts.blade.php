@if (Session::has('errors'))
    <x-alert type="danger">
        {{ $errors->first() }}
    </x-alert>
@endif
