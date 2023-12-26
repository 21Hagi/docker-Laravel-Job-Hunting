<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Requests\ResumeRequest;

class ResumeController extends Controller
{   
    /**
     * 履歴書を作成
     *
     * @return void
     */
    public function create()
    {
        return Inertia::render('Resume/Create');
    }

    /**
     * 履歴書を作成
     *
     * @param ResumeRequest $request
     * @return void
     */
    public function store(ResumeRequest $request)
    {
        dd($request);
    }
}
