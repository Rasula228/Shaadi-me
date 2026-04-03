<?php

namespace App\Modules\Contact\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Contact\Requests\StoreContactRequest;
use App\Modules\Contact\Models\Contact;
use App\Modules\Contact\Services\ContactService;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->getAllContacts();
        
        return response()->json([
            'message' => 'Contacts retrieved successfully',
            'contacts' => $contacts
        ], 200);
    }

    public function store(StoreContactRequest $request)
    {
        $contact = $this->contactService->createContact($request->validated());
        
        return response()->json([
            'message' => 'Contact created successfully',
            'contact' => $contact
        ], 201);
    }

    public function show($id)
    {
        $contact = $this->contactService->getContactById($id);
        
        if (!$contact) {
            return response()->json([
                'message' => 'Contact not found'
            ], 404);
        }
        
        return response()->json([
            'message' => 'Contact retrieved successfully',
            'contact' => $contact
        ], 200);
    }

    public function update(StoreContactRequest $request, $id)
    {
        $contact = $this->contactService->updateContact($id, $request->validated());
        
        if (!$contact) {
            return response()->json([
                'message' => 'Contact not found'
            ], 404);
        }
        
        return response()->json([
            'message' => 'Contact updated successfully',
            'contact' => $contact
        ], 200);
    }

    public function delete($id)
    {
        $result = $this->contactService->deleteContact($id);
        
        if (!$result) {
            return response()->json([
                'message' => 'Contact not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Contact deleted successfully'
        ], 200);
    }

    public function checkcontactlist($id)
    {
        $contact = $this->contactService->getContactByUserId($id);

        if ($contact) {
            return response()->json([
                'message' => 'Contact already exists',
                'contact' => $contact
            ], 200);
        } else {
            return response()->json([
                'message' => 'Contact not found'
            ], 404);
        }
    }
}