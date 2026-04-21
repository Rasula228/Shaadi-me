<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'p1name' => ['nullable', 'string', 'max:255'],
            'p2name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'community' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'weddingDate' => ['nullable', 'string', 'max:255'],
            'guests' => ['nullable', 'string', 'max:255'],
            'venueType' => ['nullable', 'string', 'max:255'],
            'budget' => ['nullable', 'numeric'],
            'styles' => ['nullable', 'array'],
            'services' => ['nullable', 'array'],
            'events' => ['nullable', 'array'],
            'notes' => ['nullable', 'string'],
            'referral' => ['nullable', 'string', 'max:255'],
        ]);

        $lead = Lead::create([
            'p1name' => $validated['p1name'] ?? null,
            'p2name' => $validated['p2name'] ?? null,
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'community' => $validated['community'] ?? null,
            'city' => $validated['city'] ?? null,
            'wedding_date' => $validated['weddingDate'] ?? null,
            'guests' => $validated['guests'] ?? null,
            'venue_type' => $validated['venueType'] ?? null,
            'budget' => $validated['budget'] ?? null,
            'styles' => $validated['styles'] ?? null,
            'services' => $validated['services'] ?? null,
            'events' => $validated['events'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'referral' => $validated['referral'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Lead received successfully!',
            'data' => $lead,
        ], 201);
    }
}
