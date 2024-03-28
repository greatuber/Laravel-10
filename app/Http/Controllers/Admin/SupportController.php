<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support) {
        $supports = $support->all();
        return view('admin.supports.index', compact('supports'));
    }

    public function show(string|int $id) {
        if (!$support = Support::find($id)) {
            return back();
        }
        return view('admin.supports.show', compact('support'));
    }

    public function create() {
        return view('admin.supports.create');
    }

    public function store(Request $request, Support $support) {
        $data = $request->all();
        $data['status'] = 'a';
        $support = $support->create($data);
        return redirect()->route('supports.index');
    }

    public function edit(string|int $id) {
        if (!$support = Support::find($id)) {
            return back();
        }
        return view('admin.supports.edit', compact('support'));
    }

    public function update(Request $request, string $id) {
        if (!$support = Support::find($id)) {
            return back();
        }

        $data = $request->all();
        $support->update($data);
        return redirect()->route('supports.index');
    }
}
