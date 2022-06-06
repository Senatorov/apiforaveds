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
        return [
            'id' => $this->id,
            'employee_email' => $this->employee_email,
            'employee_name' => $this->employee_name,
            'employee_age' => $this->employee_age,
            'employee_salary' => $this->employee_salary,
            'employee_experience' => $this->employee_experience,
            'employee_photo' => $this->employee_photo,
        ];
    }
}
