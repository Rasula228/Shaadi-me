<?php

namespace App\Modules\Contact\Services;

use App\Modules\Contact\Models\Contact;

class ContactService
{
    public function getAllContacts()
    {
        return Contact::all();
    }

    public function getContactById(int $id): ?Contact
    {
        return Contact::find($id);
    }

    public function createContact(array $data): Contact
    {
        return Contact::create($data);
    }

    public function updateContact(int $id, array $data): ?Contact
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            return null;
        }
        
        $contact->update($data);
        return $contact->fresh();
    }

    public function deleteContact(int $id): bool
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            return false;
        }
        
        $contact->delete();
        return true;
    }

    public function getContactByUserId(int $userId): ?Contact
    {
        return Contact::where('user_id', $userId)->first();
    }

    public function getAllContactsByUserId(int $userId)
    {
        return Contact::where('user_id', $userId)->get();
    }
}
