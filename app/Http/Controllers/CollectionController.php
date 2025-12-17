<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Models\FeesType;
use App\Models\Collection;
use App\Models\Student;
 
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        $query = Collection::with([
                'bank:id,name',
                'student:id,name,phone'
            ])
            ->join('students', 'collections.student_id', 'students.id')
            ->select('collections.*', 'students.name' , 'students.phone')
            ->orderByDesc('collections.id');

        // Apply filters
        $query->when($request->id, fn($q) => $q->where('collections.id', $request->id));
        $query->when($request->student_id, fn($q) => $q->where('collections.student_id', $request->student_id));
        $query->when($request->bank_id, fn($q) => $q->where('collections.bank_id', $request->bank_id));
        $query->when($request->amount, fn($q) => $q->where('collections.fees_amount', $request->amount));
        // Paid date filters individually
        if ($request->paid_date_from) {
            $query->where('collections.paid_date', '>=',$request->paid_date_from );
        }

        if ($request->paid_date_to) {
            $query->where('collections.paid_date', '<=', $request->paid_date_to);
        }
        $collections = $query->get();
        $students = Student::select('id', 'name', 'phone')->get();
        $banks = Bank::select('id', 'name')->get();

        return view('backend.collections.index', compact('collections', 'students', 'banks'));
    }

    public function create()
    {
        $students    = Student::latest()->get();
        $feesType    = FeesType::all();
        $collection  = null;
        $banks = Bank::latest()
                ->pluck('name', 'id')
                ->toArray();
        return view('backend.collections.create',compact('students','feesType', 'collection', 'banks'));
    }
    
    public function edit(Request $request, $id)
    {
        $students    = Student::latest()->get();
        $feesType    = FeesType::all();
        $collection  = Collection::findOrFail($id);
        $banks = Bank::latest()
                ->pluck('name', 'id')
                ->toArray();
        return view('backend.collections.create',compact('students','feesType','collection', 'banks'));
    }
    
    public function show(Request $request, $id)
    {
        
        $feesType    = FeesType::all();
        $collection  = Collection::findOrFail($id);
        $student    = Student::findOrFail($collection->student_id);
        return view('backend.collections.show',compact('student','feesType','collection'));
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

            Collection::create([
                'student_id'  => $request->student_id,
                'fees_type'   => $request->fees_type,
                'fees_amount' => $request->fees_amount,
                'paid_date'   => $request->paid_date,
                'bank_id'     => $request->bank_id,
                'file'        => $fileName,
                'created_at'  => now(),
                'created_by'  => auth()->user()->id
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Updated successfully!');

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
        // return $request->all();
        $request->validate([
            'student_id'  => 'required',
            'fees_type'   => 'required',
            'fees_amount' => 'required',
            'paid_date'   => 'required',
            'file'        => 'nullable|file|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $collection = Collection::findOrFail($id);
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
                'bank_id'     => $request->bank_id,
                'file'        => $fileName,
                'updated_at'  => now(),
                'updated_by'  => auth()->user()->id
            ]);

            DB::commit();
            return redirect()->route('collection.index')->with('success', 'Updated successfully!');

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
