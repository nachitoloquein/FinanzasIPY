@extends('layouts.app')
@section('content')
<body>
    <form action="{{route('update',$producto)}}" method="POST" class="container">
        @csrf
        @method('patch')
 
          <div class="form-group">
            <label for="formGroupExampleInput2">Precio</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Precio" name="Precio" value="{{$producto->Precio}}">
          </div>         
          <input class="btn btn-primary " type="submit" value="Modificar Precio">
    </form>
</body>
@endsection
