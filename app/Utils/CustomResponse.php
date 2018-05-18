<?php

namespace App\Utils;

class CustomResponse
{
    public static function respond($request, $view, $data)
    {
        if (request()->wantsJson()) {
            return response()->json([
                'response' => 'success',
                'results' => [
                    compact('data'),
                ],
            ]);
        }

        return view($view)->with(['posts' => $data]);
    }
}
