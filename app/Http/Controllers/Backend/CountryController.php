<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request){
        $countries = Country::all();
        if($request -> has('search')){
            $countries = Country::where('country_code','like',"%{$request->search}%")->orWhere('name','like',"%{$request->search}%")->get();
        }
        return view('countries.index',compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(CountryStoreRequest $request)
    {
        Country::create([
            'country_code' => $request->country_code,
            'name'=> $request->name
        ]);

        return redirect()->route('countries.index')->with('mensaje', 'Pais regsitardo Correctamente');
    }

    public function edit(Country $country)
    {
        return view('countries.edit',compact('country'));
    }

    public function update(CountryStoreRequest $request, Country $country) // "$user" is the user that we are going to update the information
    {
        $country->update([
            'country_code' => $request->country_code,
            'name'=> $request->name
        ]);

        return redirect()->route('countries.index')->with('mensaje', 'Pais Actualizado Correctamente');

    }

    public function destroy(Country $country)
    {
        // // we check if the user that we are going to delelte is the same who is loging
        // // in that way the system will not allow to delete to itmself 
        // if (auth()->user()->id == $country->id) {
        //     return redirect()->route('countries.index')->with('mensaje', 'Te estas eliminando a ti mismo');
        // }
        $country->delete();
        return redirect()->route('countries.index')->with('mensaje', 'Pais Eliminado Correctamente');

    }
}
