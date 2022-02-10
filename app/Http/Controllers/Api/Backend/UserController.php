<?php

namespace App\Http\Controllers\Api\Backend;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * index
     */
    public function index(Request $request)
    {
        $users = User::paginate(2);
        return $this->successPaginateResponse(UserResource::collection($users));
    }

    /**
     * show
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->successResponse(new UserResource($user));
    }


    /**
     * store
     */
    public function store(Request $request)
    {
        $data = $this->validation($request);

        $data['is_admin'] = $data['role'] === RoleConstant::ADMIN;
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        return $this->successResponse(new UserResource($user));
    }

    /**
     * update
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $this->validation($request, $id);

        $data['is_admin'] = $data['role'] === RoleConstant::ADMIN;

        $user->update($data);

        return $this->successResponse(new UserResource($user));
    }

    /**
     * delete
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return $this->successMessage('Success.');
    }

    /**
     * validation
     */
    private function validation(Request $request, $id = null)
    {
        $roles = implode(',', RoleConstant::ROLES);

        $rules = [
            'username' => 'required|string|unique:users,username, ' . $id,
            'role' => "required|in:$roles",
            'email' => 'required|email:rfc|unique:users,email, ' . $id,
        ];

        if (!isset($id)) {
            $rules = collect($rules)->put('password', 'required|string')->toArray();
        }

        return $this->validate($request, $rules);
    }
}
