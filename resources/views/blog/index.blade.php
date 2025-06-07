@extends('layout.layout')

@section('title', 'Blog Posts')
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
            --primary-light: rgba(211, 53, 147, 0.1);

            /* Neutral Colors */
            --gray-dark: #717271;
            --gray-light: #b1b2b1;
            --white: #ffffff;

            /* Additional Colors */
            --teal: #38b2ac;
            --red: #e53e3e;
            --yellow: #f6e05e;
            --purple: #805ad5;
            --blue: #4299e1;
            --green: #48bb78;
        }

        .gradient-text {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        .title-underline {
            position: relative;
            display: inline-block;
        }

        .title-underline::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            border-radius: 2px;
        }

        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .pagination .page-link {
            color: var(--primary);
        }

        .blog-header {
            background: linear-gradient(135deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%),
                        url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

    <!-- Hero Header -->
    <section class="blog-header py-32 text-white relative">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    <span class="gradient-text">Insights & Stories</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-200 mb-8">
                    Discover the latest trends, expert advice, and inspiring stories in real estate
                </p>

            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <!-- Section Heading -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    <span class="title-underline">Latest Articles</span>
                </h2>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg">
                    Explore our collection of carefully curated articles to help you make informed decisions in the real estate market.
                </p>
            </div>



            <!-- Blog Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($paginatedBlogs as $blog)
                <!-- Blog Post -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover-scale">
                    <div class="relative h-64 overflow-hidden">
                        @if($blog->image)
                        <img src="/{{ $blog->image }}" alt="{{ $blog->title }}"
                            class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                        @else
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Default blog image"
                            class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                        @endif
                        @if($blog->hashtags)
                        <div class="absolute top-4 left-4">
                            <span class="bg-[#d33593] text-white text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $blog->hashtags }}
                            </span>
                        </div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent h-20"></div>
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
                        <h3 class="text-xl font-bold text-gray-800 mb-3 hover:text-primary transition-colors duration-300">
                            <a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}</a>
                        </h3>
                        <p class="text-gray-600 mb-4">
                            {{ $blog->short_description  }}
                        </p>
                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('blog.details', $blog->id) }}"
                                class="text-primary hover:text-primary-dark font-medium flex items-center transition-colors duration-300 group">
                                Read More
                                <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-10">
                    <div class="bg-white rounded-xl p-8 shadow-lg max-w-md mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">No Articles Found</h3>
                        <p class="text-gray-600">We're working on new content. Check back soon!</p>
                    </div>
                </div>
                @endforelse
            </div>



            <!-- Pagination -->
             @if($paginatedBlogs->hasPages())
                <div class="mt-12">
                    {{ $paginatedBlogs->links() }}
                </div>
                @endif
        </div>
    </section>

@endsection
