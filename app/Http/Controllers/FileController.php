<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public $file;

    public function __construct()
    {
        $this->file = new File();
    }

    public function home()
    {
        return view('welcome');
    }

    public function upload(Request $request)
    {
        $fileName = "";
        $filesize = "";
        $uniqid = uniqid();
        if($request->file){
            $fileName = time().'file.zip';
            $filesize = filesize($request->file);
            
            $fileReqName = time().'file.'.$request->file->extension();
            $request->file->move(public_path('file/unzip'), $fileReqName);

            $zip = new ZipArchive;

            if ($zip->open(public_path('file/zip/'.$fileName), ZipArchive::CREATE) === TRUE) {

                $zip->setPassword($request->password);

                $zip->addFile(public_path('file/unzip/'.$fileReqName), $fileReqName);

                $zip->setEncryptionName($fileReqName, ZipArchive::EM_AES_256);
                    
                $zip->close();
            }
                
        }

        $this->file->create([
            'unid' => $uniqid,
            'name' => $request->name,
            'email' => $request->email,
            'filePassword' => $request->password,
            'file' => $fileName,
            'file_name' => $fileName,
            'file_size' => $filesize,
            'expired' => $request->expired,
            'download' => 0,
        ]);

        return redirect(route('preview', ['unid' => $uniqid]))->with('status','Uploaded');
    }

    public function preview($unid)
    {
        $file = $this->file->where('unid', $unid)->first();
        return view('preview', ['file' => $file]);
    }

    public function download($unid)
    {
        $file = $this->file->where('unid', $unid)->first();
        if(strtotime(date("Y/m/d")) < strtotime($file->expired)){
            return response()->download(public_path('file/zip/'.$file->file));
        }else{
            return redirect()->back()->with('error', 'Link expired');
        }
    }
}
