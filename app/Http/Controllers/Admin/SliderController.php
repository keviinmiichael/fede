<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Slider;

class SliderController extends Controller
{
    public function edit(Slider $slider)
    {
        return view('admin.sliders.form', compact('slider'));
    }

    public function update(Slider $slider)
    {
        $this->addImages($slider);
        return redirect('admin/sliders/1/edit#edit');
    }

    private function addImages($slider)
    {
        //slider
        if (request()->has('imagesIds')) {
            $images = \App\Image::whereIn('id', request('imagesIds'));
            $slider->images()->saveMany($images->get());
            $images->update(['pending'=>0]);
        }
        $slider->save();
    }
}
