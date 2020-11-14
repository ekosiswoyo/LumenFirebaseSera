<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use Kreait\Firebase\ServiceAccount;


class FirebaseController extends Controller
{
    public function index(Request $request){
        $factory = (new Factory)->withServiceAccount(__DIR__.'/Firebasekey.json');


      
            $database = $factory->createDatabase();
        $ref = $database->getReference('Subjects');
        $key = $ref->push()->getKey();
        $ref->getChild($key)->set([
            'SubjectName' => $request->input('SubjectName')
        ]);
        return response('Berhasil Tambah Data'.$key);
        
    }
}