<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use FFI\Exception;
use Illuminate\Http\Request;


class ProductoController extends Controller
{

    public function index(){
        $productos = Producto::all();

        ## sepuede hacer con un conpaginado

        return view('productos.index',['productos'=> $productos]);
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        try {
            $producto = new Producto();
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->precio = $request->precio;

            $producto->save();

            return redirect(route('producto.create'))->with('success', 'Producto registrado con exito');


        } catch (Exception $exception) {
            return $exception->getMessage();
            //throw $th;
        }
    }

    public function edit($id){
        $producto = Producto:: where('id', $id)->first();
        return view('productos.edit',['producto'=> $producto]);
    }

    public function update(Request $request, $id){
        try {
            $producto = Producto::where('id',$id)->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
            ]);

            if($producto){
                return redirect(route('producto.index', $id))->with('success', 'Producto actualizado con exito');

            }
            return redirect(route('producto.index', $id))->with('success', 'Producto no actualizado con exito :(');
        }
        catch (Exception $exception) {
        return $exception->getMessage();
        //throw $th;
        }
    }

    public function delete($id){
        try {

            $producto =Producto::where('id',$id)->delete();
            if ( $producto) {
                return redirect(route('producto.index'))->with('success', 'Producto eliminado con exito');
            }

        return redirect(route('producto.index'))->with('success', 'Producto eliminado con exito');


    } catch (Exception $exception) {
        return $exception->getMessage();
    }


    }
}
