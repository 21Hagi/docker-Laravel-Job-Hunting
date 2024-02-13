<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Interview extends Model
{
    use HasFactory;

    const RANDOM_ORDER_NUM = '99';
    const DISPLAY_ON = 1;
    const DISPLAY_OFF = 0;

    protected $guarded = ['id'];

    /**
     * 質問リストを取得
     *
     * @param [type] $userId
     * @return void
     */
    public function getSortListByUserId($userId)
    {
        $sortList = self::whereBetween('order', [1, 10])
                        ->where('display_flg', self::DISPLAY_ON)
                        ->where('user_id', $userId)
                        ->orderBy('order')
                        ->get();

        return $sortList;
    }

    /**
     * ランダムリストをid順に取得
     *
     * @param [type] $userId
     * @return void
     */
    public function getRandomListByUserId($userId)
    {
        $randomList = self::where('order', self::RANDOM_ORDER_NUM)
                        ->where('display_flg', self::DISPLAY_ON)
                        ->where('user_id', $userId)
                        ->get();

        return $randomList;
    }

    /**
     * ランダムリストをランダム順に取得
     *
     * @param [type] $userId
     * @return void
     */
    public function getRandomListByRandom($userId, $limit)
    {
        $randomList = self::where('order', self::RANDOM_ORDER_NUM)
        ->where('display_flg', self::DISPLAY_ON)
        ->where('user_id', $userId)
        ->inRandomOrder()
        ->limit($limit)
        ->get();

        return $randomList;
    }

    /**
     * 非表示のリストを取得
     *
     * @param [type] $userId
     * @return void
     */
    public function getInvisibleListByUserId($userId)
    {
        $invisibleList = self::where('display_flg', self::DISPLAY_OFF)
                            ->where('user_id', $userId)
                            ->get();

        return $invisibleList;
    }

    /**
     * 質問を追加
     *
     * @param [type] $request
     * @return void
     */
    public function createQuestionData($request)
    {
        $request->type === 'randomList' ? $displayFlg = self::DISPLAY_ON : $displayFlg = self::DISPLAY_OFF;

        $questionData = self::create([
                            'title' => $request->title,
                            'question' => $request->question,
                            'order' => self::RANDOM_ORDER_NUM,
                            'display_flg' => $displayFlg,
                            'user_id' => Auth::id(),
                        ]);
    }

    /**
     * 質問リストをアップデート
     *
     * @param [type] $request
     * @return void
     */
    public function updateSortList($request)
    {
        foreach ($request->newOrder as $index => $sortListId) {
            self::where('id', $sortListId)
            ->update(['order' => $index + 1, 'display_flg' => 1]);
        }
    }

    /**
     * ランダムリストをアップデート
     *
     * @param [type] $request
     * @return void
     */
    public function updateRandomList($request)
    {
        self::where('id', $request->newOrder[0])
        ->update(['order' => 99, 'display_flg' => 1]);
    }

    /**
     * 非表示リストをアップデート
     *
     * @param [type] $request
     * @return void
     */
    public function updateInvisibleList($request)
    {
        self::where('id', $request->newOrder[0])
        ->update(['order' => 99, 'display_flg' => 0]);
    }

    /**
     * 質問をアップデート
     *
     * @param [type] $request
     * @param [type] $interview
     * @return void
     */
    public function updateQuestionData($request, $interview)
    {
        $questionData = $request->questionAttributes();
        $interview->update($questionData);   
    }
}