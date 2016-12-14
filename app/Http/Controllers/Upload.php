<?php

namespace App\Http\Controllers;

use Alexusmai\Ruslug\Slug;
use Illuminate\Http\Request;

class Upload extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 
     */
    public function add(Request $request){

        $file = $request->file('upl');
        $fileName = $file->getClientOriginalName();
        $fileExt = $file->getClientOriginalExtension();
        $fileDir = public_path().'/upload';

        $fileName = $this->fileTranslit($fileDir.'/'.$fileName, $fileExt);
        $fileName = $this->fileExist($fileName, $fileDir);

        $file->move($fileDir, $fileName);

        return response()->json([
            'status' => 'ok',
            'fileName' => $fileName,
        ]);
    }


    /**
     * @param $fileName
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($fileName){

        $fileDir = public_path().'/upload';
        $filePath = $fileDir.'/'.$fileName;

        if (file_exists($filePath))
            unlink($filePath);

        return response()->json([
            'status' => 'ok',
            'fileName' => $fileName,
        ]);
    }

    /**
     * @param $fileName
     * @param $fileExt
     * @return string
     */
    protected function fileTranslit($fileName, $fileExt) {
        $fileNameOnly = basename($fileName, '.'.$fileExt);
        return (new Slug)->make($fileNameOnly).'.'.$fileExt;
    }

    /**
     * @param $fileName
     * @param $fileDir
     * @return string
     */
    protected function fileExist($fileName, $fileDir) {
        $tmpFilename = $fileName;
        $i = 0;
        while(file_exists($fileDir.'/'.$tmpFilename)) {
            $i++;
            $tmpFilename =  $i.'_'.$fileName;
        }
        return $tmpFilename;
    }
}
