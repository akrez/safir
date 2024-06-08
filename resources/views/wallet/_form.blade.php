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
    action="{{ isset($wallet) ? route('wallets.update', ['user' => $user, 'wallet' => $wallet]) : route('wallets.store', ['user' => $user]) }}"
    method="POST">
    @if (isset($wallet))
        @method('PUT')
    @endif
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" required="required" class="form-control"
            value="{{ @old('title', isset($wallet) ? $wallet->title : '') }}">
    </div>
    <div class="form-group">
        <label>Status</label>
        <div>
            @foreach (App\Enums\Wallet\StatusEnum::values() as $status)
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="status" id="{{ $status }}" type="radio" required="required"
                        class="custom-control-input" value="{{ $status }}"
                        {{ @old('status', isset($wallet) ? $wallet->status->value : '') == $status ? 'checked' : '' }}>
                    <label for="{{ $status }}" class="custom-control-label">{{ ucfirst($status) }}</label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <label for="des">Des</label>
        <textarea id="des" name="des" cols="40" rows="5" class="form-control">{{ @old('des', isset($wallet) ? $wallet->des : '') }}</textarea>
    </div>
    <div class="form-group">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
