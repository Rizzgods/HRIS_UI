<?php

namespace App\Livewire\Employee;
use Livewire\WithFileUploads;
use Livewire\Component;

class Employee extends Component
{
    use WithFileUploads;
    
    // Basic employee properties
    public $employeeID;
    public $empLname;
    public $empFname;
    public $empMname;
    public $cityAdd;
    public $provAdd;
    
    // Personal details
    public $sex;
    public $religion;
    public $civilStatus;
    public $citizenship;
    public $bDay;
    public $telNumber;
    public $emailAdd;
    
    // Government IDs and other details
    public $sssNo;
    public $tinNo;
    public $pagibigNo;
    public $philHealthNo;
    public $birthPlace;
    public $cpNo;
    public $nickname;
    
    // Physical attributes
    public $height;
    public $weight;
    public $bloodType;
    
    // Passport details
    public $passportNo;
    public $passPortIssued;
    public $passPortExp;
    public $country;
    
    // Photo upload
    public $photo;
    public $user;
    
    // Options for dropdowns
    public $levelsOption;

    public function mount()
    {
        $this->levelsOption = [
            ['label' => 'Level 1', 'value' => 1],
            ['label' => 'Level 2', 'value' => 2],
            ['label' => 'Level 3', 'value' => 3],
            ['label' => 'Level 4', 'value' => 4],
            ['label' => 'Level 5', 'value' => 5],
        ];
        
        // Initialize with defaults if needed
        $this->user = null; // Or fetch from database if editing
    }

    public function save2()
    {
        // Implement your save logic here
        // For example:
        // $this->validate();
        // Employee::create([...]);
        
        // Flash a success message
        session()->flash('message', 'Employee saved successfully!');
    }

    public function render()
    {
        return view('livewire.employee.employee');
    }
}
