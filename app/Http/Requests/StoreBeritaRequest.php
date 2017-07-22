<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBeritaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'judul' =>'required|unique:beritas,judul',
            'deskripsi' => 'string',
            'kategori_id' => 'required|exists:kategoris,id',
            'tanggal' => 'date',
            'cover' => 'image|max:10000'
        ];
    }
}
