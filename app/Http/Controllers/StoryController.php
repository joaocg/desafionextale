<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoryRequest;
use App\Http\Requests\UpdateStoryRequest;
use App\Models\Story;
use App\Traits\ApiResponser;

class StoryController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::paginate(50);
        return response()->json($stories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoryRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->error('Erro ao tentar cadastrar!', 422, $request->validator->messages());
        }

        try {
            $story = Story::create($request->all());
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 422);
        }

        return $this->success([
            'story' => $story,
        ],	'Successfully registered!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        return response()->json($story);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoryRequest  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoryRequest $request, Story $story)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->error('Erro ao tentar cadastrar!', 422, $request->validator->messages());
        }

        try{
            $story = $story->update($request->all());
            return $this->success([
                'story' => $story,
            ],	'Cadastrado atualizado com sucesso!');
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        return $story->delete();
    }
}
