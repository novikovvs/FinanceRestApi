<?php

namespace App\ResouceModels\BaseResourceModels;

class ResponseResourceModel extends BaseResourceModel
{
    public bool $status;

    public string $message = '';

    public mixed $result;

    public string $error = '';
}
