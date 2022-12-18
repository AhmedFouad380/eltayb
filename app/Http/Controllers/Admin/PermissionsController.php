<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class PermissionsController extends Controller
{
    public function index()
    {
        return view('admin.Permission.index');

    }
    public function datatable(Request $request)
    {

        $data = Role::orderBy('id', 'desc');
        return \Yajra\DataTables\Facades\DataTables::of($data)
            ->editColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="' . $row->id . '" name="check_delete{}" id="customControlInline' . $row->id . '">
                                <label class="custom-control-label" for="customControlInline' . $row->id . '"></label>
                            </div>';
                return $checkbox;
            })

            ->addColumn('actions', function ($row) {
                $actions = '';
                if(\Illuminate\Support\Facades\Auth::guard('admin')->user()->hasPermissionTo('edit Permissions','admin') ) {
                    $actions .= ' <a class="btn btn-raised btn-success btn-sml" href=" '.url('edit-Permission/'.$row->id).'"><i class="fa fa-edit"></i></a>';
                }

                return $actions;

            })
            ->rawColumns(['actions', 'checkbox'])
            ->make();

    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string',
            'permissions' => 'required',
        ]);

        $role = Role::create(['name' => $request->name ,'guard_name'=>'admin']);
        $role->syncPermissions($request->permissions);

        try {

        } catch (Exception $e) {
            return back()->with('error_message', 'Failed');
        }
        return redirect('Permissions')->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try {
            RoleHasPerm::where('role_id',$request->id)->delete();
                Role::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function edit($id)
    {
        $User = Role::findOrFail($id);

        return view('admin.Permission.edit', compact('User'));
    }
    public function create()
    {

        return view('admin.Permission.create');
    }
    public function update(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string',
            'permissions' => 'required',

        ]);


        try {
            $id = $request->id;
            $role = Role::findOrFail($id);
            $role->name = $request->name;
            $role->save();
            if($request->has('permissions')){

                DB::delete("delete from role_has_permissions where role_id = ?", array($id));
                $role->syncPermissions($request->permissions);
                session()->flash('success', trans('admin.updatSuccess'));
                return redirect('Permissions')->with('message', 'Success');
            }

        } catch (\Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect('Permissions')->with('message', 'Success');
    }
}
