<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ComplexPasswordRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        // Add your custom password validation logic here
        // Example: Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
         return 'EL :attribute debe contener al menos 8 caracteres, una mayúscula, una minúscula, un número, y un caracter especial.';
         return 'The :attribute must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.';
    }
}
