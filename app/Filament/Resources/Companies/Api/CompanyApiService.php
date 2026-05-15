<?php
namespace App\Filament\Resources\Companies\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\Companies\CompanyResource;


class CompanyApiService extends ApiService
{
    protected static string | null $resource = CompanyResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
