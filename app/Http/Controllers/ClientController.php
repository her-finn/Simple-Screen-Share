<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stream;
class ClientController extends Controller
{
    //Client start page
    public static function streamPage(Request $request,$code){
        $erg = Stream::where(["id"=>$code])->get();
        if(count($erg) !== 1)
            return ["error"=>true,"description"=>"Stream not found"];
        $erg = $erg[0];
        if(strlen($erg["secondClientId"]) > 100)
            return ["error"=>true,"description"=>"Stream is already running"];
        return view("client-stream",[
            "code"=>$code
        ]);
    }
    public static function getStreamData(Request $request,$code){
        $erg = Stream::where(["id"=>$code])->get();
        if(count($erg) !== 1)
            return ["error"=>true,"description"=>"Stream not found"];
        $erg = $erg[0];
        if(strlen($erg["secondClientId"]) > 100)
            return ["error"=>true,"description"=>"Stream is already running"];
        return ["success"=>true,"clientId"=>$erg["clientId"],"expires"=>$erg["expires"]];
    }
    public static function setStreamData(Request $request, $code){
        $erg = Stream::where(["id"=>$code])->get();
        if(count($erg) !== 1)
            return ["error"=>true,"description"=>"Stream not found"];
        $erg = $erg[0];
        if(strlen($erg["secondClientId"]) > 100)
            return ["error"=>true,"description"=>"Stream is already running"];
        if(Stream::where(["id"=>$code])->update(["secondClientId"=>$request->clientId])){
            return ["success"=>true];
        }else{
            return ["error"=>true,"description"=>"Datbase error"];
        }
    }
}
