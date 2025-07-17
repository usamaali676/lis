<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\BusinessCategory;
use phpDocumentor\Reflection\Location;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\AreaWeServe;
use App\Models\Blog;
use App\Models\State;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        $business = Business::where('status', 1)->take(8)->get();
        $bcat = BusinessCategory::withcount('businesses')->orderBy('businesses_count', 'desc')->take(12)->get();
        $famcat = BusinessCategory::withcount('businesses')->orderBy('businesses_count', 'desc')->take(6)->get();
        $populer_categories = BusinessCategory::withcount('businesses')->get();

        $areas = AreaWeServe::groupBy('area')
        ->selectRaw('count(*) as count, area')->get();
        $states = State::withcount('cities')
        ->limit(4)->get();
        return view('FrontEnd.index', compact('business','bcat', 'areas','states','famcat'));
    }
    public function cities(Request $request, $slug)
    {
    //     $id = [ 6, 9];
    //    $business = Business::whereIn('id', $id)->get();
    //     dd($business);

        $state = State::where('slug', $slug)->first();
        if(isset($state)) {
        $cities = AreaWeServe::where('state_id', $state->id)
        ->select('area')
        ->distinct()
        ->get();
        }
        if(isset($state)) {
        $cities_id = AreaWeServe::where('state_id', $state->id)
        ->distinct()
        ->get()->pluck('business_id');
        }


        if(isset($cities_id)) {
        $business = Business::whereIn('id', $cities_id)->get();
        }
        if($request->ajax()){
            $areas = AreaWeServe::where('area', $request->city)->get()->pluck('business_id');

            $busines = Business::whereIn('id', $areas)->where('status', 1)->get();
           return response()->json(['business' => $busines]);
        }

        return view('FrontEnd.cities', compact('cities', 'state','business'));
    }
    public function filter(Request $request)
    {
        // $test = $request->all();
        // return response()->json(['test' => $test]);

        if($request->ajax()){
            $cat_id = BusinessCategory::where('name', $request->category)->pluck('id');
            $business = Business::whereHas('cat', function ($query) use($cat_id){
                $query->where('cat_id', $cat_id)->where('status', 1);
            })->with('cat')->get();
            return response()->json(['business' => $business]);
        }
    }
        public function blogfilter(Request $request)
    {

        if($request->ajax()){
            $blog = Blog::where('title', 'LIKE', "%{$request->category}%")->get();
            return response()->json(['blog' => $blog]);
        }
    }
    public function contact()
    {
        return view('FrontEnd.contact');
    }
    public function about()
    {
        return view('FrontEnd.about');
    }
    public function listing()
    {
        // $cat_id = BusinessCategory::where('name', "Demo")->pluck('id');
        // $businesset = Business::whereHas('cat', function ($query) use($cat_id){
        //     $query->where('cat_id', $cat_id);
        // })->get();
        // dd($businesset);
        $business = Business::where('status', 1)->latest()->paginate(24);
        // $business = Business::where('status', 1)->pluck('slug');
        // dd($business);
        $businessCategory =BusinessCategory::withCount('businesses')  // Assuming a relationship named 'businesses'
    ->orderBy('businesses_count', 'desc')  // Order by the number of businesses
    ->take(80)  // Get the top 80 categories
    ->get();
        $areas = AreaWeServe::select('area')
        ->distinct()
        ->get();
        return view('FrontEnd.listing', compact('business', 'businessCategory','areas'));
    }
    public function search(Request $request){
        // Get the search value from the request
        // dd($request->all());

        $search = $request->input('search');
        $catsearch = $request->input('category');
        $location = $request->input('location') ;
        // dd($search);
        // dd(explode(" ", $location));

        // Search in the title and body columns from the posts table
        // $searchbusiness = Business::whereHas('tags', function($query) use ($search) {
        //     $query->where('name', 'LIKE', "%{$search}%");
        // })->get();
        $query = Business::query();
        if($request->search != null) {
            // dd("search
            $searchWords = explode(" ", $request->search);

            $query->whereHas('cat', function($q) use ($searchWords) {
                foreach ($searchWords as $word) {
                    $q->where('name', 'LIKE', '%' . $word . '%');
                }
                $q->where('status', 1);
            });
            // $query->whereHas('cat', fn($query) => $query->where('name', 'LIKE', '%' . explode(" ", $search)[0] . '%')->where('status', 1));
        }
        if($request->location != NULL) {
            // dd("location");
            $query->where('address', 'LIKE', '%' . explode(" ", $location)[0] . '%');
        }
        // if($request->category != NULL) {
        //     // dd("category");
        //     $query->whereHas('cat', fn ($query) => $query->where('name',  'LIKE', "%{$catsearch}%"));
        // }
        // dd($query);
        $searchbusiness = $query->get();
        // dd($searchbusiness);

        // Return the search view with the resluts compacted
        $businessCategory = BusinessCategory::all();
        return view("FrontEnd.search", compact('searchbusiness','businessCategory','search','catsearch','location'));
    }
    public function SingleCategory($slug)
    {
        $id = BusinessCategory::where('slug', $slug)->value('id');
        $category = BusinessCategory::with('businesses')->find($id);
        // dd($category);
        return view('FrontEnd.category', compact('category'));
    }
    public function test(Request $request)
    {
        if($request->ajax()){
        $busines = Business::all();
        return response()->json(['business' => $busines]);
        }
        return view('FrontEnd.map');
    }
    public function blog()
    {
        $blog = Blog::orderBy('id', 'DESC')->with('category')->paginate(12);
        return view('FrontEnd.blog', compact('blog'));
    }
    public function sendmail(Request $request){

        Mail::send('email', [
                'name' => $request->get('name'),
                'subject'=>$request->get('subject'),
                'phone' => $request->get('phone'),
                'messages' => $request->get('messages'),
                'email' => $request->get('email') ],
                function ($message) {
                        $message->from('noreply@localbeings.com');
                        $message->to('support@localbeings.com', 'Local Beings')
                                ->subject('New Form from Local Beings');
        });
        //   return redirect('contact');
        return redirect()->route('contact')->with('message', 'Form Submitted Successfully!');

    }

}
