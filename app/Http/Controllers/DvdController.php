<?php

namespace App\Http\Controllers;
use App\Models\Dvd;
use Illuminate\Http\Request;
use DateTimeImmutable;

class DvdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Dvd::orderBy('created_at','DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newDvd = new Dvd;
        $newDvd->name = $request->dvd["name"];
        $newDvd->description = $request->dvd["description"];
        $newDvd->release = (new DateTimeImmutable($request->dvd['release']))->format('Y-m-d');
        $newDvd->producer = $request->dvd['producer'];
        $newDvd->actors = $request->dvd['actors'];
        $newDvd->cover = $request->dvd['cover'];

        $newDvd->save();

        return $newDvd;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id)
    {
        $existingDvd = Dvd::find($id);

        if ($existingDvd) {
            $existingDvd->name = $request->dvd['name'];
            $existingDvd->description = $request->dvd['description'];
            $existingDvd->release = (new DateTimeImmutable($request->dvd['release']))->format('Y-m-d');
            $existingDvd->producer = $request->dvd['producer'];
            $existingDvd->actors = $request->dvd['actors'];
            $existingDvd->cover = $request->dvd['cover'];

            $existingDvd->save();

            return $existingDvd;
        }

        return "DVD not found";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $existingDvd = Dvd::find($id);

        if ($existingDvd) {
            $existingDvd->delete();
            return "DVD succesfully deleted.";
        }

        return "DVD not found";
    }
}
