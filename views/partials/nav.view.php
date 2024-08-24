<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "", Default: "" -->
                        <a href="/" class="<?php echo urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
                        <a href="/chirps" class="<?php echo urlIs('/chirps') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium text-gray-300"> My Chirps</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</nav>
