<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class ContactDetail extends Component
{
    public $contact, $contactId;
    public function mount($contactId)
    {
        $this->contact = Contact::where('contactId', $contactId)->firstOrFail();
    }
    public function downloadVCard($contactId)
    {
        $contacts = Contact::where('contactId', $contactId)->first();

        return response()->download(public_path('storage/'.$contacts->file));
    }
    #[Title('Contact Card Detail')]
    #[Layout('components.layouts.public')]
    public function render()
    {
        return view('livewire.contacts.contact-detail');
    }
}
