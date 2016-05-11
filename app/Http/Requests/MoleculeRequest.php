<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Molecule\Molecule;

class MoleculeRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'level1Name' => 'required',
            'level2Name' => 'required',
            'moleculeName' => 'required',
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
            $ob = new Molecule();
            $req = $this->request;
            if(empty($req->get('mid')))
            {
                $res = 0;
                if (!empty($req->get('level1Name')) && (!empty($req->get('level2Name'))))
                    $res = $ob->checkMoleculesExists($req->get('level1Name'), $req->get('level2Name'), $req->get('moleculeName'));
                if ($res == 1)
                    $validator->errors()->add('moleculeName', 'Molecule Name Already Exists');
            }
            else
            {
                $res = 0;
                if (!empty($req->get('level1Name')) && (!empty($req->get('level2Name'))))
                    $res = $ob->checkEditMoleculesExists((string) $req->get('level1Name'), (string) $req->get('level2Name'), (string) $req->get('mid'), $req->get('moleculeName'));
                if ($res == 1)
                    $validator->errors()->add('moleculeName', 'Molecule Name Already Exists');                
            }
        });


        return $validator;
    }

    public function messages() {
        $messages = [];
        return $messages;
    }

}
