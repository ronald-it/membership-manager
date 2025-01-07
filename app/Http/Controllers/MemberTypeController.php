<?php

namespace App\Http\Controllers;

use App\Models\MemberType;
use Exception;
use Illuminate\Http\Request;

class MemberTypeController extends Controller
{
    public function showMemberTypes() {
        $memberTypes = MemberType::orderBy('id', 'asc')->get();
        return view('member-type.show', ['memberTypes' => $memberTypes]);
    }

    public function showMemberTypeEdit($id) {
        $memberType = MemberType::find($id);
        return view('member-type.edit', ['memberType' => $memberType]);
    }

    public function editMemberType(Request $request, $id) {
        try {
            $request->validate([
                'description' => 'required|string',
            ]);
            $memberType = MemberType::find($id);
            $memberType->update(['description' => $request->input('description')]);
            return redirect()->route('member-type.show');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong, make sure your input is correct and try again.');
        }
    }
}
