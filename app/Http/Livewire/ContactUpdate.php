<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactUpdate extends Component
{

    public $name;
    public $phone;
    public $contactId;

    protected $rules = [
        'name'  => 'required|min:3',
        'phone' => 'required|max:15'
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong !!!',
        'name.min' => 'Nama minimal harus 3 huruf !!!',
        'phone.required' => 'No Hand Phone tidak boleh kosong !!!',
        'phone.max' => 'No Hand Phone Maximal 15 angka !!!',
    ];

    protected $listeners = [
        'getContact' => 'showContact'
    ];

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function showContact($contact) 
    {
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
        $this->resetErrorBag(['name', 'phone']);
    }

    public function update() 
    {
        $this->validate();

        if ($this->contactId) {
            $contact = Contact::find($this->contactId);
            $contact->update([
                'name' => $this->name,
                'phone' => $this->phone,
            ]);

            $this->resetInput();

            $this->emit('contactUpdated', $contact);
        }

    }

    private function resetInput() 
    {
        $this->name = null;
        $this->phone = null;
    }

    
}
