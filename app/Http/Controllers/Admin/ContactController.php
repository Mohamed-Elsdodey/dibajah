<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\LogActivityTrait;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{


    public function index(Request $request)
    {



        if ($request->ajax()) {
            $contacts = Contact::latest()->get();
            return Datatables::of($contacts)
                ->addColumn('action', function ($contact) {
                    $delete='';

//                    if(!checkPermission(29))
//                        $delete='hidden';


                    return '

                            <button ' .$delete.'  class="btn rounded-pill btn-danger waves-effect waves-light delete"
                                    data-id="' . $contact->id . '">
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="las la-trash-alt"></i>
                                </span>
                            </span>
                            </button>
                       ';

                })
                ->addColumn('show', function ($contact) {

                    return '<span data-id="' . $contact->id . '" class="badge rounded-pill bg-primary editBtn">عرض الرسالة</span>
';

                })
                ->editColumn('message', function ($contsct) {
                    $data= Str::limit($contsct->message, 20) ;
                    return $data;
                })

                ->editColumn('created_at', function ($contact) {
                    return date('Y/m/d', strtotime($contact->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.contacts.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit(Contact $contact)
    {
        return view('Admin.contacts.parts.details',compact('contact'));

    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }
}
