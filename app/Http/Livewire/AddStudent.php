<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use App\Models\Stage;
use App\Models\StageClass;
use App\Models\Student;
use Livewire\Component;

class AddStudent extends Component
{

    public 
    //student info
    $student_blood_type,
    $stage_class,
    $stage,
    $student_name,
    $student_name_en,
    $student_image,
    $student_address,
    $student_classroom,
    $religion,
    

    //parent info
    $parent_name_ar,
    $parent_name_en,
    $parent_phone,
    $parent_blood_type,
    $parent_address
    
    ;


   public $currentStep =1;

   public $updateMode;

    public function render()
    {

        return view('livewire.add-student', 
        [
            'stages' => Stage::all(),
            'stageClasses' => StageClass::where('stage_id', $this->stage)->get(),
            'classrooms' => Classroom::where('stage_class_id', $this->stage_class)->get(),
            
        ]);
    }


    public function firstStepSubmit()
    {
        $this->validate([
            'student_blood_type'=>'required',
            'stage_class'=>'required',
            'stage'=>'required',
            'student_name'=>'required|unique:students,name_ar',
            'student_name_en' => 'required|unique:students,name_en',
            'student_address'=>'required',
            'student_classroom'=>'required',
            'religion'=> 'required'
        ]);
        $this->currentStep =2;
    }


    public function secondStepSubmit()
    {
        $this->validate([
            'parent_name_ar'=> 'required|unique:students,parent_name_ar',
            'parent_name_en'=> 'required|unique:students,parent_name_en',
            'parent_phone'=> 'required',
            'parent_blood_type'=> 'required',
            'parent_address'=> 'required'
        ]);
        $this->currentStep =3;
    }



    public function storeData()
    {
        Student::create([
            'blood'=> $this->student_blood_type,
            'stage_class_id'=>$this->stage_class,
            'stage_id'=>$this->stage,
            'name_ar'=>$this->student_name,
            'name_en' => $this->student_name_en,
            'religion' => $this->religion,
            'address'=>$this->student_address,
            'classroom_id'=>$this->student_classroom,
            'parent_name_ar'=> $this->parent_name_ar,
            'parent_name_en'=> $this->parent_name_en,
            'parent_phone'=> $this->parent_phone,
            'parent_blood'=> $this->parent_blood_type,
            'parent_address'=> $this->parent_address
        ]);
        
        $this->currentStep = 1;
        $this->clearData();
        flash()->addSuccess('تم حفظ البيانات بنجاح');


    }


    public function clearData()
    {
        $this->student_blood_type = '';
        $this->stage_class = '';
        $this->stage = '';            
        $this->student_name = '';    
        $this->student_name_en = '';
        $this->religion = '';       
        $this->student_address = '';
        $this->student_classroom = '';
        $this->parent_name_ar = '';  
        $this->parent_name_en = '';   
        $this->parent_phone = '';  
        $this->parent_blood_type = '';
        $this->parent_address = '';
            
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }



}
