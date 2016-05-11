<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientSetupRequest extends Request
{
    
    protected function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->after(function() use ($validator) {
            $req = $this->request;
            if($req->get('type') == 'indication')
            {
                if(empty($req->get('thera_details')))
                    $validator->errors()->add('thera_details', 'Therapeutic Area is required');
                if(empty($req->get('indication_details')))
                    $validator->errors()->add('indication_details', 'Indication is required');

            }
            if($req->get('type') == 'molecule')
            {
                if(empty($req->get('level1_details')))
                    $validator->errors()->add('level1_details', 'Primary Group is required');
                if(empty($req->get('level2_details')))
                    $validator->errors()->add('level2_details', 'Secondary Group is required');   
                if(empty($req->get('molecule_details')))
                    $validator->errors()->add('molecule_details', 'Molecule Name is required');   
            }
        });


        return $validator;
    }
    
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
            'client_details' => 'required',
            'bg_details' => 'required',
            'type' => 'required',
            'feed_url' => 'required|url',
        ];
    }
}
