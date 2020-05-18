<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texto = '<h1><strong>Esta es una prueba de editor de texto enriquecido</strong></h1>

        <p><img alt="" src="http://localhost:8000/images/linux_1589674379.png" style="height:300px; width:300px" /></p>

        <p>otra imagen mas....</p>

        <p><img alt="" src="http://localhost:8000/images/0_1589674444.jpg" style="height:200px; width:200px" /></p>

        <p>&nbsp;</p>

        <table border="1" cellpadding="1" cellspacing="1" style="width:500px">
            <caption>Tabla de prueba</caption>
            <thead>
                <tr>
                    <th scope="col">Columna 1</th>
                    <th scope="col">Columna 2</th>
                    <th scope="col">Columna 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12345</td>
                    <td>12345</td>
                    <td>12345</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>

        <p>&nbsp;</p>';
        $editable="";
        $noeditable="readonly";
        return view('ckeditor', compact('texto', 'editable', 'noeditable'));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
