@if (Session::has('success'))
<div class="alert alert-success" role="alert">
        <p>{{ Session::get('success') }}</p>
        <a class="close"></a>
      </div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
        <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
      </div>
@endif

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
@if (session('warning'))
<div class="alert alert-warning">
    {{ session('warning') }}
</div>
@endif
