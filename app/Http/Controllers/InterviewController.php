<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\InterviewsSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Requests\InterviewRequest;
use App\Http\Requests\InterviewSetupRequest;

class InterviewController extends Controller
{
    private $interview;
    private $interviewsSetup;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->interview = new Interview();
        $this->interviewsSetup = new InterviewsSetup();
    }


    public function index()
    {
        $userId = Auth::id();
        $sortList = $this->interview->getSortListByUserId($userId);

        $randomListLimit = InterviewsSetup::where('user_id', Auth::id())
        ->value('num_of_random_list');

        $randomList = $this->interview->getRandomListByRandom($userId, $randomListLimit);

        $interviews = $sortList->merge($randomList);

        $interviewsSetup = $this->interviewsSetup->getSetupByUserId($userId);

        return Inertia::render('Interview/Index', [
            'interviews' => $interviews,
            'interviewsSetup' => $interviewsSetup,
        ]);
    }

    /**
     * 設定画面に遷移
     *
     * @return void
     */
    public function setting()
    {
        $userId = Auth::id();

        $questions = [];
        $questions['sortList'] = $this->interview->getSortListByUserId($userId);
        $questions['randomList'] = $this->interview->getRandomListByUserId($userId);
        $questions['invisibleList'] = $this->interview->getInvisibleListByUserId($userId);
        
        if (empty($questions)) return Inertia::render('Interview/Setting');

        $interviewsSetup = $this->interviewsSetup->getSetupByUserId($userId);

        return Inertia::render('Interview/Setting', [
            'questions' => $questions,
            'interviewsSetup' => $interviewsSetup, 
        ]);
    }

    /**
     * 面接登録画面に遷移
     *
     * @param string $type
     * @return void
     */
    public function create(string $type)
    {
        return Inertia::render('Interview/Create', [
            'type' => $type
        ]);
    }

    /**
     * 面接内容を登録
     *
     * @param InterviewRequest $request
     * @return void
     */
    public function store(InterviewRequest $request)
    {
        // 質問を追加
        $this->interview->createQuestionData($request);

        return to_route('interview.setting')
        ->with([
            'message' => '登録が完了しました。',
            'status' => 'success'
        ]);
    }

    /**
     * 面接内容を編集
     *
     * @param Interview $interview
     * @return void
     */
    public function edit(Interview $interview)
    {
        return Inertia::render('Interview/Edit', [
            'interview' => $interview
        ]);
    }

    /**
     * 面接内容を更新
     *
     * @param InterviewRequest $request
     * @param Interview $interview
     * @return void
     */
    public function update(InterviewRequest $request, Interview $interview)
    {
        // 面接情報を更新
        $this->interview->updateQuestionData($request, $interview);

        return to_route('interview.setting')
        ->with([
            'message' => '更新が完了しました。',
            'status' => 'success'
        ]);
    }

    /**
     * 面接内容を削除
     *
     * @param Interview $interview
     * @return void
     */
    public function destroy(Interview $interview)
    {
        $interview->delete();

        return to_route('interview.setting')
        ->with([
            'message' => '削除が完了しました。',
            'status' => 'danger',
        ]);
    }

    /**
     * 面接リストをアップデート
     *
     * @param Request $request
     * @return void
     */
    public function orderListUpdate(Request $request)
    {
        $listName = $request->listName;

        if ($listName === 'sortList') {
            $this->interview->updateSortList($request);
        }
        
        if ($listName === 'randomList') {
            $this->interview->updateRandomList($request);
        }

        if ($listName === 'invisibleList') {
            $this->interview->updateInvisibleList($request);
        }

        return response()->json(['success' => true]); 
    }

    /**
     * 面接設定を変更
     *
     * @param InterviewSetupRequest $request
     * @return void
     */
    public function setupUpdateOrCreate(InterviewSetupRequest $request) {
        $userId = Auth::id();
        $this->interviewsSetup->updateOrCreateSetupByUserId($request, $userId);

        return response()->json(['success' => true]); 
    }
}
