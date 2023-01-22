<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeSingleResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::all(); // we get tehe employees data

        if ($request->buscar) {
            // no tiene que tener espacios "%{$request->buscar}%" si no no funciona
            $employees = Employee::where('first_name', "like", "%{$request->buscar}%")
            ->orWhere('last_name', "like", "%{$request->buscar}%")
            ->get();
        } else if ($request->department_id) {
            $employees = Employee::where('department_id', "like", "%{$request->department_id}%")->get();
        }
        // usamos esto, cuando hay relaciones entre las tablas, y tenemos objetos dentro de los campos  de las tablas
        return EmployeeResource::collection($employees);
        // return response()->json($employees);//  we use this to send the data instead of up and the this also sends the data in a json form
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        echo $request;
        $employee = Employee::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'department_id' => $request->department_id,
            'zip_code' => $request->zip_code,
            'birthdate' => $request->birthdate,
            'date_hired' => $request->date_hired
        ]);
        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return new EmployeeSingleResource($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeStoreRequest $request, Employee $employee)
    {
        $employee->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'department_id' => $request->department_id,
            'zip_code' => $request->zip_code,
            'birthdate' => $request->birthdate,
            'date_hired' => $request->date_hired
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json('Empleado Eliminado Exitosamente');
    }
}
