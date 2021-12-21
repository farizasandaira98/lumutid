<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Author;
use Hash;
use Auth;
use Route;
use Validator;
use Session;

class AuthorController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author.author');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post()
    {
        $post = Post::all();
        return view('author.author_post')
        ->with(compact('post'));
    }

    public function posttambah()
  {
      return view('author.author_posttambah');
  }

  public function poststore(Request $request)
  {
      $this->validate($request,[
          'title' => 'required',
          'content' => 'required',
          'date' => 'required',
      ]);

      Post::create([
          'title' => $request->title,
          'content' => $request->content,
          'date' => $request->date,
      ]);

      return redirect('author/post')->with('msg', 'Data Telah Tersimpan');
  }

  public function postedit($id)
  {
      $post = Post::where('id',$id)->first();
      return view('author.author_postedit', ['post' => $post]);
  }


  public function postupdate(Request $request, $id)
  {
      $this->validate($request,[
        'title' => 'required',
        'content' => 'required',
        'date' => 'required',
      ]);

      $post = Post::where('id', $id)->first();

      $post->id = $request->id;
      $post->title = $request->title;
      $post->content = $request->content;
      $post->date = $request->date;
      $post->save();

      return redirect('author/post')->with('msg', 'Data Telah Teredit');
  }

  public function postdestroy($id)
  {
      $post = Post::where('id', $id)->first();
      $post->delete();
      return redirect('author/post')->with('msg', 'Data Telah Terhapus');
  }

  public function showFormRegister()
    {
        return view('auth.author.author_register');
    }

    public function register(Request $request)
    {
        $rules = [
            'username'              => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];

        $messages = [
            'username.required'         => 'Username wajib diisi',
            'username.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new Author;
        $user->username = ucwords(strtolower($request->username));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $simpan = $user->save();

        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('admin.login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('admin.register');
        }
    }

}
