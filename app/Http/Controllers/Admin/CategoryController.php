<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\LogActivityTrait;
use App\Http\Traits\Upload_Files;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    use Upload_Files;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $rows = Category::query()->latest();
            return DataTables::of($rows)
                ->addColumn('action', function ($row) {
                    $edit='';
                    $delete='';
//                    if(!checkPermission(5))
//                        $edit='hidden';
//                    if(!checkPermission(6))
//                        $delete='hidden';
                    return '
                            <button '.$edit.'  class="editBtn btn rounded-pill btn-primary waves-effect waves-light"
                                    data-id="' . $row->id . '"
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="las la-edit"></i>
                                </span>
                            </span>
                            </button>
                            <button '.$delete.'  class="btn rounded-pill btn-danger waves-effect waves-light delete"
                                    data-id="' . $row->id . '">
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="las la-trash-alt"></i>
                                </span>
                            </span>
                            </button>
                       ';


                })

                ->editColumn('image', function ($row) {
                    return ' <img height="60px" src="' . get_file($row->image) . '" class=" w-60 rounded"
                             onclick="window.open(this.src)">';
                })


                ->editColumn('created_at', function ($admin) {
                    return date('Y/m/d', strtotime($admin->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.category.index');
    }


    public function create()
    {
        return view('Admin.CRUDS.category.parts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif,svg,webp,avif',

        ],[
            'title_ar.required'=>'اسم القسم باللغة العربية مطلوب',
            'title_en.required'=>'اسم القسم باللغة الانجليزية مطلوب',
            'image.required'=>'صورة القسم مطلوب',
            'image.mimes'=>'صورة القسم لابد ان تكون صورة',
        ]);
        $data["image"] =  $this->uploadFiles('categories',$request->file('image'),null );


        Category::create($data);


        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }




    public function edit(Category $category)
    {

        return view('Admin.CRUDS.category.parts.edit', compact('category'));

    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif,svg,webp,avif',

        ],[
            'title_ar.required'=>'اسم القسم باللغة العربية مطلوب',
            'title_en.required'=>'اسم القسم باللغة الانجليزية مطلوب',
            'image.required'=>'صورة القسم مطلوب',
            'image.mimes'=>'صورة القسم لابد ان تكون صورة',
        ]);

        if ($request->image){
            $data["image"] =  $this->uploadFiles('categories',$request->file('image'),null );

        }
        $category->update($data);



        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!',

            ]);
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }//end fun



}
