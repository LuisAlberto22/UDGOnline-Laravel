<?php

namespace App\Helpers;

use App\Models\Lesson;
use App\Models\schedule;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UDGOnline
{

    private static $apiAuth = "https://sipla.cuci.udg.mx/sc/login.php?c= &p=º&k=0d8ce4fab5f4df9ce711cae81e044e1a";

    private static $apiSchedule = "https://sipla.cuci.udg.mx/sc/horarioProfesor.php?c= &k=0d8ce4fab5f4df9ce711cae81e044e1a";

    private static $apiKardex = "https://sipla.cuci.udg.mx/sc/kardex.php?c= &k=0d8ce4fab5f4df9ce711cae81e044e1a";

    private static function pregAndRead($data, $api)
    {
        $str = "";
        if (is_array($data)) {
            $str = preg_replace('/ /m', $data['key'], $api);
            $str = preg_replace('/º/m', $data['password'], $str);
        } else {
            $str = preg_replace('/ /m', $data, $api);
        }
        return self::read($str);
    }

    private static function read($path)
    {
        return file_get_contents($path);
    }

    public static function auth(array $request)
    {
        if (self::pregAndRead($request, self::$apiAuth) == "Valid") {
            return true;
        }
        return false;
    }

    public static function getInfo($key)
    {
        $data = json_decode(self::pregAndRead($key, self::$apiKardex),true);
        return [
            'name' => $data['nombre'],
            'cicle' => $data['ciclo_ingreso'],
            'career' => $data['carrera']
        ];
    }

    public static function createUser($request)
    {
        if (!User::where('key', $request['key'])->exists()) {
            $info = self::getInfo($request['key']);
            User::create([
                'key' => $request['key'],
                'password' => Hash::make($request['password']),
                'name' => $info['name'],
                'Cicle' => $info['cicle'],
                'career' => $info['career'],
                'type_id' => strlen($request['key']) > 8?"1":"2"
                ]);
            if (strlen($request['key']) < 8) {
                self::createClasses($request['key']);
            }
        }
    }

    public static function createClasses($key)
    {
        $classes = json_decode(self::pregAndRead($key, self::$apiSchedule),true);
        foreach ($classes as $class) {
           $lesson = Lesson::create([
                'nrc' => $class['nrc'],
                'cicle' => $class['ciclo'],
                'name' => $class['materia'],
                'slug' => $class['nrc'],
                'user_id' => User::where('key',$key)->first()->id
            ]);
            foreach ($class['horario'] as $value) {
                schedule::create([
                    'day' => $value['dia'],
                    'start' => $value['h_ini'],
                    'end' => $value['h_fin'],
                    'lesson_id' => $lesson->id
                ]);
            }
        }
    }
}
