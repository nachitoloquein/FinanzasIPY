
@section('content')

<form method="post" action={{$url}}>
  <input type="hidden" name="token_ws" value={{$token}} />
  <input type="submit" value="Ir a pagar" />
</form>
