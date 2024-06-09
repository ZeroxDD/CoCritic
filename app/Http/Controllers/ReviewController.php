<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();

        return view('reviews/index')->with(['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {

        $nuevaReview = [
            'user_id' => auth()->user()->getAuthIdentifier(),
            'descripcion' => $request->get('descripcion'),
            'puntuacion' => $request->get("puntuacion"),
            'plataforma' => $request->get('plataforma'),
            'juego_id' => $request->get('juego_id'),
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('imagenes', 'public');
            $nuevaReview['image'] = $path;
        }

        Review::create($nuevaReview);
        return redirect()->back()->with('success', 'Review añadida correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect('/tablas')->with('success', 'Review eliminada correctamente.');
    }
}
