<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->User = new User();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        return view('home');
    }

    public function article()
    {
        $articlesA = Article::latest()->limit(3)->get();
        $articlesB = Article::latest()->limit(10)->get();

        if (Auth::user()->membership === 1) {
            $data = [
                'usermember' => $this->User->userMember1(),
                'membership' => $this->Membership->allData(),
            ];
        } elseif (Auth::user()->membership === 2) {
            $data = [
                'usermember' => $this->User->userMember2(),
                'membership' => $this->Membership->allData(),
                'articles' => $articlesA->paginate(6),
            ];
        } elseif (Auth::user()->membership === 3) {
            $data = [
                'usermember' => $this->User->userMember3(),
                'membership' => $this->Membership->allData(),
                'articles' => $articlesB->paginate(6),
            ];
        } elseif (Auth::user()->membership === 4) {
            $data = [
                'usermember' => $this->User->userMember4(),
                'membership' => $this->Membership->allData(),
                'articles' => $this->Article->articleC(),
            ];
        } 
        // dd($data);
        return view('article', $data);
    }

    public function video()
    {
        $videosA = Video::latest()->limit(3)->get();
        $videosB = Video::latest()->limit(10)->get();

        if (Auth::user()->membership === 1) {
            $data = [
                'usermember' => $this->User->userMember1(),
                'membership' => $this->Membership->allData(),
            ];
        } elseif (Auth::user()->membership === 2) {
            $data = [
                'usermember' => $this->User->userMember2(),
                'membership' => $this->Membership->allData(),
                'videos' =>  $videosA->paginate(6),
            ];
        } elseif (Auth::user()->membership === 3) {
            $data = [
                'usermember' => $this->User->userMember3(),
                'membership' => $this->Membership->allData(),
                'videos' =>  $videosB->paginate(6),
            ];
        } elseif (Auth::user()->membership === 4) {
            $data = [
                'usermember' => $this->User->userMember4(),
                'membership' => $this->Membership->allData(),
                'videos' => $this->Video->videoC(),
            ];
        } 
        // dd($data);
        return view('video', $data);
    }
}
