<div>
    
    {{--  <ul>
        @foreach ($contacts as $c)
            <li>{{ $c->name }}</li>
        @endforeach
    </ul>  --}}


    <form wire:submit.prevent="update">
        {{ csrf_field() }}
        <input type="hidden" wire:model="contactId">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input type="text"  wire:model="name"
                    class="form-control @error('name') is-invalid @enderror" 
                    placeholder="Name">

                    @error('name')
                        <span class="invalid-feedback @error('name') is-invalid @enderror">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="col">
                    <input type="number" wire:model="phone" 
                    class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                     @error('phone')
                        <span class="invalid-feedback  @error('phone') is-invalid @enderror">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Update</button>
    </form>

</div>
