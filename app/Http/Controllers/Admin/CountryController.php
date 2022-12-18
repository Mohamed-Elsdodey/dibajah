<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CountryController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $rows = Country::query()->latest();
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



                ->editColumn('created_at', function ($admin) {
                    return date('Y/m/d', strtotime($admin->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.country.index');
    }


    public function create()
    {
        return view('Admin.CRUDS.country.parts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'iso_code' => 'required',
        ], [
            'title_ar.required' => 'اسم الدولة باللغة العربية مطلوب',
            'title_en.required' => 'اسم الدولة باللغة الانجليزية مطلوب',
            'iso_code.required' => 'كود الدولة مطلوب',
        ]);


    Country::create($data);


        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }




    public function edit(Country $country)
    {

        return view('Admin.CRUDS.country.parts.edit', compact('country'));

    }

    public function update(Request $request, Country $country)
    {
        $data = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'iso_code' => 'required',
        ], [
            'title_ar.required' => 'اسم الدولة باللغة العربية مطلوب',
            'title_en.required' => 'اسم الدولة باللغة الانجليزية مطلوب',
            'iso_code.required' => 'كود الدولة مطلوب',
        ]);



        $country->update($data);



        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!',

            ]);
    }


    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }//end fun


}
