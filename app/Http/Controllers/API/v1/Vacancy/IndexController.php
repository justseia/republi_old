<?php

namespace App\Http\Controllers\API\v1\Vacancy;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $vacancy = Vacancy::simplePaginate(50);
        return response()->json($vacancy, 200);w
    }
}
