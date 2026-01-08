<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientUser;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function home()
    {

        $clientes  = Client::all();
        $clientUsers = ClientUser::all();
        return view('vistas.catalog.home', compact('clientes', 'clientUsers'));
    }

    public function clienteSave(Request $request)
    {
        try {
            $cliente = new Client();
            $cliente->name = $request->name;
            $cliente->rfc = $request->rfc;
            $cliente->email = $request->email;
            $cliente->phone = $request->phone;
            $cliente->address = $request->address;
            $cliente->save();
            return back()->with('success', '¡Cliente dado de alta con éxito!');
        } catch (\Exception $e) {
            return back()->with('success', '¡Cliente dado de alta con éxito!')->with('error', 'Ocurrió un error al dar de alta el cliente. Intenta nuevamente.' . $e);
        }
    }

    public function clienteDestroy($id)
    {
        try {
            $cliente = Client::findOrFail($id);
            $cliente->delete();
            return redirect()->route('catalog.home')
                ->with('success', 'Cliente eliminado con éxito!');
        } catch (\Exception $e) {
            return redirect()->route('catalog.home')
                ->with('error', 'Ocurrió un error al eliminar cliente.' . $e);
        }
    }

    public function clienteUsuarioSave(Request $request)
    {
        try {
            $cliente = new ClientUser();
            $cliente->name = $request->name;
            $cliente->client_id = $request->cliente_id;
            $cliente->email = $request->email;
            $cliente->phone = $request->phone;
            $cliente->save();
            return redirect()->route('catalog.home')
                ->with('success', '¡Usuario dado de alta con exito!');
        } catch (\Exception $e) {
            return redirect()->route('catalog.home')
                ->with('error', 'Ocurrió un error al dar de alta el usuario. Intenta nuevamente.' . $e);
        }
    }


    public function clienteUsuarioDestroy($id)
    {
        try {
            $usuario = ClientUser::findOrFail($id);
            $usuario->delete();
            return redirect()->route('catalog.home')
                ->with('success', 'Usuario eliminado con éxito!');
        } catch (\Exception $e) {
            return redirect()->route('catalog.home')
                ->with('error', 'Ocurrió un error al eliminar  usuario.' . $e);
        }
    }
}
