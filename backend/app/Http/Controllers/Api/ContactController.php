<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{

    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->all());

        return response()->json([
            'message' => 'Message sent successfully',
            'contact' => $contact
        ], 201);
    }

    public function delete($id)
    {
        $contact = Contact::create($id);
        return response()->json([
            'message' => 'Message deleted successfully',
            'contact' => $contact
        ], 200);
        if (!$contact) {
            return response()->json([
                'message' => 'Message not found',
                'contact' => $contact
            ], 404);
        }
    }


    public function checkcontactlist($id)
    {
        $contact = Contact::where('user_id', $id)->first();
        if ($contact) {
            return response()->json([
                'message' => 'Contact already exists',
                'contact' => $contact
            ], 200);
        } else {
            return response()->json([
                'message' => 'Contact not found',
                'contact' => $contact
            ], 404);
        }
    }

    public function view($id)
    {
        $contact = Contact::where('user_id', $id)->get();
        if ($contact) {
            return response()->json([
                'message' => 'Contact found',
                'contact' => $contact
            ], 200);
        } else {
            return response()->json([
                'message' => 'Contact not found',
                'contact' => $contact
            ], 404);
        }
    }


}