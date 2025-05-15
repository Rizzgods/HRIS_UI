<div class="w-full mx-auto bg-base-100 rounded-lg shadow-lg">
    <div class="p-4 sm:p-6 md:p-8">
        <x-header title="Salary Information" icon="o-currency-dollar" icon-classes="bg-primary text-white rounded-full p-1.5 w-7 h-7" separator class="mb-6" />

        <form wire:submit.prevent="saveSalary" class="space-y-8">
            <!-- Grid Layout for Salary Sections -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Payroll Information -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-money-bill-wave text-primary mr-2"></i>
                        Payroll Information
                    </h2>
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 gap-4">
                            <x-select
                                label="Payroll Class"
                                wire:model.defer="payroll_class"
                                :options="[
                                    ['label' => 'MONTHLY RATE', 'value' => 'MONTHLY RATE']
                                ]"
                                option-label="label"
                                option-value="value" />
                            <x-input label="Monthly Rate" wire:model.defer="monthly_rate" />
                            <x-input label="Daily Rate" wire:model.defer="daily_rate" />
                            <x-input label="Hourly Rate" wire:model.defer="hourly_rate" />
                        </div>
                    </div>
                </div>

                <!-- Deductions -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-hand-holding-dollar text-primary mr-2"></i>
                        Deductions
                    </h2>
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <x-select
                                label="SSS Control"
                                wire:model.defer="sss_control"
                                :options="[
                                    ['label' => 'MONTHLY', 'value' => 'MONTHLY']
                                ]"
                                option-label="label"
                                option-value="value" />
                            <x-select
                                label="HDMF Control"
                                wire:model.defer="hdmf_control"
                                :options="[
                                    ['label' => 'MONTHLY', 'value' => 'MONTHLY']
                                ]"
                                option-label="label"
                                option-value="value" />
                        </div>
                
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <x-select
                                label="PhilHealth Control"
                                wire:model.defer="philhealth_control"
                                :options="[
                                    ['label' => 'MONTHLY', 'value' => 'MONTHLY']
                                ]"
                                option-label="label"
                                option-value="value" />
                            <x-select
                                label="Tax Control"
                                wire:model.defer="tax_control"
                                :options="[
                                    ['label' => 'MONTHLY', 'value' => 'MONTHLY']
                                ]"
                                option-label="label"
                                option-value="value" />
                        </div>
                
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <x-select
                                label="Union Control"
                                wire:model.defer="union_control"
                                :options="[
                                    ['label' => 'NONE', 'value' => 'NONE']
                                ]"
                                option-label="label"
                                option-value="value" />
                            <x-select
                                label="HDMF Code"
                                wire:model.defer="hdmf_code"
                                :options="[
                                    ['label' => '1 - ORDINARY MEMBER', 'value' => '1 - ORDINARY MEMBER']
                                ]"
                                option-label="label"
                                option-value="value" />
                        </div>
                
                        <!-- Modified: Tax settings in a single row with improved UI -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <x-input label="Tax Code" wire:model.defer="tax_code" />
                            <div class="flex flex-col justify-end h-full">
                                <label class="block text-sm font-medium mb-1">Tax Ceiling Options</label>
                                <div class="bg-base-100 p-2 rounded-md border border-base-300">
                                    <x-checkbox wire:model.defer="with_tax_ceiling" label="With Tax Ceiling" />
                                </div>
                            </div>
                            <x-input label="Tax Ceiling (0-1)" wire:model.defer="tax_ceiling" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Allowances -->
            <div class="p-6 bg-base-200/30 rounded-xl shadow-sm">
                <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                    <i class="fa-solid fa-coins text-primary mr-2"></i>
                    Allowances
                </h2>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <x-input label="Skill Incentive (D)" wire:model.defer="skill_incentive" />
                        <x-input label="Living Allow (M)" wire:model.defer="living_allow" />
                        <x-input label="Other Allow 1" wire:model.defer="other_allow_1" />
                        <x-input label="ECOLA (Daily)" wire:model.defer="ecola_daily" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <x-input label="ECOLA (Hourly)" wire:model.defer="ecola_hourly" />
                        <x-input label="Acting Cap (M)" wire:model.defer="acting_cap" />
                        <x-input label="OT Allow (D)" wire:model.defer="ot_allow" />
                        <x-input label="Taxable Allow (M)" wire:model.defer="taxable_allow" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <x-input label="Reloc (M)" wire:model.defer="reloc" />
                        <x-input label="Housing (M)" wire:model.defer="housing" />
                        <x-input label="Trans (M)" wire:model.defer="trans" />
                        <x-input label="Other Allow 2" wire:model.defer="other_allow_2" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <x-input label="S Allow (M)" wire:model.defer="s_allow" />
                        <x-input label="SEA Allow (M)" wire:model.defer="sea_allow" />
                        <x-input label="Prod Allw (M)" wire:model.defer="prod_allow" />
                        <x-input label="Txble Bonus" wire:model.defer="txble_bonus" />
                    </div>
                </div>
            </div>

            <!-- Union & OT, Benefits, Health, and Banking Information in one row -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Union and OT -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm h-full">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-users text-primary mr-2"></i>
                        Union & OT
                    </h2>
                    <div class="space-y-4">
                        <x-input label="Union Dues" wire:model.defer="union_dues" />
                        <x-input label="Mngr OT (Hr)" wire:model.defer="mngr_ot" />
                    </div>
                </div>

                <!-- Benefits -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm h-full">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-gift text-primary mr-2"></i>
                        Benefits
                    </h2>
                    <div class="space-y-4">
                        <x-input label="OTH Amount" wire:model.defer="oth_amount" />
                        <x-input label="FB Amount" wire:model.defer="fb_amount" />
                        <x-input label="Ice Tea Amount" wire:model.defer="ice_tea_amount" />
                    </div>
                </div>

                <!-- Health -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm h-full">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-heart-pulse text-primary mr-2"></i>
                        Health
                    </h2>
                    <div class="space-y-4">
                        <x-input label="Medicare" wire:model.defer="medicare" />
                        <x-input label="Addtl Pagibig" wire:model.defer="addtl_pagibig" />
                    </div>
                </div>

                <!-- Banking Information -->
                <div class="p-6 bg-base-200/30 rounded-xl shadow-sm h-full">
                    <h2 class="flex items-center text-lg font-semibold text-gray-700 mb-4">
                        <i class="fa-solid fa-building-columns text-primary mr-2"></i>
                        Banking Information
                    </h2>
                    <div class="space-y-4">
                        <!-- Payment Type as Checkboxes -->
                        <div class="flex flex-col">
                            <label class="block text-sm font-medium mb-1">Payment Type</label>
                            <div class="bg-base-100 p-2 rounded-md border border-base-300 flex space-x-4">
                                <x-checkbox wire:model.defer="payment_type_atm" label="ATM" />
                                <x-checkbox wire:model.defer="payment_type_cash" label="Cash" />
                            </div>
                        </div>
                        
                        <x-select
                            label="Bank Code"
                            wire:model.defer="bank_code"
                            :options="[
                                ['label' => 'UNION BANK ROOSEVELT', 'value' => 'UNI']
                            ]"
                            option-label="label"
                            option-value="value" />
                        
                        <x-input label="ATM No" wire:model.defer="atm_no" />
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-4 border-t border-base-300">
                <x-button 
                    type="submit"
                    class="w-full md:w-auto bg-primary hover:bg-primary-focus text-white px-6 py-2.5 rounded-lg shadow-md flex items-center justify-center gap-2">
                    <i class="fa-solid fa-save"></i>
                    Save Salary Info
                </x-button>
            </div>
        </form>
    </div>
</div>
