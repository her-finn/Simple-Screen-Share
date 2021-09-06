<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stream;

class CreateStreamController extends Controller
{
    //Show Create page
    public static function showCreatePage(Request $request){
        return view("create");
    }
    //First step to create Stream
    public static function firstCreateStream(Request $request){
        $insert = false;
        $id = 0;
        while(!$insert){
            $id = random_int(100000,999999);
            if(Stream::insert(["id"=>$id,"expires"=>time()+600,"clientId"=>$request->clientId]))
                $insert = true;
        }
        return ["id"=>$id];
    }
    public static function secondClientId($streamId){
        $erg = Stream::where(["id"=>$streamId])->get();
        if(count($erg) !== 1)
            return ["error"=>true,"description"=>"Stream not found"];
        $erg = $erg[0];
        if(isset($erg["secondClientId"]) && strlen($erg["secondClientId"]) > 100){
            return ["valid"=>true,"secondClientId"=>$erg["secondClientId"]];
        }else{
            return ["valid"=>false];
        }
    }
}
