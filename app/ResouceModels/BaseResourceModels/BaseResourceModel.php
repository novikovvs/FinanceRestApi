<?php

namespace App\ResouceModels\BaseResourceModels;

class BaseResourceModel
{
    public function toArray(): array
    {
        return $this->recursiveToArray($this);
    }

    function recursiveToArray($data): array
    {
        $vars = get_object_vars($data);
        $result = [];
        foreach ($vars as $key => $var) {
            $result[$this->fromCamelCase($key)] = $this->objectToArray($var);
        }
        return $result;
    }

    function objectToArray(mixed $obj): mixed
    {
        if (is_object($obj) || is_array($obj)) {
            $ret = (array)$obj;
            foreach ($ret as &$item) {
                $item = $this->recursiveToArray($item);
            }
            return $ret;
        } else {
            return $obj;
        }
    }

    private function fromCamelCase($input): string
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}
