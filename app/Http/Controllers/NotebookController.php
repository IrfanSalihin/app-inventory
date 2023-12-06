<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;

class NotebookController extends Controller
{
    public function index()
    {
        $notebooks = Notebook::all();
        return view('notebooks.index', compact('notebooks'));
    }

    public function create()
    {
        return view('notebooks.create');
    }

    public function store(Request $request)
    {
        // Validation may be added here based on your requirements

        Notebook::create($request->all());

        return redirect()->route('notebooks.index')->with('success', 'Notebook created successfully');
    }

    public function show(Notebook $notebook)
    {
        return view('notebooks.show', compact('notebook'));
    }

    public function edit(Notebook $notebook)
    {
        return view('notebooks.edit', compact('notebook'));
    }

    public function update(Request $request, Notebook $notebook)
    {
        // Validation may be added here based on your requirements

        $notebook->update($request->all());

        return redirect()->route('notebooks.index')->with('success', 'Notebook updated successfully');
    }

    public function destroy(Notebook $notebook)
    {
        $notebook->delete();

        return redirect()->route('notebooks.index')->with('success', 'Notebook deleted successfully');
    }
}

