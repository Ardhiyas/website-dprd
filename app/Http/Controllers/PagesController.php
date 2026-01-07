<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\BadanAnggaran;
use App\Models\BadanKehormatan;
use App\Models\BadanMusyawarah;
use App\Models\badanpembentukan;
use App\Models\Fraksi;
use App\Models\Gallery;
use App\Models\Komisi;
use App\Models\pimpinan;
use App\Models\FraksiPkb;
use App\Models\FraksiGolkar;
use App\Models\FraksiPdip;
use App\Models\FraksiNasdem;
use App\Models\FraksiGerindra;
use App\Models\FraksiDemokrat;
use App\Models\fraksiPembangunan;
use App\Models\KomisiA;
use App\Models\KomisiB;
use App\Models\KomisiC;
use App\Models\KomisiD;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $fraksi = Fraksi::all();
        $about = \App\Models\About::first();
        $faqs = \App\Models\Faq::all();

        // Ambil logo dan deskripsi dari tabel spesifik masing-masing fraksi
        foreach ($fraksi as $item) {
            $slug = \Illuminate\Support\Str::slug($item->nama);
            if ($slug == 'fraksi-pembangunan-keadilan-sejahtera') {
                $slug = 'fraksi-pembangunan';
            }

            // Tentukan nama tabel berdasarkan slug
            // Contoh: fraksi-pkb -> fraksi_pkbs
            $tableName = \Illuminate\Support\Str::snake(\Illuminate\Support\Str::replace('-', '_', $slug)) . 's';

            // Kasus khusus untuk fraksi pembangunan yang menggunakan dash di nama tabel (dari model)
            if ($slug == 'fraksi-pembangunan') {
                $tableName = 'fraksi-pembangunans';
            }

            try {
                $details = \Illuminate\Support\Facades\DB::table($tableName)->first();
                if ($details) {
                    $item->logo = $details->logo;
                    $item->deskripsi = $details->deskripsi;
                    $item->folder = $slug;
                } else {
                    $item->folder = 'fraksi';
                }
            } catch (\Exception $e) {
                $item->folder = 'fraksi';
            }
        }

        return view('pages.dashboard', compact('fraksi', 'about', 'faqs'));
    }

    public function pimpinanDprd()
    {
        $data = pimpinan::all();
        return view('pages.pimpinan-dprd', compact('data'));
    }

    public function anggotaDprd()
    {
        $data = anggota::all();
        return view('pages.anggota-dprd', compact('data'));
    }

    public function komisi()
    {
        $data = Komisi::all();
        return view('pages.komisi', compact('data'));
    }

    public function komisiA()
    {
        $anggotas = KomisiA::all();
        $nama = 'Komisi A';
        $deskripsi = 'Bidang Pemerintahan dsb (Silakan sesuaikan di PagesController atau View)';
        $folder = 'komisi-a';
        return view('pages.komisi-detail', compact('anggotas', 'nama', 'deskripsi', 'folder'));
    }
    public function komisiB()
    {
        $anggotas = KomisiB::all();
        $nama = 'Komisi B';
        $deskripsi = 'Bidang Perekonomian dan Keuangan';
        $folder = 'komisi-b';
        return view('pages.komisi-detail', compact('anggotas', 'nama', 'deskripsi', 'folder'));
    }
    public function komisiC()
    {
        $anggotas = KomisiC::all();
        $nama = 'Komisi C';
        $deskripsi = 'Bidang Pembangunan';
        $folder = 'komisi-c';
        return view('pages.komisi-detail', compact('anggotas', 'nama', 'deskripsi', 'folder'));
    }
    public function komisiD()
    {
        $anggotas = KomisiD::all();
        $nama = 'Komisi D';
        $deskripsi = 'Bidang Kesejahteraan Rakyat';
        $folder = 'komisi-d';
        return view('pages.komisi-detail', compact('anggotas', 'nama', 'deskripsi', 'folder'));
    }

    // --- FRAKSI ---
    private function getFraksiBySlugOrName($slug, $name)
    {
        $fraksi = Fraksi::where('slug', $slug)->orWhere('nama', $name)->first();
        if (!$fraksi) {
            $fraksi = new Fraksi();
            $fraksi->nama = $name . ' (Data Belum Diinput)';
            $fraksi->deskripsi = "Silakan input data $name di halaman Admin > Master Data > Data Fraksi.";
        }
        return $fraksi;
    }

    public function fraksiPkb()
    {
        $fraksiData = FraksiPkb::all();
        $config = $fraksiData->first();
        return view('pages.fraksi-pkb', compact('config', 'fraksiData'));
    }
    public function fraksiGolkar()
    {
        $fraksiData = FraksiGolkar::all();
        $config = $fraksiData->first();
        return view('pages.fraksi-golkar', compact('config', 'fraksiData'));
    }
    public function fraksiPdip()
    {
        $fraksiData = FraksiPdip::all();
        $config = $fraksiData->first();
        return view('pages.fraksi-pdip', compact('config', 'fraksiData'));
    }
    public function fraksiNasdem()
    {
        $fraksiData = FraksiNasdem::all();
        $config = $fraksiData->first();
        return view('pages.fraksi-nasdem', compact('config', 'fraksiData'));
    }
    public function fraksiGerindra()
    {
        $fraksiData = FraksiGerindra::all();
        $config = $fraksiData->first();
        return view('pages.fraksi-gerindra', compact('config', 'fraksiData'));
    }
    public function fraksiDemokrat()
    {
        $fraksiData = FraksiDemokrat::all();
        $config = $fraksiData->first();
        return view('pages.fraksi-demokrat', compact('config', 'fraksiData'));
    }
    public function fraksiPembangunan()
    {
        $fraksiData = fraksiPembangunan::all();
        $config = $fraksiData->first();
        return view('pages.fraksi-pembangunan', compact('config', 'fraksiData'));
    }
    public function badanKehormatan()
    {
        $data = BadanKehormatan::all();
        return view('pages.badan-kehormatan', compact('data'));
    }
    public function badanAnggaran()
    {
        $data = BadanAnggaran::all();
        return view('pages.badan-anggaran', compact('data'));
    }
    public function badanMusyawarah()
    {
        $data = BadanMusyawarah::all();
        return view('pages.badan-musyawarah', compact('data'));
    }
    public function badanPembentukan()
    {
        $data = badanpembentukan::all();
        return view('pages.badan-pembentukan', compact('data'));
    }

    public function organisasi()
    {
        return view('pages.organisasi');
    }
    public function sakip()
    {
        return view('pages.sakip');
    }
    public function gallery()
    {
        // Ambil semua item gallery, diurutkan berdasarkan tanggal terbaru
        $galleryItems = Gallery::orderBy('created_at', 'desc')->get();

        // Kirimkan data ke view
        return view('pages.gallery', compact('galleryItems'));
    }

    public function showGalleryItem($slug)
    {
        $item = Gallery::where('slug', $slug)->firstOrFail();
        // Fetch related items: other gallery items excluding the current one
        $relatedItems = Gallery::where('id', '!=', $item->id)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        return view('pages.gallery-detail', compact('item', 'relatedItems'));
    }

    public function aspirasi()
    {
        return view('pages.aspirasi');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $data = $request->only(['name', 'email', 'subject', 'message']);

        // Kirim email
        try {
            \Illuminate\Support\Facades\Mail::to('ardhiyasss8@gmail.com')->send(new \App\Mail\ContactMail($data));
            return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim. Terima kasih!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Maaf, terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti. Error: ' . $e->getMessage());
        }
    }


}

