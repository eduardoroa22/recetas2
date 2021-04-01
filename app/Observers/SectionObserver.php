<?php

namespace App\Observers;
use App\Models\section;
use Illuminate\Support\Facades\Storage;

class SectionObserver
{
    public function deleting(section $section){
        foreach ($section->lessons as $lesson) {
            if ($lesson->resource) {
                Storage::delete($lesson->resource->url);
                $lesson->resource->delete();
            }
        }
    }
}
