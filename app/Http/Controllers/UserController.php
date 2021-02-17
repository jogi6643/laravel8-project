<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth; 
use Validator;

class UserController extends Controller 
{
public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(Request $request){ 
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email', 
            'password' => 'required',  
        ]);
       if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
       if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus); 
    }

     /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function details() 
    { 
        $user = Auth::user(); 
        $article = $user->articles;
        return response()->json(['success' => $article], $this-> successStatus); 
    } 

// Article Post Data Controller
    public  function article(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'title' => 'required', 
            'description' => 'required', 
            'body' => 'required',  
        ]);
       if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
    $user = auth()->user();
    $article = $user->articles()->create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'body' => $request->input('body'),
        'slug' => $request->input('slug'),
    ]);

    $inputTags = $request->input('tagList');

    if ($inputTags && ! empty($inputTags)) {

        $tags = array_map(function($name) {
            return Tag::firstOrCreate(['name' => $name])->id;
        }, $inputTags);

        $article->tags()->attach($tags);
    }
    return response()->json(['success'=>$article],$this->successStatus);
    }
    // Article Post Data
}


