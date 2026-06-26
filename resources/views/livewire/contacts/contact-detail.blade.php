<div>
    <div class="container">
        <div class="row min-vh-100">
            <div class="col-lg-4"></div>
            <div class="col-3 d-flex justify-content-center align-items-center">
                <div class="py-5 card">
                    <div class="mb-4 text-center barcode-img">
                        <img src="{{ asset('images/logo/LOGO-MEDQUEST-HD-2020-11-27-14_56_44.png') }}" class="w-25 w-lg-25"
                            alt="">
                    </div>
                    <div class="text-center mb-lg-2 barcode-card">
                        <div class="mb-4">
                            <img src="{{ asset('storage/'. $contact->barcode) }}" class="img-fluid" alt="" srcset="" style="width:8rem">
                        </div>
                        <h4 class="mb-2 text-center fw-medium">{{ $contact->first_name.' '.$contact->last_name }}</h4>
                        <h6 class="mb-2 text-center fw-normal">{{ $contact->dept }}</h6>
                        <div class="mt-2 opacity-50 divider">
                            <hr width="40%" class="mx-auto">
                        </div>
                    </div>
                    <div class="mb-0 card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="participant-table d-flex justify-content-center">
                                <div class="row">
                                    <div class="text-center text-lg-end col-lg-5">
                                        <p class="pb-0 mb-0 fw-bolder h6">
                                            {{ __('Phone') }}
                                        </p>
                                    </div>
                                    <div class="mb-3 text-center text-lg-start col-lg-7">
                                        <a href="tel:{{ $contact->phone_number }}" class="text-black text-decoration-none">
                                            <p class="h6 fw-normal">{{ $contact->phone_number }}</p>
                                        </a>
                                    </div>
                                    @if ($contact->phone_number2 != null)
                                        <div class="text-center text-lg-end col-lg-5">
                                            <p class="pb-0 mb-0 fw-bolder h6">
                                                {{ __('Phone 2') }}
                                            </p>
                                        </div>
                                        <div class="mb-3 text-center text-lg-start col-lg-7">
                                        <a href="tel:{{ $contact->phone_number2 }}" class="text-black text-decoration-none">
                                            <p class="h6 fw-normal">{{ $contact->phone_number2 }}</p>
                                        </a>
                                        </div>
                                    @endif
                                    <div class="text-center text-lg-end col-lg-5">
                                        <p class="pb-0 mb-0 fw-bolder h6">
                                            {{ __('Email') }}
                                        </p>
                                    </div>
                                    <div class="mb-3 text-center text-lg-start col-lg-7">
                                        <a href="mailto:{{ $contact->email }}" class="text-black text-decoration-none">
                                        <p class="h6 fw-normal">{{ $contact->email }}</p>
                                        </a>
                                    </div>
                                    <div class="text-center text-lg-end col-lg-5">
                                        <p class="pb-0 mb-0 fw-bolder h6">
                                            {{ __('Company') }}
                                        </p>
                                    </div>
                                    <div class="mb-3 text-center text-lg-start col-lg-7">
                                        <p class="h6 fw-normal">{{ __('PT. Medquest Jaya Global') }}</p>
                                        <p class="h6 fw-normal">{{ $contact->dept .' - '. $contact->title }}</p>
                                    </div>
                                    <div class="text-center text-lg-end col-lg-5">
                                        <p class="pb-0 mb-0 fw-bolder h6">
                                            {{ __('Address') }}
                                        </p>
                                    </div>
                                    <div class="mb-3 text-center text-lg-start col-lg-7">
                                        <p class="h6 fw-normal pe-lg-4">{{ $contact->st_address.', '.$contact->city_address.', '.$contact->province_address.' '.$contact->postcode_address.', '.$contact->country_address }}</p>
                                    </div>
                                </div>
                            </div>
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
            <div class="col-lg-4"></div>
        </div>
    </div>
</div>
