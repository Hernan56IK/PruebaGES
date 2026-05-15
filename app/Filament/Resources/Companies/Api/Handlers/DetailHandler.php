<?php

namespace App\Filament\Resources\Companies\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\Companies\CompanyResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\Companies\Api\Transformers\CompanyTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = CompanyResource::class;
    protected static string $permission = 'View:Company';


    /**
     * Show Company
     *
     * @param Request $request
     * @return CompanyTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new CompanyTransformer($query);
    }
}
