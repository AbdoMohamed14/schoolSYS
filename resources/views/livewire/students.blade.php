@php
    $slug = (app()->getLocale()=='en')?'_en':'_ar';
    $name_attr = 'name'.$slug;
@endphp
@if ($updateMode)
@include('livewire.add-student')
@else
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('students.student_name_ar') }}</th>
            <th>{{ trans('students.stage') }}</th>
            <th>{{ trans('students.stage_class') }}</th>
            <th>{{ trans('students.classroom') }}</th>
            <th>{{ trans('students.blood_type') }}</th>
            <th>{{ trans('students.religion') }}</th>
            <th>{{ trans('students.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($students as $student)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $student->$name_attr }}</td>
                <td>{{ $student->stage->$name_attr }}</td>
                <td>{{ $student->stageClass->$name_attr }}</td>
                <td>{{ $student->classroom->name }}</td>
                <td>{{ $student->blood }}</td>
                <td>{{ $student->religion }}</td>
                <td>
                    <button wire:click="editMode({{ $student->id }})" title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm"  title="{{ trans('Grades_trans.Delete') }}" data-toggle="modal" data-target='#deleteModal{{$student->id}}'><i class="fa fa-trash"></i></button>
                    <a type="button" href="{{route('students.show', $student->id)}}" class="btn btn-warning btn-sm" title="{{ trans('students.show_students') }}"><i style="color: #ffffff" class="fa fa-eye"></i>

                </td>
            </tr>

            <!-- Modal -->
                <div class="modal fade" id="deleteModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        هل انت متأكد من حذف هذا الطالب
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">تراجع</button>
                        <button type="button" wire:click="delete_student({{$student->id}})" class="btn btn-primary" data-dismiss="modal">تأكيد</button>
                        </div>
                    </div>
                    </div>
                </div>
        @endforeach
    </table>
</div>  
@endif
