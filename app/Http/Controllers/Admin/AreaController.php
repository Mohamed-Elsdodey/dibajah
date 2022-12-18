<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AreaController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $rows = Area::query()->latest();
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

                ->editColumn('country_id', function ($row) {
                    return $row->country->name_ar??'';
                })


                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d', strtotime($row->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.area.index');
    }


    public function create()
    {
        $countries=Country::get();
        return view('Admin.CRUDS.area.parts.create',compact('countries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'iso_code' => 'required',
            'country_id'=>'required|exists:countries,id'
        ], [
            'title_ar.required' => 'اسم الدولة باللغة العربية مطلوب',
            'title_en.required' => 'اسم الدولة باللغة الانجليزية مطلوب',
            'iso_code.required' => 'كود الدولة مطلوب',
            'country_id.required'=>'اسم الدولة مطلوب',
            'country_id.exists'=>'اسم الدولة غير مدرج لدينا',

        ]);


        Area::create($data);


        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }




    public function edit(Area $area)
    {

        $countries=Country::get();

        return view('Admin.CRUDS.area.parts.edit', compact('area','countries'));

    }

    public function update(Request $request, Area $area)
    {
        $data = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'iso_code' => 'required',
            'country_id'=>'required|exists:countries,id'
        ], [
            'title_ar.required' => 'اسم الدولة باللغة العربية مطلوب',
            'title_en.required' => 'اسم الدولة باللغة الانجليزية مطلوب',
            'iso_code.required' => 'كود الدولة مطلوب',
            'country_id.required'=>'اسم الدولة مطلوب',
            'country_id.exists'=>'اسم الدولة غير مدرج لدينا',

        ]);


        $area->update($data);



        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!',

            ]);
    }


    public function destroy(Area $area)
    {
        $area->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }//end fun


}
