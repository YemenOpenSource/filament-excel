<?php

namespace YOS\FilamentExcel\Concerns;

trait HasType
{
    protected string $typeName;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->typeName;
    }

    public function type(string $typeName): static
    {
        $this->typeName = $typeName;

        return $this;
    }
}
