<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Spatie\TranslationLoader\LanguageLine;

class TranslationUnique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // if(!preg_match('/^[A-Za-z0-9&_.]*$/',$value)){
        //     return false;
        // }
        $exploded = explode('.', $value, 2);
        if (count($exploded) > 1) {
            $check = LanguageLine::where('group', '=', $exploded[0])->where('key', '=', $exploded[1])->count();
            if ($check > 0) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
