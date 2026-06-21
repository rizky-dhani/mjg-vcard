<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Contacts\ContactDetail;
use App\Livewire\Public\BusinessCardDetail;

Route::get('contacts/detail/{contactId}', ContactDetail::class)->name('contacts.detail');
