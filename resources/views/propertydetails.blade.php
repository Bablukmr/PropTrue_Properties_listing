@extends('layout.layout')

{{-- @section('title', '1 Home Page') --}}
{{-- @section('title') --}}
@section('title', \Illuminate\Support\Str::limit($property->title, 60))
@section('description', \Illuminate\Support\Str::limit(strip_tags($property->description), 155))
@section('keywords', implode(', ', array_slice($property->keywords ?? [], 0, 10)))
@section('author', 'PropTrue Team')

@section('og_title', \Illuminate\Support\Str::limit($property->title, 60))
@section('og_description', \Illuminate\Support\Str::limit(strip_tags($property->description), 200))
@section('og_image', $featuredImage ? asset($featuredImage->image_path) : asset('assets/images/home.png'))
@section('og_url', url()->current())
@section('og_type', 'property')

@section('twitter_card', 'summary_large_image')
@section('twitter_title', \Illuminate\Support\Str::limit($property->title, 60))
@section('twitter_description', \Illuminate\Support\Str::limit(strip_tags($property->description), 200))
@section('twitter_image', $featuredImage ? asset($featuredImage->image_path) : asset('assets/images/home.png'))
@section('twitter_site', '@PropTrue')
@section('twitter_creator', '@PropTrue')

@section('canonical', url()->current())
@section('head')

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Elysian Estates - Premium Property Listings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap"
        rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        brand: {
                            primary: "#d33593", // Changed to the new primary color
                            secondary: "#48254a", // Using primary-dark as secondary
                            light: "#FFFFFF",
                            dark: "#F9FAFB",
                        },
                        textClr: {
                            primary: "#1F2937", // Changed to gray-800
                            secondary: "#4B5563", // Changed to gray-600
                            accent: "#0D9488", // Changed to teal-600
                        },
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        serif: ["Playfair Display", "serif"],
                    },
                    boxShadow: {
                        property: "0 10px 30px rgba(0, 0, 0, 0.1)" /* Changed to lighter shadow */ ,
                        "property-hover": "0 15px 40px rgba(13, 148, 136, 0.2)" /* Changed to teal-600 with opacity */ ,
                    },
                    animation: {
                        "fade-in-up": "fadeInUp 0.8s ease-out forwards",
                        "slide-in-left": "slideInLeft 0.8s ease-out forwards",
                        "subtle-pulse": "subtlePulse 2s infinite ease-in-out",
                    },
                    keyframes: {
                        fadeInUp: {
                            "0%": {
                                opacity: "0",
                                transform: "translateY(20px)"
                            },
                            "100%": {
                                opacity: "1",
                                transform: "translateY(0)"
                            },
                        },
                        slideInLeft: {
                            "0%": {
                                opacity: "0",
                                transform: "translateX(-20px)"
                            },
                            "100%": {
                                opacity: "1",
                                transform: "translateX(0)"
                            },
                        },
                        subtlePulse: {
                            "0%, 100%": {
                                transform: "scale(1)",
                                boxShadow: "0 0 0 0 rgba(6, 182, 212, 0.4)",
                            },
                            "50%": {
                                transform: "scale(1.02)",
                                boxShadow: "0 0 0 10px rgba(6, 182, 212, 0)",
                            },
                        },
                    },
                },
            },
        };
    </script>
    <style>
        :root {
            /* Primary Colors */
            --primary: #d33593;
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

        /* Shadows */
        body {
            font-family: "Inter", sans-serif;
            background-color: #f9fafb;
            /* Changed to gray-50 */
            color: #1f2937;
            /* Changed to gray-800 */
            overflow-x: hidden;
        }

        .hero-section {
            background: linear-gradient(rgba(255, 255, 255, 0.8),
                    rgba(255, 255, 255, 0.8)),
                url("assets/hero-background.jpg");
            /* Keep image but adjust overlay */
            background-size: cover;
            background-position: center;
        }

        .font-display {
            font-family: "Playfair Display", serif;
        }

        .glassmorphism {
            background: rgba(255,
                    255,
                    255,
                    0.8);
            /* Changed to white with opacity */
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 0, 0, 0.1);
            /* Changed border color */
        }

        .animated-element {
            opacity: 0;
            /* Initially hidden for JS reveal or CSS animation */
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(6, 182, 212, 0.2);
            /* shadow-property-hover */
        }

        .gallery-thumb-new {
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .gallery-thumb-new:hover {
            transform: scale(1.05);
            filter: brightness(1.1);
        }

        .icon-bg-circle {
            background-color: rgba(6, 182, 212, 0.1);
            /* primary with alpha */
            transition: background-color 0.3s ease;
        }

        .icon-bg-circle:hover {
            background-color: rgba(6, 182, 212, 0.2);
        }

        .btn-primary {
            background-color: #0d9488;
            /* Changed to teal-600 */
            color: #ffffff;
            /* Changed to white */
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0f766e;
            /* Changed to teal-700 */
            box-shadow: 0 0 15px rgba(13, 148, 136, 0.5);
            /* Changed to teal-600 with opacity */
        }

        .btn-secondary {
            background-color: transparent;
            border: 1px solid #0d9488;
            /* Changed to teal-600 */
            color: #0d9488;
            /* Changed to teal-600 */
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: rgba(13,
                    148,
                    136,
                    0.1);
            /* Changed to teal-600 with opacity */
            color: #0f766e;
            /* Changed to teal-700 */
        }
    </style>


@endsection

@section('content')


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Breadcrumbs and Title (Modified) -->
        <div class="mb-12 animated-element animate-fade-in-up" style="animation-delay: 0.2s">
            <div class="flex items-center text-sm text-textClr-secondary mb-4">
                <a href="/" class="hover:text-brand-primary transition">Home</a>
                {{-- <i class="fa-solid fa-chevron-right mx-2 text-xs"></i> --}}
                {{-- <a href="#" class="hover:text-brand-primary transition"> {{ $property->city }}</a> --}}
                <i class="fa-solid fa-chevron-right mx-2 text-xs"></i>
                <span class="text-textClr-primary"> {{ $property->title }}</span>
            </div>
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <h1 class="font-display text-3xl md:text-4xl font-bold text-textClr-primary tracking-tight">
                        {{ $property->title }}
                    </h1>
                    <div class="flex items-center mt-3 text-textClr-secondary">
                        <i class="fa-solid fa-location-dot text-brand-primary mr-2"></i>
                        {{ $property->address }}
                    </div>
                </div>
                <div class="flex flex-col items-start md:items-end mt-6 md:mt-0">
                    <div
                        class="bg-primary hover:bg-primary-dark cursor-pointer text-white text-2xl font-bold rounded-lg py-3 px-6 shadow-lg">
                        ₹ {{ $property->price }}<span class="text-sm font-normal ml-1"></span>
                    </div>
                    <div class="flex items-center space-x-4 mt-4">
                        <button aria-label="Add to Favorites"
                            class="text-textClr-secondary hover:text-red-500 transition text-2xl">
                            <i class="fa-solid fa-heart"></i>
                        </button>
                        <button id="share-btn" aria-label="Share Listing"
                            class="text-textClr-secondary hover:text-brand-primary transition text-2xl">
                            <i class="fa-solid fa-share-nodes"></i>
                        </button>
                        <script>
                            document.querySelector('#share-btn').addEventListener('click', function() {
                                if (navigator.share) {
                                    navigator.share({
                                            title: document.title,
                                            text: 'Check out this property on PropTrue!',
                                            url: window.location.href,
                                        })
                                        .then(() => console.log('Shared successfully'))
                                        .catch((error) => console.error('Error sharing', error));
                                } else {
                                    alert('Sharing not supported in this browser.');
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3 mt-6">
                @if ($property->is_verified)
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-brand-primary/20 text-brand-primary">
                        <i class="fa-solid fa-shield-check mr-1.5"></i>Verified Listing
                    </span>
                @endif
                @if ($property->is_featured)
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-brand-secondary/20 text-brand-secondary">
                        <i class="fa-solid fa-star mr-1.5"></i>Featured Property
                    </span>
                @endif
                {{-- <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-brand-secondary/20 text-brand-secondary">
                    <i class="fa-solid fa-calendar-check mr-1.5"></i>Availability
                </span> --}}
            </div>
        </div>

        <!-- Gallery (Redesigned) -->

        <!-- Replace the existing Gallery section with this code -->
        <section id="gallery" class="mb-16 animated-element animate-fade-in-up" style="animation-delay: 0.4s">
            <h2 class="font-display text-3xl font-bold text-textClr-primary mb-8 flex items-center">
                <i class="fa-solid fa-images text-brand-primary mr-3"></i>Property Gallery
            </h2>
            <div class="grid grid-cols-12 gap-4">
                <!-- Main Image Display -->
                <div id="bigimage"
                    class="col-span-12 md:col-span-8 relative overflow-hidden rounded-xl cursor-pointer group h-[500px]"
                    onclick="openModal(currentBigImageSrc)">
                    <!-- Two image layers for sliding effect -->
                    @if ($featuredImage)
                        <img id="bigImageDisplay1" src="{{ asset($featuredImage->image_path) }}" alt="Main Property Image"
                            class="absolute top-0 left-0 w-full h-full object-cover transition-transform duration-500 ease-in-out" />
                    @else
                        <img id="bigImageDisplay1" src="{{ asset('assets/images/home.png') }}" alt="Main Property Image"
                            class="absolute top-0 left-0 w-full h-full object-cover transition-transform duration-500 ease-in-out" />
                    @endif
                    <img id="bigImageDisplay2" src="" alt="Transition Image"
                        class="absolute top-0 left-0 w-full h-full object-cover transition-transform duration-500 ease-in-out opacity-0" />

                    <!-- Navigation controls -->
                    @if (count($propertyimagesall) > 1)
                        <button onclick="prevBigImage(event)"
                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white rounded-full w-10 h-10 flex items-center justify-center z-20">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button onclick="nextBigImage(event)"
                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white rounded-full w-10 h-10 flex items-center justify-center z-20">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    @endif

                    <div class="absolute inset-0 flex items-end p-6 z-10">
                        <span class="bg-brand-primary text-white px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $featuredImage && $featuredImage->is_featured ? 'Featured' : 'Main' }} View
                        </span>
                    </div>
                </div>

                <!-- Thumbnails -->
                <div class="col-span-12 md:col-span-4 grid grid-cols-2 gap-4">
                    @foreach ($propertyimagesall->take(4) as $index => $image)
                        <div class="relative overflow-hidden rounded-xl cursor-pointer gallery-thumb-new"
                            onclick="changeBigImage('{{ asset($image->image_path) }}', {{ $index }})">
                            <img src="{{ asset($image->image_path) }}" alt="Gallery Image {{ $index + 1 }}"
                                class="w-full h-[242px] object-cover" />
                            <div
                                class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition duration-300 flex items-center justify-center">
                                @if ($loop->last && count($propertyimagesall) > 4)
                                    <span class="text-white font-semibold text-lg">+{{ count($propertyimagesall) - 4 }}
                                        More</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <script>
            // Create array of all image paths
            const bigImageSources = [
                @foreach ($propertyimagesall as $image)
                    "{{ asset($image->image_path) }}",
                @endforeach
            ];

            let currentBigImageIndex = 0;
            let currentBigImageSrc = bigImageSources[0] || "{{ asset('assets/images/home.png') }}";
            let showingFirst = true;

            document.addEventListener("DOMContentLoaded", () => {
                updateBigImage(); // Initial load
            });

            function changeBigImage(src, index) {
                currentBigImageIndex = index;
                currentBigImageSrc = src;
                updateBigImage();
            }

            function updateBigImage(direction = "next") {
                const img1 = document.getElementById("bigImageDisplay1");
                const img2 = document.getElementById("bigImageDisplay2");

                if (!img1 || !img2) return;

                const currentImg = showingFirst ? img1 : img2;
                const nextImg = showingFirst ? img2 : img1;

                const newSrc = bigImageSources[currentBigImageIndex] || "{{ asset('assets/images/home.png') }}";

                // Reset z-index and position
                nextImg.src = newSrc;
                nextImg.style.zIndex = 2;
                currentImg.style.zIndex = 1;

                // Start position of next image
                nextImg.style.transform = `translateX(${
            direction === "next" ? "100%" : "-100%"
        })`;
                nextImg.style.opacity = 1;

                // Trigger reflow to apply initial transform
                void nextImg.offsetWidth;

                // Animate in and out
                nextImg.style.transform = "translateX(0%)";
                currentImg.style.transform = `translateX(${
            direction === "next" ? "-100%" : "100%"
        })`;

                // After transition complete
                setTimeout(() => {
                    showingFirst = !showingFirst;
                    currentBigImageSrc = newSrc;
                    currentImg.style.opacity = 0;
                }, 500);
            }

            function nextBigImage(event) {
                if (event) event.stopPropagation();
                currentBigImageIndex =
                    (currentBigImageIndex + 1) % bigImageSources.length;
                updateBigImage("next");
            }

            function prevBigImage(event) {
                if (event) event.stopPropagation();
                currentBigImageIndex =
                    (currentBigImageIndex - 1 + bigImageSources.length) %
                    bigImageSources.length;
                updateBigImage("prev");
            }
        </script>

        <!-- Property Details and Highlights (Restyled) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
            <!-- Main Details Column -->
            <div class="lg:col-span-2 space-y-10">
                <!-- Brochure Download Section -->
                <div class="mt-6">
                    <a href="{{ $property->brochure ? url($property->brochure) : '#' }}" download
                        class="inline-flex items-center bg-brand-primary hover:bg-brand-primary/90 text-white px-6 py-3 rounded-lg shadow-md transition-all duration-300">
                        <i class="fa-solid fa-file-arrow-down mr-2 text-lg"></i>
                        Download Brochure (PDF)
                    </a>
                </div>

                <!-- Property Overview Section -->
                <section class="bg-brand-light p-8 rounded-xl shadow-property animated-element animate-slide-in-left"
                    style="animation-delay: 0.6s">
                    <h3 class="font-display text-2xl font-bold text-textClr-primary flex items-center mb-6">
                        <i class="fa-solid fa-clipboard-list text-brand-primary mr-3"></i>Property Overview
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-6 text-textClr-secondary">
                        @if ($property->property_type)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full px-4 py-3">
                                    <i class="fa-solid fa-building text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Property Type</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->property_type }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if ($property->super_area)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full px-4 py-3">
                                    <i class="fa-solid fa-chart-area text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Super Area</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->super_area }}
                                        sq.ft.</p>
                                </div>
                            </div>
                        @endif

                        @if ($property->carpet_area)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full px-4 py-3">
                                    <i class="fa-solid fa-ruler-combined text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Carpet Area</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->carpet_area }}
                                        sq.ft.</p>
                                </div>
                            </div>
                        @endif

                        @if ($property->furnishing)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full p-3">
                                    <i class="fa-solid fa-couch text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Furnishing</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->furnishing }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($property->bedrooms)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full p-3">
                                    <i class="fa-solid fa-bed text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Bedrooms</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->bedrooms }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($property->bathrooms)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full p-3">
                                    <i class="fa-solid fa-bath text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Bathrooms</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->bathrooms }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($property->balconies)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full p-3">
                                    <i class="fa-solid fa-door-open text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Balconies</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->balconies }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($property->floors)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full p-3">
                                    <i class="fa-solid fa-building text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Total Floors</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->floors }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($property->floor_number)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full p-3">
                                    <i class="fa-solid fa-layer-group text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Floor Number</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->floor_number }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if ($property->availability)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full px-4 py-3">
                                    <i class="fa-solid fa-calendar-check text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Availability</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->availability }}
                                        @if ($property->availability_text)
                                            ({{ $property->availability_text }})
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if ($property->year_built)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full py-3 px-4">
                                    <i class="fa-solid fa-calendar-alt text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Year Built</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->year_built }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($property->master_properties_detais)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full py-3 px-4">
                                    <i class="fa-solid fa-calendar-alt text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">Details</p>
                                    <p class="font-semibold text-textClr-primary text-md">
                                        {{ $property->master_properties_detais }}</p>
                                </div>
                            </div>
                        @endif

                        {{-- @if ($property->rera_id)
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full py-3 px-4">
                                    <i class="fa-solid fa-id-badge text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">RERA ID</p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->rera_id }}</p>
                                </div>
                            </div>
                        @endif --}}
                        @if ($property->rera_status && $property->rera_status !== 'not_applicable')
                            <div class="flex items-center space-x-3">
                                <div class="icon-bg-circle rounded-full py-3 px-4">
                                    <i class="fa-solid fa-id-badge text-brand-primary text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm">
                                        {{ $property->rera_status == 'approved' ? 'RERA ID' : 'RERA Registration Number' }}
                                    </p>
                                    <p class="font-semibold text-textClr-primary text-md">{{ $property->rera_id }}</p>
                                </div>
                            </div>
                        @endif

                    </div>
                </section>
                @if ($property->rera_qr || $property->rera_site_url)
                    <section class="bg-brand-light p-8 rounded-xl shadow-md animated-element animate-slide-in-left"
                        style="animation-delay: 0.7s">
                        <h3 class="font-display text-2xl font-bold text-textClr-primary flex items-center mb-6">
                            🏢 RERA Details
                        </h3>
                        <div class="flex flex-col md:flex-row items-center md:items-start justify-between gap-6">
                            <!-- QR Code with download -->
                            <div class="flex flex-col items-center gap-2">
                                <img src="{{ asset('/' . $property->rera_qr) }}" alt="RERA QR Code"
                                    class="max-h-28 rounded border border-gray-300 shadow-sm">
                                <a href="{{ asset('/' . $property->rera_qr) }}" download
                                    class="text-sm text-white bg-primary hover:bg-primary-dark px-2 font-thin py-1 rounded transition-all">
                                    Download_QR
                                </a>
                            </div>

                            <!-- RERA Site Link -->
                            <div class="text-center md:text-left">
                                <p class="text-sm font-thin text-gray-600 mb-1">Official RERA Website:</p>
                                <a href="{{ $property->rera_site_url }}" target="_blank"
                                    class="text-blue-700 hover:underline break-all">
                                    {{ $property->rera_site_url }}
                                </a>
                            </div>
                    </section>
                @endif

                <section class="bg-brand-light p-8 rounded-xl shadow-property animated-element animate-slide-in-left"
                    style="animation-delay: 0.7s">
                    <h3 class="font-display text-2xl font-bold text-textClr-primary flex items-center mb-6">
                        <i class="fa-solid fa-list-check text-brand-primary mr-3"></i>Key Features
                    </h3>
                    <ul class="space-y-3 text-textClr-secondary leading-relaxed list-none">
                        {!! $property->keyfeatures !!}
                    </ul>
                </section>

                <!-- Amenities & Features Section -->
                @php
                    // Convert features to array if it's a string
$features = [];
if (!empty($property->features)) {
    if (is_string($property->features)) {
        $features = json_decode($property->features, true) ?? [];
    } elseif (is_array($property->features)) {
        $features = $property->features;
    }
}

// Convert amenities to array if it's a string
                    $amenities = [];
                    if (!empty($property->amenities)) {
                        if (is_string($property->amenities)) {
                            $amenities = json_decode($property->amenities, true) ?? [];
                        } elseif (is_array($property->amenities)) {
                            $amenities = $property->amenities;
                        }
                    }

                    // Merge both arrays
                    $allFeatures = array_merge($features, $amenities);

                    $iconMap = [
                        'Swimming Pool' => 'fa-person-swimming',
                        'Gym' => 'fa-dumbbell',
                        'Parking' => 'fa-car',
                        'Garden' => 'fa-tree',
                        'Security' => 'fa-user-shield',
                        'Lift' => 'fa-elevator',
                        'Elevator' => 'fa-elevator',
                        'Lift/Elevator' => 'fa-elevator',
                        'Power Backup' => 'fa-bolt',
                        'WiFi' => 'fa-wifi',
                        'Air Conditioning' => 'fa-wind',
                        'Heating' => 'fa-temperature-high',
                        'TV' => 'fa-tv',
                        'Washing Machine' => 'fa-soap',
                        'Microwave' => 'fa-fire-burner',
                        'Refrigerator' => 'fa-snowflake',
                        'Dishwasher' => 'fa-dishwasher',
                        'Balcony' => 'fa-mountain-sun',
                        'Club House' => 'fa-house-chimney',
                        'Play Area' => 'fa-child-reaching',
                        'Intercom' => 'fa-phone',
                        'Fire Safety' => 'fa-fire-extinguisher',
                        'Shopping Center' => 'fa-cart-shopping',
                        'Maintenance Staff' => 'fa-users-gear',
                        'Rain Water Harvesting' => 'fa-cloud-rain',
                        'Vaastu Compliant' => 'fa-om',
                        'Pet Friendly' => 'fa-paw',
                        'Wheelchair Accessible' => 'fa-wheelchair',
                        'Servant Room' => 'fa-user-tie',
                        'Park' => 'fa-tree',
                        'Jogging Track' => 'fa-person-running',
                        'Community Hall' => 'fa-people-roof',
                        'Banquet Hall' => 'fa-utensils',
                        'CCTV Surveillance' => 'fa-camera',
                        'Visitor Parking' => 'fa-square-parking',
                        'Modular Kitchen' => 'fa-kitchen-set',
                        'Modular Wardrobe' => 'fa-wardrobe',
                        'Fans' => 'fa-fan',
                        'Curtains' => 'fa-curtains',
                        'Modular Bathroom' => 'fa-bath',
                        'Exhaust Fan' => 'fa-fan',
                        'Gas Pipeline' => 'fa-fire',
                        'Water Heater' => 'fa-water',
                        'Modular Lights' => 'fa-lightbulb',
                        'Modular Switches' => 'fa-toggle-on',
                        'Modular Doors' => 'fa-door-open',
                    ];
                @endphp

                @if (!empty($allFeatures))
                    <section class="bg-brand-light p-8 rounded-xl shadow-property animated-element animate-slide-in-left"
                        style="animation-delay: 0.8s">
                        <h3 class="font-display text-2xl font-bold text-textClr-primary flex items-center mb-8">
                            <i class="fa-solid fa-stars text-brand-primary mr-3"></i>Amenities & Features
                        </h3>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-x-2 gap-y-3 text-textClr-secondary">
                            @foreach ($allFeatures as $item)
                                @if (!empty($item))
                                    <div class="flex items-center space-x-3 group">
                                        <i
                                            class="fa-solid {{ $iconMap[$item] ?? 'fa-circle-check' }} text-brand-primary text-xl group-hover:animate-pulse"></i>
                                        <span>{{ $item }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- Location -->
                <section class="bg-brand-light p-8 rounded-xl shadow-property animated-element animate-slide-in-left"
                    style="animation-delay: 0.9s">
                    <h3 class="font-display text-2xl font-bold text-textClr-primary flex items-center mb-6">
                        <i class="fa-solid fa-map-marker-alt text-brand-primary mr-3"></i>Location & Neighborhood
                    </h3>

                    <div class="rounded-lg overflow-hidden shadow-lg mb-8">
                        {{-- @php
                            $mapUrl = null;
                            $defaultCity = $property->city;
                            $apiKey = 'AIzaSyAfS-bCjy7PCM5Z-79SZyaMJNgBByvzN6o'; // Replace with your actual API key

                            if (!empty($property->google_map_link)) {
                                if (strpos($property->google_map_link, 'embed') !== false) {
                                    // Use embed link as-is
                                    $mapUrl = $property->google_map_link;
                                } elseif (
                                    preg_match('/@([\-0-9.]+),([\-0-9.]+)/', $property->google_map_link, $matches)
                                ) {
                                    // Extract lat/lng from standard Google Maps URL
                                    $lat = $matches[1];
                                    $lng = $matches[2];
                                    $mapUrl = "https://www.google.com/maps/embed/v1/view?key={$apiKey}&center={$lat},{$lng}&zoom=14";
                                } else {
                                    // Fallback if URL format is unknown: use it as a search query
                                    $mapUrl =
                                        "https://www.google.com/maps/embed/v1/search?key={$apiKey}&q=" .
                                        urlencode($property->google_map_link);
                                }
                            } elseif (!empty($property->address)) {
                                $mapUrl =
                                    "https://www.google.com/maps/embed/v1/place?key={$apiKey}&q=" .
                                    urlencode($property->address);
                            } else {
                                $mapUrl =
                                    "https://www.google.com/maps/embed/v1/place?key={$apiKey}&q=" .
                                    urlencode($defaultCity);
                            }
                        @endphp --}}

                        @if ($property->google_map_link)
                            <iframe src="{{ $property->google_map_link }}" width="100%" height="400"
                                style="border:0" allowfullscreen loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="rounded-lg"></iframe>
                        @else
                            <div class="text-center text-gray-500 py-16">
                                <i class="fa-solid fa-map-location-dot fa-2x mb-3"></i>
                                <p>No map location available</p>
                            </div>
                        @endif
                    </div>

                    <!--Notes -->

                    <section class="bg-brand-light p-8 rounded-xl  animated-element animate-slide-in-left"
                        style="animation-delay: 0.7s">
                        <h3 class="font-display text-2xl font-bold text-textClr-primary flex items-center mb-6">
                            <i class="fa-solid fa-list-check text-brand-primary mr-3"></i>Notes
                        </h3>
                        <ul class="space-y-3 text-textClr-secondary leading-relaxed list-none">
                            {!! $property->notes !!}
                        </ul>
                    </section>
                    <section class="bg-brand-light p-8 rounded-xl  animated-element animate-slide-in-left"
                        style="animation-delay: 0.7s">
                        <h3 class="font-display text-2xl font-bold text-textClr-primary flex items-center mb-6">
                            <i class="fa-solid fa-file-lines text-brand-primary mr-3"></i>Description
                        </h3>
                        <ul class="space-y-3 text-textClr-secondary leading-relaxed list-none">
                            {!! $property->description !!}
                        </ul>
                    </section>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        <!-- Nearby Places -->
                        <div class="bg-brand-dark p-6 rounded-lg">
                            <h4 class="font-semibold text-textClr-primary mb-3">Nearby Places</h4>
                            <ul class="space-y-2 text-textClr-secondary">
                                @if ($property->bazar_distance_km)
                                    <li class="flex items-center">
                                        <i class="fa-solid fa-shopping-cart text-brand-secondary mr-2"></i>
                                        {{ $property->bazar_distance_km }}
                                    </li>
                                @endif
                                @if ($property->hospital_distance_km)
                                    <li class="flex items-center">
                                        <i class="fa-solid fa-hospital text-brand-secondary mr-2"></i>
                                        {{ $property->hospital_distance_km }}
                                    </li>
                                @endif
                                @if ($property->school_distance_km)
                                    <li class="flex items-center">
                                        <i class="fa-solid fa-school text-brand-secondary mr-2"></i>
                                        {{ $property->school_distance_km }}
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <!-- Connectivity -->
                        <div class="bg-brand-dark p-6 rounded-lg">
                            <h4 class="font-semibold text-textClr-primary mb-3">Connectivity</h4>
                            <ul class="space-y-2 text-textClr-secondary">
                                @if ($property->bus_stand_distance_km)
                                    <li class="flex items-center">
                                        <i class="fa-solid fa-bus text-brand-secondary mr-2"></i>
                                        {{ $property->bus_stand_distance_km }}
                                    </li>
                                @endif
                                @if ($property->junction_distance_km)
                                    <li class="flex items-center">
                                        <i class="fa-solid fa-train text-brand-secondary mr-2"></i>
                                        {{ $property->junction_distance_km }}
                                    </li>
                                @endif
                                @if ($property->airport_distance_km)
                                    <li class="flex items-center">
                                        <i class="fa-solid fa-plane text-brand-secondary mr-2"></i>
                                        {{ $property->airport_distance_km }}
                                    </li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </section>

            </div>

            <!-- Sidebar Column (Contact Agent) -->
            <aside class="lg:col-span-1 space-y-8 sticky top-16 h-fit">

                <div id="contact"
                    class="bg-brand-light p-8 rounded-xl shadow-property animated-element animate-fade-in-up"
                    style="animation-delay: 1.1s">
                    <h4 class="font-display text-2xl font-bold text-textClr-primary mb-6">
                        Inquire About This Property
                    </h4>
                    <form action="{{ route('property.inquiry.store', $property->id) }}" method="POST"
                        class="space-y-5">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-textClr-secondary mb-1">Full Name
                                *</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-2.5 bg-brand-dark border border-brand-light/50 rounded-md focus:outline-none focus:ring-2 focus:ring-brand-primary text-textClr-primary"
                                placeholder="Full Name" value="{{ old('name') }}" />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-textClr-secondary mb-1">Email
                                Address</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-2.5 bg-brand-dark border border-brand-light/50 rounded-md focus:outline-none focus:ring-2 focus:ring-brand-primary text-textClr-primary"
                                placeholder="Email" value="{{ old('email') }}" />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-textClr-secondary mb-1">Phone
                                Number *</label>
                            <input type="tel" id="phone" name="phone" required inputmode="tel"
                                pattern="^(\+91[\-\s]?)?[6-9]\d{9}$" maxlength="14" {{-- +91‑9876543210 is 14 chars --}}
                                class="w-full px-4 py-2.5 bg-brand-dark border border-brand-light/50 rounded-md
                                       focus:outline-none focus:ring-2 focus:ring-brand-primary text-textClr-primary"
                                placeholder="Phone Number" value="{{ old('phone') }}" />
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="message"
                                class="block text-sm font-medium text-textClr-secondary mb-1">Message</label>
                            <textarea id="message" name="message" rows="4"
                                class="w-full px-4 py-2.5 bg-brand-dark border border-brand-light/50 rounded-md focus:outline-none focus:ring-2 focus:ring-brand-primary text-textClr-primary"
                                placeholder="I'm interested in this property...">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center">
                            <input id="terms" name="terms" type="checkbox" required
                                class="h-4 w-4 text-brand-primary bg-brand-dark border-brand-light/50 rounded focus:ring-brand-primary"
                                {{ old('terms') ? 'checked' : '' }} />
                            <label for="terms" class="ml-2 block text-sm text-textClr-secondary">I agree to the
                                <a href="#" class="text-brand-primary hover:underline">terms and
                                    conditions</a></label>
                            @error('terms')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- reCAPTCHA -->
                        <!--<div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>-->
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                        @error('g-recaptcha-response')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <button type="submit"
                            class="bg-primary hover:bg-primary-dark text-white w-full py-3.5 rounded-lg font-semibold text-md flex items-center justify-center">
                            <i class="fa-solid fa-paper-plane mr-2"></i>Submit Inquiry
                        </button>
                    </form>

                    @if (session('success'))
                        <div class="mt-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>


                @if (session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: @json(session('success')),
                            confirmButtonColor: '#3085d6'
                        });
                    </script>
                @endif

                @if ($errors->any())
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops…',
                            html: 'Please correct the highlighted fields and try again.',
                            confirmButtonColor: '#d33'
                        });
                    </script>
                @endif


            </aside>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-100 flex justify-center items-center hidden z-50 p-4">
        <button onclick="closeModal()"
            class="absolute top-6 right-6 text-white text-4xl font-bold hover:text-brand-primary transition-transform z-60">
            <i class="fa-solid fa-times"></i>
        </button>

        <!-- Previous button -->
        <button onclick="prevImage()"
            class="absolute left-6 top-1/2 -translate-y-1/2 text-white text-4xl font-bold hover:text-brand-primary transition-transform">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        <!-- Next button -->
        <button onclick="nextImage()"
            class="absolute right-6 top-1/2 -translate-y-1/2 text-white text-4xl font-bold hover:text-brand-primary transition-transform">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

        <img id="modalImage" class="w-4/5 h-full object-contain rounded-lg shadow-2xl transition-opacity duration-300" />

        <!-- Image counter -->
        <div class="absolute bottom-6 left-0 right-0 text-center text-white font-medium">
            <span id="currentImageNum">1</span> / <span id="totalImages">7</span>
        </div>
    </div>
    @if ($similarProperties->count() > 0)
        <!-- Featured Properties -->
        <section id="featured-properties" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Heading -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                        Similar Properties
                    </h2>
                    <div class="mx-auto w-24 h-1 bg-gradient-to-r from-primary to-primary-dark rounded-full mb-6"></div>
                    <p class="text-gray-500 max-w-3xl mx-auto text-lg">
                        Explore our handpicked selection of premium properties. Each listing is carefully vetted to ensure
                        quality and value for our clients.
                    </p>
                </div>

                <!-- Property Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach ($similarProperties as $property)
                        <div
                            class="property-card bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                            <div class="relative h-60 overflow-hidden">
                                @if ($property->main_image)
                                    <img src="{{ asset($property->main_image) }}" alt="{{ $property->title }}"
                                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" />
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500">No Image Available</span>
                                    </div>
                                @endif

                                <div class="absolute top-4 left-4 flex flex-col space-y-2">
                                    @if ($property->is_featured)
                                        <span
                                            class="bg-primary text-white text-xs font-semibold px-3 py-1 rounded-full animate-pulse">
                                            Featured
                                        </span>
                                    @endif

                                    @if ($property->availability === 'Immediate')
                                        <span class="bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                            Available
                                        </span>
                                    @endif
                                </div>

                                <div
                                    class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full p-2 shadow-md">
                                    <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-xl font-bold text-gray-800">{{ $property->title }}</h3>
                                    @if ($property->is_verified)
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded ">Verified</span>
                                    @endif
                                </div>

                                <p class="text-sm text-gray-500 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $property->city }}, {{ $property->state }}
                                </p>
                                <p class="text-sm text-gray-500 mb-3 flex items-center">
                                    @if ($property->year_built)
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            {{ $property->year_built }}
                                        </span>
                                    @endif
                                </p>

                                <div class="flex items-center text-sm text-gray-600 mb-4 space-x-4">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                            </path>
                                        </svg>
                                        {{ $property->bedrooms }} BHK
                                    </span>

                                    {{-- @if ($property->year_built)
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            {{ $property->year_built }}
                                        </span>
                                    @endif --}}

                                    @if ($property->super_area)
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                                                </path>
                                            </svg>
                                            {{ $property->super_area }} sqft
                                        </span>
                                    @endif
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-xl font-bold text-primary">
                                        ₹{{ $property->price }}
                                        {{-- @if ($property->price_unit)
                                            <span class="text-sm font-normal">{{ $property->price_unit }}</span>
                                        @endif --}}
                                    </span>
                                    <a href="{{ route('property.show', $property->id) }}"
                                        class="text-sm bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md transition-colors duration-300 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- View All Button -->
                <div class="text-center mt-12">
                    <a href="{{ route('property.search') }}"
                        class="bg-white border-2 border-primary text-primary hover:bg-primary hover:text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-md">
                        View All Properties
                    </a>
                </div>
            </div>
        </section>
    @endif

    <script>
        // Basic animation reveal (can be enhanced with Intersection Observer)
        document.addEventListener("DOMContentLoaded", () => {
            const animatedElements = document.querySelectorAll(".animated-element");
            animatedElements.forEach((el) => {
                // For CSS animations, class can be added directly or via Intersection Observer
                // For this example, we'll assume CSS handles the animation start
            });

            // Set total images counter on load
            document.getElementById("totalImages").textContent =
                imageSources.length;
        });

        // Modal script (from original, ensure compatibility)
        // Update the imageSources array to use property images
        const imageSources = [
            @foreach ($propertyimagesall as $image)
                "{{ asset($image->image_path) }}",
            @endforeach
        ];
        let currentIndex = 0;
        let autoSlideInterval = null;

        function openModal(src) {
            currentIndex = imageSources.indexOf(src);
            if (currentIndex === -1) currentIndex = 0; // Default to first if src not found
            updateModalImage();
            document.getElementById("modal").classList.remove("hidden");
            document.body.style.overflow = "hidden";
            startAutoSlide();
        }

        function closeModal() {
            document.getElementById("modal").classList.add("hidden");
            document.body.style.overflow = "auto";
            stopAutoSlide();
        }

        function updateModalImage() {
            const img = document.getElementById("modalImage");

            // Fade effect
            img.style.opacity = "0";

            setTimeout(() => {
                img.src = imageSources[currentIndex];
                document.getElementById("currentImageNum").textContent =
                    currentIndex + 1;
                img.style.opacity = "1";
            }, 3000);
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % imageSources.length;
            updateModalImage();
            resetAutoSlideTimer();
        }

        function prevImage() {
            currentIndex =
                (currentIndex - 1 + imageSources.length) % imageSources.length;
            updateModalImage();
            resetAutoSlideTimer();
        }

        function startAutoSlide() {
            // Auto-slide every 2 seconds
            autoSlideInterval = setInterval(nextImage, 2000);
        }

        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
                autoSlideInterval = null;
            }
        }

        function resetAutoSlideTimer() {
            stopAutoSlide();
            startAutoSlide();
        }

        // Basic keyboard nav for modal
        document.addEventListener("keydown", function(event) {
            if (!document.getElementById("modal").classList.contains("hidden")) {
                if (event.key === "Escape") {
                    closeModal();
                } else if (event.key === "ArrowRight") {
                    nextImage();
                } else if (event.key === "ArrowLeft") {
                    prevImage();
                }
            }
        });

        // Example trigger function - you can call this on your image clicks
        function showCarousel(startIndex = 0) {
            currentIndex = startIndex;
            openModal(imageSources[startIndex]);
        }
    </script>


@endsection
