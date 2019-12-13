<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Form;
class FormSrviceProvider extends ServiceProvider
{
    public function register()
    {
    }
    public function boot()
    {
        Form::component("text",'components.form.text',['name','value' => null, 'attributes' => []]);
        Form::component("textarea",'components.form.textarea',['name','value' => null, 'attributes' => []]);
        Form::component("submit",'components.form.submit',['value' => 'submit', 'attributes' => []]);
        Form::component("hidden",'components.form.hidden',['name','value' => 'submit', 'attributes' => []]);
        Form::component("file",'components.form.file',['name', 'attributes' => []]);
    }
}
