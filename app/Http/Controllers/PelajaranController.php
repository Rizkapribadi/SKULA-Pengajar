<?php
namespace App\Http\Controllers;
use App\Http\Requests\RequestRule;
use Illuminate\Http\Request;
use App\Http\Requests\RequestReplace;
use App\Materi;
use App\Pelajaran;
use Storage;

class PelajaranController extends Controller
{
	public function index()
	{
		$pelajarans = Pelajaran::orderBy('created_date', 'desc')->paginate(6);
		return view('pelajaran.index', compact('pelajarans'));
	}
	
	public function show($pelajaran_id)
	{ 
		$pelajaran = Pelajaran::findOrFail($pelajaran_id); 
		$materis = Materi::where('pelajaran_id',$pelajaran_id)->orderBy('order', 'asc')->get();
		$materily = Materi::where('pelajaran_id',$pelajaran_id)->orderBy('order', 'asc')->paginate(6);
		return view('pelajaran.show', compact('materis','materily','pelajaran'));		   
	}

	public function create()
	{
		return view('pelajaran.create');
	}


	 public function createMateri($pelajaran_id)
	 {
	  
	 	$pelajarans = Pelajaran::where('_id',$pelajaran_id)->get();
	 	return view('pelajaran.createMateri', compact('pelajarans'));
	}
	
	public function store(RequestRule $request)
	{
		$gambar= $request->file('gambar')->store('gambar');
		Pelajaran::create([
			'name' => request('name'),
			'gambar' => $gambar
		]);		
		return redirect()->route('pelajaran.index')->with('success', 'Pelajaran berhasil ditambahkan');
	}
	
	public function edit($id)
	{
		$pelajaran= Pelajaran::find($id); 
		return view('pelajaran.edit', compact('pelajaran'));
	}
	
	public function update(RequestReplace $request, $id)
	{
		$pelajaran= Pelajaran::find($id);
		if(empty($request->file('gambar')))
		{
			$gambar = $pelajaran->gambar;
		} 
		else
		{
			$gambar = $request->file('gambar')->store('gambar');
			$luvre = $pelajaran->gambar;
			Storage::delete($luvre);
		}
		
		$pelajaran->update([
			'name' => request('name'),
			'gambar' => $gambar
		]);	
		return redirect()->route('pelajaran.index')->with('info', 'Pelajaran berhasil diubah');
	}
}
