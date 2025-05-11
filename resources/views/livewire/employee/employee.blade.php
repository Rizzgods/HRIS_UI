<div class="w-full mx-auto bg-base-100 rounded-lg shadow-lg">
    <div class="p-4 sm:p-6 md:p-8">
        <x-header title="Employee Form" icon="o-bolt" icon-classes="bg-primary text-white rounded-full p-1.5 w-7 h-7" separator class="mb-6" />

        <x-form wire:submit="save2" class="space-y-8">

            <!-- Profile Photo & Employee Info Row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Employee Info - Now first -->
                <div class="md:col-span-2 p-6 bg-base-200/30 rounded-xl shadow-sm">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-user text-primary mr-2"></i>
                        Employee Information
                    </h2>
                    
                    <x-input label="Employee ID" wire:model="employeeID" placeholder="Enter Employee ID" class="mb-2" />
                    
                    <!-- Name -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-input label="Last Name" wire:model="empLname" placeholder="Last Name" />
                        <x-input label="First Name" wire:model="empFname" placeholder="First Name" />
                        <x-input label="Middle Name" wire:model="empMname" placeholder="Middle Name" />
                    </div>

                    <!-- Address -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-input label="City Address" wire:model="cityAdd" placeholder="City Address" />
                        <x-input label="Provincial Address" wire:model="provAdd" placeholder="Provincial Address" />
                    </div>
                </div>

                <!-- Profile Photo - Now second -->
                <div class="md:col-span-1 flex flex-col items-center space-y-3 p-6 bg-base-200/50 rounded-xl h-full">
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Profile Photo</h2>
                    
                    <div class="relative group" x-data="{uploading: false, progress: 0}">
                        <!-- Image Preview -->
                        <div class="relative h-36 w-36 rounded-full overflow-hidden border-4 border-primary/20 shadow-md mb-3 mx-auto">
                            @if($photo && !is_string($photo))
                                <img src="{{ $photo->temporaryUrl() }}" class="h-full w-full object-cover" alt="Profile Preview" />
                            @else
                                <img src="{{ $user->avatar ?? asset('images/empty-user.jpg') }}" class="h-full w-full object-cover" alt="Default Profile" />
                            @endif
                            
                            <!-- Upload Progress Overlay -->
                            <div 
                                x-show="uploading" 
                                class="absolute inset-0 bg-gray-900 bg-opacity-75 flex flex-col items-center justify-center"
                            >
                                <svg class="animate-spin h-8 w-8 text-white mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span class="text-white text-sm" x-text="`Uploading: ${progress}%`"></span>
                            </div>
                            
                            <!-- Hover Overlay When Not Uploading -->
                            <div 
                                x-show="!uploading" 
                                class="absolute inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Hidden file input -->
                        <input 
                            type="file" 
                            id="photo-upload" 
                            wire:model="photo" 
                            accept="image/png, image/jpeg"
                            class="hidden"
                            x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false"
                            x-on:livewire-upload-error="uploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                        />
                        
                        <!-- Custom upload button -->
                        <label for="photo-upload" class="bg-primary hover:bg-primary-focus text-white px-4 py-2 rounded-lg shadow cursor-pointer inline-flex items-center justify-center transition-colors duration-200">
                            <i class="fa-solid fa-upload mr-2"></i>
                            Choose Photo
                        </label>
                    </div>
                    
                    <span class="text-xs text-gray-500">Upload a clear profile photo (JPG/PNG)</span>
                    
                    @error('photo') 
                        <span class="text-red-500 text-xs">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            <!-- Main Columns: Personal, Government + Other -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Personal Details -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-address-card text-primary mr-2"></i>
                        Personal Details
                    </h2>
                    <div class="space-y-4">
                        <x-select
                            label="Sex"
                            wire:model="sex"
                            :options="[['label' => 'Male', 'value' => 'male'], ['label' => 'Female', 'value' => 'female']]"
                            option-label="label"
                            option-value="value"
                        />
                        <x-select
                            label="Religion"
                            wire:model="religion"
                            :options="[['label' => 'Roman Catholic', 'value' => 'roman catholic'], ['label' => 'Inglesia ni Cristo', 'value' => 'Inglesia ni Cristo']]"
                            option-label="label"
                            option-value="value"
                        />
                        <x-select
                            label="Civil Status"
                            wire:model="civilStatus"
                            :options="[['label' => 'Married', 'value' => 'married'], ['label' => 'Single', 'value' => 'Single']]"
                            option-label="label"
                            option-value="value"
                        />
                        <x-select
                            label="Citizenship"
                            wire:model="citizenship"
                            :options="[['label' => 'Filipino', 'value' => 'Filipino'], ['label' => 'American', 'value' => 'American'], ['label' => 'Chinese', 'value' => 'Chinese']]"
                            option-label="label"
                            option-value="value"
                        />
                        <x-datetime label="Birthday" wire:model="bDay" />
                        <x-input label="Telephone Number" wire:model="telNumber" placeholder="e.g. (02) 123-4567" />
                        <x-input label="Email Address" wire:model="emailAdd" placeholder="e.g. user@email.com" />
                    </div>
                </div>

                <!-- Government IDs + Other Details -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-id-card text-primary mr-2"></i>
                        Government IDs & Other Details
                    </h2>
                    <div class="space-y-4">
                        <x-input label="SSS No." wire:model="sssNo" placeholder="SSS Number" />
                        <x-input label="TIN No." wire:model="tinNo" placeholder="TIN Number" />
                        <x-input label="Pag-Ibig No." wire:model="pagibigNo" placeholder="Pag-Ibig Number" />
                        <x-input label="PhilHealth No." wire:model="philHealthNo" placeholder="PhilHealth Number" />
                        <x-input label="Birthplace" wire:model="birthPlace" placeholder="Birthplace" />
                        <x-input label="Cellphone No." wire:model="cpNo" placeholder="e.g. 0917xxxxxxx" />
                        <x-input label="Nickname" wire:model="nickname" placeholder="Nickname" />
                    </div>
                </div>
            </div>

            <!-- Physical Attributes & Passport Details Columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Physical Attributes -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-ruler text-primary mr-2"></i>
                        Physical Attributes
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <x-input label="Height (cm)" wire:model="height" placeholder="Height in cm" />
                        <x-input label="Weight (kg)" wire:model="weight" placeholder="Weight in kg" />
                        <x-select
                            label="Blood Type"
                            wire:model="bloodType"
                            :options="[['label' => 'AB', 'value' => 'ab'], ['label' => 'O+', 'value' => 'o+']]"
                            option-label="label"
                            option-value="value"
                        />
                    </div>
                </div>

                <!-- Passport Details -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-passport text-primary mr-2"></i>
                        Passport Details
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <x-input label="Passport No." wire:model="passportNo" placeholder="Passport Number" />
                        <x-datetime label="Date Issued" wire:model="passPortIssued" />
                        <x-datetime label="Expiration" wire:model="passPortExp" />
                    </div>
                    <x-select
                        label="Country"
                        wire:model="country"
                        :options="[['label' => 'Philippines', 'value' => 'Philippines'], ['label' => 'Taiwan', 'value' => 'Taiwan']]"
                        option-label="label"
                        option-value="value"
                    />
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-base-300">
                <x-button type="submit" class="w-full md:w-auto bg-primary hover:bg-primary-focus text-white px-6 py-2.5 rounded-lg shadow-md flex items-center justify-center gap-2">
                    <i class="fa-solid fa-save"></i>
                    Save Employee
                </x-button>
            </div>
        </x-form>
    </div>
</div>