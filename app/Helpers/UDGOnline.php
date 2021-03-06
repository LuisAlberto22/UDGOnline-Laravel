<?php

namespace App\Helpers;

use App\Models\Lesson;
use App\Models\schedule;
use App\Models\User;
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
            $str = preg_replace('/ /m', urlencode(trim($data['key'])), $api);
            $str = preg_replace('/º/m', urlencode(trim($data['password'])), $str);
        } else {
            $str = preg_replace('/ /m', urlencode(trim($data)), $api);
        }
        return self::read($str);
    }

    private static function read($path)
    {
        return file_get_contents($path);
    }

    public static function auth(array $request)
    {
        return self::pregAndRead($request, self::$apiAuth) == "Valid";
    }

    public static function getInfo($key)
    {
        $data = json_decode(self::pregAndRead($key, self::$apiKardex), true);
        if ($data == null) {
            return [
                'name' => 'DOCENTE',
                'cicle' => null,
                'career' => null
            ];
        }
        return [
            'name' => $data['nombre'],
            'cicle' => $data['ciclo_ingreso'],
            'career' => $data['carrera']
        ];
    }

    public static function getClasses($key)
    {
        $classes = self::pregAndRead($key, self::$apiSchedule);
        $classes = preg_replace(array('/,\[{/m', '/\]\]/m'), array(',{', ']'), $classes);
        $classes = json_decode($classes, true);
        if (strlen($key) > 8) {
            return $classes['horarios'];
        } else {
            return $classes;
        }
    }

    public static function createUser($request)
    {
        $info = self::getInfo($request['key']);
        $user = User::create(
            [
                'key' => $request['key'],
                'password' => Hash::make($request['password']),
                'name' => $info['name'],
                'Cicle' => $info['cicle'],
                'career' => $info['career'],
            ]
        );
        return $user;
    }

    public static function storeClasses(User $user)
    {
        $classes = self::getClasses($user->key);
        foreach ($classes as $class) {
            $lesson = Lesson::where('nrc', $class['nrc'])->first();
            if ($lesson != null) {
                self::sync($user, $lesson);
            } else {
                $lesson = self::createClass([
                    'key' => $user->key,
                    'nrc' => $class['nrc'],
                    'name' => $class['materia'],
                    'slug' => $class['nrc'],
                    'horario' => $class['horario']
                ], $user);
                self::sync($user, $lesson);
            }
        }
    }

    public static function sync(User $user, Lesson $lesson)
    {
        if ($user->hasRole('Alumno')) {
            $user->lessons()->syncWithoutDetaching($lesson->id);
        } else {
            $lesson->user_id = $user->id;
            $lesson->save();
        }
    }

    public static function createClass(array $class, User $user)
    {
        $lesson = Lesson::create([
            'nrc' => $class['nrc'],
            'name' => $class['name'],
            'slug' => $class['nrc'],
        ]);
        foreach ($class['horario'] as $value) {
            schedule::create([
                'day' => $value[$user->hasRole('Alumno') ? 'd' : 'dia'],
                'start' => $value['h_ini'],
                'end' => $value['h_fin'],
                'lesson_id' => $lesson->id
            ]);
        }
        return $lesson;
    }
}
