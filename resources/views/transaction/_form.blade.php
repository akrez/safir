@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form enctype="multipart/form-data" action="{{ $action }}" method="POST">
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
        <label for="transactioned_at">Transactioned At</label>
        <div class="input-group date" id="transactioned_at" data-target-input="nearest">
            <div class="input-group-prepend" data-target="#transactioned_at" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            <input name="transactioned_at" type="text" class="form-control datetimepicker-input" data-target="#transactioned_at"
                value="{{ @old('transactioned_at', isset($transaction) ? $transaction->transactioned_at : '') }}">
        </div>
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
