<?php

namespace App\Modules\Destinations\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Lead\Requests\StoreLeadRequest;
use App\Modules\Lead\Requests\LeadRequest;
use App\Modules\Lead\Services\LeadService;

class DestinationController extends Controller
{
    protected $DestinationPageService;

    public function __construct(LeadService $DestinationPageService)
    {
        $this->DestinationPageService = $DestinationPageService;
    }

    public function store(StoreLeadRequest $request)
    {
        $lead = $this->DestinationPageService->createLead($request->validated());

        return response()->json([
            'message' => 'Lead captured successfully',
            'lead' => $lead
        ], 201);
    }

    public function create(LeadRequest $request)
    {
        $lead = $this->DestinationPageService->createLead($request->validated());

        return response()->json([
            'message' => 'Lead captured successfully',
            'lead' => $lead
        ], 201);
    }

    public function index()
    {
        $leads = $this->DestinationPageService->getAllLeads();

        return response()->json([
            'message' => 'Leads retrieved successfully',
            'leads' => $leads
        ], 200);
    }

    public function show($id)
    {
        $lead = $this->DestinationPageService->getLeadById($id);

        if (!$lead) {
            return response()->json([
                'message' => 'Lead not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Lead retrieved successfully',
            'lead' => $lead
        ], 200);
    }

    public function delete($id)
    {
        $result = $this->DestinationPageService->deleteLead($id);

        if (!$result) {
            return response()->json([
                'message' => 'Lead not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Lead deleted successfully'
        ], 200);
    }
}
