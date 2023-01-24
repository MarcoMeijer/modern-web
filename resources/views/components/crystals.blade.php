<div class="flex flex-col space-y-3">
    @foreach($crystals as $crystal)
    <livewire:purchase-form :crystal="$crystal" />
    @endforeach
</div>