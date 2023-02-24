<?php

namespace App\Http\Controllers\API\v1\Vacancy;

use App\Http\Controllers\Controller;
use App\Http\Resources\Vacancy\IndexResource;
use App\Models\Vacancy;

class IndexController extends Controller
{
    public function __invoke()
    {
        $vacancy = Vacancy::with(['city.country', 'company'])->simplePaginate(50);

        return IndexResource::collection($vacancy);
    }
}
