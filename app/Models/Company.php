<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 検索された値からデータを取得
     *
     * @param [type] $keyword
     * @return void
     */
    public function getSearchCompanyData($keyword)
    {
        $companies = self::user()
        ->searchKeyword($keyword)
        ->paginate(10);

        return $companies;
    }

    /**
     * 企業情報を登録
     *
     * @param [type] $request
     * @return void
     */
    public function createCompanyData($request)
    {
        $companyData = $request->companyAttributes();
        $companyData['user_id'] = Auth::id();

        self::create($companyData);
    }

    /**
     * 企業情報を更新
     *
     * @param [type] $request
     * @return void
     */
    public function updateCompanyData($request, $company)
    {
        $companyData = $request->companyAttributes();
        $company->update($companyData);   
    }

    /**
     * 認証ユーザーを指定
     *
     * @param [type] $query
     * @return void
     */
    public function scopeUser($query)
    {
        return $query->where('user_id', Auth::id());
    }


    /**
     * 検索された値からクエリを取得
     *
     * @param [type] $query
     * @param [type] $keyword
     * @return void
     */
    public function scopeSearchKeyword($query, $keyword) 
    {
        if (empty($keyword)) return;

        $spaceConvert = mb_convert_kana($keyword,'s'); 
        $keywords = preg_split('/[\s]+/', $spaceConvert,-1,PREG_SPLIT_NO_EMPTY);

        foreach($keywords as $word) { 
            $query->where('companies.name','like','%'.$word.'%'); 
        } 

        return $query; 
    } 
}
