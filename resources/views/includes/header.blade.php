<header class="bg-white shadow-md sticky top-0 z-50 backdrop-blur-sm bg-white/90">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-3">
            <!-- Logo with animation -->
            <div
                class="text-3xl font-extrabold text-teal-600 cursor-pointer transform hover:scale-105 transition duration-300">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('assets/images/logo_proptru1.png') }}" class="h-10" alt="Property Image 1" />
                </a>
            </div>

            <!-- Navigation Links (Desktop) -->
            <nav class="hidden lg:flex items-center gap-1">
                @php
                    $navItems = [
                        'Home' => ['url' => '/', 'dropdown' => null],
                        'About' => [
                            'url' => '#',
                            'dropdown' => [
                                'About Us' => '/about-us',
                                'Our Team' => '/our-team',
                                // 'Leadership' => '/leadership',

                                // 'Testimonials' => '/testimonials',
                            ],
                        ],
                        'Buy' => [
                            'url' => '#',
                            'dropdown' => [
                                'New Properties' => route('property.search', [
                                    'search' => '',
                                    'property_type' => '',
                                    'sort' => 'newest',
                                ]),
                                'Resale Properties' => route('property.search', [
                                    'search' => '',
                                    'property_type' => '',
                                    'listing_type' => 'For Resale',
                                ]),
                            ],
                        ],

                        'Sell' => [
                            'url' => '/sell',
                            'dropdown' => null,
                        ],
                        'Blog' => [
                            'url' => '/blogs',
                            'dropdown' => null,
                        ],
                        'Careers' => [
                            'url' => '/careers',
                            'dropdown' => [
                                'Join Us' => '/join-us',
                                'Associates Us' => '/associates-us',
                            ],
                        ],
                        'Contact' => ['url' => '/contact', 'dropdown' => null],
                    ];
                @endphp

                @foreach ($navItems as $label => $item)
                    <div class="relative group">
                        @if ($item['dropdown'])
                            <button
                                class="flex items-center px-4 py-3 text-gray-700 font-medium hover:text-teal-600 transition-colors duration-300">
                                <a href="{{ $item['url'] }}">{{ $label }}</a>
                                <svg class="w-4 h-4 ml-1 transform group-hover:rotate-180 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        @else
                            <a href="{{ $item['url'] }}"
                                class="flex items-center px-4 py-3 text-gray-700 font-medium hover:text-teal-600 transition-colors duration-300">
                                {{ $label }}
                            </a>
                        @endif

                        @if ($item['dropdown'])
                            <div
                                class="absolute left-0 mt-1 w-56 origin-top-right scale-95 opacity-0 invisible group-hover:scale-100 group-hover:opacity-100 group-hover:visible transition-all duration-200 transform-gpu">
                                <div class="bg-white rounded-lg shadow-xl py-2 ring-1 ring-black ring-opacity-5">
                                    @foreach ($item['dropdown'] as $dropdownLabel => $dropdownUrl)
                                        <a href="{{ $dropdownUrl }}"
                                            class="block px-4 py-2 text-gray-700 hover:bg-teal-50 hover:text-teal-600 transition-colors duration-200">{{ $dropdownLabel }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </nav>

            <!-- Action Buttons (Desktop) -->
            <div class="hidden lg:flex items-center gap-3">

                <!-- WhatsApp Button -->
                <a href="https://wa.me/919999999999" target="_blank" rel="noopener noreferrer"
                    class="relative px-6 py-2.5 bg-green-500 text-white font-medium rounded-full shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105 group overflow-hidden">
                    <span class="relative z-10">WhatsApp Us</span>
                </a>

            </div>


            <!-- Mobile Menu Button -->
            <div class="lg:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                    <svg id="mobile-menu-icon" class="w-6 h-6 transition-transform duration-300" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="hidden lg:hidden bg-white border-t border-gray-100 transform origin-top scale-y-0 h-0 transition-all duration-300 ease-out">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex flex-col space-y-2">
                @foreach ($navItems as $label => $item)
                    <div class="mobile-nav-item">
                        @if ($item['dropdown'])
                            <button
                                class="flex items-center justify-between w-full py-3 px-2 text-gray-700 font-medium hover:text-teal-600 transition-colors duration-200">
                                <a href="{{ $item['url'] }}">{{ $label }}</a>
                                <svg class="w-4 h-4 transform transition-transform duration-200" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        @else
                            <a href="{{ $item['url'] }}"
                                class="flex items-center justify-between w-full py-3 px-2 text-gray-700 font-medium hover:text-teal-600 transition-colors duration-200">
                                {{ $label }}
                            </a>
                        @endif

                        @if ($item['dropdown'])
                            <div class="mobile-dropdown hidden pl-4">
                                @foreach ($item['dropdown'] as $dropdownLabel => $dropdownUrl)
                                    <a href="{{ $dropdownUrl }}"
                                        class="block py-2 px-2 text-gray-600 hover:text-teal-600 transition-colors duration-200">{{ $dropdownLabel }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach

                <div class="pt-4 mt-2 border-t border-gray-100">


                    <a href="https://wa.me/919999999999" target="_blank" rel="noopener noreferrer"
                        class="block w-full px-4 py-2.5 mt-2 text-center bg-green-500 text-white font-medium rounded-lg hover:bg-teal-700 transition-colors duration-200">
                        <span class="relative z-10">WhatsApp Us</span>
                    </a>


                </div>
            </nav>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuIcon = document.getElementById('mobile-menu-icon');

        // Toggle mobile menu
        mobileMenuButton.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.toggle('hidden');

            if (!isOpen) {
                mobileMenu.classList.remove('scale-y-0', 'h-0');
                mobileMenu.classList.add('scale-y-100', 'h-auto');
                mobileMenuIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
            } else {
                mobileMenu.classList.remove('scale-y-100', 'h-auto');
                mobileMenu.classList.add('scale-y-0', 'h-0');
                mobileMenuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            }
        });

        // Mobile dropdown functionality
        const mobileNavItems = document.querySelectorAll('.mobile-nav-item');
        mobileNavItems.forEach(item => {
            const button = item.querySelector('button');
            const dropdown = item.querySelector('.mobile-dropdown');

            if (button && dropdown) {
                button.addEventListener('click', function() {
                    const icon = this.querySelector('svg');
                    dropdown.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');

                    // Close other open dropdowns
                    mobileNavItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            const otherDropdown = otherItem.querySelector(
                                '.mobile-dropdown');
                            const otherIcon = otherItem.querySelector('svg');
                            if (otherDropdown && !otherDropdown.classList.contains(
                                    'hidden')) {
                                otherDropdown.classList.add('hidden');
                                otherIcon.classList.remove('rotate-180');
                            }
                        }
                    });
                });
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden', 'scale-y-0', 'h-0');
                    mobileMenu.classList.remove('scale-y-100', 'h-auto');
                    mobileMenuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');

                    // Reset all dropdowns
                    document.querySelectorAll('.mobile-dropdown').forEach(dropdown => {
                        dropdown.classList.add('hidden');
                    });
                    document.querySelectorAll('.mobile-nav-item svg').forEach(icon => {
                        icon.classList.remove('rotate-180');
                    });
                }
            }
        });
    });
</script>

<style>
    /* Smooth transitions for dropdowns */
    .group:hover .group-hover\:scale-100 {
        transform: scale(1);
    }

    .group:hover .group-hover\:opacity-100 {
        opacity: 1;
    }

    .group:hover .group-hover\:visible {
        visibility: visible;
    }

    /* Mobile menu animation */
    #mobile-menu {
        transform-origin: top;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.1);
    }

    /* Button hover effects */
    .hover-underline-animation::after {
        content: '';
        position: absolute;
        width: 100%;
        transform: scaleX(0);
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #0d9488;
        transform-origin: bottom right;
        transition: transform 0.25s ease-out;
    }

    .hover-underline-animation:hover::after {
        transform: scaleX(1);
        transform-origin: bottom left;
    }
</style>
