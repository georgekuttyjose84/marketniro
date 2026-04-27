<?php

namespace App\Container;

use ReflectionClass;
use ReflectionParameter;

class Container
{
    private array $bindings = [];

    public function bind(string $abstract, callable $factory): void
    {
        $this->bindings[$abstract] = $factory;
    }

    public function get(string $abstract): mixed
    {
        // If manually bound
        if (isset($this->bindings[$abstract])) {
            return $this->bindings[$abstract]($this);
        }

        // Auto resolve (magic 🔥)
        return $this->resolve($abstract);
    }

    private function resolve(string $class): object
    {
        $reflection = new ReflectionClass($class);

        if (!$reflection->isInstantiable()) {
            throw new \Exception("Class $class is not instantiable");
        }

        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return new $class;
        }

        $dependencies = array_map(
            fn(ReflectionParameter $param) => $this->resolveParameter($param),
            $constructor->getParameters()
        );

        return $reflection->newInstanceArgs($dependencies);
    }

    private function resolveParameter(ReflectionParameter $param): mixed
    {
        $type = $param->getType();

        if (!$type) {
            throw new \Exception("Cannot resolve parameter {$param->getName()}");
        }

        return $this->get($type->getName());
    }
}
