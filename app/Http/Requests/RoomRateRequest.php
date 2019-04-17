<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RoomRateRequest extends FormRequest
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
                    'code' => 'required|string|unique:room_rates',
                    'hours' => 'required|integer',
                    'rate' => 'required|numeric',
                    'room_id' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'code' => 'required|string:unique:room_rates,code,' .$this->id,
                    'hours' => 'required|integer',
                    'rate' => 'required|numeric',
                    'room_id' => 'required',
                ]; 
            }
            
            
        }
       
    }
}