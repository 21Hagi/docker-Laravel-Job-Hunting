<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Requests\ResumeRequest;
use App\Services\resumeService;
use App\Services\exportResumeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ResumeController extends Controller
{   
    /**
     * 履歴書作成画面にリダイレクト
     *
     * @return void
     */
    public function index()
    {
        return Inertia::render('Resume/Create');
    }

    /**
     * 履歴書の作成画面を表示
     *
     * @return void
     */
    public function create()
    {
        $userId = Auth::id();
        $resumeService = new resumeService();
        $resumeData = $resumeService->getResumeDataByUserId($userId);

        return Inertia::render('Resume/Create', ['resumeData' => $resumeData]);
    }

    /**
     * 履歴書をエクスポート
     *
     * @param ResumeRequest $request
     * @return void
     */
    public function store(ResumeRequest $request)
    {
        $userId = Auth::id();
        $resumeService = new resumeService();
        $resumeService->updateOrCreateResumeData($request, $userId);

        $exportResumeService = new exportResumeService($request);
        $fileName = $exportResumeService->exportResume();

        return Inertia::render('Resume/Create', ['fileName' => $fileName]);
    }

    /**
     * PDFをブラウザに表示
     *
     * @param [type] $fileName
     * @return void
     */
    public function show($fileName)
    {
        $filePath = storage_path('app/private/' . $fileName);

        if (!File::exists($filePath)) {
            abort(404);
        }

        $userId = Auth::id();
        $fileUserId = $fileName[0];

        if ($userId != $fileUserId) {
            abort(403);
        }

        return Response::file($filePath)->deleteFileAfterSend(true);
    }
}
