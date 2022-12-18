<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $rows = City::query()->latest();
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

                ->editColumn('area_id', function ($row) {
                    return $row->area->name_ar??'';
                })


                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d', strtotime($row->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.city.index');
    }


    public function create()
    {
        $areas=Area::get();
        return view('Admin.CRUDS.city.parts.create',compact('areas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'iso_code' => 'required',
            'area_id' => 'required|exists:areas,id'
        ], [
            'title_ar.required' => 'اسم الدولة باللغة العربية مطلوب',
            'title_en.required' => 'اسم الدولة باللغة الانجليزية مطلوب',
            'iso_code.required' => 'كود الدولة مطلوب',
            'area_id.required' => 'اسم المنطقة مطلوب',
            'area_id.exists' => 'اسم المنطقة غير مدرج لدينا',

        ]);


    City::create($data);


        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }




    public function edit(City $city)
    {

        $areas=Area::get();

        return view('Admin.CRUDS.city.parts.edit', compact('areas','city'));

    }

    public function update(Request $request, City $city)
    {
        $data = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'iso_code' => 'required',
            'area_id' => 'required|exists:areas,id'
        ], [
            'title_ar.required' => 'اسم الدولة باللغة العربية مطلوب',
            'title_en.required' => 'اسم الدولة باللغة الانجليزية مطلوب',
            'iso_code.required' => 'كود الدولة مطلوب',
            'area_id.required' => 'اسم المنطقة مطلوب',
            'area_id.exists' => 'اسم المنطقة غير مدرج لدينا',

        ]);


        $city->update($data);



        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!',

            ]);
    }


    public function destroy(City $city)
    {
        $city->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }//end fun

}
