<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Barang;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;


class BarangController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Barang::query();

        $q = $request->query('q');
        $perPage = $request->query('perPage', 3);


        if (!is_null($q)){
            $items = Barang::where('nama', 'like', "%{$q}%")->get();
        }

        $items = $query->orderBy('id')->cursorPaginate($perPage);

        return view('barang.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.form', 
        [   
            'action' => route('barang.store'), 
            'item' => new barang()
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'barcode' => 'required|string|unique:barangs',
            'satuan' => 'required|string',
            'lokasi_rak' => 'required|string',
            'stok' => 'required|integer',
            'tanggal_masuk' => 'required|date',
        ]);

        Barang::create($data);

        return redirect(route('barang.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $b = Barang::find($id);
        if(!is_null($b)) {
            return view('barang.show', ['item' => $b]);
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $b = barang::find($id);
        if (is_null($b)) {
            return abort(404);
        }

        return view('barang.form', 
        [
            'action' => route('barang.update', $id),
            'item' => $b
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::transaction(
            function () use ($request, $id) {
            $b = Barang::findOrFail($id);

            if ($b->version !== intval ($request->input('version'))) {
                return redirect(route('barang.show', $id))
                    ->withErrors([
                        'version' => 'Versi barang berubah, tolong refresh',
                    ])
                    ->withInput();
            }
    
            $data = $request->validate([
                'nama' => 'required|string',
                'barcode' => 'required|string|unique:barangs,barcode,' . $id,
                'satuan' => 'required|string',
                'lokasi_rak' => 'required|string',
                'stok' => 'required|integer',
                'tanggal_masuk' => 'required|date',
            ]);

            $b->update($data);
    
            return redirect(route('barang.show', $id));
        }    
    );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Barang::find($id)?->delete();

        return redirect(route('barang.index'));
    }
}