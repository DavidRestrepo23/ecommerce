<?php

namespace App\Http\Controllers\Api;

use App\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ApiAttributeController extends Controller
{
    public function attributes()
    {
        $attributes = Attribute::with('attribute_details')->get();
        return response()->json([
            'attributes' => $attributes,
        ]);
    }
}
