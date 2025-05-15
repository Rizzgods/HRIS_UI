<div class="w-full mx-auto bg-base-100 rounded-lg shadow-lg">
    <div class="p-4 sm:p-6 md:p-8">
        <x-header title="Company Information" icon="o-building-office" icon-classes="bg-primary text-white rounded-full p-1.5 w-7 h-7" separator class="mb-6" />

        <form wire:submit.prevent="saveCompanyDetails" class="space-y-8">
            <!-- Company Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Company Details -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-building text-primary mr-2"></i>
                        Company Details
                    </h2>
                    <div class="space-y-4">
                        <x-select
                            label="Company"
                            wire:model.defer="company"
                            :options="[
                                ['label' => 'Select Company', 'value' => ''],
                                ['label' => 'Company A', 'value' => 'Company A'],
                                ['label' => 'Company B', 'value' => 'Company B'],
                                ['label' => 'Company C', 'value' => 'Company C']
                            ]"
                            option-label="label"
                            option-value="value" />
                        
                        <x-select
                            label="Division"
                            wire:model.defer="division"
                            :options="[
                                ['label' => 'Select Division', 'value' => ''],
                                ['label' => 'Finance', 'value' => 'Finance'],
                                ['label' => 'IT', 'value' => 'IT'],
                                ['label' => 'HR', 'value' => 'HR'],
                                ['label' => 'Operations', 'value' => 'Operations']
                            ]"
                            option-label="label"
                            option-value="value" />
                        
                        <x-select
                            label="Department"
                            wire:model.defer="department"
                            :options="[
                                ['label' => 'Select Department', 'value' => ''],
                                ['label' => 'Accounting', 'value' => 'Accounting'],
                                ['label' => 'Software Development', 'value' => 'Software Development'],
                                ['label' => 'Recruitment', 'value' => 'Recruitment'],
                                ['label' => 'Payroll', 'value' => 'Payroll']
                            ]"
                            option-label="label"
                            option-value="value" />
                        
                        <x-select
                            label="Position"
                            wire:model.defer="position"
                            :options="[
                                ['label' => 'Select Position', 'value' => ''],
                                ['label' => 'Manager', 'value' => 'Manager'],
                                ['label' => 'Supervisor', 'value' => 'Supervisor'],
                                ['label' => 'Staff', 'value' => 'Staff'],
                                ['label' => 'Assistant', 'value' => 'Assistant']
                            ]"
                            option-label="label"
                            option-value="value" />
                        
                        <x-select
                            label="Grade Level"
                            wire:model.defer="gradeLevel"
                            :options="[
                                ['label' => 'Select Grade Level', 'value' => ''],
                                ['label' => 'G1', 'value' => 'G1'],
                                ['label' => 'G2', 'value' => 'G2'],
                                ['label' => 'G3', 'value' => 'G3'],
                                ['label' => 'G4', 'value' => 'G4']
                            ]"
                            option-label="label"
                            option-value="value" />
                        
                        <x-select
                            label="Cost Center"
                            wire:model.defer="costCenter"
                            :options="[
                                ['label' => 'Select Cost Center', 'value' => ''],
                                ['label' => 'CC001', 'value' => 'CC001'],
                                ['label' => 'CC002', 'value' => 'CC002'],
                                ['label' => 'CC003', 'value' => 'CC003']
                            ]"
                            option-label="label"
                            option-value="value" />
                        
                        <x-select
                            label="Employ Stat"
                            wire:model.defer="employStat"
                            :options="[
                                ['label' => 'Select Employment Status', 'value' => ''],
                                ['label' => 'Regular', 'value' => 'Regular'],
                                ['label' => 'Probationary', 'value' => 'Probationary'],
                                ['label' => 'Contractual', 'value' => 'Contractual'],
                                ['label' => 'Project-based', 'value' => 'Project-based']
                            ]"
                            option-label="label"
                            option-value="value" />
                        
                        <x-select
                            label="Employ Flag"
                            wire:model.defer="employFlag"
                            :options="[
                                ['label' => 'Select Employment Flag', 'value' => ''],
                                ['label' => 'Active', 'value' => 'Active'],
                                ['label' => 'Leave', 'value' => 'Leave'],
                                ['label' => 'Terminated', 'value' => 'Terminated'],
                                ['label' => 'Resigned', 'value' => 'Resigned']
                            ]"
                            option-label="label"
                            option-value="value" />
                        
                        <x-select
                            label="Based/Outlet"
                            wire:model.defer="basedOutlet"
                            :options="[
                                ['label' => 'Select Based/Outlet', 'value' => ''],
                                ['label' => 'Main Office', 'value' => 'Main Office'],
                                ['label' => 'Branch 1', 'value' => 'Branch 1'],
                                ['label' => 'Branch 2', 'value' => 'Branch 2'],
                                ['label' => 'Home-based', 'value' => 'Home-based']
                            ]"
                            option-label="label"
                            option-value="value" />
                    </div>
                </div>

                <!-- Employment Dates -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-calendar-days text-primary mr-2"></i>
                        Employment Dates
                    </h2>
                    <div class="space-y-4">
                        <x-input label="Date Hired" type="date" wire:model.defer="dateHired" />
                        <x-input label="End of Contract" type="date" wire:model.defer="endOfContract" />
                        <x-input label="Probation Date" type="date" wire:model.defer="probationDate" />
                        <x-input label="Allow Proby Date" type="date" wire:model.defer="allowProbyDate" />
                        <x-input label="Date Regular" type="date" wire:model.defer="dateRegular" />
                        <x-input label="Date Resigned" type="date" wire:model.defer="dateResigned" />
                        <x-input label="Reason for Resignation" wire:model.defer="resignReason" />
                    </div>
                </div>
            </div>

            <!-- Employment Status & Health Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Employment Status & Reporting -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-id-badge text-primary mr-2"></i>
                        Status & Reporting
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-3 bg-base-100 rounded-lg">
                            <x-checkbox label="Confidential" wire:model.defer="confidential" />
                            <x-checkbox label="Union Member" wire:model.defer="unionMember" />
                        </div>
                        
                        <x-input label="Reporting To" wire:model.defer="reportingTo" />
                        <x-input label="2nd Rpt Ofcr" wire:model.defer="secondRptOfcr" />
                        
                        <x-select label="OT Class" wire:model.defer="otClass">
                            <option value="NONE">NONE</option>
                            {{-- Add more options as needed --}}
                        </x-select>
                    </div>
                </div>

                <!-- Health Card Information -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-heart-pulse text-primary mr-2"></i>
                        Health Card Information
                    </h2>
                    <div class="space-y-4">
                        <x-input label="Health Card No." wire:model.defer="healthCardNo" />
                        <x-input label="Issue Date" type="date" wire:model.defer="issueDate" />
                        <x-input label="Expiry Date" type="date" wire:model.defer="expiryDate" />
                        
                        <x-select label="Health Card Stat" wire:model.defer="healthCardStat">
                            <option value="">Select Status</option>
                            {{-- Add more options as needed --}}
                        </x-select>
                        
                        <x-input label="HC Limit" type="number" wire:model.defer="hcLimit" />
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-base-300">
                <x-button type="submit" class="w-full md:w-auto bg-primary hover:bg-primary-focus text-white px-6 py-2.5 rounded-lg shadow-md flex items-center justify-center gap-2">
                    <i class="fa-solid fa-save"></i>
                    Save Company Details
                </x-button>
            </div>
        </form>
    </div>
</div>