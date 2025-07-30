<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpgradeController extends Controller
{
    public function showForm()
    {
        return view('upgrade');
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:50',
            'companyName' => 'required|string|max:255',
            'registrationNumber' => 'required|string|max:255',
            'taxId' => 'required|string|max:255',
            'companyAddress' => 'required|string',
            'industry' => 'required|string',
            'companySize' => 'required|string',
            'position' => 'required|string',
            'businessLicense' => 'required|file|mimes:pdf,jpg,png,doc,docx',
            'proofOfAddress' => 'required|file|mimes:pdf,jpg,png,doc,docx',
            'identification' => 'required|file|mimes:pdf,jpg,png',
            'terms' => 'accepted',
        ]);
        // File upload handling (example, you may want to store files)
        // $businessLicensePath = $request->file('businessLicense')->store('licenses');
        // $proofOfAddressPath = $request->file('proofOfAddress')->store('addresses');
        // $identificationPath = $request->file('identification')->store('ids');
        // You can save the data to the database here if needed
        return back()->with('success', 'Application submitted successfully! You will receive a confirmation email shortly.');
    }
}
