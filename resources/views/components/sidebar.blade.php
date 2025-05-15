<!-- filepath: c:\SYSTEM-PHUKOLSOFT\hris_payroll\resources\views\components\sidebar.blade.php -->
<div x-data="{ mobileMenuOpen: false }" class="relative z-30">
    <!-- Desktop Sidebar - hidden on small screens -->
    <aside 
        class="fixed top-0 left-0 h-full bg-base-100 shadow-lg transition-all duration-300 z-50 hidden lg:block"
        :class="{ 'w-64': sidebarOpen, 'w-16': !sidebarOpen }"
    >
        <!-- Sidebar Header -->
        <div class="flex items-center justify-between p-4 border-b border-base-300">
            <h2 class="text-xl font-bold text-primary" x-show="sidebarOpen">HRIS Payroll</h2>
            <button @click="sidebarOpen = !sidebarOpen" class="p-1 rounded-md hover:bg-base-300">
                <i class="fa-solid fa-bars w-6 h-6"></i>
            </button>
        </div>
        
        <!-- Desktop Navigation Links -->
        <nav class="mt-4 overflow-y-auto h-[calc(100vh-4rem)]">
            <ul class="space-y-2">
                <!-- Employees -->
                <li>
                    <a href="{{ route('employees') }}" class="flex items-center px-4 py-2 hover:bg-base-300 {{ request()->routeIs('employees*') ? 'bg-base-300 text-primary font-medium' : '' }}">
                        <i class="fa-solid fa-users w-6 h-6"></i>
                        <span class="ml-3" x-show="sidebarOpen">Employees</span>
                    </a>
                </li>
                
                <!-- Company -->
                <li>
                    <a href="{{ route('company') }}" class="flex items-center px-4 py-2 hover:bg-base-300 {{ request()->routeIs('company*') ? 'bg-base-300 text-primary font-medium' : '' }}">
                        <i class="fa-solid fa-building w-6 h-6"></i>
                        <span class="ml-3" x-show="sidebarOpen">Company</span>
                    </a>
                </li>
                
                <!-- Salary -->
                <li>
                    <a href="{{ route('salary') }}" class="flex items-center px-4 py-2 hover:bg-base-300 {{ request()->routeIs('payroll*') ? 'bg-base-300 text-primary font-medium' : '' }}">
                        <i class="fa-solid fa-money-bill-wave w-6 h-6"></i>
                        <span class="ml-3" x-show="sidebarOpen">Salary</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Mobile Top Navbar - only visible on small screens -->
    <div class="fixed top-0 left-0 right-0 bg-base-100 shadow-md z-50 lg:hidden">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center">
                <h2 class="text-xl font-bold text-primary">HRIS Payroll</h2>
            </div>
            
            <button 
                @click="mobileMenuOpen = !mobileMenuOpen" 
                class="p-2 rounded-md hover:bg-base-300 focus:outline-none"
            >
                <i class="fa-solid" :class="mobileMenuOpen ? 'fa-xmark' : 'fa-bars'"></i>
            </button>
        </div>
        
        <!-- Mobile Navigation Dropdown -->
        <div 
            x-show="mobileMenuOpen" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="absolute left-0 right-0 bg-base-100 shadow-md py-2 px-4"
            @click.away="mobileMenuOpen = false"
        >
            <ul class="space-y-1">
                <!-- Employees -->
                <li>
                    <a 
                        href="{{ route('employees') }}" 
                        @click="mobileMenuOpen = false"
                        class="flex items-center px-3 py-2 hover:bg-base-300 rounded-md {{ request()->routeIs('employees*') ? 'bg-base-300 text-primary font-medium' : '' }}"
                    >
                        <i class="fa-solid fa-users w-5 h-5 mr-3"></i>
                        <span>Employees</span>
                    </a>
                </li>
                
                <!-- Company -->
                <li>
                    <a 
                        href="{{ route('company') }}" 
                        @click="mobileMenuOpen = false"
                        class="flex items-center px-3 py-2 hover:bg-base-300 rounded-md {{ request()->routeIs('company*') ? 'bg-base-300 text-primary font-medium' : '' }}"
                    >
                        <i class="fa-solid fa-building w-5 h-5 mr-3"></i>
                        <span>Company</span>
                    </a>
                </li>
                
                <!-- Payroll -->
                <li>
                    <a 
                        href="{{ route('salary') }}" 
                        @click="mobileMenuOpen = false"
                        class="flex items-center px-3 py-2 hover:bg-base-300 rounded-md {{ request()->routeIs('payroll*') ? 'bg-base-300 text-primary font-medium' : '' }}"
                    >
                        <i class="fa-solid fa-money-bill-wave w-5 h-5 mr-3"></i>
                        <span>Payroll</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>