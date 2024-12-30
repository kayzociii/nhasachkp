<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nhaxuatban;
use App\Models\Tacgia;
use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\Chude;
use Illuminate\Support\Facades\Session;

class SachController extends Controller
{
    public function index(Request $request)
    {
        $machude = $request->get('machude');
        $search_term = $request->get('search');
        $current_topic = null;
        $current_publisher = null;
        $is_hidden = $request->has('search') || $request->has('machude') || $request->has('publisher_id');
        $min_price = $request->get('min_price', 0); 
        $max_price = $request->get('max_price', 5000000);
        $author_id = $request->get('author_id');
        $publisher_id = $request->get('publisher_id');
        $sachvanhoc = $request->get('machude', 1);
        $sort = $request->get('sort');
        $query = Sach::query();
        
        if ($machude) {
            $query->where('machude', $machude);
            $current_topic = Chude::where('machude', $machude)->first();
        }
        
        if ($search_term) {
            $query->where('tensach', 'like', '%' . $search_term . '%');
        }

        if ($min_price || $max_price) {
            $query->whereBetween('giasach', [$min_price, $max_price]);
        }

        if ($author_id) {
            $query->where('matacgia', $author_id);
        }

        if ($publisher_id) {
            $query->where('manhaxuatban', $publisher_id);
            $current_publisher = Nhaxuatban::where('manhaxuatban', $publisher_id)->first();
        }

        if ($request->has('sort_by')) {
            $sort_by = $request->get('sort_by');
            switch ($sort_by) {
                case 'az':
                    $query->orderBy('tensach', 'asc');
                    break;
                case 'za':
                    $query->orderBy('tensach', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('giasach', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('giasach', 'desc');
                    break;
            }
        }

        $books = $query->paginate(12);

        $topics = Chude::all();
        $authors = Tacgia::all();
        $publishers = Nhaxuatban::all();
        $suggested_books = Sach::inRandomOrder()->limit(15)->get();
        $suggested_sachvanhoc = Sach::where('machude', 1)->take(15)->get();
        $suggested_sachkinangsong = Sach::where('machude', 4)->take(15)->get();
        $logo8 = Nhaxuatban::take(8)->get();

        return view('welcome', compact('books', 'topics', 'authors', 'publishers', 'search_term', 'is_hidden', 'machude', 'current_topic', 'current_publisher', 'min_price', 'max_price', 'suggested_books', 'suggested_sachvanhoc', 'suggested_sachkinangsong', 'logo8'));
    }

    public function show($masach)
    {
        $book = Sach::with('chude', 'tacgia', 'nhaxuatban')
                    ->where('masach', $masach)
                    ->firstOrFail();

        //dd($book->soluongton);

        $suggested_books = Sach::where('machude', $book->machude)
                                ->where('masach', '!=', $masach)
                                ->take(10) 
                                ->get();

        return view('interface.book-details', compact('book', 'suggested_books'));
    }
}


