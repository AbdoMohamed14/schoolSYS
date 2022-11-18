<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use App\Models\Stage;
use App\Models\StageClass;
use App\Models\Student;
use Livewire\Component;

use function Symfony\Component\String\b;

class Students extends Component
{
    public 
    //student info
    $student_id,
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
    public $updateMode = false;

    public $currentStep = 1;

    public function render()
    {
        return view('livewire.students', [
            'students' => Student::all(),
            'stages' => Stage::all(),
            'stageClasses' => StageClass::where('stage_id', $this->stage)->get(),
            'classrooms' => Classroom::where('stage_class_id', $this->stage_class)->get(),
        ]);
    }


    public function editMode($id)
    {
        $this->studnet_id = $id;
        $student = Student::find($id);

        $this->student_blood_type = $student->blood;
        $this->stage_class = $student->stage_class_id;
        $this->stage = $student->stage_id;
        $this->student_name = $student->name_ar;
        $this->student_name_en = $student->name_en;
        $this->student_address = $student->address;
        $this->student_classroom = $student->classroom_id;
        $this->religion = $student->religion;
        
    
        //parent info
        $this->parent_name_ar = $student->parent_name_ar;
        $this->parent_name_en = $student->parent_name_en;
        $this->parent_phone = $student->parent_phone;
        $this->parent_blood_type = $student->parent_blood;
        $this->parent_address = $student->parent_address;
        $this->updateMode = true;
    }


    public function firstStepSubmit_edit()
    {
        $this->validate([
            'student_blood_type'=>'required',
            'stage_class'=>'required',
            'stage'=>'required',
            'student_name'=>'required',
            'student_name_en' => 'required',
            'student_address'=>'required',
            'student_classroom'=>'required',
            'religion'=> 'required'
        ]);
        $this->currentStep =2;
    }

    public function secondStepSubmit_edit()
    {
        $this->validate([
            'parent_name_ar'=> 'required',
            'parent_name_en'=> 'required',
            'parent_phone'=> 'required',
            'parent_blood_type'=> 'required',
            'parent_address'=> 'required'
        ]);
        $this->currentStep =3;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function submitForm_edit()
    {
        try{
                Student::where('id', $this->studnet_id)->update([

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

                flash()->addSuccess( '<b> تم تعديل البيانات بنجاح </b>' );
                return redirect(route('students.index'));

          
            }catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

    }

    public function delete_student($id)
    {
        Student::where('id', $id)->delete();

        flash()->addsuccess('تم مسح البيانات بنجاح');

    }
}
