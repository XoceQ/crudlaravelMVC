<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@extends('layouts.app')

@section('content')


<div class="container">

    @if (count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{$error}} </li>
            @endforeach

        </ul>
    </div>
        
    @endif
    
    

    Sección para crear empleados
    <form action="{{url('/empleados')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        @include('empleados.form',['Modo'=>'crear'])


    </form>
</div>

@endsection