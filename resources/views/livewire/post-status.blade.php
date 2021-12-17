<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="form-check form-switch">
        <input class="form-check-input" wire:model.lazy="published" type="checkbox" role="switch"
            @if ($published) checked @endif>
    </div>
</div>
