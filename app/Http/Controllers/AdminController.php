<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->successResponse(Admin::all(), "Admins List");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        return $this->successResponse(
            Admin::create($validated),
            "New admin created!"
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return $this->successResponse($admin, "Specific Admin Data");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        $validated = $request->validated();

        if($admin->update($validated)) {
            return $this->successResponse(
                $admin,
                "Admin data updated successfully"
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if($admin->delete()) {
            return $this->successResponse($admin, "Admin deleted successfully!");
        }
    }
}
