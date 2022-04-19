<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class AdminController extends Controller
{
    public function status(Request $request)
    {
        $inactive = [
            'status' => false,
        ];
        $active = [
            'status' => true,
        ];
        $modelName = '\\App\\Models\\' . $request->model;
        $model = $modelName::findOrFail($request->id);
        if ($model->status == false) {
            $model->update($inactive);
            // session()->flash('message', "Faol emas");
        } else {
            $model->update($active);
            // session()->flash('message', "Faol");
        }
        return back();
    }
}

