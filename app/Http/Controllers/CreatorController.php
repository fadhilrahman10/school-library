<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreCreatorRequest;
use App\Http\Requests\UpdateCreatorRequest;
use App\Models\Book;

class CreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {

            $query = Creator::with(['books'])->latest();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">
                                Aksi
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('creator.edit', $item) . '">
                                    Sunting
                                </a>
                                <a class="dropdown-item" href="' . route('creator.show', $item->id) . '">
                                    Detail
                                </a>
                                <form action="' . route('creator.destroy', $item) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })->rawColumns(['action'])
                ->make();
        }
        return view('creator.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCreatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCreatorRequest $request)
    {
        Creator::create($request->all());

        return to_route('creator.index')->with('success', 'Successfully Creator has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $creator = Creator::findOrFail($id);
        return view('creator.show')->with(['creator' => $creator]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Http\Response
     */
    public function edit(Creator $creator)
    {
        return view('creator.edit')->with(['creator' => $creator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCreatorRequest  $request
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCreatorRequest $request, Creator $creator)
    {
        $data = $request->all();
        $creator->update($data);

        return to_route('creator.index')->with('success', 'Creator has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creator $creator)
    {
        $book = $creator->books();
        $book->delete();
        $creator->delete();

        return to_route('creator.index')->with('success', 'Creator has been deleted');
    }
}
