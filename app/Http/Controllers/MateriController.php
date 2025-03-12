<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\RequestStore;
use App\Http\Requests\RequestImport;
use App\Materi;
use App\Pelajaran;
use Storage;

class MateriController extends Controller
{

	public function index()
	{
		$pelajarans = Pelajaran::all();
		$materis = Materi::orderBy('order', 'asc')->paginate(6);
		return view('materi.index', compact('materis', 'pelajarans'));
	}
	
	public function detail(Materi $materi)
	{
		$pelajarans = Pelajaran::all();
		return view('materi.detail', compact('materi','pelajarans'));
	}
	
	public function store(RequestStore $request)
	{
		$published = Input::has('published') ? true : false;
		$materi = new Materi();
		$materi->title = $request['title'];
		$materi->content = $request['content'];
		$materi->pelajaran_id = $request['pelajaran_id'];
		$materi->order = $request['order'];
		$materi->pengajar = $request['pengajar'];
		$materi->published=$published;
		$materi->save();
		return redirect()->route('materi.detail',['materi'=>$materi->id])->withsuccess('Materi berhasil ditambahkan');
	}
	
	public function edit(Materi $materi)
	{
		$pelajarans = Pelajaran::all();
		return view('materi.edit', compact('materi', 'pelajarans'));
	}
	
	public function update(Materi $materi)
	{
		$published = $materi->published;
		$materi->update([
			'title' => request('title'),
			'pelajaran_id' => request('pelajaran_id'),
			'content' => request('content'),
			'order' => request('order'),
			'pengajar' => request('pengajar'),
			'published' => $published
		]);
		return redirect()->route('materi.detail',['materi'=>$materi->id])->withinfo('Materi berhasil diubah');
	}
	
	public function check(Materi $materi)
	{
		$published = Input::has('published') ? true : false;
		$materi->update([
			'title' => request('title'),
			'pelajaran_id' => request('pelajaran_id'),
			'content' => request('content'),
			'order' => request('order'),
			'pengajar'=>request('pengajar'),
			'published' => $published
		]);
		return redirect()->route('materi.detail',['materi'=>$materi->id])->withwarning('Penandaan Materi berhasil diubah');
	}

	public function destroy(Materi $materi)
	{
		$materi->delete();
		return redirect()->route('trash')->withwarning('Materi berhasil di-archive');
	}
	
	public function trash()
	{
		$pelajarans = Pelajaran::all();
		$materis = Materi::onlyTrashed()->latest()->paginate(6);
		return view('trash', compact('materis','pelajarans'));
	}
	
	public function restore($id)
	{
		Materi::withTrashed()->find($id)->restore();
		return redirect()->route('trash')->withsuccess('Materi berhasil dipulihkan dari penghapusan');
	}
	
	public function forceDelete($id)
	{
		Materi::withTrashed()->find($id)->forcedelete();
		return redirect()->route('trash')->withdanger('Materi berhasil dihapus');
	}
	
	public function search(Request $request)
	{
		
		$search = $request->get('q');
		$result = Materi::where('title', 'LIKE', '%'. $search . '%')->orwhere('content', 'LIKE', '%'. $search . '%')->orderBy('order', 'asc')->get();
		return view('result', compact('search', 'result'));
	}

	
	public function updateAll(Request $request)
	{
		$materis = Materi::all();
		foreach ($materis as $materi) {
			$id = $materi->_id;
			foreach ($request->materis as $materisNew) {
				if ($materisNew['_id'] == $id) {
					$materi->update(['order' => $materisNew['order']]);
				}
			}
		}
		return response('Update Successful.', 200);
	}

	public function export()
	{
		$materis = Materi::all();
		date_default_timezone_set('Asia/Jakarta');
		return (new FastExcel(Materi::all()))->download('skula_'.date('d_M_Y-h-i-s-A').'.ods');
	}
	
	public function actionPage()
	{
		return view('action-page');
	}

	public function import(RequestImport $request)
	{
		$fileName  =  $request->file('dok')->store('document');
		$materis = (new FastExcel)->import('manager/'.$fileName, function ($line) {
			return Materi::create([
				'_id' => $line['_id'],
				'title' => $line['title'],
				'content' => $line['content'],
				'order' => $line['order'],
				'pelajaran_id' => $line['pelajaran_id'],
				'created_at' =>  $line['created_at'],
				'updated_at' =>  $line['updated_at'],
			]);
		});
		Storage::delete($fileName);
		return redirect()->route('action-page')->withsuccess('Materi berhasil import ke database');
	}
}