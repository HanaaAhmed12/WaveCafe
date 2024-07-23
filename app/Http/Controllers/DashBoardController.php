<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function dashBoard()
    {
        return view('admin.addBeverage');
    }

    public function category()
    {
        return view('admin.addCategory');
    }

    public function user()
    {
        return view('admin.addUser');
    }

    public function beverages()
    {
        return view('admin.beverages');
    }

    public function categories()
    {
        return view('admin.categories');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function editBeverage()
    {
        return view('admin.editBeverage');
    }

    public function editCategory()
    {
        return view('admin.editCategory');
    }

    public function editUser()
    {
        return view('admin.editUser');
    }

    public function messages()
    {
        return view('admin.messages', compact('title'));
    }

    public function showMessage()
    {
        return view('admin.showMessage', compact('title'));
    }
}