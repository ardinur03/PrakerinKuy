<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\{Component, WithPagination};


class ContactIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // public $data; =>cara 1

    public $statusUpdate = false;
    public $paginate = 5;
    public $search;

    protected $listeners = [
        'contactStored' => 'HandleStore',
        'contactUpdated' => 'HandleUpdate'
    ];

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        // $this->data = Contact::latest()->get();   => cara 1
        return view('livewire.contact-index', [
            'contacts' =>  $this->search === null ?
                Contact::latest()->paginate($this->paginate) :
                Contact::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getContact($id)
    {
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Contact::find($id);
            $data->delete();
            session()->flash('message', 'Contact was deleted !!!');
        };
    }

    public function HandleStore($contact)
    {
        session()->flash('message', 'Contact ' . $contact['name'] . ' was stored');
    }

    public function HandleUpdate($contact)
    {
        $this->statusUpdate = false;
        session()->flash('message', 'Contact ' . $contact['name'] . ' was updated');
    }
}
