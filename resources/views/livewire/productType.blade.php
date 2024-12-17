<div>
    <h1>Product Type</h1>

    <form wire:submit="save">
        <div class="card">
            <div class="card-header">
                <div class="card-title">ประเภทสินค้า</div>
            </div>
            <div class="card-body">
                <div>Name</div>
                <input type="text" wire:model="name" placeholder="Name" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Save</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productType as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td class="text-center">
                        <button class="btn btn-primary" wire:click="edit({{ $item->id }})">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-danger" wire:click="remove({{ $item->id }})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>