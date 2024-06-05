<?php

namespace YOS\FilamentExcel\Concerns;

trait HasImport
{
    protected string $importName;

    /**
     * @return mixed
     */
    public function getImport()
    {
        return $this->importName;
    }

    public function import(string $importName): static
    {
        $this->importName = $importName;

        return $this;
    }
}
