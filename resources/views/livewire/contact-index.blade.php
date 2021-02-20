<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    

    {{--  parameter  :contacts="$contacts"  --}}
    @if ($statusUpdate)
        <livewire:contact-update></livewire:contact-update>
    @else
        <livewire:contact-create></livewire:contact-create>
    @endif
    {{--  @livewire('contact-create', ['contacts' => $contacts])  --}}


    <div class="row mt-3">
        <div class="col">
            <select wire:model="paginate" id="" class="form-control form-control-sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
            </select>
        </div>
        <div class="col">
            <input type="text" wire:model="search" class="form-control form-control-sm" placeholder="Search">
        </div>
    </div>
    <hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 + ($paginate * ($page - 1)) ?>
            @foreach ($contacts as $contact)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>  
                <td class="btn-group">
                    <button wire:click="getContact({{ $contact->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="destroy({{ $contact->id }})" class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
</div>
