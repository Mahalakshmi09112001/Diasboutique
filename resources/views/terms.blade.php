@extends('layouts.app')

@section('title', 'Terms and Conditions')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Terms and Conditions</h1>
    <div id="termsAccordion" class="accordion">
        <!-- Section 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    1. Acceptance of Terms
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#termsAccordion">
                <div class="accordion-body">
                    By accessing or using our website, you agree to be bound by these Terms and Conditions. If you do not agree, please refrain from using our services.
                </div>
            </div>
        </div>
        <!-- Section 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    2. Intellectual Property
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#termsAccordion">
                <div class="accordion-body">
                    All content, designs, trademarks, and other intellectual property on this site are the property of DIAS BOUTIQUE unless stated otherwise.
                </div>
            </div>
        </div>
        <!-- Section 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    3. User Responsibilities
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#termsAccordion">
                <div class="accordion-body">
                    Users are expected to provide accurate information when signing up and to refrain from engaging in any unlawful activities on the website.
                </div>
            </div>
        </div>
        <!-- Section 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    4. Limitation of Liability
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#termsAccordion">
                <div class="accordion-body">
                    We are not responsible for any damages that arise from the use or inability to use our services.
                </div>
            </div>
        </div>
        <!-- Section 5 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    5. Amendments
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#termsAccordion">
                <div class="accordion-body">
                    We reserve the right to amend these terms at any time. Updates will be posted on this page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
