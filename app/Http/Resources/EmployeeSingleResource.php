<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeSingleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // usamos esto, cuando hay relaciones entre las tablas de la base de datos
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'country_id' => $this->country_id, // solo obtenemos le ID
            'state_id' => $this->state_id, // solo obtenemos le ID
            'city_id' => $this->city_id, // solo obtenemos le ID
            'department_id' => $this->department_id, // solo obtenemos le ID
            'zip_code' => $this->zip_code,
            'birthdate' => $this->birthdate,
            'date_hired' => $this->date_hired
        ];
    }
}
