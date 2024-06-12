<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {   
        return view('listings.index', [
            'listings' =>  Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(6)
        ]);
    }


    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' =>  $listing
        ]);
    }

    //Show create form
    public function create (){
        return view('listings.create');
    }

    //Store listing data
    public function store(Request $request){
        $formFields = $request->validate(
            [
                'title' => 'required',
                'price' => 'required',
                'location' => 'required',
                'tags' => 'required',
                'contactEmail' => ['required', 'email'],
                'contactPhone' => 'required',
                'photo' => 'required',
                'description' => 'nullable'
            ]);

            if($request->hasFile('photo')){
                $formFields['photo'] = $request->file('photo')->store('images', 'public');
            }

            $formFields['user_id'] = auth()->id();

            Listing::create($formFields);

            return redirect('/')->with('messsage', 'Item Listed Successfully');
    }


    //Show Edit form
public function edit(Listing $listing)
{
    return view('listings.edit', ['listing' => $listing]);
}


//Update Listing data
public function update(Request $request, Listing $listing){
    $formFields = $request->validate(
        [
            'title' => 'required',
            'price' => 'required',
            'location' => 'required',
            'tags' => 'required',
            'contactEmail' => ['required', 'email'],
            'contactPhone' => 'required',
            'description' => 'nullable'
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('images', 'public');
        }

        $formFields['description'] = $formFields['description'] ?? '';

        $listing->update($formFields);

        return redirect("/listings/{$listing->id}")->with('message', 'Item Updated Successfully');
}
//Delete listing
public function destroy(Listing $listing){
    $listing->delete();
    return redirect('/')->with('message', 'Listing deleted succesffuly');
}

}
