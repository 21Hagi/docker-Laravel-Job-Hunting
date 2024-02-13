<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Inertia\Inertia;

class CompanyController extends Controller
{
    private $company;

    public function __construct()
    {
        $this->company = new Company();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $companies = $this->company->getSearchCompanyData($request->keyword, 10);

        return Inertia::render('Company/Index', [
            'companies' => $companies
        ]);
    }

    /**
     * 新規登録フォームへ遷移 
     *
     * @return void
     */
    public function create()
    {
        return Inertia::render('Company/Create');
    }

    /**
     * 企業情報を追加
     *
     * @param CompanyRequest $request
     * @return void
     */
    public function store(CompanyRequest $request)
    {
        // 企業情報を追加
        $this->company->createCompanyData($request);

        return to_route('company.index')
        ->with([
            'message' => '登録が完了しました。',
            'status' => 'success'
        ]);
    }


    /**
     * 企業詳細へ遷移
     *
     * @param Company $company
     * @return void
     */
    public function show(Company $company)
    {
        return Inertia::render('Company/Show', [
            'company' => $company
        ]);
    }

    /**
     * 更新フォームへ遷移
     *
     * @param Company $company
     * @return void
     */
    public function edit(Company $company)
    {
        return Inertia::render('Company/Edit', [
            'company' => $company
        ]);
    }

    /**
     * 企業情報を更新
     *
     * @param CompanyRequest $request
     * @param Company $company
     * @return void
     */
    public function update(CompanyRequest $request, Company $company)
    {
        // 企業情報を更新
        $this->company->updateCompanyData($request, $company);

        return Inertia::render('Company/Show', [
            'company' => $company
        ]);
    }

    /**
     * 企業情報を削除
     *
     * @param Company $company
     * @return void
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return to_route('company.index')
        ->with([
            'message' => '削除が完了しました。',
            'status' => 'danger',
        ]);
    }
}
