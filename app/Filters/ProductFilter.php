<?php

namespace App\Filters;

use App\Filters\Filter;

class ProductFilter extends Filter
{
    public function q(string $searchTerm): void
    {
        $this->builder->where('name', 'ilike', "%{$searchTerm}%");
    }

    public function price_from(float $price): void
    {
        $this->builder->where('price', '>=', $price);
    }

    public function price_to(float $price): void
    {
        $this->builder->where('price', '<=', $price);
    }

    public function category_id(int $categoryId): void
    {
        $this->builder->where('category_id', $categoryId);
    }

    public function in_stock(string $inStock): void
    {
        $this->builder->where('in_stock', $inStock);
    }

    public function rating_from(float $rating): void
    {
        $this->builder->where('rating', '>=', $rating);
    }

    public function sort(string $sortBy): void
    {
        match ($sortBy) {
            'price_asc' => $this->builder->orderBy('price'),
            'price_desc' => $this->builder->orderByDesc('price'),
            'rating_desc' => $this->builder->orderByDesc('rating'),
            'newest' => $this->builder->latest(),
            default => $this->builder->latest(),
        };
    }
}
