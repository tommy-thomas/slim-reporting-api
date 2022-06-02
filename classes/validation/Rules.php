<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/17/2016
 * Time: 12:57 PM
 */

namespace MyNameSpace\AnnualReport\Validation;

use Respect\Validation\Validator as v;

class Rules
{

    public static function getRules($path)
    {
        $rules = [];
        // User.
        $additionalCharsForUser = ".'-`";
        $minLengthForUser = 1;
        $maxLengthForUser = 50;
        // validation for adding faculty
        $rules['faculty/add'] = array(
            'personID' => v::notEmpty()->setName('personID'),// personID
            'FirstName' => v::alpha($additionalCharsForUser)
                ->length($minLengthForUser, $maxLengthForUser)
                ->notEmpty()
                ->setName('First Name'),
            'LastName' => v::alpha($additionalCharsForUser)
                ->length($minLengthForUser, $maxLengthForUser)
                ->notEmpty()
                ->setName('Last Name'),//, // last name
            'Email' => v::filterVar(FILTER_VALIDATE_EMAIL)->setName('Email') // email
        );
        // validation for adding admin
        $rules['admin/add'] = array(
            'personID' => v::notEmpty()->setName('personID'),// personID
            'FirstName' => v::alpha($additionalCharsForUser)
                ->length($minLengthForUser, $maxLengthForUser)
                ->notEmpty()
                ->setName('First Name'),
            'LastName' => v::alpha($additionalCharsForUser)
                ->length($minLengthForUser, $maxLengthForUser)
                ->notEmpty()
                ->setName('Last Name'),//, // last name
        );
        // validation for adding proxy
        $rules['proxy/add'] = array(
            'personID' => v::notEmpty()->setName('personID'),// personID
            'FirstName' => v::alpha($additionalCharsForUser)
                ->length($minLengthForUser, $maxLengthForUser)
                ->notEmpty()
                ->setName('First Name'),
            'LastName' => v::alpha($additionalCharsForUser)
                ->length($minLengthForUser, $maxLengthForUser)
                ->notEmpty()
                ->setName('Last Name'),//, // last name
        );
        return isset($rules[$path]) ? $rules[$path] : [];
    }
}