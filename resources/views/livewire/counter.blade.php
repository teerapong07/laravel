<div class="container">
    <div class="text-center mt-5">
        <button wire:click="increment" class="btn btn-primary">Increment</button>
        <button wire:click="decrement" class="btn btn-danger">Decrement</button>

        <p class="mt-3">Count: {{ $count }}</p>
    </div>
</div>