<?php

use Illuminate\Support\Facades\Route;
use Projects\Klinik\Controllers\API\Finance\JournalEntry\JournalEntryController;

Route::apiResource('journal-entry',JournalEntryController::class)->parameters(['journal-entry' => 'id']);