<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Section;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $courses = Course::all();
        return view('admin/courses/index', compact('courses'));
    }

    public function create()
    {
        return view('admin/courses/create');
    }

    public function store(Request $request)
    {
        $rules = [
            'course_id' => 'required|unique:courses|regex:/^[a-z0-9-]+$/i ',
            'name' => 'required',
        ];
        $messages = [
        'course_id.required' => 'Yêu cầu nhập mã khóa học',
        'course_id.regex' => "Mã khóa học chỉ được chứ những kí tự a-z, 0-9 và 
            '-'",
    		'course_id.unique' => 'Mã khóa học đã tồn tại',
    		'name.required' => 'Yêu cầu nhập tên khóa học',
    	];
        $validator = validator()->make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
            Course::create($request->all());
            return redirect('/admin/courses')->with('success', "Thêm thành công");    
        }
        return redirect('/admin/courses')->with('error', "Thêm không thành công");
    }

    public function show($courseId)
    {
        $course = Course::where("course_id", $courseId)->first();
        $sections = Section::join('courses', "courses.course_id", "=", "sections.course_id")
            ->where("courses.course_id", $courseId)
            ->select("id", "sections.name")
            ->get();

        return view("admin.courses.show", compact('course', 'sections'));
    }

    public function addSection(Request $request, $courseId)
    {
        $rules = [
            'course_id' => 'required',
            'section_name' => 'required',
        ];
        $messages = [
    		'course_id.required' => 'Yêu cầu nhập mã khóa học',
    		'section_name.required' => 'Yêu cầu nhập tên khóa học',
    	];
        $validator = validator()->make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('error', "Thêm không thành công")
                ->withInput();
    	} else {
            Section::create([
                'course_id' => $request->input('course_id'),
                'name' => $request->input('section_name'),
            ]);
            return redirect("/admin/courses/$courseId")->with('success', "Thêm thành công");
        }
        return redirect("/admin/courses/$courseId")->with('error', "Thêm không thành công");
    }

    public function deleteSection($courseId, $sectionId)
    {
        try {
            $section = Section::find($sectionId)->delete();
            return redirect()->back()->with("success", "Xoá danh mục thành công");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Xoá danh mục không thành công");
        }
    }

    public function edit($course_id)
    {
        $courses = Course::where("course_id", $course_id)->first();
        return view('admin/courses/edit', [
            'courses' => $courses
        ]);
    }

    public function update(Request $request, $courseId)
    {
        $rules = [
            'name' => 'required',
        
        ];

        $messages = [
            'name.required' => 'Yêu cầu nhập tên khóa học',
            
        ];

        $validator = validator()-> make($request->all(), $rules, $messages);
        
        if($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Course::where("course_id", $courseId)->update([
                'name' => $request->input('name'),
                
            ]);
            return redirect("/admin/courses")->with("success", "Cập nhật thành công");
        }
        return redirect("/admin/courses")->with("error", "Cập nhật không thành công");
    }

    public function destroy($id)
    {
        try{
            Course::where("course_id", $id)->first()->delete();
            return redirect('/admin/courses')->with('success', "Xoá thành công");
        } catch (\Throwable $th){
            return redirect('/admin/courses')->with('error', "Xoá không thành công");
        }
    }
}
