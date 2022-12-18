<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\LogActivityTrait;
use App\Http\Traits\Upload_Files;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\AdminService;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    use Upload_Files,LogActivityTrait;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $admins = Admin::where('id', '!=', auth('admin')->user()->id)->where('id','!=',1)->get();
            return Datatables::of($admins)
                ->addColumn('action', function ($admin) {

                    $edit='';
                    $delete='';
//                    if(!checkPermission(5))
//                        $edit='hidden';
//                    if(!checkPermission(6))
//                        $delete='hidden';


                    return '
                            <button '.$edit.'  class="editBtn btn rounded-pill btn-primary waves-effect waves-light"
                                    data-id="' . $admin->id . '"
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="las la-edit"></i>
                                </span>
                            </span>
                            </button>
                            <button '.$delete.'  class="btn rounded-pill btn-danger waves-effect waves-light delete"
                                    data-id="' . $admin->id . '">
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="las la-trash-alt"></i>
                                </span>
                            </span>
                            </button>
                       ';


                })

                ->editColumn('image', function ($admin) {
                    return ' <img height="60px" src="' . get_file($admin->image) . '" class=" w-60 rounded"
                             onclick="window.open(this.src)">';
                })


                ->editColumn('is_active', function ($row) {
                    $active = '';
                    $operation='';
//                    if (!checkPermission(39))
//                        $operation='disabled';
                    if ($row->is_active == 1)
                        $active = 'checked';
                    return '<div class="form-check form-switch">
  <input ' .$operation. '  class="form-check-input activeBtn" data-id="' . $row->id . ' " type="checkbox" role="switch" id="flexSwitchCheckChecked" ' . $active . '  >
</div>';
                })


                ->editColumn('created_at', function ($admin) {
                    return date('Y/m/d', strtotime($admin->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.admin.index');
    }


    public function create()
    {
        return view('Admin.CRUDS.admin.parts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email' ,
            'password' => 'required',
//             'business_name'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif,svg,webp,avif',
            'is_active'=>'required',

        ]);
        $data["image"] =  $this->uploadFiles('admins',$request->file('image'),null );

        $data['password']=bcrypt($request->password);

//        $data['image'] = $this->createImageFromTextManual('admins' , $request->name ,256 , '#000', '#fff');

     $admin=Admin::create($data);
//     if ($request->role_id)
//         AdminRole::updateOrCreate([
//             'admin_id'=>$admin->id,
//             'role_id'=>$request->role_id,
//         ]);



        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }


    public function show(Admin $admin)
    {

        $html= view('Admin.CRUDS.admin.parts.show', compact('admin'))->render();
        return response()->json([
           'code'=>200,
           'html'=>$html,
        ]);

        //
    }


    public function edit(Admin $admin)
    {

        return view('Admin.CRUDS.admin.parts.edit', compact('admin'));

    }

    public function update(Request $request, Admin $admin)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable',
//            'business_name'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif,svg,webp,avif',
            'is_active'=>'nullable',


        ]);
        if ($request->passwoerd) {

            $data['password']=bcrypt($request->password);

        } else {

            $data['password']=$admin->password;
}
        if ($request->image){
            $data["image"] =  $this->uploadFiles('admins',$request->file('image'),null );

        }
        $old=$admin;
        $admin->update($data);

//        AdminRole::where('admin_id',$admin->id)->delete();
//        if ($request->role_id)
//            AdminRole::updateOrCreate([
//                'admin_id'=>$admin->id,
//                'role_id'=>$request->role_id,
//            ]);



        $html= view('Admin.CRUDS.admin.parts.header')->render();


        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!',
                'html'=>$html,
                'name'=>$admin->name,
                'logo'=>get_file($admin->image),
                'business_name'=>$admin->business_name,
            ]);
    }


    public function destroy(Admin $admin)
    {
        $admin->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }//end fun


    public function activate(Request $request)
    {

        $admin = Admin::findOrFail($request->id);
        $old=$admin;
        if ($admin->is_active == '1'){
            $admin->is_active = '0';
            $admin->save();
        }
        else {
            $admin->is_active = '1';
            $admin->save();
        }

        return response()->json(['status' => true]);
    }


}
