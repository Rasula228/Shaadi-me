<?php

namespace App\Modules\Home\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Lead\Requests\StoreLeadRequest;
use App\Modules\Lead\Requests\LeadRequest;
use App\Modules\Lead\Services\LeadService;

class HomeController extends Controller
{
    protected $HomePageService;

    public function __construct(LeadService $HomeService)
    {
        $this->HomePageService = $HomeService;
    }

    public function store(StoreLeadRequest $request)
    {
        $lead = $this->HomePageService->createLead($request->validated());

        return response()->json([
            'message' => 'Lead captured successfully',
            'lead' => $lead
        ], 201);
    }

    public function create(LeadRequest $request)
    {
        $lead = $this->HomePageService->createLead($request->validated());

        return response()->json([
            'message' => 'Lead captured successfully',
            'lead' => $lead
        ], 201);
    }

    public function index()
    {
        $leads = $this->HomePageService->getAllLeads();

        return response()->json([
            'message' => 'Leads retrieved successfully',
            'leads' => $leads
        ], 200);
    }

    public function show($id)
    {
        $lead = $this->HomePageService->getLeadById($id);

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
        $result = $this->HomePageService->deleteLead($id);

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
