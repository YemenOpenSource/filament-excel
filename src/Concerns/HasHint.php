<?php

namespace YOS\FilamentExcel\Concerns;

trait HasHint
{
    protected string $hintName;

    /**
     * @return mixed
     */
    public function getHint()
    {
        return $this->hintName;
    }

    public function hint(string $hintName): static
    {
        $this->hintName = $hintName;

        return $this;
    }
}
