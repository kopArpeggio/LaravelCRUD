<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::paginate(3);
        // $department = DB::table('departments')->get(); #Query Builder
        // $department = Department::all();
        return view('Admin.Department.index', compact('department'));
    }
    public function store(Request $request)
    {
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'department_name' => 'required|unique:departments|max:255'
            ],
            [
                'department_name.required' => 'กรุณาป้อนชื่อแผนก',
                'department_name.max' => 'กรุณาอย่าป้อนเกิน 255 ตัวอักษร',
                'department_name.unique' => 'มีแผนกนี้อยู่แล้ว'
            ]
        );

        //บันทึกข้อมูล
        // $data = array();
        // $data["department_name"] = $request -> department_name;
        // $data["user_id"] = Auth::user()->id;
        // DB::table('departments')->insert($data);
        $department = new Department;
        $department->department_name = $request->department_name;
        $department->user_id = Auth::user()->id;
        $department->save();
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");
    }

    public function edit($id)
    {
        $department = Department::find($id);

        return view('Admin.Department.edit', compact('department'));
    }

    public function update($id, Request $request)
    {
        $request->validate(
            [
                'department_name' => 'required|unique:departments|max:255'
            ],
            [
                'department_name.required' => 'กรุณาป้อนชื่อแผนก',
                'department_name.max' => 'กรุณาอย่าป้อนเกิน 255 ตัวอักษร',
                'department_name.unique' => 'มีแผนกนี้อยู่แล้ว'
            ]
        );
        $update = Department::find($id) -> update([
            'department_name' => $request->department_name,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('department')->with('success','อัพเดตข้อมูลเรียบร้อยแล้ว');
    }
    
    public function softdelete($id){
       $delete = Department::find($id)->delete();
       return redirect()->route('department')->with('success','ลบข้อมูลเรียบร้อยแล้ว');
    }
}
