  
<x-filament-panels::page
    @class([
        'fi-resource-create-record-page',
        'fi-resource-' . str_replace('/', '-', $this->getSlug()),
    ])
>

    <div class="flex flex-col gap-y-6">
        

        {{ $this->form }}

    </div>
</x-filament-panels::page>
