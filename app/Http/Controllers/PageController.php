<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('footer.about');
    }

    public function terms()
    {
        return view('footer.terms');
    }

    public function privacy()
    {
        return view('footer.privacy-policy');
    }

    public function sales()
    {
        return view('footer.sales-policy');
    }

    public function shipping()
    {
        return view('footer.shipping-method');
    }

    public function login()
    {
        return view('account.login');
    }

    public function register()
    {
        return view('account.register');
    }

    public function faq()
    {
        return view('footer.faq');
    }

    public function returnPolicy()
    {
        return view('footer.return-policy');
    }

    public function commentPolicy()
    {
        return view('footer.comment-policy');
    }
}
