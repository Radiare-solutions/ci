<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Indication\Indication;

class IndicationRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'indicationName' => 'required',
            'therapyName' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    protected function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->after(function() use ($validator) {
            $ob = new Indication();
            $req = $this->request;
            $res = 0;
            if (!empty($req->get('indicationName')) && (!empty($req->get('therapyName'))))
                $res = $ob->checkDuplicateByIndicationNameAndTherapeuticID((string) $req->get('therapyName'), $req->get('indicationName'));
            if ($res == 1)
                $validator->errors()->add('indicationName', 'Indication Name Already Exists');
        });


        return $validator;
    }

    public function messages() {
        $messages = [];
        // $messages['indicationName.required'] = $this->request->get('therapyName');
        // if($this->request->get('indicationName') == "hello")
        //$messages['therapyName.checkDuplicate'] = "duplicate";
        // foreach ($this->request->get('items') as $key => $val) {
        //$messages['indicationName.required'] = 'The field labeled "Book Title must be less than characters.';
        // }
        return $messages;
    }

}
