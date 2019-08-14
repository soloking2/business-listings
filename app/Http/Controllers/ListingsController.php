<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingsController extends Controller
{

  public function __construct(){
    $this->middleware('auth', ['except' => ['index', 'show']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listing = Listing::orderby('created_at', 'desc')->get();
        return view('listing', ['list'=>$listing]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
              'name'=> 'required',
              'email'=> 'email'
        ]);
        $listing = new Listing();
        $listing->name = $request->input('name');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->address = $request->input('address');
        $listing->bio = $request->input('bio');
        $listing->user_id = auth()->user()->id;

        $listing->save();

        return redirect('/dashboard')->with('success', 'Listing Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $listing = Listing::find($id);
        return view('show', ['listing' => $listing]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $listing = Listing::find($id);
        return view ('edit')->with('listing', $listing);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
              'name'=> 'required',
              'email'=> 'email'
        ]);
        $listingUpdate = Listing::where('id', $id)
                                  ->update([
                                    'name'=>$request->input('name'),
                                    'email'=>$request->input('email'),
                                    'phone'=>$request->input('phone'),
                                    'address'=>$request->input('address'),
                                    'bio'=>$request->input('bio'),
                                    'user_id' => auth()->user()->id
                                  ]);
        if($listingUpdate){
            return redirect('/dashboard')->with('success', 'Listing Updated');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete the listing
        $listingDelete = Listing::find($id);
        if($listingDelete->delete()){
          return redirect('/dashboard')->with('success', 'Listing Deleted successfully');
        }
    }
}
