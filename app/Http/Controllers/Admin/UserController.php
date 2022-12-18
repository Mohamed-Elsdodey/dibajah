<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload_Files;
use App\Models\Category;
use App\Models\Market;
use App\Models\MarketCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    use Upload_Files;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $rows = User::query()->latest();
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


                ->editColumn('phone', function ($row) {
                    return "<a href='tel:'>$row->phone</a>";
                })

                ->editColumn('first_name', function ($row) {
                    $name=$row->first_name.' '.$row->last_name;
                    return $name;
                })

                ->editColumn('created_at', function ($admin) {
                    return date('Y/m/d', strtotime($admin->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.user.index');
    }


    public function create()
    {
        return view('Admin.CRUDS.user.parts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email' ,
            'password' => 'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif,svg,webp,avif',
            'phone' => 'required',
        ],[
            'first_name.required'=>'الاسم الاول مطلوب',
            'last_name.required'=>'الاسم الثاني مطلوب',
            'email.required'=>'البريد الالكتروني مطلوب',
            'email.email'=>'البريد الالكتروني غير صحيح',
            'email.unique'=>'البريد الالكتروني  موجود مسبقا',
            'password.required'=>' الرقم السري مطلوب',
            'phone.required'=>' رقم الهاتف مطلوب',
            'image.required'=>' صورة العميل مطلوبة',
            'image.mimes'=>' صورة العميل لابد ان تكون صورة',
        ]);



        $data["image"] =  $this->uploadFiles('users',$request->file('image'),null );

        $data['password']=bcrypt($request->password);


        $market= User::create($data);



        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }




    public function edit(User $user)
    {

        return view('Admin.CRUDS.user.parts.edit', compact('user'));

    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif,svg,webp,avif',
            'phone' => 'required',
        ],[
            'first_name.required'=>'الاسم الاول مطلوب',
            'last_name.required'=>'الاسم الثاني مطلوب',
            'email.required'=>'البريد الالكتروني مطلوب',
            'email.email'=>'البريد الالكتروني غير صحيح',
            'email.unique'=>'البريد الالكتروني  موجود مسبقا',
            'password.required'=>' الرقم السري مطلوب',
            'phone.required'=>' رقم الهاتف مطلوب',
            'image.required'=>' صورة العميل مطلوبة',
            'image.mimes'=>' صورة العميل لابد ان تكون صورة',
        ]);

        if ($request->passwoerd) {

            $data['password']=bcrypt($request->password);

        } else {

            $data['password']=$user->password;
        }
        if ($request->image){
            $data["image"] =  $this->uploadFiles('users',$request->file('image'),null );

        }

        $user->update($data);



        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!',

            ]);
    }


    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }//end fun

}
