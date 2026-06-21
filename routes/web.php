<?php

use App\Livewire\Contacts\ContactDetail;
use Illuminate\Support\Facades\Route;

Route::get('contacts/detail/{contactId}', ContactDetail::class)->name('contacts.detail');
