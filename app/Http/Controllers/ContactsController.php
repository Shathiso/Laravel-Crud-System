<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
	public function contact() {

    $contacts = ['shathisontibi@yahoo.com', '71783908', 'Plot 18029 Phase 2'];
    return view('contact', [
      'contacts' => $contacts
    ]);
  }
}
