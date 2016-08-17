<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Virus;
use App\Repositories\VirusRepository;
use App\Models\Rating;
use Illuminate\Support\Facades\Input;

class VirusController extends Controller {

    public function index(VirusRepository $virusRepo) {
        return view('viruses.index', [
            'viruses' => $virusRepo->getVirusesAndRatings(),
        ]);
    }

    /**
     * We pass an empty virus model to be able to reuse the form
     * (both create and edit use the same form this way)
     * 
     * @param Request $request
     * @return type
     */
    public function create() {
        $virus = new Virus();
        $virus->discovered_at = \Carbon\Carbon::now()->format('m/d/Y h:i A');
        return view('viruses.create')->withVirus($virus);
    }

    public function store(Request $request) {
        $this->validateVirus($request);

        $virus = $this->saveVirus($request, new Virus());

        return redirect('/')->with('success', $virus->name . ' saved successfully');
    }

    public function edit($id) {
        $virus = Virus::findOrFail($id);

        return view('viruses.edit')->withVirus($virus);
    }

    public function update($id, Request $request) {
        $virus = Virus::findOrFail($id);

        $this->validateVirus($request);

        $this->saveVirus($request, $virus);

        return redirect('/')->with('success', $virus->name . ' edited successfully');
    }

    public function description($id, Request $request) {
        $virus = Virus::findOrFail($id);

        $ratingCookie = $request->cookie('rating');
        $showRating = true;
        if ($ratingCookie == $id) {
            $showRating = false;
        }

        return view('viruses.description', [
            'virus' => $virus,
            'showRating' => $showRating
        ]);
    }

    public function rating($id, Request $request) {
        $virus = Virus::findOrFail($id);

        $this->validate($request, [
            'rating' => 'required|integer|between:1,5'
        ]);

        $rating = new Rating ();
        $rating->virus_id = $id;
        $rating->rating = Input::get('rating');
        $rating->save();

        if ($request->ajax()) {
            return response()->json(['rating' => $virus->name . ' rating saved'])
                            ->cookie('rating', $id, 540000);
        };

        return redirect()->back()->with('success', $virus->name . ' rated successfully')
                        ->cookie('rating', $id, 540000);
    }

    /** Validate virus input for both store and update
     * 
     * @param type $request
     */
    private function validateVirus($request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'discovered_at' => 'required'
        ]);
    }

    /**
     * Save the virus for both store and update
     * 
     * @param type $request
     * @param type $virus
     */
    private function saveVirus($request, $virus) {
        $input = $request->all();
        $virus->active = (Input::has('active')) ? true : false;
        $virus->fill($input)->save();
        return $virus;
    }

}
