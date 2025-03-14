<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    function add(Request $request){
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $result= $student->save();
        if($request){
            return redirect('list');
        }
        else{
            return "student not added";
        }

    }


    function list(){
        $students = Student::paginate(10); // Fetch 10 students per page
        return view('list-student', compact('students'));
    }


    function delete($id){
        echo $isDelete= Student::destroy($id);
        if($isDelete){
            return redirect('list');
        }else{
            echo "record not deleted";
        }
    }


    function edit($id){
        $student= Student::find($id);
        return view('edit-student',["data"=>$student]);
    }


    function editStudent(Request $request, $id){
        $student= Student::find($id); 
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        return $student->save();
        if($student->save()){
            return redirect('list');
        }
        else{
            return "Student details are not updated";
        }
    }

    function search(Request $request){
        $studentData = Student::where('name', 'like', "%$request->search%")->paginate(10); // Use paginate() instead of get()
        return view('list-student', ['students' => $studentData]);
    }  


    function deleteMultiple(Request $request){
        $result=Student::destroy($request->ids);
        if($result){
            return redirect('list');
        }
        else{
            return "selected not deleted";
        }
    }

}