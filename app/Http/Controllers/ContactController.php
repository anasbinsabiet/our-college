<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{   
    public function index(Request $request)
    {
        $query = Contact::query()->orderByDesc('id');

        // ===== Filters =====
        $query->when($request->id, fn($q) => $q->where('id', $request->id));
        $query->when($request->name, fn($q) => $q->where('name', 'LIKE', "%{$request->name}%"));
        $query->when($request->phone, fn($q) => $q->where('phone', 'LIKE', "%{$request->phone}%"));
        $query->when($request->created_by, fn($q) => $q->where('created_by', $request->created_by));

        if ($request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $contacts = $query->get();
        $users   = User::select('id', 'name')->get();

        return view('backend.contacts', compact('contacts', 'users'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully'
        ]);
    }
}
