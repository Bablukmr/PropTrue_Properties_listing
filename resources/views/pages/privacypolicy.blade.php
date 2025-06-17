@extends('layout.layout')

@section('title', 'Privacy Policy')
@section('description', 'Learn how Proptrure collects, uses, and protects your personal information.')
@section('keywords', 'privacy policy, data protection, personal information')
@section('author', 'Proptrure')
@section('og_title', 'Privacy Policy')
@section('og_description', 'Learn how we protect your personal information.')
@section('og_image', asset('images/privacy.jpg'))
@section('og_url', url()->current())
@section('og_type', 'website')
@section('twitter_card', 'summary_large_image')
@section('twitter_title', 'Privacy Policy')
@section('twitter_description', 'Learn how Proptrure protects your personal data.')
@section('twitter_image', asset('images/privacy.jpg'))
@section('twitter_site', '@proptrure')
@section('twitter_creator', '@proptrure')
@section('canonical', url()->current())

@section('content')
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-[#d33593] to-[#48254a] py-20 text-white">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Privacy Policy</h1>
                <p class="text-xl max-w-2xl mx-auto">Your privacy is important to us. Learn how we collect, use, and protect your information.</p>
            </div>
        </div>

        <!-- Policy Content -->
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-7xl mx-auto   p-8 md:p-12">
                <div class="prose max-w-none">
                    {{-- <h2 class="text-2xl font-bold text-gray-800 mb-6">Last Updated: [Date]</h2> --}}

                    <p class="mb-6">Welcome to <strong>Proptrure</strong>! We respect your privacy and are committed to protecting your personal data. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our real estate services.</p>

                    <h3 class="text-xl font-semibold text-primary mb-4">1. Information We Collect</h3>
                    <p class="mb-4">We may collect the following types of information:</p>

                    <h4 class="font-medium text-gray-800 mb-2">A. Personal Information</h4>
                    <ul class="list-disc pl-6 mb-4">
                        <li>Name</li>
                        <li>Email address</li>
                        <li>Phone number</li>
                        <li>Property address (for valuation or listing services)</li>
                        <li>Payment details (if applicable)</li>
                    </ul>

                    <h4 class="font-medium text-gray-800 mb-2">B. Property-Related Information</h4>
                    <ul class="list-disc pl-6 mb-4">
                        <li>Property preferences and requirements</li>
                        <li>Search history and saved properties</li>
                        <li>Transaction details (for buyers/sellers)</li>
                    </ul>

                    <h4 class="font-medium text-gray-800 mb-2">C. Technical Information</h4>
                    <ul class="list-disc pl-6 mb-6">
                        <li>Device and browser information</li>
                        <li>IP address</li>
                        <li>Cookies and usage data</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-primary mb-4">2. How We Use Your Information</h3>
                    <p class="mb-4">We use your data to:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>Provide and improve our real estate services</li>
                        <li>Match you with suitable properties or buyers</li>
                        <li>Process transactions and manage contracts</li>
                        <li>Communicate with you about properties and services</li>
                        <li>Personalize your experience on our platform</li>
                        <li>Analyze market trends and improve our offerings</li>
                        <li>Comply with legal and regulatory requirements</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-primary mb-4">3. Sharing Your Information</h3>
                    <p class="mb-4">We may share your information with:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li><strong>Real estate agents/brokers:</strong> To facilitate property transactions</li>
                        <li><strong>Service providers:</strong> Payment processors, CRM systems, etc.</li>
                        <li><strong>Legal authorities:</strong> When required by law or to protect our rights</li>
                        <li><strong>Business partners:</strong> With your consent for relevant offers</li>
                    </ul>
                    <p class="mb-6"><strong>We do not sell</strong> your personal information to third parties.</p>

                    <h3 class="text-xl font-semibold text-primary mb-4">4. Data Security</h3>
                    <p class="mb-6">We implement industry-standard security measures including encryption, secure servers, and access controls to protect your data. However, no online service is 100% secure, so we cannot guarantee absolute security.</p>

                    <h3 class="text-xl font-semibold text-primary mb-4">5. Cookies & Tracking</h3>
                    <p class="mb-6">We use cookies to enhance your experience on our website. You can disable cookies in your browser settings, but some features may not work properly. We may also use analytics tools to understand user behavior.</p>

                    <h3 class="text-xl font-semibold text-primary mb-4">6. Your Rights</h3>
                    <p class="mb-4">Depending on your location, you may have the right to:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>Access, correct, or delete your personal data</li>
                        <li>Opt-out of marketing communications</li>
                        <li>Restrict or object to data processing</li>
                        <li>Request data portability</li>
                        <li>Withdraw consent (where applicable)</li>
                    </ul>
                    <p class="mb-6">To exercise these rights, please contact us at <a href="mailto:privacy@proptrure.com" class="text-primary hover:underline">privacy@proptrure.com</a>.</p>

                    <h3 class="text-xl font-semibold text-primary mb-4">7. Children's Privacy</h3>
                    <p class="mb-6">Our services are not intended for users under 18 years of age. We do not knowingly collect personal information from children.</p>

                    <h3 class="text-xl font-semibold text-primary mb-4">8. Changes to This Policy</h3>
                    <p class="mb-6">We may update this Privacy Policy periodically. We will notify you of significant changes through our website or via email. Your continued use of our services after changes constitutes acceptance of the updated policy.</p>

                    <h3 class="text-xl font-semibold text-primary mb-4">9. Contact Us</h3>
                    <p class="mb-2">For privacy-related questions or concerns, please contact:</p>
                    <p class="mb-2"><strong>Email:</strong> privacy@proptrure.com</p>
                    <p class="mb-2"><strong>Address:</strong> New Patliputra Colony, Patliputra Colony, Patna, Bihar 800013</p>
                    <p class="mb-6"><strong>Phone:</strong> (123) 456-7890</p>

                    <p class="text-gray-600">By using Proptrure's services, you acknowledge that you have read and understood this Privacy Policy.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
