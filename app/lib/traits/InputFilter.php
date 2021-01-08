<?php
namespace QEEMA\lib\traits;


trait InputFilter
{
    public function filterInt($input){
        return (int) filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }

    public function filterFloat($input){
        return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    }

    public function filterStr($input){
        return htmlentities(strip_tags($input), ENT_QUOTES,"UTF-8");
    }

    public function filterEmail($input){
        return filter_var($input,FILTER_VALIDATE_EMAIL);
    }

    public function checkInput($method,$input)
    {
        $method = strtoupper($method);

        if ($_SERVER['REQUEST_METHOD'] === $method)
        {
            if (isset($_REQUEST[$input]) && $_REQUEST[$input] !== '')
            {

                return $_REQUEST[$input];

            }

            throw new \RuntimeException(['message' => $input.' Not Provided','error_for' => $input],'en',false);
        }

        throw new \RuntimeException('Please Provide a Valid request, The Request type must be '.$method);
    }
}
