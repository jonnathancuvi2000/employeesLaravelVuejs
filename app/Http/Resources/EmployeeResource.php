<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // we use this way, cuando hay relzaciones entre lals tablas 
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'country' => $this->country, // obtenmos todos los datos en un objeto 
            'state' => $this->state, // obtenmos todos los datos en un objeto 
            'city' => $this->city, // obtenmos todos los datos en un objeto 
            'department' => $this->department, // obtenmos todos los datos en un objeto 
            'zip_code' => $this->zip_code,
            'birthdate' => $this->birthdate,
            'date_hired' => $this->date_hired   
        ];
    }
}
