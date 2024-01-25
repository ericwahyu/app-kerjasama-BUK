<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Notification;
use App\Models\Type;
use App\Models\UserNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Type $type)
    {
        //
        $nav = 'dokumen';
        $menu = $type->id;
        $data = Document::where('type_id', $type->id)->get();
        // $notifikasi = Notification::join('user_notifications', 'notifications.id', '=', 'user_notifications.notification_id')->where('user_notifications.user_id', Auth::user()->id)->select('notifications.*')->latest()->get();
        // dd($notifikasi);

        return view('document.index', compact('nav', 'menu', 'type', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Type $type)
    {
        //
        $nav = 'dokumen';
        $menu = $type->id;
        return view('document.create', compact('nav', 'menu', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'instansi' => 'required',
            'tglAwal' => 'required',
            'tglAkhir' => 'required',
        ]);

        try {
            DB::transaction(function () use ($request) {
                if($request->tglAkhir > $request->tglAwal){
                    $document              = new Document();
                    $document->type_id     = $request->jenis_id;
                    $document->agency      = $request->instansi;
                    $document->number      = $request->nomor;
                    $document->title       = $request->judul;
                    $document->description = $request->keterangan;
                    $document->partner     = $request->mitra;
                    $document->activity    = $request->kegiatan;
                    if($request->tglAkhir > Carbon::now()->format('Y-m-d')){
                        $document->status = 1;
                    }else{
                        $document->status = 0;
                    }
                    $document->start_date = $request->tglAwal;
                    $document->end_date   = $request->tglAkhir;
                    $document->save();
                }else{
                    return back()->with('error', 'Gagal menambah data !!');
                }
            });
            DB::commit();

        } catch (\Throwable $th) {
            report($th);

            DB::rollBack();
            return redirect()->route('index.document', $request->jenis_id)->with('error', 'Gagal menambah data !!');
        }
        return redirect()->route('index.document', $request->jenis_id)->with('success', 'Berhasil menambah data !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
        $nav = 'dokumen';
        $menu = $document->type->id;

        $user_notifikasi = UserNotification::whereUserId(Auth::user()->id)->whereDocumentId($document->id)->get();

        if($user_notifikasi){
            foreach ($user_notifikasi as $userNotif){
                $userNotif->read_at = 1;
                $userNotif->save();
            }
        }

        return view('document.show', compact('nav', 'menu', 'document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
        $nav = 'dokumen';
        $menu = $document->type->id;
        return view('document.update', compact('nav', 'menu', 'document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
        // dd($document->type->id);
        $request->validate([
            'instansi' => 'required',
            'tglAwal' => 'required',
            'tglAkhir' => 'required',
        ]);

        try {
            DB::transaction(function () use ($request, $document) {
                if($request->tglAkhir > $request->tglAwal){
                    $document->agency      = $request->instansi;
                    $document->number      = $request->nomor;
                    $document->title       = $request->judul;
                    $document->description = $request->keterangan;
                    $document->partner     = $request->mitra;
                    $document->activity    = $request->kegiatan;
                    if($request->tglAkhir > Carbon::now()->format('Y-m-d')){
                        $document->status = 1;
                    }else{
                        $document->status = 0;
                    }
                    $document->start_date = $request->tglAwal;
                    $document->end_date   = $request->tglAkhir;
                    $document->save();
                }else{
                    return back()->with('error', 'Gagal menambah data !!');
                }
            });
            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->route('index.document', $document->type->id)->with('error', 'Gagal mengubah data !!');
        }
        return redirect()->route('index.document', $document->type->id)->with('success', 'Berhasil mengubah data !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
        $document->delete();
        return redirect()->route('index.document', $document->type->id)->with('success', 'Berhasil menghapus data !!');

    }

    public function filter(Request $request)
    {

        $menu = 'document';
        if($request->input('tahun') != null && $request->input('status') != null){
            $filter_document = Document::whereYear('created_at',$request->input('tahun'))->whereStatus($request->input('status'))->get();

        }else{
            $filter_document = Document::all();
        }

        return view('filter document.index', compact('menu', 'filter_document', 'request'));
    }
}
