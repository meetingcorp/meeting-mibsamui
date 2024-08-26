<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $slide = Banner::where('publish', 1)->orderBy('sort', 'asc')->get();
        // $product = Product::where('publish', 1)->orderBy('sort', 'asc')->skip(0)->take(5)->get();
        // $news = News::where('publish', 1)->orderBy('sort', 'asc')->skip(0)->take(5)->get();
        // $procate = ProductCategory::where('publish', 1)->orderBy('sort', 'asc')->get();

        return view('client.home', compact('slide'));
    }

    public function showproduct(Product $product)
    {
        $products = Product::where('publish', 1)->orderBy('created_at', 'desc')->skip(0)->take(5)->get();
        return view('client.product.show', compact('product', 'products'));
    }

    public function productall()
    {
        $product = Product::where('publish', 1)->orderBy('sort', 'asc')->get();
        return view('client.product.index', compact('product'));
    }

    public function shownews(News $news)
    {
        $rec = News::where('publish', 1)->skip(0)->take(5)->orderBy('created_at', 'desc')->get();
        return view('client.articles.show', compact('news', 'rec'));
    }

    public function newsall()
    {
        $news = News::where('publish', 1)->orderBy('sort', 'asc')->get();
        return view('client.articles.index', compact('news'));
    }

    public function linenotify(Request $request)
    {
        $message = "\nชื่อผู้ติดต่อ : ".$request->name."\n"
        ."อีเมล : ".$request->email."\n"
        ."เรื่อง : ".$request->title."\n"
        ."รายละเอียด : ".$request->subject;
        // dd($message);
        $request->validate([
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $url        = 'https://notify-api.line.me/api/notify';
        $token      = 'SwiNhTdtF5MJkQ66REOFSqd5E0rHysfBFyxVxgd58zX';
        $headers    = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $token
        ];
        $fields     = 'message='.$message;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        var_dump($result);
        // $result = json_decode($result, TRUE);
        return redirect()->route('contact');
    }
}
