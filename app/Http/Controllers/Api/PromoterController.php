<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promoter;

class PromoterController extends Controller
{

    private $promoter;

    public function __construct(Promoter $promoter) {
        $this->promoter = $promoter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->promoter->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->promoter->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Promoter  $promoter
     * @return \Illuminate\Http\Response
     */
    public function show(Promoter $promoter)
    {
        return $promoter;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Promoter  $promoter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promoter $promoter)
    {
        $promoter->update($request->all());

        return $promoter;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Promoter  $promoter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promoter $promoter)
    {
        return $promoter->delete();
    }
}
