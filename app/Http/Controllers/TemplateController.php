<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\TemplateDetail;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
  public function index()
  {
    $template = Template::get();
    $template_detail = TemplateDetail::get();

    return view('template.index', [
      'template' => $template,
      'template_detail' => $template_detail
    ]);
  }
  public function create()
  {
    return view('template.create');
  }
  public function store(Request $request)
  {
    $template = new Template;
    $template->nama = $request->nama;
    $template->input = $request->input;
    $template->save();

    return redirect()->route('template');
  }
  public function edit($id)
  {
    $template = Template::find($id);

    return view('template.edit', ['template' => $template]);
  }
  public function update(Request $request, $id)
  {
    $template = Template::find($id);
    $template->nama = $request->nama;
    $template->input = $request->input;
    $template->save();

    return redirect()->route('template');
  }
  public function delete(Request $request)
  {
    $template = Template::find($request->id);
    $template->delete();

    return redirect()->route('template');
  }

  // detail
  public function indexDetail()
  {
    $template_detail = TemplateDetail::get();

    return view('template.indexDetail', ['template_detail' => $template_detail]);
  }
  public function createDetail()
  {
    $template = Template::get();

    return view('template.createDetail', ['template' => $template]);
  }
  public function storeDetail(Request $request)
  {
    $template_detail = new TemplateDetail;
    $template_detail->nama = $request->nama;
    $template_detail->template_id = $request->template_id;
    $template_detail->harga = $request->harga;
    $template_detail->save();

    return redirect()->route('template_detail');
  }
  public function editDetail($id)
  {
    $template = Template::get();
    $template_detail = TemplateDetail::find($id);

    return view('template.editDetail', [
      'template' => $template,
      'template_detail' => $template_detail
    ]);
  }
  public function updateDetail(Request $request, $id)
  {
    $template_detail = TemplateDetail::find($id);
    $template_detail->nama = $request->nama;
    $template_detail->template_id = $request->template_id;
    $template_detail->harga = $request->harga;
    $template_detail->save();

    return redirect()->route('template_detail');
  }
  public function deleteDetail(Request $request)
  {
    $template_detail = TemplateDetail::find($request->id);
    $template_detail->delete();

    return redirect()->route('template_detail');
  }
}
