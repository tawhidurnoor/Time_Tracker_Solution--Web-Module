<?php

namespace App\Http\Controllers\frontend;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies =  Company::all();
        return view('frontend.company.index',[
            'companies' => $companies
        ]);
    }

    public function create()
    {
        return view('frontend.company.create');
    }

    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->owner_user_id = Auth::user()->id;

        if ($company->save()) {
            session()->flash('success', 'Company added successfully.');  
        } else {
            session()->flash('warning', 'Errot adding company!! Please try again later.');  
        }

        return redirect()->route('company.index');
    }
}
