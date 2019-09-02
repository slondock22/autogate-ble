<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Truk;
use App\Http\Requests\TrukRequest;


class MasterController extends Controller
{
    //
    public function truk_index(Truk $model)
    {
        return view('master.truk.index', ['truk' => $model->paginate(15)]);
    }

    public function truk_create()
    {
        return view('master.truk.create');
    }

    public function truk_store(TrukRequest $request, Truk $model)
    {
      
        $model->create($request->all());

        return redirect()->route('master.truk')->withStatus(__('Truk berhasil ditambahkan.'));
    }

    public function truk_edit($id)
    {
        $truk = Truk::find($id);
    
        return view('master.truk.edit', compact('truk'));
    }

    public function truk_destroy($id)
    {
        $truk = Truk::find($id);

        $truk->delete();

        return redirect()->route('master.truk')->withStatus(__('Truk berhasil dihapus.'));
    }
}
