<?php

namespace LaTevaWeb\CustomProperties;

use Illuminate\Support\Arr;

trait HasCustomProperties
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->casts = ['custom_properties' => 'array']; // TODO cuidado que no machaque lo que lleve el modelo
    }


    public function forgetCustomProperty(string $name): self
    {

        $customProperties = $this->custom_properties;
        Arr::forget($customProperties, $name);
        $this->custom_properties = $customProperties;
        return $this;
    }

    /**
     * Get the value of custom property with the given name.
     *
     * @param string $propertyName
     * @param mixed $default
     *
     * @return mixed
     */
    public function getCustomProperty(string $propertyName, $default = null)
    {
        return Arr::get($this->custom_properties, $propertyName, $default);
    }

    /*
     * Determine if the model item has a custom property with the given name.
     */
    public function hasCustomProperty(string $propertyName): bool
    {
        return Arr::has($this->custom_properties, $propertyName);
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return $this
     */
    public function setCustomProperty(string $name, $value): self
    {
        $customProperties = $this->custom_properties;
        Arr::set($customProperties, $name, $value);
        $this->custom_properties = $customProperties;
        return $this;
    }
}
