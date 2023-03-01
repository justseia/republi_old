<?php

namespace App\Http\Controllers\API\v1\Vacancy;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $vacancy = Vacancy::create([
            'position' => $request->position,
            'salary_from' => $request->salary_from,
            'salary_to' => $request->salary_to,
            'location_id' => $request->location_id,
            'company_id' => $request->company_id,
            'criteria_id' => $request->criteria_id,
            'responsibility' => json_encode($request->responsibility),
            'requirement' => json_encode($request->requirement),
            'condition' => json_encode($request->condition),
            'skill' => json_encode($request->skill),
        ]);

        return response()->json([
            'status' => '201',
            'message' => 'Success'
        ], 201);
    }
}
