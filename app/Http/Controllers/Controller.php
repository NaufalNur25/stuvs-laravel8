<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getUppercase($item): String
    {
        $items = explode(" ", $item);
        $item_result = array();
        foreach ($items as $count => $item) {
            // $item_result += array($count, substr($item, 0, 1));
            $item_result += array($count => substr(strtoupper($item), 0, 1));
        }
        return implode($item_result);
    }

    public function strUppercase($item): String
    {
        $items = explode(" ", $item);
        $item_result = array();
        foreach ($items as $count => $item) {
            // $item_result += array($count, substr($item, 0, 1));
            $item_result += array($count => ucfirst($item));
        }
        // dd($item_result);
        return implode(" ", $item_result);
    }
}
