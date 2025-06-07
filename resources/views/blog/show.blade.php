@extends('layout.layout')

@section('title', \Illuminate\Support\Str::limit($blog->title, 60) . ' | PropTrue')
@section('description', \Illuminate\Support\Str::limit(strip_tags($blog->short_description), 155))
@section('keywords', implode(', ', array_merge(explode(',', $blog->hashtags), ['real estate blog', 'property advice',
    'home buying tips'])))
@section('author', $blog->author ?? 'PropTrue Team')

@section('og_title', \Illuminate\Support\Str::limit($blog->title, 60) . ' | PropTrue')
@section('og_description', \Illuminate\Support\Str::limit(strip_tags($blog->short_description), 200))
@section('og_image', $blog->image ? asset($blog->image) : asset('assets/images/blog-default.png'))
@section('og_url', url()->current())
@section('og_type', 'article')

@section('twitter_card', 'summary_large_image')
@section('twitter_title', \Illuminate\Support\Str::limit($blog->title, 60) . ' | PropTrue')
@section('twitter_description', \Illuminate\Support\Str::limit(strip_tags($blog->short_description), 200))
@section('twitter_image', $blog->image ? asset($blog->image) : asset('assets/images/blog-default.png'))
@section('twitter_site', '@PropTrue')
@section('twitter_creator', '@PropTrue')

@section('canonical', url()->current())
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

        .gradient-bg {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
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

        .content-width {
            max-width: 900px;
        }

        .blog-content {
            line-height: 1.8;
            font-size: 1.125rem;
            color: #4a5568;
        }

        .blog-content h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-top: 3rem;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            position: relative;
            padding-left: 1.5rem;
        }

        .blog-content h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.5rem;
            height: 1.5rem;
            width: 6px;
            background: var(--primary);
            border-radius: 3px;
        }

        .blog-content h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
            color: var(--primary-dark);
        }

        .blog-content p {
            margin-bottom: 1.75rem;
        }

        .blog-content ul,
        .blog-content ol {
            margin-bottom: 1.75rem;
            padding-left: 2rem;
        }

        .blog-content li {
            margin-bottom: 0.75rem;
            position: relative;
        }

        .blog-content ul li::before {
            content: '•';
            color: var(--primary);
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        .blog-content ol {
            counter-reset: item;
        }

        .blog-content ol li::before {
            content: counter(item) ".";
            counter-increment: item;
            color: var(--primary);
            font-weight: bold;
            display: inline-block;
            width: 1.5em;
            margin-left: -1.5em;
        }

        .blog-content a {
            color: var(--primary);
            text-decoration: underline;
            transition: all 0.3s ease;
        }

        .blog-content a:hover {
            color: var(--primary-dark);
        }

        .blog-content blockquote {
            border-left: 4px solid var(--primary);
            padding: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: #4a5568;
            background-color: var(--primary-light);
            border-radius: 0 8px 8px 0;
        }

        .blog-content img {
            max-width: 100%;
            height: auto;
            margin: 2rem 0;
            border-radius: 8px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .tag {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-right: 0.75rem;
            margin-bottom: 0.75rem;
            background-color: var(--primary-light);
            color: var(--primary-dark);
            transition: all 0.3s ease;
        }

        .tag:hover {
            background-color: var(--primary);
            color: white;
        }

        .share-btn {
            transition: all 0.3s ease;
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .share-btn:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .author-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .author-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .featured-image {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            margin-bottom: 3rem;
        }

        .featured-image img {
            transition: transform 0.5s ease;
        }

        .featured-image:hover img {
            transform: scale(1.03);
        }
    </style>

    <body class="bg-white text-gray-700 font-sans overflow-x-hidden">
        <!-- Blog Header -->
        <!-- Blog Header -->
        <div class="gradient-bg py-24 text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-30"></div>
            </div>
            <div class="content-width mx-auto px-6 relative z-10">
                <div class="text-center">
                    <div class="inline-flex items-center space-x-4 mb-6">
                        <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm font-medium">
                            {{ \Carbon\Carbon::parse($blog->date)->format('F j, Y') }}
                        </span>
                        {{-- <span class="text-white text-opacity-80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        5 min read
                    </span> --}}
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        {{ $blog->title }}
                    </h1>
                    <p class="text-xl text-white text-opacity-90 max-w-3xl mx-auto">
                        {{ $blog->short_description }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Blog Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Featured Image -->
            <div class="mb-12 rounded-xl overflow-hidden shadow-lg">
                <img src="/{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-auto object-cover">
            </div>

            <!-- Content -->
            <div class="blog-content">
                {!! $blog->content !!}
            </div>

            <!-- Tags -->
            @if ($blog->hashtags)
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Tags</h3>
                    <div class="flex flex-wrap">
                        @foreach (explode(',', $blog->hashtags) as $tag)
                            <span class="tag bg-gray-100 text-gray-800">
                                #{{ trim($tag) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Author & Share (optional) -->
            <div
                class="mt-12 flex flex-col sm:flex-row justify-between items-start sm:items-center border-t border-gray-200 pt-8">

                @php
                    $shareUrl = urlencode(request()->fullUrl());
                    $shareTitle = urlencode($blog->title ?? 'Check this out!');
                @endphp

                <div class="flex space-x-4">
                    <span class="text-sm font-medium text-gray-500">Share:</span>

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank"
                        class="text-gray-400 hover:text-primary">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                    <!-- Twitter (X) -->
                    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
                        target="_blank" class="text-gray-400 hover:text-primary">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                        </svg>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $shareTitle }}"
                        target="_blank" class="text-gray-400 hover:text-primary">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
                                clip-rule="evenodd" />
                        </svg>
                        </svg>
                    </a>
                    <!-- WhatsApp -->
                    <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank"
                        class="text-gray-400 hover:text-primary">
                        <span class="sr-only">WhatsApp</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 32 32">
                            <path
                                d="M16.003 2.003c-7.732 0-14 6.268-14 14 0 2.485.664 4.897 1.926 7.015l-1.997 7.282 7.487-1.964a13.925 13.925 0 006.584 1.667c7.732 0 14-6.268 14-14s-6.268-14-14-14zm0 25.4c-2.188 0-4.337-.586-6.21-1.69l-.445-.26-4.44 1.166 1.186-4.318-.29-.456a11.67 11.67 0 01-1.836-6.366c0-6.456 5.248-11.704 11.704-11.704s11.704 5.248 11.704 11.704-5.248 11.704-11.704 11.704zm6.46-8.59c-.354-.177-2.098-1.034-2.422-1.153-.323-.12-.558-.177-.793.177s-.91 1.153-1.118 1.387c-.208.234-.41.265-.763.089-.354-.177-1.494-.55-2.844-1.753-1.05-.937-1.76-2.094-1.966-2.448-.208-.354-.022-.545.155-.722.159-.159.354-.414.531-.62.177-.208.234-.354.354-.589.12-.234.06-.442-.03-.62-.088-.177-.793-1.918-1.087-2.63-.285-.683-.573-.59-.793-.6h-.681c-.209 0-.545.078-.83.412-.285.354-1.09 1.063-1.09 2.594s1.116 3.006 1.27 3.215c.159.208 2.196 3.352 5.32 4.699.743.32 1.322.51 1.772.653.745.237 1.423.204 1.957.124.597-.089 1.84-.75 2.1-1.474.26-.723.26-1.34.182-1.474-.08-.133-.294-.21-.617-.355z" />
                        </svg>
                    </a>
                </div>

            </div>


        </div>

    @endsection
