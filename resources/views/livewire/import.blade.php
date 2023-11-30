<div>
    <style>
        .good
        {
            padding:50px;
            border-radius:10px;
            width: 500px;
            height: 50px;
            background-color: rgb(225, 241, 222);
           margin: -641px 0px 0px 382px;;
        }
    </style>
    @include('dashboard')

    <form class="good" wire:submit.prevent="import">
        <input type="file" wire:model="file">
        @error('file') <span style="color: red;">{{ $message }}</span> @enderror

        <button type="submit">Import CSV</button>
    </form>
</div>
