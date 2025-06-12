@extends('layout.layout')

@section('title', 'Search Results')
@section('head')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
@endsection

@section('content')
<style>

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 12px;
        }
        .detail-item {
            min-height: 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .price-section {
            min-height: 40px;
        }

        @media (max-width: 768px) {
            .details-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .carousel-image {
                height: 220px;
            }
        }
    </style>
    <body class="bg-white text-gray-800 font-sans">
        <!-- Results Section -->
        <section class="py-12">
            <div class="container mx-auto px-6">
                <div class="flex md:flex-row flex-col justify-between items-center mb-8">
                    <h3 class="text-2xl font-semibold">
                        Search Results:
                        <span class="text-teal-800">{{ $properties->total() }} properties found</span>
                    </h3>
                    {{-- <form method="GET" action="{{ route('property.search') }}" class="flex items-center gap-2">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <input type="hidden" name="property_type" value="{{ request('property_type') }}">
                        <label for="sort" class="mr-2 text-gray-600">Sort by:</label>
                        <select name="sort" id="sort" onchange="this.form.submit()"
                            class="p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-teal-800">
                            <option value="newest" {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>Newest
                                First</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to
                                High</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High
                                to Low</option>
                            <option value="area_asc" {{ request('sort') == 'area_asc' ? 'selected' : '' }}>Area: Small to
                                Large</option>
                            <option value="area_desc" {{ request('sort') == 'area_desc' ? 'selected' : '' }}>Area: Large to
                                Small</option>
                            <option value="bedrooms_asc" {{ request('sort') == 'bedrooms_asc' ? 'selected' : '' }}>
                                Bedrooms: Few to Many</option>
                            <option value="bedrooms_desc" {{ request('sort') == 'bedrooms_desc' ? 'selected' : '' }}>
                                Bedrooms: Many to Few</option>
                        </select>
                    </form> --}}

                </div>

                <div class="p-6 flex flex-col mx-auto space-y-6 justify-center items-center">
                    @foreach ($properties as $property)
                        <!-- Property Card -->
                        <div
                            class="w-[93vw] md:max-w-7xl bg-white rounded-lg overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.15)] text-gray-800 flex flex-col md:flex-row">
                            <!-- Image Section -->
                            <div class="md:w-1/3 relative overflow-hidden">
                                <div class="carousel-images relative w-full h-64 md:h-full">
                                    @if ($property->main_image)
                                        <img src="{{ asset($property->main_image) }}"
                                            class="absolute inset-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000"
                                            alt="{{ $property->title }}" />
                                    @endif
                                    @foreach ($property->images as $image)
                                        <img src="{{ asset($image->image_path) }}"
                                            class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000"
                                            alt="{{ $property->title }}" />
                                    @endforeach
                                </div>

                                <!-- Badge -->
                                <div
                                    class="absolute top-0 left-0 bg-[#d33593] text-white text-xs font-bold px-2 py-1 rounded-br-lg z-10">
                                    {{ $property->listing_type }}
                                </div>
                            </div>

                            <!-- Content Section -->
                             <!-- Content Section -->
                                <div class="md:w-2/3 p-4 flex flex-col">
                                    <!-- Title and Location -->
                                    <div class="mb-3">
                                        <h3 class="text-xl font-bold text-gray-800 mb-1">
                                            {{ $property->title }}
                                        </h3>
                                        <div class="flex items-center text-teal-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span>{{ $property->address }}, {{ $property->city }}, {{ $property->state }}</span>
                                        </div>
                                        @if($property->property_id)
                                            <div class="text-sm text-gray-500 mt-1">
                                                Property ID: {{ $property->property_id }}
                                                @if($property->rera_id)
                                                    | RERA: {{ $property->rera_id }}
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Details Grid -->
                                    <div class="details-grid mb-4 py-2 border-t border-b border-gray-100">
                                        @if($property->property_type)
                                            <div class="detail-item">
                                                <span class="text-xs text-gray-500">PROPERTY TYPE</span>
                                                <span class="font-medium">{{ $property->property_type }}</span>
                                            </div>
                                        @endif

                                        @if($property->super_area || $property->carpet_area || $property->plot_area)
                                            <div class="detail-item">
                                                <span class="text-xs text-gray-500">
                                                    @if($property->property_type === 'Residential Plot' || $property->property_type === 'Commercial Plot')
                                                        PLOT AREA
                                                    @else
                                                        AREA
                                                    @endif
                                                </span>
                                                <span class="font-medium">
                                                    @if($property->super_area)
                                                        {{ $property->super_area }} sqft (Super)
                                                    @elseif($property->carpet_area)
                                                        {{ $property->carpet_area }} sqft (Carpet)
                                                    @elseif($property->plot_area)
                                                        {{ $property->plot_area }} sqft (Plot)
                                                    @else
                                                        N/A
                                                    @endif
                                                </span>
                                            </div>
                                        @endif

                                        @if($property->bedrooms)
                                            <div class="detail-item">
                                                <span class="text-xs text-gray-500">BEDROOMS</span>
                                                <span class="font-medium">{{ $property->bedrooms }}</span>
                                            </div>
                                        @endif

                                        @if($property->bathrooms)
                                            <div class="detail-item">
                                                <span class="text-xs text-gray-500">BATHROOMS</span>
                                                <span class="font-medium">{{ $property->bathrooms }}</span>
                                            </div>
                                        @endif

                                        @if($property->furnishing)
                                            <div class="detail-item">
                                                <span class="text-xs text-gray-500">FURNISHING</span>
                                                <span class="font-medium">{{ $property->furnishing }}</span>
                                            </div>
                                        @endif

                                        @if($property->year_built)
                                            <div class="detail-item">
                                                <span class="text-xs text-gray-500">YEAR BUILT</span>
                                                <span class="font-medium">{{ $property->year_built }}</span>
                                            </div>
                                        @endif

                                        @if($property->floors)
                                            <div class="detail-item">
                                                <span class="text-xs text-gray-500">FLOORS</span>
                                                <span class="font-medium">{{ $property->floors }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Description -->
                                    <div class="mb-4 flex-grow">
                                        <p class="text-sm text-gray-600 line-clamp-2">
                                            {{ strip_tags(Str::limit($property->description, 200)) }}
                                        </p>
                                    </div>

                                    <!-- Price and Actions -->
                                    <div class="mt-auto">
                                        <div class="price-section flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-4">
                                            <div>
                                                <div class="text-xl font-bold text-pink-600">
                                                    {{ $property->price_unit ?? '₹' }}{{ $property->price }}
                                                </div>
                                                @if ($property->super_area && is_numeric(str_replace(['₹', ',', 'L'], '', $property->price)))
                                                    @php
                                                        $priceValue = (float) str_replace(['₹', ',', 'L'], '', $property->price);
                                                        $pricePerSqft = $priceValue * 100000 / $property->super_area;
                                                    @endphp
                                                    {{-- <div class="text-sm text-gray-600">
                                                        ₹{{ number_format($pricePerSqft) }} per sqft
                                                    </div> --}}
                                                @endif
                                            </div>

                                            <div class="flex flex-col items-end">
                                                <span class="text-sm font-medium {{ $property->availability === 'Immediate' ? 'text-green-600' : 'text-blue-600' }}">
                                                    {{ $property->availability }}
                                                </span>
                                                @if($property->preferred_tenants)
                                                    <span class="text-xs text-gray-500">
                                                        Preferred: {{ $property->preferred_tenants }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="grid grid-cols-2 divide-x divide-gray-200 border-t border-gray-200 text-sm">
                                            <a href="{{ route('property.show', $property->id) }}"
                                               class="py-3 text-center font-medium text-pink-600 hover:text-pink-800 transition flex items-center justify-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Details
                                            </a>
                                            <a href="tel:9876543210"
                                               class="py-3 text-center font-medium text-pink-600 hover:text-pink-800 transition flex items-center justify-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>
                                                Call Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    @endforeach

                    @if ($properties->isEmpty())
                        <div class="w-full bg-white rounded-lg p-8 text-center">
                            <h3 class="text-xl font-semibold text-gray-700">No properties found matching your criteria</h3>
                            <p class="text-gray-500 mt-2">Try adjusting your search filters</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Pagination -->
        <div class="flex justify-center my-12">
            {{ $properties->appends(request()->query())->links() }}
        </div>

        <script>
            document.querySelectorAll(".carousel-images").forEach((carousel) => {
                const images = carousel.querySelectorAll("img");
                if (images.length <= 1) return;

                let index = 0;

                setInterval(() => {
                    images.forEach((img, i) => {
                        img.classList.remove("opacity-100");
                        img.classList.add("opacity-0");
                    });
                    images[index].classList.remove("opacity-0");
                    images[index].classList.add("opacity-100");
                    index = (index + 1) % images.length;
                }, 2000);
            });
        </script>
    </body>
@endsection
