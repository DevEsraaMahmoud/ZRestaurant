<?php

namespace App\Http\Controllers;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function Index(){
        $tables = Table::get();
        return view('backend.table.index', compact('tables'));
    }

    public function tableStore(Request $request){

        Table::insert([
            'table_number' => $request->table_number,
            'table_position' => $request->table_position,
            'chairs_numbers' => $request->chairs_numbers,

        ]);

        $notification = array(
            'message' => 'Table Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.tables')->with($notification);
    }

    public function tableDelete($id){
        $table = Table::findOrFail($id);

        Table::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Table deleted successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function tableEdit($id){
        $table = Table::findOrFail($id);
        return view('backend.table.edit', compact('table'));
    }

    public function tableUpdate(Request $request){
        $table_id = $request->id;
        Table::findOrFail($table_id)->update([
            'table_number' => $request->table_number,
            'table_position' => $request->table_position,
            'chairs_numbers' => $request->chairs_numbers,

        ]);

        $notification = array(
            'message' => 'Table Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.tables')->with($notification);
    }
}
