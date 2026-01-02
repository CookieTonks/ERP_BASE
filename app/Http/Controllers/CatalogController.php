<?php

namespace App\Http\Controllers;

use App\Models\Client;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function home()
    {

        $clientes  = Client::all();
        return view('vistas.catalog.home', compact('clientes'));
    }

    public function destroy($id)
    {
        try {
            $cliente = Client::findorfail($id);
            $cliente->delete;
            return redirect()->route('catalog.home')
                ->with('success', 'Cliente eliminado con éxito!');
        } catch (\Exception $e) {
            return redirect()->route('catalog.home')
                ->with('error', 'Ocurrió un error al eliminar el cliente.' . $e);
        }
    }
}
