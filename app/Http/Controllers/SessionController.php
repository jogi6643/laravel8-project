<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
   public function getSession(Request $request)
   {

    //    Check Session 
       if($request->session()->has('name'))
       {
         $name = session()->get('name');
         echo "Session Data is ".$name;
       }
       else
       {
         echo "No Session Data";
       }
   }

   public function storeSession(Request $request)
   {
        $request->session()->put('name',"James bond");
        echo "Session Added Succesfully...";
   }

   public function deleteSession(Request $request)
   {
       $request->session()->forget('name');
       echo "Session Remove Successfully..";
   }

}
