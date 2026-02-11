<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
abstract class Filter
{
    protected Builder $builder;
    public function __construct(public Request $request)
    {}

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter) && $value !== null) {
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

    protected function filters(): array
    {
        return $this->request->all();
    }
}
