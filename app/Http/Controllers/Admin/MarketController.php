<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\LogActivityTrait;
use App\Http\Traits\Upload_Files;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Market;
use App\Models\MarketCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MarketController extends Controller
{
    use Upload_Files;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $rows = Market::query()->latest();
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

                ->addColumn('categories', function ($row) {
                    $categories='';
                    foreach ($row->categories as $key=> $category){
                        if ($key==0)
                            $categories=$category->title_ar;
                            else
                        $categories=$categories.'-'.$category->title_ar;
                    }
                    return $categories;
                })
                ->editColumn('phone', function ($row) {
                    return "<a href='tel:'>$row->phone</a>";
                })

                ->editColumn('created_at', function ($admin) {
                    return date('Y/m/d', strtotime($admin->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.market.index');
    }


    public function create()
    {
        $categories=Category::get();
        return view('Admin.CRUDS.market.parts.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:markets,email' ,
            'password' => 'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif,svg,webp,avif',
            'phone' => 'required',
        ],[
            'name.required'=>'الاسم مطلوب',
            'email.required'=>'البريد الالكتروني مطلوب',
            'email.email'=>'البريد الالكتروني غير صحيح',
            'email.unique'=>'البريد الالكتروني  موجود مسبقا',
            'password.required'=>' الرقم السري مطلوب',
            'phone.required'=>' رقم الهاتف مطلوب',
            'image.required'=>' صورة التاجر مطلوبة',
            'image.mimes'=>' صورة التاجر لابد ان تكون صورة',
        ]);



        $data["image"] =  $this->uploadFiles('markets',$request->file('image'),null );

        $data['password']=bcrypt($request->password);


      $market= Market::create($data);

      if ($request->categories){
          for ($i=0;$i<count($request->categories);$i++){
              MarketCategory::updateOrCreate([
                  'market_id'=>$market->id,
                  'category_id'=>$request->categories[$i],
              ]);
          }
      }


        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }




    public function edit(Market $market)
    {
        $categories=Category::get();

        return view('Admin.CRUDS.market.parts.edit', compact('market','categories'));

    }

    public function update(Request $request, Market $market)
    {
        $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:markets,email,'.$market->id,
        'password' => 'nullable',
        'image'=>'nullable|mimes:jpeg,jpg,png,gif,svg,webp,avif',
        'phone' => 'required',
    ],[
        'name.required'=>'الاسم مطلوب',
        'email.required'=>'البريد الالكتروني مطلوب',
        'email.email'=>'البريد الالكتروني غير صحيح',
        'email.unique'=>'البريد الالكتروني  موجود مسبقا',
        'password.required'=>' الرقم السري مطلوب',
        'phone.required'=>' رقم الهاتف مطلوب',
        'image.required'=>' صورة التاجر مطلوبة',
        'image.mimes'=>' صورة التاجر لابد ان تكون صورة',
    ]);

        if ($request->passwoerd) {

            $data['password']=bcrypt($request->password);

        } else {

            $data['password']=$market->password;
        }
        if ($request->image){
            $data["image"] =  $this->uploadFiles('markets',$request->file('image'),null );

        }

        $market->update($data);

        MarketCategory::where('market_id',$market->id)->delete();

        if ($request->categories){
            for ($i=0;$i<count($request->categories);$i++){
                MarketCategory::updateOrCreate([
                    'market_id'=>$market->id,
                    'category_id'=>$request->categories[$i],
                ]);
            }
        }




        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!',

            ]);
    }


    public function destroy(Market $market)
    {
        $market->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }//end fun



}
