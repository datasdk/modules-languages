<?php

namespace Modules\Languages\Models;


use HasFactory;
use Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;


class Languages extends Model
{


    use HasFactory;


    public static $languages = [
        'da',
        'en', 
    ];


  
    public static function trans($obj){

        return $obj->map(function($obj){

            return $obj->translate();

        });

    }


    public static function translate($value){


        $lang = App::currentLocale();


        if(is_array($value))
        if(isset($value[$lang])){

            return $value[$lang];

        }
                

        return $value;


    }


    public static function load_default(){
        

        $lang = self::get();


        if(!$lang){ 


            if(0)
            if(app()->environment('production')){


                $userIp = \Request::ip();

                //Get visitors Geo info based on his IP
                $geo = \GeoIP::getLocation($userIp);

                if(empty($geo)){ return false; }

                $lang = $geo->iso_code;


            } else {

                $lang = App::currentLocale();

            }
        


            $lang = App::currentLocale();
            
            self::set($lang);


        }


        App::setLocale( $lang );


        return $lang;


    }


    public static function set($locale,$save_cookie = true){


        if (!in_array($locale, self::$languages)){ return false; }
        
        
        if($save_cookie){

            setcookie("current_language", $locale, strtotime("3 years"),"/");

        }
        
        App::setLocale( $locale );


        return true;

    }


    public static function get_all(){

        return self::$languages;

    }


    public static function get(){

        return App::getLocale();

    }


    public static function prefixes(){

        $l = Languages::$languages;

        return array_merge( $l , [""]);

    }


    public static function buttons(){


        $default_lang = self::get();


        echo '<div class="language-shift float-right">';


            foreach(self::$languages as $lang){


                echo '<a href="/language/shift/'.$lang.'">';

                    echo '<img src="'.asset("assets/images/flags/".$lang.".png").'"';


                        if($default_lang == $lang){

                            echo 'class="active"';

                        }
                    

                    echo '>';

                echo '</a>';


            }


        echo '</div>';


    }

}
