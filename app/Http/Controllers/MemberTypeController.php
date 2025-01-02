<?php

namespace App\Http\Controllers;

use App\Models\MemberType;
use Illuminate\Http\Request;

class MemberTypeController extends Controller
{
    public function showMemberTypes() {
        $memberTypes = MemberType::all();
        return view('member-type.show', ['memberTypes' => $memberTypes]);
    }

    public function showMemberTypeEdit($id) {
        $memberType = MemberType::find($id);
        return view('member-type.edit', ['memberType' => $memberType]);
    }

    public function editMemberType(Request $request, $id) {
        $memberType = MemberType::find($id);
        $memberType->update(['description' => $request->input('description')]);
        return redirect()->route('member-type.show');
    }
}
