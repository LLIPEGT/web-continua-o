<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Eixo;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Curso::all();

        return view('curso.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eixos = Eixo::all();
        $curso = new Curso();

        return view('curso.create', compact('eixos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso();

        if(isset($curso)){
            $curso->nome = $request->nome;
            $curso->abreviatura = $request->abreviatura;
            $curso->duracao = $request->duracao;
            $curso->eixo_id = $request->eixo_id;
            if(isset($curso->eixo_id)){
                $curso->save();
                return redirect()->route('curso.index');
            }
        }
        return "ERROR";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);

        if(isset($curso)){
            return view('curso.show', compact('curso'));
        }

        return 'ERROR';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eixos = Eixo::all();
        $curso = Curso::find($id);

        if(isset($curso)){
            return view('curso.edit', compact('curso', 'eixos'));
        }

        return 'ERROR';
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
        $curso = Curso::find($id);

        if(isset($curso)){
            $curso->nome = $request->nome;
            $curso->abreviatura = $request->abreviatura;
            $curso->duracao = $request->duracao;
            $curso->eixo_id = $request->eixo_id;;
            $curso->save();
            return redirect()->route('curso.index');
        }
        return "ERROR";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Curso::destroy($id)){
            return redirect()->route('curso.index');
        }
        return 'ERROR';
    }
}
