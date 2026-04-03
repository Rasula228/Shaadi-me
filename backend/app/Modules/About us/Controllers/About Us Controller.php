<?php

namespace App\Modules\AboutUs\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Lead\Requests\StoreLeadRequest;
use App\Modules\Lead\Requests\LeadRequest;
use App\Modules\Lead\Services\LeadService;

class AboutUsController extends Controller
{
    protected $AboutUsPageService;

    public function __construct(LeadService $AboutUsPageService)
    {
        $this->AboutUsPageService = $AboutUsPageService;
    }

    public function store(StoreLeadRequest $request)
    {
        $lead = $this->AboutUsPageService->createLead($request->validated());

        return response()->json([
            'message' => 'Lead captured successfully',
            'lead' => $lead
        ], 201);
    }

    public function create(LeadRequest $request)
    {
        $lead = $this->AboutUsPageService->createLead($request->validated());

        return response()->json([
            'message' => 'Lead captured successfully',
            'lead' => $lead
        ], 201);
    }

    public function index()
    {
        $leads = $this->AboutUsPageService->getAllLeads();

        return response()->json([
            'message' => 'Leads retrieved successfully',
            'leads' => $leads
        ], 200);
    }

    public function show($id)
    {
        $lead = $this->AboutUsPageService->getLeadById($id);

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
        $result = $this->AboutUsPageService->deleteLead($id);

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
