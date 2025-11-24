<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'pelanggan_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
    ];

    /**
     * Scope: Filter berdasarkan kolom yang dapat difilter
     */
    public function scopeFilter(Builder $query, $request, array $filterableColumns = []): Builder
    {
        if (!$request) {
            return $query;
        }

        foreach ($filterableColumns as $column) {
            if ($request->has($column) && $request->filled($column)) {
                $value = $request->input($column);
                $query->where($column, $value);
            }
        }
        return $query;
    }

    /**
     * Scope: Search berdasarkan kolom yang dapat dicari
     */
    public function scopeSearch(Builder $query, $request, array $searchableColumns = []): Builder
    {
        if (!$request || !$request->filled('search')) {
            return $query;
        }

        $searchTerm = $request->input('search');
        
        return $query->where(function (Builder $q) use ($searchTerm, $searchableColumns) {
            foreach ($searchableColumns as $index => $column) {
                if ($index === 0) {
                    $q->where($column, 'like', '%' . $searchTerm . '%');
                } else {
                    $q->orWhere($column, 'like', '%' . $searchTerm . '%');
                }
            }
        });
    }
    public function files()
    {
        return $this->hasMany(PelangganFile::class, 'pelanggan_id', 'pelanggan_id');
    }
}
