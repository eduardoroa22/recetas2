<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{

    use AuthorizesRequests;


    public $course, $currents;

    public function mount(Course $course){
        $this->course->$course;

        foreach ($course->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->currents = $lesson;
                break;
            }
        }

        if (!$this->currents) {
            $this->currents = $course->lessons->last();
        }

        $this->authorize('enrolled', $course);
    }


    public function render()
    {
        return view('livewire.course-status');
    }
    // metodos

    public function chageLesson(Lesson $lesson){
        $this->currents = $lesson;

    }

    public function completed(){
        if ($this->currents->completed) {
            // eliminar registro
            $this->currents->users()->detach(auth()->user()->id);
        }else{
            // agregar registro
            $this->currents->users()->attach(auth()->user()->id);
        }
        $this->currents = Lesson::find($this->currents->id);
        $this->course = Course::find($this->course->id);
    }

    // propiedades computadas

    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->currents->id);

    }
    public function getPreviousProperty(){
        if ($this->index==0) {
            return null;
        }else{
        return $this->course->lessons[$this->index - 1];
        }
    }
    public function getNextProperty(){
        if ($this->index== $this->course->lessons->count() -1) {
            return null;
        }else{
            return $this->course->lessons[$this->index + 1];
        }
    }

    public function getAvanceProperty(){
            $i=0;

        foreach ($this->course->lessons as $leson) {
            if ($leson->completed) {
                $i++;
            }
        }

        $avance = ($i * 100)/($this->course->lessons->count());
        return round($avance, 2);
    }
    public function download(){
        return response()->download(storage_path('app/public/' . $this->currents->resource->url));
    }
}
