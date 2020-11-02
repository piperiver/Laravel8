<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaniesRequest;
use App\Models\Companies;
use App\Models\Employes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::paginate(config('constantes.PAGINATION'));

        session(['MENU' => 'COMPANY']);
        return view('companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['MENU' => 'COMPANY']);
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesRequest $request)
    {

        $company = new Companies;

        if(isset($request->logo)){
            $path = $request->file('logo')->store('public');
            $company->logo = $path;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->web = $request->web;
        $company->save();

        return redirect('Companies')->with('response', 'Compañia creada satisfactoriamente');
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
        $company = Companies::findOrFail($id);
        session(['MENU' => 'COMPANY']);
        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompaniesRequest $request, $id)
    {
        $company = Companies::findOrFail($id);

        if(isset($request->logo)){
            Storage::delete($company->logo);
            $path = $request->file('logo')->store('public');
            $company->logo = $path;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->web = $request->web;
        $company->save();

        return redirect("Companies/$id/edit")->with('response', 'Compañia modificada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employes = Employes::where('company_id', $id)->get();
        if(count($employes) > 0){
            return redirect('Companies')->with('err', 'No es posible eliminar la compañia, ya que tiene asociado '.count($employes).' empleados. Primero elimine los empleados asociados.');
        }

        $company = Companies::findOrFail($id);
        $company->delete();
        return redirect('Companies')->with('response', 'Compañia eliminada satisfactoriamente');
    }
}
