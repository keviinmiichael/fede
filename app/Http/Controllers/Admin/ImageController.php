<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function update(\App\Image $image)
    {
        $infoCollection = collect();
        collect(request()->all())->each(function ($value, $key) use ($infoCollection, $image) {
            $infoCollection->push(\App\ImageInfo::firstOrNew(['name' => $key, 'value' => $value, 'image_id' => $image->id]));
        });
        $image->info()->saveMany($infoCollection);
        return ['success' => true, 'image' => $image->toArray()];
    }
    
    public function upload()
    {
        $this->middleWare('progress');
        $response = ['success' => true, 'images' => []];
        foreach (request()->file('images') as $file) {
            $image = $this->intervention($file);
            $response['images'][] = ['src' => $image->src, 'id' => $image->id];
        }
        return response()->json($response);
    }

    private function intervention($file)
    {
        $imageName = request()->input('resource'). '.'. \App\Image::nextId(). '.' .$file->getClientOriginalExtension();
        $options = config('image.'.request()->input('resource'));
        foreach ($options as $size => $option) {
            $image = Image::make($file);
            foreach ($option as $method => $args) {
                if (!is_array($args)) $args = [$args];
                call_user_func_array([$image, $method], $args);
            }
            $image->save(public_path( '/content/'.request()->input('resource').'/'.$size.'/'.$imageName));
        }
        return \App\Image::create(['src' => $imageName]);
    }

    //---REST---
    public function destroy(\App\Image $image)
    {
        $image->delete();
        return ['success' => true];
    }
}