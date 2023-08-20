<!DOCTYPE html>
<html>
<head>
    <title>How to Create Multi Language Website in Laravel - ItSolutionStuff.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    {{-- <div class="dropdown">
        <a class="btn btn-sm dropdown-toggle"  href="" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">$USD</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
            @foreach(\App\Models\Currency::where('status','active')->get() as $currency)
                <a href="javascript:;" onclick="currency_change('{{ $currency['code'] }}');" class="dropdown-item">
                {{ $currency->symbol }} {{ \Illuminate\Support\Str::upper($currency->code) }}
                </a>
            @endforeach
        </div>

    </div> --}}
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
          Dropdown button
        </button>
        <ul class="dropdown-menu dropdown-menu-red" aria-labelledby="dropdownMenuButton2">
          <li> @foreach(\App\Models\Currency::where('status','active')->get() as $currency)
            <a href="javascript:;" onclick="currency_change('{{ $currency['code'] }}');" class="dropdown-item">
            {{ $currency->symbol }} {{ \Illuminate\Support\Str::upper($currency->code) }}
            </a>
        @endforeach</li>

        </ul>
      </div>
    <h1> Multi Language Website in Laravel</h1>

    <div class="row">
        <div class="col-md-2 col-md-offset-6 text-center">
            <strong>Select Language: </strong>
        </div>
        <div class="col-md-4">
            <select class="form-control changeLang">
                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
                <option value="sp" {{ session()->get('locale') == 'sp' ? 'selected' : '' }}>Spanish</option>
                <option value="de" {{ session()->get('locale') == 'de' ? 'selected' : '' }}>German</option>
            </select>
        </div>
    </div>

{{--    <h1>{{ __('message.title') }}</h1>--}}
    <h3>{{ GoogleTranslate::trans('Welcome to ItSolutionStuff.com', app()->getLocale()) }}</h3>
    <h3>{{ GoogleTranslate::trans('Hello World', app()->getLocale()) }}</h3>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    function currency_change(currency_code){
    $.ajax({
        url: '{{ route('currency.load') }}',
        method: 'POST',
        data: {
            currency_code: currency_code,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'JSON',
        success: function(response) {
            alert(response.success);
        },
        error: function(response) {
            console.error(response.responseText);
        }
    });
}


</script>

<script type="text/javascript">

   var url = "{{ route('changeLang') }}";

   $(".changeLang").change(function(){
       window.location.href = url + "?lang="+ $(this).val();
   });


</script>
</body>

</html>
