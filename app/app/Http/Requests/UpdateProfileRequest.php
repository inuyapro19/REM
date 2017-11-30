<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Profile;

class UpdateProfileRequest extends FormRequest
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

        $rules = Profile::$rules;
        // get ID of the user of the profile being edited.
        $id = $this->input('users_id');

        //update dont have to change the users_id, so we want to ignore this id for the unique validation
        $rules['users_id'] = $rules['users_id'].', '.$id;

        return $rules;
        //return Profile::$rules; <- This is the original rule
    }
}
