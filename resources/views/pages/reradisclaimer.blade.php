@extends('layout.layout')

@section('title', 'RERA Disclaimer')
@section('description', 'Important RERA compliance information for Proptrure users.')
@section('keywords', 'RERA disclaimer, real estate regulation, compliance')
@section('author', 'Proptrure')
@section('og_title', 'RERA Disclaimer')
@section('og_description', 'Important RERA compliance information for our users.')
@section('og_image', asset('images/rera-disclaimer.jpg'))
@section('og_url', url()->current())
@section('og_type', 'website')
@section('twitter_card', 'summary_large_image')
@section('twitter_title', 'RERA Disclaimer')
@section('twitter_description', 'RERA compliance information for Proptrure users.')
@section('twitter_image', asset('images/rera-disclaimer.jpg'))
@section('twitter_site', '@proptrure')
@section('twitter_creator', '@proptrure')
@section('canonical', url()->current())

@section('content')
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-[#d33593] to-[#48254a] py-20 text-white">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">RERA Disclaimer</h1>
                <p class="text-xl max-w-2xl mx-auto">Important compliance information under the Real Estate (Regulation and Development) Act, 2016</p>
            </div>
        </div>

        <!-- Disclaimer Content -->
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-5xl mx-auto p-8 md:p-12">
            {!! $legal->content !!}
            </div>
           
        </div>
    </div>
@endsection
