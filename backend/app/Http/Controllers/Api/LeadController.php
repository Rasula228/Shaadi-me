<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use App\Http\Requests\LeadRequest;

class LeadController extends Controller
{

    public function store(StoreLeadRequest $request)
    {
        $lead = Lead::create($this->mapLeadData($request));

        return response()->json([
            'message' => 'Lead captured successfully',
            'lead' => $lead
        ], 201);
    }

    public function create(LeadRequest $request)
    {
        $lead = Lead::create($this->mapLeadData($request));

        return response()->json([
            'message' => 'Lead captured successfully',
            'lead' => $lead
        ], 201);
    }

    /**
     * Map request data to Lead model attributes.
     */
    private function mapLeadData($request): array
    {
        return [
            'bride_name' => $request->brideName,
            'groom_name' => $request->groomName,
            'phone' => $request->phone,
            'wedding_date' => $request->date,
            'budget' => $request->budget,
            'wedding_type' => $request->type,
            'guest_count' => $request->guests,
            'planning_preference' => $request->preference,
            'city' => $request->city,
        ];
    }


}
