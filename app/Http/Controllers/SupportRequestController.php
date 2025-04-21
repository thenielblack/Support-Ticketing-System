<?php

namespace App\Http\Controllers;

use App\Models\SupportRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SupportRequestController extends Controller
{
    public function create(): View|Application|Factory
    {
        return view('support-request');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'description' => 'required|string',
            ]);

             SupportRequest::create($validatedData);

            return redirect()->route('support-request.create')
                ->with('success', 'Support request created successfully!');

        } catch (\Exception $e) {
            return redirect()->route('support-request.create')
                ->with('error', 'There was an error inn the request, please try again.')
                ->withInput();
        }
    }

    public function index(): View|Application|Factory
    {

//        TODO: implement pagination
        $supportRequests = SupportRequest::latest()->get();

        return view('/support-requests-list', compact('supportRequests'));
    }

}
