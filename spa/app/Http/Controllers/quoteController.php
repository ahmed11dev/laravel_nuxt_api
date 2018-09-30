<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quote;
use JWTAuth;
class quoteController extends Controller{

        public function postQuote(Request $request){

               $user = JWTAuth::parseToken()->toUser(); // get the user info
                $quote = new quote();
                $quote->content = $request->input('content');
                $quote->save();
                return response()->json(['quote' => $quote,'user'=> $user],201 );
        }


        public function getQuote(){
                $qoutes = quote::all();
                $response = ['quote' => $qoutes];
                return response()->json($response,200);
        }


        public function putQuote(Request $request , $id){
                $quote = quote::find($id);
                if(!$quote){
                    return respponse()->json(['message' => 'item not found'], 404);
                }
                 $quote->content = $request->input('content');
                 $quote->save();
                return response()->json(['quote' => $quote ], 200);
        }


        public function deleteQuote( $id ){
                $quote = quote::find($id);
                $quote->delete();
                return response()->json(['message' => 'item is deleted'], 200);
        }
}