<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Models\Client\Client;

class BusinessGroupRequest extends Request
{
   /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'clientName' => 'required',
            'groupName' => 'required',            
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
            $ob = new Client();
            $req = $this->request;
            if(empty($req->get('bgid')))
            {
                $res = 0;
                if (!empty($req->get('clientName')) && (!empty($req->get('groupName'))))
                    $res = $ob->checkDuplicateGroupName($req->get('clientName'), $req->get('groupName'));
                if ($res == 1)
                    $validator->errors()->add('groupName', 'Business Group Name Already Exists');
            }
            else
            {
                $res = 0;
                if (!empty($req->get('clientName')) && (!empty($req->get('groupName'))))
                    $res = $ob->checkEditDuplicateGroupName($req->get('cid'), $req->get('bgid'), $req->get('clientName'), $req->get('groupName'));
                if ($res == 1)
                    $validator->errors()->add('groupName', 'Business Group Name Already Exists');                            
            }
        });


        return $validator;
    }

    public function messages() {
        $messages = [];
        return $messages;
    }

}
