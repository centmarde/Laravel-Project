<?php

namespace App\Http\Controllers\Api;

use App\Models\CarouselItems;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CarouselItemRequest;

class CarouselItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CarouselItems::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarouselItemRequest $request)
    {
        $validated = $request->validated();
        return CarouselItems::create($validated);
    return $carouselItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carouselItem = CarouselItems::findOrFail($id);
        
        return $carouselItem;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $carouselItem = CarouselItems::findOrFail($id);
       $carouselItem->delete();
       return $carouselItem;
    }
}
