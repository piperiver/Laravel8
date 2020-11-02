<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployesRequest;
use App\Models\Companies;
use App\Models\Employes;
use Illuminate\Http\Request;

class EmployesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employes::paginate(config('constantes.PAGINATION'));
        session(['MENU' => 'EMPLOY']);
        return view('employes.index')->with('employes', $employes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::all();
        session(['MENU' => 'EMPLOY']);
        return view('employes.create')->with('companies', $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployesRequest $request)
    {
        $employ = new Employes;

        $employ->name = $request->name;
        $employ->surname = $request->surname;
        $employ->company_id = $request->company_id;
        $employ->email = $request->email;
        $employ->phone = $request->phone;
        $employ->save();

        return redirect('Employes')->with('response', 'Empleado creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employ = Employes::findOrFail($id);
        $companies = Companies::all();
        session(['MENU' => 'EMPLOY']);
        return view('employes.edit')->with('employ', $employ)->with('companies', $companies);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployesRequest $request, $id)
    {
        $employ = Employes::findOrFail($id);
        $employ->name = $request->name;
        $employ->surname = $request->surname;
        $employ->company_id = $request->company_id;
        $employ->email = $request->email;
        $employ->phone = $request->phone;
        $employ->save();

        return redirect("Employes/$id/edit")->with('response', 'Empleado modificado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employ = Employes::findOrFail($id);
        $employ->delete();
        return redirect('Employes')->with('response', 'Empleado eliminado satisfactoriamente');
    }
}
