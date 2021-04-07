<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ThemeController extends Controller
{
    //

 
    public function getAllThemes(){
        // return "Hy";

        $shop = Auth::user();
        $themes = $shop->api()->rest('GET', '/admin/themes.json');

        // dd($themes['body']->container['themes']);   
        // get active theme id
        $activeThemeId = "";
        foreach($themes['body']->container['themes'] as $theme) {
            // dd($themes);
            if ($theme['role'] == 'main') {
                $activeThemeId = $theme['id'];

                $snippet = "Your snippet code updated";

                // Data to pass to our rest api request
                $array = array('asset' => array('key' => 'snippets/Laravel.liquid', 'value' => $snippet));
                 $shop->api()->rest('PUT', '/admin/themes/' . $activeThemeId . '/assets.json', $array);

                
                return "success";

            }
        }
    


        
    }
}
