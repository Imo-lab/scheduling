<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Valiation\Rule;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = employee::where('current_flag', true)
                             ->orderBy('nama')
                             ->paginate(10);
        return view('employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role =['Nasional','Regional',];
        sort($role);
        $jabatan = [
            'Agent RPA',
            'Helpdesk NON KAM',
            'Helpdesk Billing',
            'Helpdesk Indosat',
            'Helpdesk KAM Normal',
            'Helpdesk KAM Regional',
            'Helpdesk KAM Shift',
            'Helpdesk Onsite',
            'Koordinator',
            'LO',
            'Quality Assurance',
            'Quality Control',
            'SPV',
            'None',
            'Helpdesk Regional',
        ];
        sort($jabatan);
        $fungsi = [
            'Agent RPA',
            'Helpdesk NON KAM',
            'Helpdesk Adira',
            'Helpdesk APL',
            'Helpdesk Bank CIMB',
            'Helpdesk Bank Danamon',
            'Helpdesk Bank DBS',
            'Helpdesk Bank Mandiri',
            'Helpdesk Bank Mega',
            'Helpdesk Bank Muamalat',
            'Helpdesk Bank Panin',
            'Helpdesk Bank Permata',
            'Helpdesk Bank UOB',
            'Helpdesk BI',
            'Helpdesk Billing',
            'Helpdesk BNI',
            'Helpdesk BSI',
            'Helpdesk BTN',
            'Helpdesk Bukopin',
            'Helpdesk Citilink',
            'Helpdesk Fastfood',
            'Helpdesk Global Partner',
            'Helpdesk Indosat',
            'Helpdesk Kemhan',
            'Helpdesk Lion Air',
            'Helpdesk Maybank',
            'Helpdesk MTF',
            'Helpdesk Pegadaian',
            'Helpdesk Pelindo',
            'Helpdesk Sinarmas',
            'Helpdesk Surya Madistrindo',
            'KAM Regional',
            'FSC NORMAL',
            'FSC SHIFT',
            'RPAM NORMAL',
            'RPAM SHIFT',
            'RPS NORMAL',
            'RPS SHIFT',
            'PJ EMAIL KAM',
            'Koordinator',
            'LO',
            'Quality Assurance',
            'Quality Control',
            'SPV',
            'Helpdesk Bank Kalbar',
            'Helpdesk Bank NTT',
            'Helpdesk EJO',
            'Helpdesk Bank Papua',
            'Helpdesk Bank Kaltimtara',
            'Helpdesk Bank Nagari',
            'Helpdesk BPD Jatim',
            'Helpdesk BJB',
            'Helpdesk Bank Sumsel Babel',
            'Helpdesk NISP',
            'Helpdesk Bank Sulteng',
            'Helpdesk Bank Sumut',
            'Helpdesk BNO',
            'Helpdesk Bank Sulutgo',
            'Helpdesk Bank Sultra',
            'Helpdesk Bank NTB',
            'Helpdesk Makassar',
            'Helpdesk Bank Jambi',
            'Helpdesk Bank Maluku',
            'Helpdesk Bank Riau',
        ];
        sort($fungsi);

        return view('employee.create', compact('role','jabatan','fungsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data input
        $request->validate([
            'nik' => [
                'required',
                'string',
                'size:8',
                // Aturan ini sekarang didukung oleh indeks unik komposit ('nik', 'current_flag')
                // Validasi ini memastikan tidak ada NIK baru yang aktif (current_flag = 1) jika sudah ada.
                \Illuminate\Validation\Rule::unique('employee', 'nik')->where(function ($query) {
                    return $query->where('current_flag', 1);
                })
            ],
            'nama' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'fungsi' => 'required|string|max:255',
            'tanggal_mulai_efektif' => 'required|date',
        ]);

        // Logika transaksi tetap sama, karena database akan menangani keunikan
        // Jika ada duplikasi NIK dengan current_flag=1, DB akan menolak INSERT
        DB::transaction(function () use ($request) {
            employee::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'role' => $request->role,
                'jabatan' => $request->jabatan,
                'fungsi' => $request->fungsi,
                'tanggal_mulai_efektif' => $request->tanggal_mulai_efektif,
                'tanggal_akhir_efektif' => '9999-12-31',
                'current_flag' => true,
            ]);
        });

        return redirect()->route('employee.index')->with('success', 'Agen baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nik)
    {
        $role =['Nasional','Regional',];
        sort($role);
        $jabatan = [
            'Agent RPA',
            'Helpdesk NON KAM',
            'Helpdesk Billing',
            'Helpdesk Indosat',
            'Helpdesk KAM Normal',
            'Helpdesk KAM Regional',
            'Helpdesk KAM Shift',
            'Helpdesk Onsite',
            'Koordinator',
            'LO',
            'Quality Assurance',
            'Quality Control',
            'SPV',
            'None',
            'Helpdesk Regional',
        ];
        sort($jabatan);
        $fungsi = [
            'Agent RPA',
            'Helpdesk NON KAM',
            'Helpdesk Adira',
            'Helpdesk APL',
            'Helpdesk Bank CIMB',
            'Helpdesk Bank Danamon',
            'Helpdesk Bank DBS',
            'Helpdesk Bank Mandiri',
            'Helpdesk Bank Mega',
            'Helpdesk Bank Muamalat',
            'Helpdesk Bank Panin',
            'Helpdesk Bank Permata',
            'Helpdesk Bank UOB',
            'Helpdesk BI',
            'Helpdesk Billing',
            'Helpdesk BNI',
            'Helpdesk BSI',
            'Helpdesk BTN',
            'Helpdesk Bukopin',
            'Helpdesk Citilink',
            'Helpdesk Fastfood',
            'Helpdesk Global Partner',
            'Helpdesk Indosat',
            'Helpdesk Kemhan',
            'Helpdesk Lion Air',
            'Helpdesk Maybank',
            'Helpdesk MTF',
            'Helpdesk Pegadaian',
            'Helpdesk Pelindo',
            'Helpdesk Sinarmas',
            'Helpdesk Surya Madistrindo',
            'KAM Regional',
            'FSC NORMAL',
            'FSC SHIFT',
            'RPAM NORMAL',
            'RPAM SHIFT',
            'RPS NORMAL',
            'RPS SHIFT',
            'PJ EMAIL KAM',
            'Koordinator',
            'LO',
            'Quality Assurance',
            'Quality Control',
            'SPV',
            'Helpdesk Bank Kalbar',
            'Helpdesk Bank NTT',
            'Helpdesk EJO',
            'Helpdesk Bank Papua',
            'Helpdesk Bank Kaltimtara',
            'Helpdesk Bank Nagari',
            'Helpdesk BPD Jatim',
            'Helpdesk BJB',
            'Helpdesk Bank Sumsel Babel',
            'Helpdesk NISP',
            'Helpdesk Bank Sulteng',
            'Helpdesk Bank Sumut',
            'Helpdesk BNO',
            'Helpdesk Bank Sulutgo',
            'Helpdesk Bank Sultra',
            'Helpdesk Bank NTB',
            'Helpdesk Makassar',
            'Helpdesk Bank Jambi',
            'Helpdesk Bank Maluku',
            'Helpdesk Bank Riau',
        ];
        $employee = employee::where('nik', $nik)->where('current_flag',true)->firstOrFail();
        return view('employee.edit', compact('employee','role','jabatan','fungsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nik)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'fungsi' => 'required|string|max:255',
            'tanggal_mulai_efektif' => 'required|date',
        ]);

        $currentemployeeVersion = employee::where('nik', $nik)
                                    ->where('current_flag', true)
                                    ->firstOrFail();

        $isChanged = (
            $currentemployeeVersion->role != $request->role ||
            $currentemployeeVersion->jabatan != $request->jabatan ||
            $currentemployeeVersion->fungsi != $request->fungsi
        );

        DB::transaction(function () use ($request, $currentemployeeVersion, $isChanged) {
            if ($isChanged) {
                $currentemployeeVersion->update([
                    'tanggal_akhir_efektif' => \Carbon\Carbon::parse($request->tanggal_mulai_efektif)->subDay()->toDateString(),
                    'current_flag' => false,
                ]);

                employee::create([
                    'nik' => $currentemployeeVersion->nik,
                    'nama' => $request->nama,
                    'role' => $request->role,
                    'jabatan' => $request->jabatan,
                    'fungsi' => $request->fungsi,
                    'tanggal_mulai_efektif' => $request->tanggal_mulai_efektif,
                    'tanggal_akhir_efektif' => '9999-12-31',
                    'current_flag' => true,
                ]);
            } else {
                $currentemployeeVersion->update([
                    'nama' => $request->nama,
                ]);
            }
        });

        return redirect()->route('employee.index')->with('success', 'Data agen berhasil diperbarui!');

    }

    public function showHistory(string $nik)
    {
        $employeeHistory = employee::where('nik', $nik)
                             ->orderBy('tanggal_mulai_efektif')
                             ->get();

        if ($employeeHistory->isEmpty()) {
            abort(404);
        }

        return view('employee.history', compact('employeeHistory'));
    }

    public function deactivateAgent(Request $request, string $nik)
    {
        $request->validate([
            'tanggal_akhir_efektif' => 'required|date|before_or_equal:today',
        ]);

        DB::transaction(function () use ($request, $nik) {
            // Temukan record agen yang aktif saat ini
            $currentemployee = employee::where('nik', $nik)
                                  ->where('current_flag', true)
                                  ->firstOrFail();

            // Perbarui record aktif: set tanggal_akhir_efektif dan current_flag menjadi false
            $currentemployee->update([
                'tanggal_akhir_efektif' => $request->tanggal_akhir_efektif,
                'current_flag' => false,
            ]);
        });

        return redirect()->route('employee.index')->with('success', 'Agen ' . $nik . ' berhasil dinonaktifkan.');
    }
}
