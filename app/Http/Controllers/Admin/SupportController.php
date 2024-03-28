<?php

namespace App\Http\Controllers\Admin;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Services\SupportService;

class SupportController extends Controller
{
    public function __construct(protected SupportService $service)
    {
    }

    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);
        return view('admin.supports.index', compact('supports'));
    }

    public function show(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }
        return view('admin.supports.show', compact('support'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupportRequest $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';
        $support = $support->create($data);
        return redirect()->route('supports.index');
    }

    public function edit(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }
        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request, string $id)
    {
        if (!$support = Support::find($id)) {
            return back();
        }
        //pega somente os dados validados
        $data = $request->validated();
        $support->update($data);
        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
