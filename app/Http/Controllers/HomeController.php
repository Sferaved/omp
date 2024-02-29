<?php

namespace App\Http\Controllers;

use App\Mail\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('home');
    }

    /**
     *Отправка почты с сайта
     */
    public function feedbackEmail(Request $req)
    {

        Log::info($req);
        $error = true;
        $secret = config('app.RECAPTCHA_SECRET_KEY');

        if (!empty($_GET['g-recaptcha-response'])) { //проверка на робота
            $curl = curl_init('https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, 'secret=' . $secret . '&response=' . $_GET['g-recaptcha-response']);
            $out = curl_exec($curl);
            curl_close($curl);

            $out = json_decode($out);
            if ($out->success == true) {
                $params = [
                    'email' => $req->email,
                    'subject' => $req->subject,
                    'message' => $req->message,
                ];

                Mail::to('sferaved@gmail.com')->send(new Feedback($params));
                return redirect()->route('welcome')
                    ->with('success',
                        "Повідомлення успішно надіслано адміністратору сайту. Чекайте на відповідь на свій email.");
            }
        }
        if ($error) {
            $params = [
                'email' => $req->email,
                'subject' => $req->subject,
                'message' => $req->message,
            ];
            return view('feedback', ['params' => $params,
                'info' => 'Не пройдено перевірку на робота.']);
        }

    }
}
