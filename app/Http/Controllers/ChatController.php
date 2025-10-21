<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiService;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    protected $geminiService;
    protected $apikey;

    public function __construct(GeminiService $geminiService){
        $this->geminiService = $geminiService;
        $this->apikey = env('GEMENI_API_KEY');
    } 

    public function index(){
        return view('chat.index');
    }

    public function sendMessage(Request $request){
        $userMessage = $request-> input('message');

        try{
            $response = $this-> geminiService-> ask($userMessage);
            return response()-> json($response);
        }
        catch(\Exception $e){
            return response()->json('Erro: ' . $e->getMessage(), 500);
        }
    }

    public function listarModelos(){
        $response = Http::get("https://generativelanguage.googleapis.com/v1/models?key=" . $this-> apikey);
        return $response-> json();
    }
}
