<?php

namespace App\Modules\Weddings\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Lead\Requests\StoreLeadRequest;
use App\Modules\Lead\Requests\LeadRequest;
use App\Modules\Lead\Services\LeadService;

class WeddingsController extends Controller
{
    protected $WeddingService;

    public function __construct(LeadService $WeddingService)
    {
        $this->WeddingService = $WeddingService;
    }

    public function store(StoreLeadRequest $request)
    {
        $lead = $this->WeddingService->createLead($request->validated());

        return response()->json([
            'message' => 'Lead captured successfully',
            'lead' => $lead
        ], 201);
    }

    public function create(LeadRequest $request)
    {
        $lead = $this->WeddingService->createLead($request->validated());

        return response()->json([
            'message' => 'Lead captured successfully',
            'lead' => $lead
        ], 201);
    }

    public function index()
    {
        $leads = $this->WeddingService->getAllLeads();

        return response()->json([
            'message' => 'Leads retrieved successfully',
            'leads' => $leads
        ], 200);
    }

    public function show($id)
    {
        $lead = $this->WeddingService->getLeadById($id);

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
        $result = $this->WeddingService->deleteLead($id);

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
