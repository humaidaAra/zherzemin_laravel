<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->has('featured')) {
            $this['featured'] = $this['featured'] == "on" ? 1 : 0;
        } else {
            $this->merge(['featured' => 0]);
        }
        $this->merge(['user_id'=>auth()->user()->id]);
        if(request()->routeIs('articles.update'))
        {
            return [
                'title_en' => ['nullable', 'required_without_all:title_ku,title_ar'],
                'description_en' => ['required_without_all:description_ku,description_ar', 'max:50'],
                'body_en' => ['required_without_all:body_ku,body_ar'],

                'title_ku' => ['nullable', 'required_without_all:title_en,title_ar'],
                'description_ku' => ['required_without_all:description_en,description_ar', 'max:50'],
                'body_ku' => ['required_without_all:body_en,body_ar'],

                'title_ar' => ['nullable', 'required_without_all:title_ku,title_en'],
                'description_ar' => ['required_without_all:description_ku,description_en', 'max:50'],
                'body_ar' => ['required_without_all:body_ku,body_en'],

                'featured' => ['nullable'],
                'cover' => ['nullable', 'image'],
                'user_id'=>['required'],

                'tags'=> ['nullable', 'array'],
                'tags.*'=> ['numeric','exists:Tags,id'],

                'sponsers'=> ['nullable', 'array'],
                'sponsers.*'=> ['numeric', 'exists:Sponsers,id'],

                'profiles'=> ['nullable', 'array'],
                'profiles.*'=> ['numeric', 'exists:Profiles,id']
        ];
        }
        return [
                'title_en' => ['nullable', 'required_without_all:title_ku,title_ar', 'unique:articles'],
                'description_en' => ['required_without_all:description_ku,description_ar', 'max:50'],
                'body_en' => ['required_without_all:body_ku,body_ar'],

                'title_ku' => ['nullable', 'required_without_all:title_en,title_ar', 'unique:articles'],
                'description_ku' => ['required_without_all:description_en,description_ar', 'max:50'],
                'body_ku' => ['required_without_all:body_en,body_ar'],

                'title_ar' => ['nullable', 'required_without_all:title_ku,title_en', 'unique:articles'],
                'description_ar' => ['required_without_all:description_ku,description_en', 'max:50'],
                'body_ar' => ['required_without_all:body_ku,body_en'],

                'featured' => ['nullable'],
                'cover' => ['nullable', 'image'],
                'user_id'=>['required'],

                'tags'=> ['nullable', 'array'],
                'tags.*'=> ['numeric','exists:Tags,id'],

                'sponsers'=> ['nullable', 'array'],
                'sponsers.*'=> ['numeric', 'exists:Sponsers,id'],

                'profiles'=> ['nullable', 'array'],
                'profiles.*'=> ['numeric', 'exists:Profiles,id']
        ];
    }
}
