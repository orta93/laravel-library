<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editorial;

class EditorialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $editorials = Editorial::withTrashed()->get();

        return view('editorials.index')->with([
            'editorials' => $editorials
        ]);
    }

    public function show($id)
    {
        return "Mostrando detalle del autor con el id: $id";
    }

    public function create()
    {
        return view('editorials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $editorial = Editorial::create([
            'name' => $request->get('name'),
        ]);

        if ($editorial) {
            //Success
            return redirect()->to('/editorials');
        } else {
            //fail
            return redirect()->to('/editorials/create');
        }
    }

    public function edit($id)
    {
        $editorial = Editorial::find($id);
        if ($editorial) {
            return view('editorials.edit')->with(['editorial' => $editorial]);
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $editorial = Editorial::find($id);
        if ($editorial) {
            /** Option 1. Using functions */
            /*$editorial->name = $request->get('name');
            $editorial->last_name = $request->get('last_name');
            $editorial->save();*/

            /** Option 2. Using eloquent */
            /*Editorial::where('id', $id)->update([
                'name' => $request->get('name'),
                'last_name' => $request->get('last_name')
            ]);*/

            /** Option 3. Using eloquent directly */
            Editorial::where('id', $id)->update($request->except('_token'));
        }

        return redirect()->to('/editorials');
    }

    public function delete($id)
    {
        $editorial = Editorial::find($id);

        if ($editorial) {
            /** Option 1. Using functions */
            $editorial->delete();

            /** Option 2. Using eloquent */
            Editorial::where('id', $id)->delete();
        }

        return redirect()->to('/editorials');
    }

    public function restore($id)
    {
        Editorial::withTrashed()->where('id', $id)->restore();
        return redirect()->to('/editorials');
    }
}
