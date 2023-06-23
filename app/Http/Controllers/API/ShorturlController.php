<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shorturl;
use Illuminate\Support\Facades\Auth;
class ShorturlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $request->validate([
                'short_origin' => 'required|url'
            ]);
        
            $input['short_origin'] = $request->short_origin;
            $input['short_url'] = Str::random(6);
            $input['user_id'] =  Auth::id();
        

            $shortLink = Shorturl::create($input);
        
            return response()->json([
                'message' => 'Shorten Link Generated Successfully!',
                'short_link' => $shortLink
            ], 201);
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getShortURLs()
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
        
        $user_id = Auth::id();
        $shortURLs = Shorturl::where('user_id', $user_id)->get();
        
        return response()->json($shortURLs);
    }
public function redirectlink($code){
    $find = Shorturl::where('short_url', $code)->first();

    if ($find) {
        return response()->json($find);
    }

    return response()->json(['error' => 'Short URL not found'], Response::HTTP_NOT_FOUND);
}

}
