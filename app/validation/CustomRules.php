<?php

namespace App\Validation;

class CustomRules
{

    // Rule  to validate  custom email
    public function emailValid(string $str, string $fields, array $data)
    {

        /*Checking: same as format*/
        if (preg_quote('/[a-zA-Z]+\.[0-9]+@student\.atmajaya\.ac\.id/', $data['email'])) {

            /*Checking: again*/
            $bool = preg_match('/[a-zA-Z]+\.[0-9]+@student\.atmajaya\.ac\.id/', $data['email']);
            return $bool == 0 ? false : true;
        } else {

            return false;
        }
    }
}
