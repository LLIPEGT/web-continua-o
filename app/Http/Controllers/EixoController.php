<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use App\Models\Curso;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use PhpParser\Node\Stmt\Foreach_;

class EixoController extends Controller
{

    private $regras = [
        'name' => 'required|max:50|min:3|unique:eixos',
        'description' => 'required|max:300|min:10',
    ];

    private $msgs = [   "required" => "O preenchimento do campo [:attribute] é obrigatório!",
                        "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
                        "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
                        "unique" => "Já existe um endereço cadastrado com esse [:attribute]!"
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Eixo::with('curso')->get();
        return view('eixo.index', compact(['data']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eixo = new Eixo();
        return view('eixo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->regras, $this->msgs);

        $eixo = new Eixo();
        if(isset($eixo)){
            $eixo->name = mb_strtoupper($request->name, 'UTF-8');
            $eixo->description = mb_strtoupper($request->description, 'UTF-8');
            $eixo->save();
            return redirect()->route('eixo.index');
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
        $eixo = Eixo::find($id);

        if(isset($eixo)){
            return view('eixo.show', compact('eixo'));
        }

        return "<h1>ERRO</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eixo = Eixo::find($id);
        if(isset($eixo)){
            return view('eixo.edit', compact('eixo'));
        }

        return '<h1>ERRO<h1>';
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
        $eixo  =Eixo::find($id);

        if(isset($eixo)){
            $eixo->name = $request->name;
            $eixo->description = $request->description;
            $eixo->save();
            return redirect()->route('eixo.index');

        }
        return 'ERROR';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Eixo::destroy($id)){
            return redirect()->route('eixo.index');
        }
        return "ERRO";
    }

    public function report($id)
    {
        $cursos = Curso::where('eixo_id', $id)->get();
        // Instancia um Objeto da Classe Dompdf
        $dompdf = new Dompdf();

        // Carrega o HTML
        $dompdf->loadHtml(view('eixo.report', compact('cursos'))->render());
        // (Opcional) Configura o Tamanho e Orientação da Página
        $dompdf->setPaper('A4', 'landscape');
        // Converte o HTML em PDF
        $dompdf->render();
        // Serializa o PDF para Navegador
        $dompdf->stream("relatorio-horas-turma.pdf", array("Attachment" => false));

    }

    public function graph()
    {

        $eixos = Eixo::with('curso')->orderby('name')->get();



        $data = [
            ["EIXO ", "NUMERO DE CUROSO"],
        ];

        $cont = 1;
        Foreach($eixos as $item){
            $data[$cont] = [
                $item->name, count($item->curso)
            ];
            $cont++;
        };

        $data = json_encode($data);

        /*$data = json_encode([
            ["NOME", "TOTAL DE HORAS"],
            ["MARIA", 150],
            ["CARLOS", 90],
            ["JOÃO", 232],
            ["ANA", 197],
            ]);*/

        //dd($data);

            return view('eixo.graph', compact('data'));
    }
}


