<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Keuangan;

class KartuIuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userRegion = $user->region()->get();
        $iuran = $user->keuangan()->get();

        return view('member.KartuIuran', compact('user', 'userRegion', 'iuran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $regid)
    {

        $this->validate($request, [
            'nama'      => 'required',
            'region'    => 'required',
            'jumlah'    => 'required | numeric',
            'kategori'  => 'required',
            // 'bukti'     => 'required'
        ]);

        $user = User::where('email', $request->email)->get();

        foreach ($user as $u) {
            $id    = $u->id;
        }

        $data = new Keuangan;
        $data->region_id = $regid; 
        $data->user_id   = $id;
        $data->nama      = $request->nama;
        $data->jumlah    = $request->jumlah;
        $data->status    = 'pending';
        $data->kategori  = $request->kategori;
        $data->email     = $request->email;
        $data->save();

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
