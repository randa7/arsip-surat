<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorUpdateMasukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "idbagian" =>'required',
            "nomor_surat" => 'required',
            "perihal" => 'required',
            "lampiran" =>'required',
            "pengirim" => 'required',
            "file_surat" =>['nullable', 'mimetypes:image/*,application/pdf','max:5120'],
            "tanggalsurat" => 'required|before_or_equal:tanggalsuratmasuk',
            "tanggalsuratmasuk" => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'idbagian.required' => 'Bagian tidak boleh kosong',
            'nomor_surat.required' => 'Nomor surat tidak boleh kosong',
            'perihal.required' => 'Perihal tidak boleh kosong',
            'lampiran.required' => 'Lampiran surat tidak boleh kosong',
            'pengirim.required' => 'Pengirim tidak boleh kosong',
            'tanggalsurat.required' => 'Tanggal surat tidak boleh kosong',
            'tanggalsurat.before_or_equal' => 'Tanggal surat tidak boleh melewati tanggal pengarsipan',
            'file_surat.mimetypes' => 'File harus bertype image atau pdf',
            'file_surat.max' => 'Ukuran file tidak boleh lebih dari 5 MB'
        ];
    }
}
