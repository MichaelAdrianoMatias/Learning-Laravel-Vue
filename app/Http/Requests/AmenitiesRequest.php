<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class AmenitiesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        switch($this->method())
        {
            case 'POST': 
            {
                return [
                    'code' => 'required|max:20|unique:amenities',
                    'name' => 'required|min:4|max:20|unique:amenities',
                    'barrowedcost' => 'required|numeric',
                    'damagedcost' => 'required|numeric',
                    'quantity' => 'required|integer',
                ]
            }
            
            case 'PUT':
            case 'PATCH': 
            {
                return [
                    'code' => 'required|max:20|unique:amenities,' .$this->id,
                    'name' => 'required|min:4|max:20|unique:amenities,' .$this->id,
                    'barrowedcost' => 'required|numeric',
                    'damagedcost' => 'required|numeric',
                    'quantity' => 'required|integer',
                ];        
            }
        }
    }
}