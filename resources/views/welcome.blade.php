@extends('layout.layout')

@section('title', 'Home Page')
@php
    $primaryColor = $primaryColor ?? '#d33593'; // fallback
@endphp

@section('content')
    <style>
        :root {
            /* Primary Colors */
            --primary: {{ $primaryColor }};
            --primary-dark: #48254a;
            --primary-darker: #000000;

            /* Neutral Colors */
            --gray-dark: #717271;
            --gray-light: #b1b2b1;
            --white: #ffffff;

            /* Additional Colors */
            --teal: #38b2ac;
            /* Keeping teal for some elements as accent */
            --red: #e53e3e;
            --yellow: #f6e05e;
            --purple: #805ad5;
            --blue: #4299e1;
            --green: #48bb78;
        }

        /* Text Colors */
        .text-primary {
            color: var(--primary);
        }

        .text-primary-dark {
            color: var(--primary-dark);
        }

        .text-primary-darker {
            color: var(--primary-darker);
        }

        .text-gray-dark {
            color: var(--gray-dark);
        }

        .text-gray-light {
            color: var(--gray-light);
        }

        /* Background Colors */
        .bg-primary {
            background-color: var(--primary);
        }

        .bg-primary-dark {
            background-color: var(--primary-dark);
        }

        .bg-primary-darker {
            background-color: var(--primary-darker);
        }

        .bg-gray-dark {
            background-color: var(--gray-dark);
        }

        .bg-gray-light {
            background-color: var(--gray-light);
        }

        /* Gradient Backgrounds */
        .bg-gradient-primary {
            background-image: linear-gradient(to right, var(--primary), var(--primary-dark));
        }

        .bg-gradient-primary-dark {
            background-image: linear-gradient(to right, var(--primary-dark), var(--primary-darker));
        }

        /* Border Colors */
        .border-primary {
            border-color: var(--primary);
        }

        .border-primary-dark {
            border-color: var(--primary-dark);
        }

        /* Hover States */
        .hover\:bg-primary:hover {
            background-color: var(--primary);
        }

        .hover\:bg-primary-dark:hover {
            background-color: var(--primary-dark);
        }

        .hover\:text-primary:hover {
            color: var(--primary);
        }

        /* Focus States */
        .focus\:ring-primary:focus {
            --tw-ring-color: var(--primary);
        }
    </style>

    <body class="bg-white text-gray-700 font-sans overflow-x-hidden">

        <!-- Hero Section -->
        <section class="relative h-screen bg-cover bg-center z-0"
            style="background-image: url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

            <!-- Content -->
            <div
                class="relative  z-10 flex flex-col items-center justify-center h-[80%] text-white text-center px-4 sm:px-8 pt-20 ">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Find Your <span class="text-primary">Dream</span>
                    <span id="typed-text" class="text-primary border-r-2 border-primary animate-pulse"></span>
                </h1>

                <p class="mb-8 text-lg md:text-xl max-w-2xl mx-auto">
                    Discover premium properties across India. From cozy apartments to luxurious villas, we have the perfect
                    home for you.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4 justify-center mb-10">
                    <button
                        class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-md font-bold transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Buy
                    </button>
                    <a href="/sell"
                        class="bg-white/20 hover:bg-white/30 text-white px-6 py-2 rounded-md font-bold transition-all duration-300 transform hover:scale-105 backdrop-blur-sm border border-white/30">
                        Sell
                    </a>
                </div>
                <!-- Action Buttons -->
                {{-- <div class="flex flex-wrap gap-4 justify-center m-0 md:mr-[75%] lg:mr-[55%] xl:mr-[40%]">
                    <button
                        class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-full font-bold transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Project
                    </button>
                    <button
                        class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-full font-bold transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Resale
                    </button>

                </div> --}}
                <!-- Search Bar -->
                <form action="{{ route('property.search') }}" method="GET"
                    class="bg-white/20 rounded-xl shadow-lg p-6 w-full max-w-5xl mx-auto grid gap-4 grid-cols-1 md:grid-cols-5 backdrop-blur-sm border border-white/30 transition-all duration-500 hover:shadow-xl">

                    <select name="property_type"
                        class="border border-white/30 bg-white/20 text-white px-4 py-3 rounded-md w-full md:col-span-1 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option class="text-gray-800" value="">Property Types</option>
                        <option class="text-gray-800" value="Residential Flat"
                            {{ request('property_type') == 'Residential Flat' ? 'selected' : '' }}>Residential Flat</option>
                        <option class="text-gray-800" value="Residential Plot"
                            {{ request('property_type') == 'Residential Plot' ? 'selected' : '' }}>Residential Plot</option>
                        <option class="text-gray-800" value="Commercial"
                            {{ request('property_type') == 'Commercial' ? 'selected' : '' }}>
                            Commercial</option>
                        {{-- <option class="text-gray-800" value="Villa"
                            {{ request('property_type') == 'Villa' ? 'selected' : '' }}>Villa</option> --}}
                        <option class="text-gray-800" value="Apartment"
                            {{ request('property_type') == 'Apartment' ? 'selected' : '' }}>Apartment
                        </option>
                        {{-- <option class="text-gray-800" value="Penthouse"
                            {{ request('property_type') == 'Penthouse' ? 'selected' : '' }}>Penthouse
                        </option> --}}
                        <option class="text-gray-800" value="House"
                            {{ request('property_type') == 'House' ? 'selected' : '' }}>House</option>
                        {{-- <option class="text-gray-800" value="Condo"
                            {{ request('property_type') == 'Condo' ? 'selected' : '' }}>Condo</option> --}}
                        {{-- <option class="text-gray-800" value="Townhouse"
                            {{ request('property_type') == 'Townhouse' ? 'selected' : '' }}>Townhouse
                        </option> --}}
                    </select>

                    <input type="text" name="search" placeholder="Type property name, locality, city"
                        value="{{ request('search') }}"
                        class="border border-white/30 bg-white/20 text-white placeholder-white/70 px-4 py-3 rounded-md w-full md:col-span-2 focus:outline-none focus:ring-2 focus:ring-primary" />

                    <select name="listing_type"
                        class="border border-white/30 bg-white/20 text-white px-4 py-3 rounded-md w-full md:col-span-1 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option class="text-gray-800" value="">Transaction Type</option>
                        <option class="text-gray-800" value="For Sale"
                            {{ request('listing_type') == 'For Sale' ? 'selected' : '' }}>For Sale
                        </option>
                        <option class="text-gray-800" value="For Resale"
                            {{ request('listing_type') == 'For Resale' ? 'selected' : '' }}>For
                            Resale</option>
                        {{-- <option class="text-gray-800" value="For Rent"
                            {{ request('listing_type') == 'For Rent' ? 'selected' : '' }}>For Rent
                        </option> --}}
                        {{-- <option class="text-gray-800" value="Lease"
                            {{ request('listing_type') == 'Lease' ? 'selected' : '' }}>Lease</option> --}}
                    </select>
                    <!-- Add this hidden input to maintain other search parameters -->
                    @foreach (request()->except('sort') as $key => $value)
                        @if ($value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <button type="submit"
                        class="bg-primary hover:bg-primary-dark text-white font-bold px-4 py-3 rounded-md transition-all duration-300 transform hover:scale-105 shadow-md md:col-span-1 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search
                    </button>
                </form>
            </div>

            <!-- Scroll Down Indicator -->
            <div class="absolute bottom-16 left-1/2 transform -translate-x-1/2 animate-bounce">
                <a href="#featured-properties" class="text-white hover:text-primary transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </a>
            </div>
        </section>

        <!-- Typing Script -->
        <script>
            const words = ["Apartment.", "Villa.", "Penthouse.", "Home."];
            let wordIndex = 0;
            let charIndex = 0;
            const typedText = document.getElementById("typed-text");
            let isDeleting = false;
            let typingSpeed = 100;

            function type() {
                const currentWord = words[wordIndex];

                if (!isDeleting && charIndex < currentWord.length) {
                    // Typing
                    typedText.textContent += currentWord.charAt(charIndex);
                    charIndex++;
                    typingSpeed = 100;
                } else if (isDeleting && charIndex > 0) {
                    // Deleting
                    typedText.textContent = currentWord.substring(0, charIndex - 1);
                    charIndex--;
                    typingSpeed = 50;
                } else {
                    // Switch between typing and deleting
                    isDeleting = !isDeleting;
                    if (!isDeleting) {
                        wordIndex = (wordIndex + 1) % words.length;
                    }
                    typingSpeed = isDeleting ? 1500 : 500;
                }

                setTimeout(type, typingSpeed);
            }

            // Start animation
            document.addEventListener("DOMContentLoaded", () => {
                setTimeout(type, 1000);
            });
        </script>


      <!-- Featured Properties -->
<section id="featured-properties" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Heading -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                Featured Properties
            </h2>
            <div class="mx-auto w-24 h-1 bg-gradient-to-r from-primary to-primary-dark rounded-full mb-6"></div>
            <p class="text-gray-500 max-w-3xl mx-auto text-lg">
                Explore our handpicked selection of premium properties. Each listing is carefully vetted to ensure
                quality and value for our clients.
            </p>
        </div>

        <!-- Property Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($featured_properties as $property)
                <div class="property-card bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 border border-gray-100">
                    <!-- Image Section -->
                    <div class="relative h-60 overflow-hidden">
                        @if ($property->main_image)
                            <img src="{{ asset($property->main_image) }}" alt="{{ $property->title }}"
                                class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" />
                        @else
                            <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif

                        <!-- Badges -->
                        <div class="absolute top-4 left-4 flex flex-col space-y-2">
                            @if ($property->is_featured)
                                <span class="bg-primary text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                                    Featured
                                </span>
                            @endif
                            @if ($property->pre_launch_property)
                                <span class="bg-purple-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                                    Pre-Launch
                                </span>
                            @endif
                            @if ($property->property_status === 'Available')
                                <span class="bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                                    Available
                                </span>
                            @endif
                        </div>

                        <!-- Favorite Button -->
                        <button class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full p-2 shadow-md hover:bg-red-100 transition-colors">
                            <svg class="w-6 h-6 text-gray-500 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Content Section -->
                    <div class="p-6">
                        <!-- Title and Verification -->
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-gray-800 line-clamp-1">{{ $property->title }}</h3>
                            @if ($property->is_verified)
                                <span class="flex items-center text-blue-600 text-xs">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Verified
                                </span>
                            @endif
                        </div>

                        <!-- Location -->
                        <div class="flex items-center text-gray-600 mb-3">
                            <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-sm truncate">{{ $property->city }}, {{ $property->state }}</span>
                        </div>

                        <!-- Property Details -->
                        <div class="flex flex-wrap gap-x-4 gap-y-2 text-sm text-gray-600 mb-4">
                            @if ($property->bedrooms)
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    {{ $property->bedrooms }} BHK
                                </div>
                            @endif

                            @if ($property->super_area)
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                    </svg>
                                    {{ $property->super_area }} sqft
                                </div>
                            @endif

                            @if ($property->year_built)
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Built {{ $property->year_built }}
                                </div>
                            @endif
                        </div>

                        <!-- Features (if available) -->
                        @if($property->features && is_string($property->features))
                            @php
                                $features = json_decode($property->features, true) ?? [];
                                $limitedFeatures = array_slice($features, 0, 3);
                            @endphp
                            @if(count($limitedFeatures) > 0)
                                <div class="mb-4">
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($limitedFeatures as $feature)
                                            <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                                {{ $feature }}
                                            </span>
                                        @endforeach
                                        @if(count($features) > 3)
                                            <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                                +{{ count($features) - 3 }} more
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endif

                        <!-- Price and CTA -->
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <div>
                                <span class="text-xl font-bold text-primary">
                                    {{ $property->price }}
                                </span>
                                @if($property->price_unit)
                                    <span class="text-sm text-gray-500 ml-1">{{ $property->price_unit }}</span>
                                @endif
                            </div>
                            <a href="{{ route('property.show', $property->id) }}"
                               class="flex items-center text-sm bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md transition-colors duration-300">
                                View
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a href="{{ route('property.search') }}"
                class="inline-block bg-white border-2 border-primary text-primary hover:bg-primary hover:text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-md">
                View All Properties
            </a>
        </div>
    </div>
</section>



        <!-- About Proptru Section -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Image Column -->
                    <div class="relative">
                        <div class="relative rounded-2xl overflow-hidden shadow-xl">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="About Proptru"
                                class="w-full h-auto object-cover transition-transform duration-700 hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/30 to-transparent"></div>
                        </div>

                        <!-- Stats overlay -->
                        {{-- <div class="absolute -bottom-8 -right-8 bg-white rounded-xl shadow-lg p-6 w-3/4">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-primary">1K+</div>
                                    <div class="text-sm text-gray-600">Properties</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-primary">25+</div>
                                    <div class="text-sm text-gray-600">Cities</div>
                                </div>

                                <div class="text-center">
                                    <div class="text-3xl font-bold text-primary">98%</div>
                                    <div class="text-sm text-gray-600">Satisfaction</div>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <!-- Content Column -->
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                            About <span class="text-primary">Proptru</span>
                        </h2>
                        <div class="w-24 h-1.5 bg-gradient-to-r from-primary to-primary-dark rounded-full mb-8"></div>

                        <p class="text-lg text-gray-600 mb-6">
                            Proptru is India's most trusted real estate platform, connecting home buyers with their dream
                            properties since 2008.
                            We've revolutionized the property search experience with cutting-edge technology and
                            personalized service.
                        </p>

                        <div class="space-y-4 mb-8">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p class="ml-3 text-gray-600">
                                    <span class="font-semibold">Verified Listings:</span> Every property is thoroughly
                                    vetted for authenticity
                                </p>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p class="ml-3 text-gray-600">
                                    <span class="font-semibold">Expert Guidance:</span> 150+ certified real estate advisors
                                    across India
                                </p>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 rounded-full bg-primary/10 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p class="ml-3 text-gray-600">
                                    <span class="font-semibold">End-to-End Service:</span> From search to documentation, we
                                    handle it all
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <button
                                class="bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Learn More
                            </button>
                            <button
                                class="bg-white border-2 border-primary text-primary hover:bg-primary hover:text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-md">
                                Our Team
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-20 bg-gradient-to-r from-[#d6529f] to-[#48254b] text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <!-- Stat 1 -->
                    <div class="stat-item transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl md:text-5xl font-bold mb-2">1,250+</div>
                        <div class="text-lg md:text-xl font-medium">Properties Listed</div>
                    </div>
                    <!-- Stat 2 -->
                    <div class="stat-item transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl md:text-5xl font-bold mb-2">950+</div>
                        <div class="text-lg md:text-xl font-medium">Happy Clients</div>
                    </div>
                    <!-- Stat 3 -->
                    <div class="stat-item transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl md:text-5xl font-bold mb-2">15+</div>
                        <div class="text-lg md:text-xl font-medium">Years Experience</div>
                    </div>
                    <!-- Stat 4 -->
                    <div class="stat-item transform hover:scale-105 transition-all duration-300">
                        <div class="text-4xl md:text-5xl font-bold mb-2">15+</div>
                        <div class="text-lg md:text-xl font-medium">Dedicated Agents</div>
                    </div>
                </div>
            </div>
        </section>

       <!-- Pre-Launch Properties -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Pre-Launch Properties</h2>
            <div class="flex space-x-4">
                <button class="scroll-left-btn bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors duration-300">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="scroll-right-btn bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors duration-300">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="relative">
            <div class="property-scroll-container overflow-x-auto pb-8 -mx-4 px-4 scrollbar-hide">
                <div class="property-scroll-wrapper flex space-x-6" style="min-width: max-content;">
                    @foreach ($prelaunch_properties as $property)
                        <div class="property-card flex-shrink-0 w-80 bg-white rounded-xl shadow-md overflow-hidden transition-all duration-500 hover:shadow-xl hover:-translate-y-2 border border-gray-100">
                            <!-- Image Section -->
                            <div class="relative h-56 overflow-hidden">
                                @if ($property->main_image)
                                    <img src="{{ asset($property->main_image) }}" alt="{{ $property->title }}"
                                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif

                                <!-- Badges -->
                                <div class="absolute top-4 left-4 flex flex-col space-y-2">
                                    @if ($property->is_featured)
                                        <span class="bg-primary text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                                            Featured
                                        </span>
                                    @endif
                                    <span class="bg-purple-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                                        Pre-Launch
                                    </span>
                                    @if ($property->property_status === 'Available')
                                        <span class="bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                                            Available
                                        </span>
                                    @endif
                                </div>

                                <!-- Countdown Timer (example for pre-launch) -->
                                <div class="absolute bottom-4 left-0 right-0 px-4">
                                    <div class="bg-black/70 text-white text-xs px-3 py-2 rounded-full backdrop-blur-sm inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Launching soon
                                    </div>
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-800 mb-1 line-clamp-1">{{ $property->title }}</h3>
                                <p class="text-sm text-gray-500 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="truncate">{{ $property->city }}, {{ $property->state }}</span>
                                </p>

                                <!-- Property Details -->
                                <div class="flex flex-wrap gap-x-4 gap-y-2 text-sm text-gray-600 mb-4">
                                    @if ($property->bedrooms)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                            </svg>
                                            {{ $property->bedrooms }} BHK
                                        </div>
                                    @endif

                                    @if ($property->super_area)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                            </svg>
                                            {{ $property->super_area }} sqft
                                        </div>
                                    @endif
                                </div>

                                <!-- Price and CTA -->
                                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                                    <div>
                                        <span class="text-xl font-bold text-primary">
                                            ₹{{ $property->price }}
                                        </span>
                                        @if($property->price_unit)
                                            <span class="text-sm text-gray-500 ml-1">{{ $property->price_unit }}</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('property.show', $property->id) }}"
                                       class="flex items-center text-sm bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md transition-colors duration-300">
                                        View
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- Property Types -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Heading -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                        Explore Property Types
                    </h2>
                    <div class="mx-auto w-24 h-1 bg-gradient-to-r from-primary to-primary-dark rounded-full mb-6"></div>
                    <p class="text-gray-500 max-w-3xl mx-auto text-lg">
                        Discover the perfect property that matches your lifestyle and needs. We offer a wide range of
                        property types to choose from.
                    </p>
                </div>

                <!-- Property Type Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Type 1 -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-500 hover:shadow-xl hover:-translate-y-2 group">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2" alt="Apartments"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div
                                class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors duration-300">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <h3 class="text-2xl font-bold text-white">Apartments</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 text-sm">
                                Modern apartments with all amenities in prime locations across major cities.
                            </p>
                            {{-- <button
                                class="mt-4 text-sm text-primary hover:text-primary-dark font-medium flex items-center transition-colors duration-300">
                                View Listings
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button> --}}
                        </div>
                    </div>

                    <!-- Type 2 -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-500 hover:shadow-xl hover:-translate-y-2 group">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914" alt="Villas"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div
                                class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors duration-300">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <h3 class="text-2xl font-bold text-white">Villas</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 text-sm">
                                Luxurious villas with private gardens, pools and premium amenities.
                            </p>
                            {{-- <button
                                class="mt-4 text-sm text-primary hover:text-primary-dark font-medium flex items-center transition-colors duration-300">
                                View Listings
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button> --}}
                        </div>
                    </div>

                    <!-- Type 3 -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-500 hover:shadow-xl hover:-translate-y-2 group">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6" alt="Residential Plot"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div
                                class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors duration-300">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <h3 class="text-2xl font-bold text-white">Residential Plot</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 text-sm">
                                Exclusive Residential Plot with panoramic views and premium finishes.
                            </p>
                            {{-- <button
                                class="mt-4 text-sm text-primary hover:text-primary-dark font-medium flex items-center transition-colors duration-300">
                                View Listings
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button> --}}
                        </div>
                    </div>

                    <!-- Type 4 -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-500 hover:shadow-xl hover:-translate-y-2 group">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1605146769289-440113cc3d00" alt="Commercial"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div
                                class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors duration-300">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <h3 class="text-2xl font-bold text-white">Commercial</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 text-sm">
                                Prime commercial spaces for offices, retail and business establishments.
                            </p>
                            {{-- <button
                                class="mt-4 text-sm text-primary hover:text-primary-dark font-medium flex items-center transition-colors duration-300">
                                View Listings
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>



      <!-- New Listings -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">New Listings</h2>
            <div class="flex space-x-4">
                <button class="scroll-left-btn bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors duration-300">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="scroll-right-btn bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors duration-300">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="relative">
            <div class="property-scroll-container overflow-x-auto pb-8 -mx-4 px-4 scrollbar-hide">
                <div class="property-scroll-wrapper flex space-x-6" style="min-width: max-content;">
                    @foreach ($newlisted_properties as $property)
                        <div class="property-card flex-shrink-0 w-80 bg-white rounded-xl shadow-md overflow-hidden transition-all duration-500 hover:shadow-xl hover:-translate-y-2 border border-gray-100">
                            <!-- Image Section -->
                            <div class="relative h-56 overflow-hidden">
                                @if ($property->main_image)
                                    <img src="{{ asset($property->main_image) }}" alt="{{ $property->title }}"
                                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif

                                <!-- Badges -->
                                <div class="absolute top-4 left-4 flex flex-col space-y-2">
                                    @if ($property->is_featured)
                                        <span class="bg-primary text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                                            Featured
                                        </span>
                                    @endif
                                    <span class="bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                                        New
                                    </span>
                                    @if ($property->property_status === 'Available')
                                        <span class="bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                                            Available
                                        </span>
                                    @endif
                                </div>

                                <!-- Date Added -->
                                <div class="absolute bottom-4 left-0 right-0 px-4">
                                    <div class="bg-black/70 text-white text-xs px-3 py-2 rounded-full backdrop-blur-sm inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        Added {{ $property->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-800 mb-1 line-clamp-1">{{ $property->title }}</h3>
                                <p class="text-sm text-gray-500 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="truncate">{{ $property->city }}, {{ $property->state }}</span>
                                </p>

                                <!-- Property Details -->
                                <div class="flex flex-wrap gap-x-4 gap-y-2 text-sm text-gray-600 mb-4">
                                    @if ($property->bedrooms)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                            </svg>
                                            {{ $property->bedrooms }} BHK
                                        </div>
                                    @endif

                                    @if ($property->super_area)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                            </svg>
                                            {{ $property->super_area }} sqft
                                        </div>
                                    @endif
                                </div>

                                <!-- Price and CTA -->
                                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                                    <div>
                                        <span class="text-xl font-bold text-primary">
                                            ₹{{ $property->price }}
                                        </span>
                                        @if($property->price_unit)
                                            <span class="text-sm text-gray-500 ml-1">{{ $property->price_unit }}</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('property.show', $property->id) }}"
                                       class="flex items-center text-sm bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md transition-colors duration-300">
                                        View
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- How It Works -->
        <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    How It <span class="text-primary">Works</span>
                </h2>
                <div class="mx-auto w-24 h-1.5 bg-gradient-to-r from-primary to-primary-dark rounded-full mb-8"></div>
                <div class="max-w-3xl mx-auto">
                    <p class="text-lg text-gray-600 mb-16">
                        Discover how easy it is to find your dream home with our seamless
                        four-step process. From searching the perfect property to finalizing
                        the deal, we guide you every step of the way for a hassle-free
                        experience.
                    </p>
                </div>

                <div class="relative">
                    <!-- Progress line -->
                    <div
                        class="hidden md:block absolute top-16 left-1/2 transform -translate-x-1/2 h-1.5 bg-gray-200 w-3/4 rounded-full overflow-hidden">
                        <div class="progress-line absolute top-0 left-0 h-full bg-gradient-to-r from-primary to-primary-dark rounded-full"
                            style="width: 0%"></div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 relative z-10">
                        <!-- Step 1 -->
                        <div class="step-item group">
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-primary/10 rounded-full opacity-0 group-hover:opacity-100 blur-md transition-all duration-300">
                                </div>
                                <div
                                    class="relative bg-white p-6 rounded-full shadow-lg transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-xl">
                                    <div
                                        class="w-16 h-16 mx-auto flex items-center justify-center bg-primary/10 rounded-full text-primary mb-6">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="step-number absolute top-0 left-0 md:right-0 bg-primary text-white font-bold rounded-full w-8 h-8 flex items-center justify-center shadow-md transform translate-x-1/2 -translate-y-1/2">
                                    1
                                </div>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-800 mt-6 mb-3 group-hover:text-primary transition-colors duration-300">
                                Search</h3>
                            <p class="text-gray-600">
                                Browse our extensive listings based on your location, budget, and preferences.
                            </p>
                        </div>

                        <!-- Step 2 -->
                        <div class="step-item group">
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-primary/10 rounded-full opacity-0 group-hover:opacity-100 blur-md transition-all duration-300">
                                </div>
                                <div
                                    class="relative bg-white p-6 rounded-full shadow-lg transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-xl">
                                    <div
                                        class="w-16 h-16 mx-auto flex items-center justify-center bg-primary/10 rounded-full text-primary mb-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <!-- User icon -->
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 14c4.418 0 8 1.79 8 4v2H4v-2c0-2.21 3.582-4 8-4z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 12a4 4 0 100-8 4 4 0 000 8z" />
                                            <!-- Speech bubble -->
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="step-number absolute top-0 left-0 md:right-0 bg-primary text-white font-bold rounded-full w-8 h-8 flex items-center justify-center shadow-md transform translate-x-1/2 -translate-y-1/2">
                                    2
                                </div>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-800 mt-6 mb-3 group-hover:text-primary transition-colors duration-300">
                                <Main></Main>Meet our expert
                            </h3>
                            <p class="text-gray-600">
                                Contact property owners or our expert agents directly through our platform.
                            </p>
                        </div>

                        <!-- Step 3 -->
                        <div class="step-item group">
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-primary/10 rounded-full opacity-0 group-hover:opacity-100 blur-md transition-all duration-300">
                                </div>
                                <div
                                    class="relative bg-white p-6 rounded-full shadow-lg transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-xl">
                                    <div
                                        class="w-16 h-16 mx-auto flex items-center justify-center bg-primary/10 rounded-full text-primary mb-6">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="step-number absolute top-0 left-0 md:right-0 bg-primary text-white font-bold rounded-full w-8 h-8 flex items-center justify-center shadow-md transform translate-x-1/2 -translate-y-1/2">
                                    3
                                </div>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-800 mt-6 mb-3 group-hover:text-primary transition-colors duration-300">
                                Visit</h3>
                            <p class="text-gray-600">
                                Schedule property visits at your convenience with our flexible booking system.
                            </p>
                        </div>
                        <!-- Step 4 -->
                        <div class="step-item group">
                            <div class="relative">
                                <div
                                    class="absolute -inset-2 bg-primary/10 rounded-full opacity-0 group-hover:opacity-100 blur-md transition-all duration-300">
                                </div>
                                <div
                                    class="relative bg-white p-6 rounded-full shadow-lg transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-xl">
                                    <div
                                        class="w-16 h-16 mx-auto flex items-center justify-center bg-primary/10 rounded-full text-primary mb-6">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="step-number absolute top-0 left-0 md:right-0 bg-primary text-white font-bold rounded-full w-8 h-8 flex items-center justify-center shadow-md transform translate-x-1/2 -translate-y-1/2">
                                    4
                                </div>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-800 mt-6 mb-3 group-hover:text-primary transition-colors duration-300">
                                Finalize</h3>
                            <p class="text-gray-600">
                                Complete your transaction with our secure payment and documentation system.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="mt-16">
                    <a href="{{ route('property.search') }}"
                        class="cta-button relative overflow-hidden bg-primary hover:bg-[#48254a]   text-white px-8 py-4 rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 group">
                        <span class="relative z-10">Get Started Now</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- Blog Section -->
        <section id="blog" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Heading -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                        Latest <span class="text-primary">Blog</span> Posts
                    </h2>
                    <div class="mx-auto w-24 h-1 bg-gradient-to-r from-primary to-primary-dark rounded-full mb-6"></div>
                    <p class="text-gray-500 max-w-3xl mx-auto text-lg">
                        Stay updated with the latest trends, tips, and insights in the real estate market.
                    </p>
                </div>

                <div class="grid grid-cols-1  lg:grid-cols-3 gap-8">
                    @forelse($blogs as $blog)
                        <!-- Blog Post -->
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover-scale">
                            <div class="relative h-64 overflow-hidden">
                                @if ($blog->image)
                                    <img src="/{{ $blog->image }}" alt="{{ $blog->title }}"
                                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                                @else
                                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c"
                                        alt="Default blog image"
                                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                                @endif
                                @if ($blog->hashtags)
                                    <div class="absolute top-4 left-4">
                                        <span class="bg-primary text-white text-xs font-semibold px-3 py-1 rounded-full">
                                            {{ $blog->hashtags }}
                                        </span>
                                    </div>
                                @endif
                                <div
                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent h-20">
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($blog->date)->format('F j, Y') }}


                                </div>
                                <h3
                                    class="text-xl font-bold text-gray-800 mb-3 hover:text-primary transition-colors duration-300">
                                    <a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}</a>
                                </h3>
                                <p class="text-gray-600 mb-4">
                                    {{ $blog->short_description }}
                                </p>
                                <div class="flex items-center justify-between mt-6">
                                    <a href="{{ route('blog.details', $blog->id) }}"
                                        class="text-primary hover:text-primary-dark font-medium flex items-center transition-colors duration-300 group">
                                        Read More
                                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-10">
                            <div class="bg-white rounded-xl p-8 shadow-lg max-w-md mx-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">No Articles Found</h3>
                                <p class="text-gray-600">We're working on new content. Check back soon!</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- View All Button -->
                <div class="text-center mt-12">
                    <a href="/blogs"
                        class="inline-block bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                        View All Blog Posts
                    </a>
                </div>
            </div>
        </section>


        <!-- Featured Developers -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800">Featured Developers</h2>
                    <div class="mx-auto w-24 h-1 bg-gradient-to-r from-primary to-primary-dark rounded-full my-4"></div>
                    <p class="text-gray-500 max-w-3xl mx-auto">Partnered with India's most trusted real estate developers
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                    <!-- Developer 1 - DLF -->
                    <div
                        class="flex items-center justify-center p-6 bg-gray-50 rounded-xl hover:shadow-md transition-shadow duration-300">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/aa/DLF_logo.svg" alt="DLF"
                            class="h-10 object-contain">
                    </div>

                    <!-- Developer 2 - Godrej Properties -->
                    <div
                        class="flex items-center justify-center p-6 bg-gray-50 rounded-xl hover:shadow-md transition-shadow duration-300">
                        <img src="https://mma.prnewswire.com/media/1308693/GPL_Logo.jpg?p=facebook"
                            alt="Godrej Properties" class="h-10 object-contain">
                    </div>

                    <!-- Developer 3 - Prestige Group -->
                    <div
                        class="flex items-center justify-center p-6 bg-gray-50 rounded-xl hover:shadow-md transition-shadow duration-300">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfgG71a-0xes17v2rqjuWV5fsG4JgBiykGnw&s"
                            alt="Prestige Group" class="h-10 object-contain">
                    </div>

                    <!-- Developer 4 - Sobha Limited -->
                    <div
                        class="flex items-center justify-center p-6 bg-gray-50 rounded-xl hover:shadow-md transition-shadow duration-300">
                        <img src="https://upload.wikimedia.org/wikipedia/en/5/59/Sobha_Ltd_Logo.jpg" alt="Sobha Limited"
                            class="h-10 object-contain">
                    </div>

                    <!-- Developer 5 - Lodha -->
                    <div
                        class="flex items-center justify-center p-6 bg-gray-50 rounded-xl hover:shadow-md transition-shadow duration-300">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/ed/Lodha---New-LOgo.png"
                            alt="Lodha Group" class="h-10 object-contain">
                    </div>

                    <!-- Developer 6 - Brigade Group -->
                    <div
                        class="flex items-center justify-center p-6 bg-gray-50 rounded-xl hover:shadow-md transition-shadow duration-300">
                        <img src="https://upload.wikimedia.org/wikipedia/en/c/c9/Brigade_Group_Official_Logo.jpeg"
                            alt="Brigade Group" class="h-10 object-contain">
                    </div>
                </div>
            </div>
        </section>







        <!-- Newsletter Section -->
        <!--<section class="py-16 bg-gradient-to-r from-primary to-primary-dark text-white">-->
        <!--  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">-->
        <!--    <h2 class="text-3xl font-bold mb-4">Stay Updated With New Properties</h2>-->
        <!--    <p class="text-lg mb-8 max-w-2xl mx-auto">Subscribe to our newsletter and get the latest property listings directly to your inbox</p>-->

        <!--    <div class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">-->
        <!--      <input-->
        <!--        type="email"-->
        <!--        placeholder="Enter your email"-->
        <!--        class="flex-grow px-4 py-3 rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary"-->
        <!--      >-->
        <!--      <button class="bg-white text-primary font-semibold px-6 py-3 rounded-md hover:bg-gray-100 transition-colors duration-300">-->
        <!--        Subscribe-->
        <!--      </button>-->
        <!--    </div>-->

        <!--    <p class="text-sm mt-4 opacity-80">We respect your privacy. Unsubscribe at any time.</p>-->
        <!--  </div>-->
        <!--</section>-->

        <!-- Call to Action -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <div class="p-12">
                            <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to find your dream home?</h2>
                            <p class="text-gray-600 mb-8">Our team of expert real estate agents is ready to help you find
                                the perfect property that matches your needs and budget.</p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button
                                    class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    Contact an Agent
                                </button>
                                <button
                                    class="bg-white border-2 border-primary text-primary hover:bg-primary hover:text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-md">
                                    Call Now
                                </button>
                            </div>
                        </div>
                        <div class="hidden lg:block relative">
                            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf"
                                alt="Real Estate Agent" class="absolute inset-0 w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                        What Our Clients Say
                    </h2>
                    <div class="mx-auto w-24 h-1 bg-gradient-to-r from-primary to-primary-dark rounded-full mb-6"></div>
                    <p class="text-gray-500 max-w-3xl mx-auto text-lg">
                        Don't just take our word for it. Here's what our clients have to say about their experience with us.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-gray-50 rounded-xl p-8 shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Riya Sharma"
                                class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Riya Sharma</h4>
                                <p class="text-sm text-gray-500">Mumbai</p>
                            </div>
                        </div>
                        <div class="text-gray-600 mb-4">
                            "Found my dream apartment in just 2 weeks! The team was extremely helpful and guided me through
                            every step of the process."
                        </div>
                        <div class="flex items-center">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">2 weeks ago</span>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-gray-50 rounded-xl p-8 shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Amit Patel"
                                class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Amit Patel</h4>
                                <p class="text-sm text-gray-500">Bangalore</p>
                            </div>
                        </div>
                        <div class="text-gray-600 mb-4">
                            "As a first-time home buyer, I was nervous about the process. The team made everything so easy
                            and transparent. Got a great deal on my new home!"
                        </div>
                        <div class="flex items-center">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">1 month ago</span>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-gray-50 rounded-xl p-8 shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Priya Gupta"
                                class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Priya Gupta</h4>
                                <p class="text-sm text-gray-500">Delhi</p>
                            </div>
                        </div>
                        <div class="text-gray-600 mb-4">
                            "Sold my property within a week at a great price! The marketing and exposure my listing received
                            was exceptional."
                        </div>
                        <div class="flex items-center">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">3 months ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Scroll Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const scrollContainer = document.querySelector('.property-scroll-container');
                const scrollWrapper = document.querySelector('.property-scroll-wrapper');
                const scrollLeftBtn = document.querySelector('.scroll-left-btn');
                const scrollRightBtn = document.querySelector('.scroll-right-btn');

                scrollLeftBtn.addEventListener('click', () => {
                    scrollContainer.scrollBy({
                        left: -300,
                        behavior: 'smooth'
                    });
                });

                scrollRightBtn.addEventListener('click', () => {
                    scrollContainer.scrollBy({
                        left: 300,
                        behavior: 'smooth'
                    });
                });

                // Hide left button initially
                scrollLeftBtn.style.opacity = '0.5';
                scrollLeftBtn.style.cursor = 'not-allowed';

                scrollContainer.addEventListener('scroll', () => {
                    // Show/hide left button
                    if (scrollContainer.scrollLeft > 0) {
                        scrollLeftBtn.style.opacity = '1';
                        scrollLeftBtn.style.cursor = 'pointer';
                    } else {
                        scrollLeftBtn.style.opacity = '0.5';
                        scrollLeftBtn.style.cursor = 'not-allowed';
                    }

                    // Show/hide right button
                    if (scrollContainer.scrollLeft < scrollWrapper.scrollWidth - scrollContainer.clientWidth) {
                        scrollRightBtn.style.opacity = '1';
                        scrollRightBtn.style.cursor = 'pointer';
                    } else {
                        scrollRightBtn.style.opacity = '0.5';
                        scrollRightBtn.style.cursor = 'not-allowed';
                    }
                });
            });
        </script>
    </body>
@endsection
