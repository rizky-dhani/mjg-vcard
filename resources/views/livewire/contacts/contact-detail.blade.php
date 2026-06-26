<div>
    <div class="container">
        <div class="row min-vh-100">
            <div class="col-lg-3"></div>
            <div class="col-5 d-flex justify-content-center align-items-center">
                <div class="py-5 card">
                    <div class="mb-4 text-center barcode-img">
                        <img src="{{ asset('images/logo/LOGO-MEDQUEST-HD-2020-11-27-14_56_44.png') }}" class="w-25 w-lg-25"
                            alt="">
                    </div>
                    <div class="text-center text-lg-start mb-lg-2 barcode-card">
                        <div class="mb-4">
                            <img src="{{ asset('storage/'. $contact->barcode) }}" class="img-fluid" alt="" srcset="" style="width:8rem">
                        </div>
                        <h4 class="mb-2 text-center fw-medium">{{ $contact->first_name.' '.$contact->last_name }}</h4>
                        <h6 class="mb-2 text-center fw-normal">{{ $contact->dept }}</h6>
                        <div class="mt-2 opacity-50 divider">
                            <hr width="40%" class="mx-auto">
                        </div>
                    </div>
                    <div class="mb-0 px-5 card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <p class="pb-0 mb-0 fw-bolder h6">{{ __('Phone') }}</p>
                            <a href="tel:{{ $contact->phone_number }}" class="text-black text-decoration-none text-end">
                                <p class="h6 fw-normal">{{ $contact->phone_number }}</p>
                            </a>
                        </div>
                        @if ($contact->phone_number2 != null)
                            <div class="d-flex justify-content-between mb-3">
                                <p class="pb-0 mb-0 fw-bolder h6">{{ __('Phone 2') }}</p>
                                <a href="tel:{{ $contact->phone_number2 }}" class="text-black text-decoration-none text-end">
                                    <p class="h6 fw-normal">{{ $contact->phone_number2 }}</p>
                                </a>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between mb-3">
                            <p class="pb-0 mb-0 fw-bolder h6">{{ __('Email') }}</p>
                            <a href="mailto:{{ $contact->email }}" class="text-black text-decoration-none text-end">
                                <p class="h6 fw-normal">{{ $contact->email }}</p>
                            </a>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <p class="pb-0 mb-0 fw-bolder h6">{{ __('Company') }}</p>
                            <div class="text-end">
                                <p class="h6 fw-normal mb-0">{{ __('PT. Medquest Jaya Global') }}</p>
                                <p class="h6 fw-normal">{{ $contact->dept .' - '. $contact->title }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <p class="pb-0 mb-0 fw-bolder h6">{{ __('Address') }}</p>
                            <p class="h6 fw-normal text-end mb-0">{{ $contact->st_address.', '.$contact->city_address.', '.$contact->province_address.' '.$contact->postcode_address.', '.$contact->country_address }}</p>
                        </div>
                    </div>
                    <div class="px-5 download-button d-grid">
                        <button class="btn btn-primary-color text-uppercase"
                            wire:click.prevent="downloadVCard('{{ $contact->contactId }}')">
                            <i class="fas fa-download me-1"></i> {{ __('save contact') }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>
