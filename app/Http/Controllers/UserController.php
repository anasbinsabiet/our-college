<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Log;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;


class UserController extends Controller
{
    public function index()
    {   
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $user = null;
        $role  = DB::table('roles')->get();
        return view('users.create',compact('user','role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'phone'  => 'required',
            'status'        => 'required',
            'role_name'     => 'required',
            'file'          => 'nullable|image|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $fileName = null;

            // Handle file upload
            if ($request->hasFile('avatar')) {
                $extension = $request->file('avatar')->extension();

                $fileName = sprintf(
                    'user-%s-%s.%s',
                    uniqid(),
                    now()->format('d_m_Y'),
                    $extension
                );

                $request->file('avatar')->move(public_path('uploads/users'), $fileName);
            }

            // Create new user
            $user = new User();
            $user->name          = $request->name;
            $user->email         = $request->email;
            $user->phone  = $request->phone;
            $user->date_of_birth = $request->date_of_birth;
            $user->status        = $request->status;
            $user->role_name     = $request->role_name;
            $user->position      = $request->position;
            $user->department    = $request->department;
            $user->avatar        = $fileName;
            $user->password      = bcrypt('12345678'); // default password
            $user->save();

            DB::commit();

            return redirect()->route('student.index')->with('success', 'User created successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();

            \Log::error('User Store Error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());

            return back()->withErrors([
    'error' => $e->getMessage()
])->with('error', 'Failed to create user');
        }
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $role  = DB::table('roles')->get();
        return view('users.create',compact('user','role'));
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show',compact('user',));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required',
            'email'          => 'required',
            'phone'         => 'required',
            'status'         => 'required',
            'role_name'         => 'required',
            'file'          => 'nullable|image|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $user = user::findOrFail($id);

            $oldFile = $user->avatar;
            $fileName = $oldFile;

            // Handle file upload
            if ($request->hasFile('avatar')) {

                // Delete old file if exists
                if ($oldFile && file_exists(storage_path('uploads/users/' . $oldFile))) {
                    unlink(storage_path('uploads/users/' . $oldFile));
                }

                $extension = $request->file('avatar')->extension();

                $fileName = sprintf(
                    'user-%s-%s.%s',
                    uniqid(),
                    now()->format('d_m_Y'),
                    $extension
                );

                $request->file('avatar')->move('uploads/users', $fileName);
            }
            $user->name    = $request->name;
            $user->email         = $request->email;
            $user->phone  = $request->phone;
            $user->date_of_birth = $request->date_of_birth;
            $user->status        = $request->status;
            $user->role_name          = $request->role_name;
            $user->position   = $request->position;
            $user->department      = $request->department;
            $user->avatar          = $fileName;
            $user->save();

            DB::commit();

            return back()->with('success', 'User updated successfully!');
        } catch (\Throwable $e) {
            // return $e->getMessage();
            DB::rollBack();

            \Log::error('user Update Error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());

            return back()->withErrors([
    'error' => $e->getMessage()
])->with('error', 'Failed to update user');

        }
    }

    public function userDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            if (auth()->user()->role_name === 'Super Admin' || auth()->user()->role_name === 'Admin')
            {
                if ($request->avatar == 'photo_defaults.png')
                {
                    User::destroy($request->user_id);
                } else {
                    User::destroy($request->user_id);
                    unlink('images/'.$request->avatar);
                }
            } else {
                return redirect()->back()->with('error', 'User deleted fail :)');
            }

            DB::commit();
            return redirect()->back()->with('success', 'User deleted successfully :)');
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();
            return redirect()->back()->with('error', 'User deleted fail :)');
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password'     => ['required', new MatchOldPassword],
            'new_password'         => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        DB::commit();
        return redirect()->intended('dashboard')->with('success', 'User change successfully :)');
    }

    public function getUsersData(Request $request)
    {
        $draw            = $request->get('draw');
        $start           = $request->get("start");
        $rowPerPage      = $request->get("length"); // total number of rows per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr  = $request->get('columns');
        $order_arr       = $request->get('order');
        $search_arr      = $request->get('search');

        $columnIndex     = $columnIndex_arr[0]['column']; // Column index
        $columnName      = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue     = $search_arr['value']; // Search value

        $users =  DB::table('users');
        $totalRecords = $users->count();

        $totalRecordsWithFilter = $users->where(function ($query) use ($searchValue) {
            $query->where('name', 'like', '%' . $searchValue . '%');
            $query->orWhere('email', 'like', '%' . $searchValue . '%');
            $query->orWhere('position', 'like', '%' . $searchValue . '%');
            $query->orWhere('phone', 'like', '%' . $searchValue . '%');
            $query->orWhere('status', 'like', '%' . $searchValue . '%');
        })->count();

        if ($columnName == 'name') {
            $columnName = 'name';
        }
        $records = $users->orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%');
                $query->orWhere('email', 'like', '%' . $searchValue . '%');
                $query->orWhere('position', 'like', '%' . $searchValue . '%');
                $query->orWhere('phone', 'like', '%' . $searchValue . '%');
                $query->orWhere('status', 'like', '%' . $searchValue . '%');
            })
            ->skip($start)
            ->take($rowPerPage)
            ->get();
        $data_arr = [];
        
        foreach ($records as $key => $record) {
            $modify = '
                <td class="text-right">
                    <div class="dropdown dropdown-action">
                        <a href="" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v ellipse_color"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="'.url('users/add/edit/'.$record->user_id).'">
                                <i class="far fa-edit me-2"></i> Edit
                            </a>
                        </a>
                        </div>
                    </div>
                </td>
            ';
            if ($record->status === 'Active') {
                $status = '<td><span class="badge bg-success-dark">'.$record->status.'</span></td>';
            } elseif ($record->status === 'Disable') {
                $status = '<td><span class="badge bg-danger-dark">'.$record->status.'</span></td>';
            }  elseif ($record->status === 'Inactive') {
                $status = '<td><span class="badge badge-warning">'.$record->status.'</span></td>';
            } else {
                $status = '<td><span class="badge badge-secondary">'.$record->status.'</span></td>';
            }

            $modify = '
                <td class="text-end"> 
                    <div class="actions">
                        <a href="'.url('view/user/edit/'.$record->user_id).'" class="btn btn-sm bg-danger-light">
                            <i class="far fa-edit me-2"></i>
                        </a>
                    </div>
                </td>
            ';
           
            $data_arr [] = [
                "user_id"      => $record->user_id,
                "name"         => $record->name,
                "email"        => $record->email,
                "position"     => $record->position,
                "phone" => $record->phone,
                "join_date"    => $record->join_date,
                "status"       => $status, 
                "modify"       => $modify, 
            ];
        }

        $response = [
            "draw"                 => intval($draw),
            "iTotalRecords"        => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData"               => $data_arr
        ];
        return response()->json($response);
    }
}
