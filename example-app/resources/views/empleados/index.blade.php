<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



@extends('layouts.app')

@section('content')


    <div class="container">


        @if (Session::has('Mensaje'))

            <div class="alert alert-success" role="alert">
                {{Session::get('Mensaje')}}
            </div>
    
            
        @endif
            
        <a href="{{ url('empleados/create')}}" class="btn btn-success">Agregar Empleado</a>
        <br>
        <br>

        <table class="table table-light table-hover">
            <thead class="thead light">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Celular</th>
                    <th>Acciones</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{ asset('storage').'/'.$empleado->Photo}}" class="img-thumbnail img-fluid" alt="" width="200"></td>
                    <td>{{$empleado->Name}}</td>
                    <td>{{$empleado->Last_name}}</td>
                    <td>{{$empleado->Email}}</td>
                    <td>{{$empleado->Address}}</td>
                    <td>{{$empleado->Phone}}</td>
                    <td><a class="btn btn-warning "  href="{{ url('/empleados/'.$empleado->id.'/edit') }}">Editar</a>
                        <form method="post" action="{{ url('/empleados/'.$empleado->id) }}" style="display:inline">
                            {{csrf_field() }}{{--cuando enviamos la información del formulario debemos poner token  --}}
                            {{ method_field('DELETE') }}{{--enviar el campo necesario para identificar el borrado y poder accecder al metodo destroy  --}}
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                        </form>    
                    </td>
                </tr>
                @endforeach  
            </tbody>
        </table>

        {{ $empleados->links() }}
        <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}">
        <script src="{{ asset('admin/plugin/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
        
    </div>
@endsection

