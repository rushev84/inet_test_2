<?php

interface Obj
{
    public function getObjectName();
}

class SomeObject implements Obj
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getObjectName()
    {
        return $this->name;
    }
}

class SomeObjectsHandler
{
    public $objects = [];

    public function __construct($objects)
    {
        $this->objects = $objects;
    }

    public function handleObjects(): array
    {
        $handlers = [];

        foreach ($this->objects as $object) {
            $handlers[] = 'handle_' . $object->getObjectName();
        }

        return $handlers;
    }
}

$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2')
];

$soh = new SomeObjectsHandler($objects);
print_r($soh->handleObjects());