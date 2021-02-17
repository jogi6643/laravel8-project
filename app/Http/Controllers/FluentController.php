<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FluentController extends Controller
{
    public function string_operation()
    {
        echo "<h1>Welcome Jogi</h1>";
        $slice1 = Str::of("welcome to new jogi you are not best ")
        ->after('welcome');
        echo $slice1;

        $slice2 = Str::of("App\Http\Controllers\FluentController")->afterlast("\\");
        echo $slice2;
        $slice3 = Str::of("Hello")->append("World");
        echo "<br/>";
        echo $slice3;
    }
}
