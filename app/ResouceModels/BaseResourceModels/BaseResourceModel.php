<?php

namespace App\ResouceModels\BaseResourceModels;

class BaseResourceModel
{
    public function toArray(): array
    {
        return $this->recursiveToArray($this);
    }

    function recursiveToArray(object $object): array
    {
        $vars = get_object_vars($object);
        $result = [];
        foreach ($vars as $key => $var) {
            $result[$this->toKebabCase($key)] = $this->objectToArray($var);
        }
        return $result;
    }

    function objectToArray(mixed $object): mixed
    {
        if (is_object($object) || is_array($object)) {
            $ret = (array)$object;
            foreach ($ret as &$item) {
                $item = $this->recursiveToArray($item);
            }
            return $ret;
        } else {
            return $object;
        }
    }

    private function toKebabCase(string $key): string
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $key, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}
