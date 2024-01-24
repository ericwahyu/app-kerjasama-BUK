<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menu = 'partner';
        // $data = Partner::withTrashed()->get();
        $data = Partner::all();

        return view('partner.index', compact('menu', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $menu = 'partner';
        $countries = Country::all();

        return view('partner.create', compact('menu', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'instansi' => 'required',
            'alamat'   => 'required',
            'negara'   => 'required',
            'phone'    => 'required|numeric',
            'website'  => 'required'
        ]);

        $country =  Country::findOrFail($request->negara);

        $phone = intval($request->phone);
        $phone = "{$phone}";

        if ($phone[0] == '6' && $phone[1] == '2') $phone = substr($phone, 2);
        $phone = intval($phone);


        DB::transaction(function () use ($request, $country, $phone){
            $partner              = new Partner();
            $partner->agency_name = $request->instansi;
            $partner->address     = $request->alamat;
            $partner->country     = $country->name;
            $partner->phone       = $phone;
            $partner->website     = $request->website;
            $partner->save();
        });
        DB::commit();
        try {
        } catch (\Throwable $th) {
            report($th);

            DB::rollBack();
            return redirect()->route('index.partner')->with('error', 'Gagal menambah data !!');
        }
        return redirect()->route('index.partner')->with('success', 'Berhasil menambah data !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
        $menu = 'partner';
        $countries = Country::all();

        return view('partner.update', compact('menu', 'countries', 'partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        //
        $request->validate([
            'instansi' => 'required',
            'alamat'   => 'required',
            'negara'   => 'required',
            'phone'    => 'required|numeric',
            'website'  => 'required'
        ]);

        $country =  Country::whereId($request->negara)->orWhere('name', $request->negara)->first();

        $phone = intval($request->phone);
        $phone = "{$phone}";

        if ($phone[0] == '6' && $phone[1] == '2') $phone = substr($phone, 2);
        $phone = intval($phone);


        DB::transaction(function () use ($request, $country, $phone, $partner){
            $partner->agency_name = $request->instansi;
            $partner->address     = $request->alamat;
            $partner->country     = $country->name;
            $partner->phone       = $phone;
            $partner->website     = $request->website;
            $partner->save();
        });
        DB::commit();
        try {
        } catch (\Throwable $th) {
            report($th);

            DB::rollBack();
            return redirect()->route('index.partner')->with('error', 'Gagal menambah data !!');
        }
        return redirect()->route('index.partner')->with('success', 'Berhasil menambah data !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        //
        $partner->delete();
        return redirect()->route('index.partner')->with('success', 'Berhasil Menghapus data !!');

    }
}
