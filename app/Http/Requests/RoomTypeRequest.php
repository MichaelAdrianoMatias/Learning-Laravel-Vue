<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RoomTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [];
    }
}