<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeesType;
use App\Models\User;
use App\Models\FeesInformation;
use App\Models\Student;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        $query = FeesInformation::join('students', 'fees_information.student_id', 'students.id')
            ->select('fees_information.*', 'students.name' , 'students.phone')
            ->orderByDesc('fees_information.id');

        // Apply filters
        $query->when($request->id, fn($q) => $q->where('fees_information.id', $request->id));
        $query->when($request->student_id, fn($q) => $q->where('fees_information.student_id', $request->student_id));
        $query->when($request->amount, fn($q) => $q->where('fees_information.fees_amount', $request->amount));
        // Paid date filters individually
        if ($request->paid_date_from) {
            $query->where('fees_information.paid_date', '>=',$request->paid_date_from );
        }

        if ($request->paid_date_to) {
            $query->where('fees_information.paid_date', '<=', $request->paid_date_to);
        }
        $feesInformation = $query->get();

        $students = Student::select('id', 'name', 'phone')->get();

        return view('collections.index', compact('feesInformation', 'students'));
    }

    public function create()
    {
        $students    = Student::latest()->get();
        $feesType    = FeesType::all();
        $collection  = null;
        return view('collections.create',compact('students','feesType', 'collection'));
    }
    
    public function edit(Request $request, $id)
    {
        $students    = Student::latest()->get();
        $feesType    = FeesType::all();
        $collection  = FeesInformation::findOrFail($id);
        return view('collections.create',compact('students','feesType','collection'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'student_id'  => 'required',
            'fees_type'   => 'required',
            'fees_amount' => 'required',
            'paid_date'   => 'required',
            'file'        => 'nullable|file|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $fileName = null;

            if ($request->hasFile('file')) {
                $file_extension = $request->file('file')->extension();
                $fileName = sprintf(
                    'collection-%s-%s.%s',
                    uniqid(),
                    now()->format('d_m_Y'),
                    $file_extension
                );
                $request->file('file')->move('uploads/collections', $fileName);
            }

            FeesInformation::create([
                'student_id'  => $request->student_id,
                'fees_type'   => $request->fees_type,
                'fees_amount' => $request->fees_amount,
                'paid_date'   => $request->paid_date,
                'file'        => $fileName,
                'created_at'  => now(),
                'created_by'  => auth()->user()->id
            ]);

            DB::commit();

            Toastr::success('Has been added successfully!', 'Success');
            return back();

        } catch (\Throwable $e) {

            DB::rollBack();

            \Log::error('Save Error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());

            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id'  => 'required',
            'fees_type'   => 'required',
            'fees_amount' => 'required',
            'paid_date'   => 'required',
            'file'        => 'nullable|file|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $collection = FeesInformation::findOrFail($id);
            $oldFile = $collection->file;
            $fileName = $oldFile;

            // Handle new file upload
            if ($request->hasFile('file')) {

                // Delete old file if exists
                if ($oldFile && file_exists(public_path('uploads/collections/' . $oldFile))) {
                    unlink(public_path('uploads/collections/' . $oldFile));
                }

                $extension = $request->file('file')->extension();

                $fileName = sprintf(
                    'collection-%s-%s.%s',
                    uniqid(),
                    now()->format('d_m_Y'),
                    $extension
                );

                $request->file('file')->move(public_path('uploads/collections'), $fileName);
            }

            // Update record
            $collection->update([
                'student_id'  => $request->student_id,
                'fees_type'   => $request->fees_type,
                'fees_amount' => $request->fees_amount,
                'paid_date'   => $request->paid_date,
                'file'        => $fileName,
                'updated_at'  => now(),
                'updated_by'  => auth()->user()->id
            ]);

            DB::commit();

            Toastr::success('Updated successfully!', 'Success');
            return redirect()->route('collection.index');

        } catch (\Throwable $e) {

            DB::rollBack();

            \Log::error('Update Error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());

            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }

}
