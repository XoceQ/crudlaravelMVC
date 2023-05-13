<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@extends('layouts.app')

@section('content')


<div class="container">

    <form action="{{ url('/empleados/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
        
        {{ csrf_field() }} {{-- necesitamos este token por que trabaja la parte de seguridad --}}
        {{ method_field('PATCH') }}{{--instrucción blade que nos envia la instrucción  patch, donde si ingresamos al metodo patch ingresamos al metodo update--}}

        @include('empleados.form',['Modo'=>'editar'])
        <br>


        
    </form>

</div>

@endsection