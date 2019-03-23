<?php
/**
 * Created by PhpStorm.
 * User: richa
 * Date: 23/03/2019
 * Time: 17:27
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('questionnaire');
    }

    public function requete(Request $requete)
    {
        return $requete->input('requete');
    }
}