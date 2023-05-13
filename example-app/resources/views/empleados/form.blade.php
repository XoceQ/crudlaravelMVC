<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="form-group">
    <label for="Name" class="control-label">{{'Nombres'}}</label>
    <input type="text" class="form-control {{$errors->has('Name')?'is-invalid':'' }}" name="Name" id="Name" value="{{isset($empleado->Name)?$empleado->Name:old('Name')  }}">{!! $errors->first('Name','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="Last_name" class="control-label">{{'Apellidos'}}</label>
    <input type="text"  class="form-control {{$errors->has('Last_name')?'is-invalid':'' }}" name="Last_name" id="Last_name" value="{{isset($empleado->Last_name)?$empleado->Last_name:old('Last_name') }}">{!! $errors->first('Last_name','<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">
    <label for="Email" class="control-label">{{'Correo'}}</label>
    <input type="email" class="form-control {{$errors->has('Email')?'is-invalid':'' }}" name="Email" id="Email" value="{{ isset($empleado->Email)?$empleado->Email:old('Email') }}">{!! $errors->first('Email','<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">
    <label for="Address" class="control-label">{{'Dirección'}}</label>
    <input type="text"  class="form-control {{$errors->has('Address')?'is-invalid':'' }}" name="Address" id="Address" value="{{ isset($empleado->Address)?$empleado->Address:old('Address') }}">{!! $errors->first('Address','<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">
    <label for="Phone" class="control-label">{{'Celular'}}</label>
    <input type="tel"  class="form-control {{$errors->has('Phone')?'is-invalid':'' }}" name="Phone" id="Phone" value="{{ isset($empleado->Phone)?$empleado->Phone:old('Phone') }}">{!! $errors->first('Phone','<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">
    <label for="Photo" class="control-label">{{'Foto'}}</label>

@if (isset($empleado->Photo))
    <br>
    <td><img src="{{ asset('storage').'/'.$empleado->Photo}}" alt="" width="200"></td>
    <br>
@endif
<input  class="form-control {{$errors->has('Photo')?'is-invalid':'' }}" type="file" name="Photo" id="Photo" value="{{ isset($empleado->Photo)?$empleado->Phone:old('Photo') }}">
</div>


<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{ url('empleados') }}">Regresar</a>

<link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}">
    <script src="{{ asset('admin/plugin/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>