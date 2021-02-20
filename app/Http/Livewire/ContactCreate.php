<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactCreate extends Component
{

    // public $contacts;

    // public function mount($contacts)
    // {
    //   $this->contacts = $contacts;
    // }


    public $name;
    public $phone;

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

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store() 
    {
        $this->validate();

        $contact = Contact::create([
            'name' => $this->name,
            'phone' => $this->phone
        ]);

        $this->resetInput();

        $this->emit('contactStored', $contact);
    }

    private function resetInput() 
    {
        $this->name = null;
        $this->phone = null;
    }
}
