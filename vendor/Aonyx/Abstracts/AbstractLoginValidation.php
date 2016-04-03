<?php
/**
 * @author: galicher
 * Date: 03/04/16
 * Time: 12:55
 */

namespace Aonyx\Abstracts;


use Aonyx\Interfaces\InterfaceValidation;

abstract class AbstractLoginValidation implements InterfaceValidation
{
    public function validEmail($email)
    {
        // TODO: Implement validEmail() method.
    }

    public function requiredFields(array $required)
    {
        // TODO: Implement requiredFields() method.
    }

    public function isAlpha($field)
    {
        // TODO: Implement isAlpha() method.
    }

    public function getErrors()
    {
        // TODO: Implement getErrors() method.
    }

    public function getSuccess()
    {
        // TODO: Implement getSuccess() method.
    }


}