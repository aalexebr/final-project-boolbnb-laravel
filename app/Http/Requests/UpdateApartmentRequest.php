<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//HLEPERS
use Illuminate\Support\Facades\Auth;
class UpdateApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
       
            return [
                'room' => 'required|numeric|min:1|max:100',
                'bathroom' => 'required|numeric|min:1|max:100',
                'bed' => 'required|numeric|min:1|max:100',
                'shared_bathroom' => 'nullable|boolean',
                'address' => 'required|string|max:128',
                // 'city' => 'nullable|string|max:128',
                'visible' => 'required',
                'name' => 'required|string|max:64',
                'price' => 'required|decimal:0,2|max:9999',
                'square_meter' => 'required|numeric|max:9999',
                'description' => 'required|string',
                'cover_img' => 'nullable|image',
                'service'=>'nullable|array',
                'service.*'=>'exists:services,id',
                'extra_imgs'=>'nullable|array',
                'delete_imgs'=>'nullable|array'
             ];
    }

    public function messages()
    {
        return [
            'room.required' => 'Il campo "Numero stanze" è obbligatorio.',
            'room.numeric' => 'Il campo "Numero stanze" deve essere un numero.',
            'room.min' => 'Il campo "Numero stanze" deve essere almeno :min.',
            'room.max' => 'Il campo "Numero stanze" non può superare :max.',
            'bathroom.required' => 'Il campo "Numero bagni" è obbligatorio.',
            'bathroom.numeric' => 'Il campo "Numero bagni" deve essere un numero.',
            'bathroom.min' => 'Il campo "Numero bagni" deve essere almeno :min.',
            'bathroom.max' => 'Il campo "Numero bagni" non può superare :max.',
            'bed.required' => 'Il campo "Numero letti" è obbligatorio.',
            'bed.numeric' => 'Il campo "Numero letti" deve essere un numero.',
            'bed.min' => 'Il campo "Numero letti" deve essere almeno :min.',
            'bed.max' => 'Il campo "Numero letti" non può superare :max.',
            'address.required' => 'Il campo "Indirizzo" è obbligatorio.',
            'address.string' => 'Il campo "Indirizzo" deve essere una stringa.',
            'address.max' => 'Il campo "Indirizzo" non può superare :max caratteri.',
            'city.required' => 'Il campo "Città" è obbligatorio.',
            'city.string' => 'Il campo "Città" deve essere una stringa.',
            'city.max' => 'Il campo "Città" non può superare :max caratteri.',
            'name.required' => 'Il campo "Nome" è obbligatorio.',
            'name.string' => 'Il campo "Nome" deve essere una stringa.',
            'name.max' => 'Il campo "Nome" non può superare :max caratteri.',
            'square_meter.required' => 'Il campo "Metri quadrati" è obbligatorio.',
            'square_meter.numeric' => 'Il campo "Metri quadrati" deve essere un numero.',
            'square_meter.max' => 'Il campo "Metri quadrati" non può superare :max.',
            'description.required' => 'Il campo "Descrizione" è obbligatorio.',
            'description.string' => 'Il campo "Descrizione" deve essere una stringa.',
            'cover_img.image' => 'Il campo "Immagine di copertina" deve essere un\'immagine.',
            'cover_img.max' => 'L\'immagine di copertina non può superare :max KB.',
            'service.array' => 'Il campo "Servizi" deve essere un array.',
            'service.*.exists' => 'Uno o più servizi selezionati non sono validi.',
            'extra_imgs.array' => 'Il campo "Immagini aggiuntive" deve essere un array.',
        ];
    }
}
