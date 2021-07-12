@extends('layouts.app')
@section('content')

<body>
<div style="display:flex; justify-content:center;">
<form method="post" action={{$url}}>
  <div class="card" style="width: 500px; display:flex;justify-content:center;">
    <img src="https://www.enlanubelab.cl/wp-content/uploads/2016/02/webpay-plus-integracion.png" class="card-img-top" style="max-width: 450px; display:flex; justify-content: center;">
    <div class="card-body" style="display: flex; justify-content:center;">
      <input type="hidden" name="token_ws" value={{$token}} />
      <button type="submit" style="width:300px; display:flex; justify-content:center;" class="btn btn-primary">Pagar</button>
    </div>
  </div>
</form>
</div>
</body>

@endsection
