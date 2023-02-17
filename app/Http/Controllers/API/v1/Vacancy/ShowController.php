<?php

namespace App\Http\Controllers\API\v1\Vacancy;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($vacancy)
    {
        $vacancy = Vacancy::find($vacancy);

        if (!$vacancy) {
            return response()->json([
                'status' => '404',
                'message' => 'Not found'
            ], 404);
        }
    }
}
