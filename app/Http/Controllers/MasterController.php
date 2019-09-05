<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Truk;
use App\Http\Requests\TrukRequest;
use Image;
use File;


class MasterController extends Controller
{
    public $path;

    public function __construct()
    {
        $this->path = storage_path('app/public/image');
    }

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
        
            //Create Directory if not exists
            if(!File::isDirectory($this->path)){
                File::makeDirectory($this->path);
            }
            
            $file = $request->file('image_profile');
            $filename = $file->getClientOriginalName();
            $filepath = $this->path.'/'.$filename;

            Image::make($file)->resize(200,200)->save($filepath);

            $model->create([
                'no_polisi' => $request->no_polisi,
                //  'nama_supir' => $request->nama_supir,
                'image_profile' => $filename,
                'no_tid' => $request->no_tid,
                'nama_perusahaan' => $request->nama_perusahaan,
                'bidang_perusahaan' => $request->bidang_perusahaan,
                'uuid' => $request->uuid,
                'major' => $request->major,
                'minor' => $request->minor,
                'is_auth' => $request->is_auth
            ]);

        
        return redirect()->route('master.truk')->withStatus(__('Truk berhasil ditambahkan.'));
    }

    public function truk_update(TrukRequest $request, Truk $model)
    {
            
            if($request->change_image == 'ganti'){
                //Create Directory if not exists
                if(!File::isDirectory($this->path)){
                    File::makeDirectory($this->path);
                }
                
                $file = $request->file('image_profile');
                $filename = $file->getClientOriginalName();
                $filepath = $this->path.'/'.$filename;

                Image::make($file)->resize(200,200)->save($filepath);
            }else{
                $data = $model->select('image_profile')->where('id',$request->id_truk)->first();
                $filename = $data->image_profile;
            }
            
            // dd($filename);
 
            $model->where('id',$request->id_truk)->update(
                    ['no_polisi' => $request->no_polisi,
                    //  'nama_supir' => $request->nama_supir,
                    'image_profile' => $filename,
                    'no_tid' => $request->no_tid,
                    'nama_perusahaan' => $request->nama_perusahaan,
                    'bidang_perusahaan' => $request->bidang_perusahaan,
                    'uuid' => $request->uuid,
                    'major' => $request->major,
                    'minor' => $request->minor,
                    'is_auth' => $request->is_auth
                    ]
                );
        

        return redirect()->route('master.truk')->withStatus(__('Truk berhasil diubah.'));

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
