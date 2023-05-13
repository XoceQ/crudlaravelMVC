<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=Empleados::paginate(5);// le estoy pasando toda la información que he recuperado de empleados a la vista index
        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Name'=> 'required|string|max:100',
            'Last_name'=> 'required|string|max:100',
            'Email'=> 'required|email',
            'Address'=> 'required|string|max:255',
            'Phone'=> 'required|numeric|min:10',
            'Photo'=> 'required|max:10000|mimes:jpeg,png,jpg',

        ];
        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        //$datosEmpleado=request()->all();

        $datosEmpleado=request()->except('_token');

        if($request->hasFile('Photo')){
            $datosEmpleado['Photo']=$request->file('Photo')->store('uploads','public'); //recolectamos la información que esta en el campo foto y se lo almacenó en la carpeta uploads
        }

        Empleados::insert($datosEmpleado);//insertar la información en la base de datos 
/*         return response()->json($datosEmpleado);
 */
        return redirect('empleados')->with('Mensaje','Empleado agregado con éxito');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado= Empleados::findOrFail($id);// este metodo recepciona toda la informacion que no estan enviado a traves de la URL y  me devuelve toda la información que tenga ese Id
        return view('empleados.edit',compact('empleado'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


        $campos=[
            'Name'=> 'required|string|max:100',
            'Last_name'=> 'required|string|max:100',
            'Email'=> 'required|email',
            'Address'=> 'required|string|max:255',
            'Phone'=> 'required|numeric|min:10',
            'Photo'=> 'required|max:10000|mimes:jpeg,png,jpg',

        ];
        
        if ($request->hasFile('Photo')) {

            $campos+=['Photo' => 'required|max:10000|mimes:jpeg,png,jpg'];
        }

        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);


        $datosEmpleado=request()->except('_token','_method');


        if($request->hasFile('Photo')){

            $empleado= Empleados::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);//borrar la foto anterior
            $datosEmpleado['Photo']=$request->file('Photo')->store('uploads','public'); 
        }


        Empleados::where('id','=',$id)->update($datosEmpleado);

        //$empleado= Empleados::findOrFail($id);
        //return view('empleados.edit',compact('empleado'));

        return redirect('empleados')->with('Mensaje','Empleado modificado con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $empleado= Empleados::findOrFail($id);
        if (Storage::delete('public/'.$empleado->Foto));{
            Empleados::destroy($id);// borrar el registro pasando el parametro id 
        }
        //Redireccionamos a la vista index con el registro borrado
        return redirect('empleados')->with('Mensaje','Empleado Eliminado con éxito');
    }
}
