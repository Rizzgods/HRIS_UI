<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

// Home route
Volt::route('/', 'users.index');

// HRIS Payroll routes
Volt::route('/dashboard', 'dashboard')->name('dashboard');
Volt::route('/employees', 'employee.employee')->name('employees');
Volt::route('/company', 'employee.company')->name('company');
Volt::route('/salary', 'employee.salary')->name('salary');
Volt::route('/leaves', 'leaves')->name('leaves');
Volt::route('/reports', 'reports')->name('reports');
Volt::route('/settings', 'settings')->name('settings');

// Fallback route
Route::fallback(function () {
    return redirect()->route('dashboard');
});
