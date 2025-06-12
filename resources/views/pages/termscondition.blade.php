@extends('layout.layout')

@section('title', 'Terms & Conditions')
@section('description', 'Terms of use for Proptrure real estate services')
@section('keywords', 'terms and conditions, user agreement, real estate terms')
@section('author', 'Proptrure')
@section('og_title', 'Terms & Conditions')
@section('og_description', 'Legal terms governing use of Proptrure services')
@section('og_image', asset('images/terms.jpg'))
@section('og_url', url()->current())
@section('og_type', 'website')
@section('twitter_card', 'summary_large_image')
@section('twitter_title', 'Terms & Conditions')
@section('twitter_description', 'Legal terms for Proptrure services')
@section('twitter_image', asset('images/terms.jpg'))
@section('twitter_site', '@proptrure')
@section('twitter_creator', '@proptrure')
@section('canonical', url()->current())

@section('content')
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-[#d33593] to-[#48254a] py-20 text-white">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Terms & Conditions</h1>
                <p class="text-xl max-w-2xl mx-auto">Legal agreement governing your use of Proptrure services</p>
            </div>
        </div>

        <!-- Terms Content -->
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-7xl mx-auto   p-8 md:p-12">
                <div class="prose max-w-none">
                    {{-- <p class="mb-6"><strong>Last Updated:</strong> [Insert Date]</p> --}}

                    <p class="mb-6">Welcome to Proptrure! These Terms & Conditions ("Terms") govern your access to and use of our website, mobile applications, and services (collectively, the "Platform"). By accessing or using our Platform, you agree to be bound by these Terms.</p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">1. Definitions</h3>
                    <ul class="list-disc pl-6 mb-6">
                        <li><strong>"Platform"</strong> refers to Proptrure's website, mobile apps, and related services</li>
                        <li><strong>"User"</strong> means any person accessing or using the Platform</li>
                        <li><strong>"Content"</strong> includes all listings, text, images, data, and information on the Platform</li>
                        <li><strong>"Services"</strong> refers to our real estate brokerage, property listings, valuation tools, and related offerings</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">2. Account Registration</h3>
                    <p class="mb-4">To access certain features, you must register an account:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>You must provide accurate and complete information</li>
                        <li>You are responsible for maintaining account confidentiality</li>
                        <li>You must be at least 18 years old to create an account</li>
                        <li>We reserve the right to suspend or terminate accounts at our discretion</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">3. Acceptable Use</h3>
                    <p class="mb-4">You agree not to:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>Post false, misleading, or fraudulent information</li>
                        <li>Use the Platform for any illegal purpose</li>
                        <li>Harass other users or Proptrure personnel</li>
                        <li>Reverse engineer or attempt to extract source code</li>
                        <li>Use automated systems to access the Platform without permission</li>
                        <li>Violate any applicable laws or regulations</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">4. Property Listings</h3>
                    <p class="mb-4">For property listings:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>Listings are provided by third parties and Proptrure does not verify all information</li>
                        <li>We reserve the right to edit, reject, or remove listings without notice</li>
                        <li>All measurements (carpet area, built-up area, etc.) are provided by the lister</li>
                        <li>Price information is subject to change without notice</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">5. Intellectual Property</h3>
                    <p class="mb-4">All Platform content is owned by or licensed to Proptrure:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>You may not reproduce, distribute, or create derivative works without permission</li>
                        <li>Proptrure trademarks and logos may not be used without written consent</li>
                        <li>User-generated content grants us a worldwide, royalty-free license to use the content</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">6. Fees & Payments</h3>
                    <p class="mb-4">For services requiring payment:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>All fees are clearly stated before purchase</li>
                        <li>Payments are non-refundable unless otherwise stated</li>
                        <li>We use third-party payment processors and do not store full payment details</li>
                        <li>Late payments may incur additional charges</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">7. Brokerage Services</h3>
                    <p class="mb-4">When using our brokerage services:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>We act as an intermediary between buyers and sellers</li>
                        <li>All transactions are subject to separate written agreements</li>
                        <li>Commission rates will be disclosed before engagement</li>
                        <li>We comply with all applicable real estate regulations</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">8. Disclaimers</h3>
                    <p class="mb-4">The Platform is provided "as is" without warranties of any kind:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>We do not guarantee the accuracy of property information</li>
                        <li>We are not liable for transactions between users</li>
                        <li>We do not endorse any particular property or user</li>
                        <li>Market conditions and property values may change</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">9. Limitation of Liability</h3>
                    <p class="mb-6">To the maximum extent permitted by law, Proptrure shall not be liable for any indirect, incidental, special, or consequential damages arising from your use of the Platform.</p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">10. Indemnification</h3>
                    <p class="mb-6">You agree to indemnify and hold harmless Proptrure and its affiliates from any claims, damages, or expenses arising from your breach of these Terms or misuse of the Platform.</p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">11. Termination</h3>
                    <p class="mb-6">We may terminate or suspend your access to the Platform at any time, without prior notice or liability, for any reason including breach of these Terms.</p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">12. Governing Law</h3>
                    <p class="mb-6">These Terms shall be governed by and construed in accordance with the laws of [Your Country/State], without regard to its conflict of law provisions.</p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">13. Dispute Resolution</h3>
                    <p class="mb-4">Any disputes shall be resolved as follows:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>First through good faith negotiations</li>
                        <li>Then through mediation in [Your City]</li>
                        <li>If unresolved, through binding arbitration</li>
                        <li>Each party bears their own costs</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">14. Changes to Terms</h3>
                    <p class="mb-6">We reserve the right to modify these Terms at any time. Your continued use after changes constitutes acceptance of the modified Terms.</p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">15. Contact Information</h3>
                    <p class="mb-2">For questions about these Terms:</p>
                    <p class="mb-2"><strong>Proptrure Realty Services Pvt. Ltd.</strong></p>
                    <p class="mb-2">New Patliputra Colony, Patliputra Colony, Patna, Bihar 800013</p>
                    <p class="mb-2"><strong>Email:</strong> legal@proptrure.com</p>
                    <p class="mb-6"><strong>Phone:</strong> (123) 456-7890</p>

                    <div class="border-t pt-6">
                        <p class="text-sm text-gray-600">By using Proptrure's Platform, you acknowledge that you have read, understood, and agree to be bound by these Terms & Conditions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
