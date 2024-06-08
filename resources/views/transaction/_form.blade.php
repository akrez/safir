@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form enctype="multipart/form-data"
    action="{{ $action }}"
    method="POST">
    @if (isset($transaction))
        @method('PUT')
    @endif
    @csrf
    <input type="hidden" name="type" value="{{ $type }}">
    <div class="form-group">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" required="required" class="form-control"
            value="{{ @old('title', isset($transaction) ? $transaction->title : '') }}">
    </div>
    <div class="form-group">
        <label for="amount">Amount</label>
        <input id="amount" name="amount" type="text" required="required" class="form-control"
            value="{{ @old('amount', isset($transaction) ? $transaction->amount : '') }}">
    </div>
    <div class="form-group">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
