<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\Media;
use App\Models\Story;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::paginate(50);
        return response()->json($medias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMediaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMediaRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->error('Error trying to save!', 422, [
                'errors' => $request->validator->messages(),
            ]);
        }

        try {
            $media = new Media;
            /**
             * Upload
             */

            $uploadedFile = $this->upload($request);

            if($uploadedFile){
                /**
                 * Save media in database
                 */
                $media->story_id = $request->get('story_id');
                $media->user_id = $request->get('user_id');
                $media->path = $uploadedFile['path'];
                $media->file_type = $uploadedFile['file_type'];
                $media->file_size = $uploadedFile['file_size'];
                $media->save();
                return $this->success([
                    'media' => $media->id,
                ],	'Successfully registered!');
            }else{
                return $this->success([
                    'media' => -1,
                ],	'Erro while upload!');
            }


        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 422);
        }
    }

    /**
     * Store a newly created file in storage.
     *
     * @param  \App\Http\Requests\StoreMediaRequest  $request
     * @return Array
     */
    public function upload(StoreMediaRequest $request){
        try{
            $arquivo = array();
            /**
             * Upload
             */
            $mediafile = $request->file('media');
            $file_type = $mediafile->getClientMimeType();

            /**
             * File destination folder management
             */
            $folder = 'audios';
            if(strstr($file_type, "video/")){
                $folder = 'videos';
            }else if(strstr($file_type, "image/")){
                $folder = 'images';
            }

            $finalPath = Storage::putFile($folder, $request->file('media'));

        
            $arquivo['path'] = $finalPath;
            $arquivo['file_type'] = $mediafile->getClientMimeType();
            $arquivo['file_size'] = $mediafile->getSize();

            return $arquivo;

        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show($media)
    {
    
        return response()->json($media);

    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $story_id
     * @return \Illuminate\Http\Response
     */
    public function showByStory($story_id)
    {
    
        $media = Media::select('path','file_type')->where('story_id', $story_id)->paginate(50);
        return response()->json($media);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMediaRequest  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMediaRequest $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy($media)
    {
        return $media->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $media
     * @param  integer  $user_id
     * @return \Illuminate\Http\Response
     */
    public function destroyByUser($media_id, $user_id)
    {
        return Media::where('id', $media_id)->with('user')->where('user_id', $user_id)->delete();
    }
}
