<?php
namespace App\Filament\Resources\Companies\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\Companies\CompanyResource;
use App\Filament\Resources\Companies\Api\Transformers\CompanyTransformer;

class PaginationHandler extends Handlers {
    protected static bool $public = true;
    
    public static string | null $uri = '/';
    public static string | null $resource = CompanyResource::class;
    protected static string $permission = 'ViewAny:Company';


    /**
     * List of Company
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function handler()
    {
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for($query)
        ->allowedFields($this->getAllowedFields() ?? [])
        ->allowedSorts($this->getAllowedSorts() ?? [])
        ->allowedFilters($this->getAllowedFilters() ?? [])
        ->allowedIncludes($this->getAllowedIncludes() ?? [])
        ->paginate(request()->query('per_page'))
        ->appends(request()->query());

        return CompanyTransformer::collection($query);
    }
}
