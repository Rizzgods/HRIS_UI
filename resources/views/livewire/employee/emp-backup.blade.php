<div>
    <x-header title="Employee Form" icon="o-bolt" icon-classes="bg-warning rounded-full p-1 w-6 h-6" separator />
    

    
    <x-form wire:submit="save2">

        <!-- group 1 -->

        <x-file wire:model="photo" accept="image/png, image/jpeg">
            @if($photo && !is_string($photo))
                <img src="{{ $photo->temporaryUrl() }}" class="h-40 rounded-lg" />
            @else
                <img src="{{ $user->avatar ?? asset('images/empty-user.jpg') }}" class="h-40 rounded-lg" />
            @endif
        </x-file>
        
        <x-input label="Employee ID" wire:model="employeeID" />
        
        <x-select
        label="Employee ID"
        wire:model="employeeID"
        :options="$levelsOption"
        option-label="label"
        option-value="value" />


        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <x-input label="Last Name" wire:model="empLname" />
            <x-input label="First Name" wire:model="empFname" />
            <x-input label="Middle Name" wire:model="empMname" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-input label="City Address" wire:model="cityAdd" />
            <x-input label="Provincial Address" wire:model="provAdd" />
        </div>
        
        
        <!-- group 2 -->
        <x-select
        label="Sex"
        wire:model="sex"
        :options="[['label' => 'Male', 'value' => 'male'],
            ['label' => 'Female', 'value' => 'female']]"
        option-label="label"
        option-value="value" />

        <x-select
        label="Religion"
        wire:model="sex"
        :options="[['label' => 'Roman Catholic', 'value' => 'roman catholic'], 
            ['label' => 'Inglesia ni Cristo', 'value' => 'Inglesia ni Cristo']]"
        option-label="label"
        option-value="value" />

        <x-select
        label="Civil Status"
        wire:model="sex"
        :options="[['label' => 'Married', 'value' => 'married'], 
            ['label' => 'Single', 'value' => 'Single']]"
        option-label="label"
        option-value="value" />

        @php
            $config1 = ['altFormat' => 'd/m/Y'];
            $config2 = ['mode' => 'range'];
        @endphp
        
        <x-datepicker label="Birthday" wire:model="bDay" icon="o-calendar"  />

        <x-input label="Telephone Number" wire:model="telNumber" />

        <x-input label="Email Address" wire:model="emailAdd" />


        <!-- group 3 -->
        <x-input label="SSS No." wire:model="sssNo" />

        <x-input label="TIN No." wire:model="tinNo" />

        <x-input label="Pag-Ibig No." wire:model="pagibigNo" />

        <x-input label="PhilHealth No." wire:model="philHealthNo" />

        <x-input label="Birthplace " wire:model="birthPlace" />

        <x-input label="Cellphoe No." wire:model="cpNo" />
        
        <x-input label="Nickname" wire:model="nickname" />

        <!-- group 4 -->
        <x-input label="Height" wire:model="height" />

        <x-input label="Weight" wire:model="weight" />

        <x-select
        label="Blood Type"
        wire:model="bloodType"
        :options="[['label' => 'AB', 'value' => 'ab'], 
            ['label' => 'O+', 'value' => 'o+']]"
        option-label="label"
        option-value="value" />

        <!-- group 5 -->
        <x-input label="Passport No." wire:model="weight" />

        <x-datepicker label="Date Issued" wire:model="passPortIssued" icon="o-calendar"  />

        <x-datepicker label="Expiration" wire:model="passPortExp" icon="o-calendar"  />

        <x-select
        label="Country"
        wire:model="country"
        :options="[['label' => 'Philippines', 'value' => 'Philippines'], 
            ['label' => 'Taiwan', 'value' => 'Taiwan']]"
        option-label="label"
        option-value="value" />
        
    </x-form>



</div>