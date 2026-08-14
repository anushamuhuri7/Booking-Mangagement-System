<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WebPage;

class WebpageController extends Controller
{
    public function index()
    {
        $data = WebPage::all();
        return view('AdminDashboard.WebPage.index', compact('data'));
    }

    public function add()
    {
        return view('AdminDashboard.WebPage.addEdit');
    }

    public function save(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string',
            'page_slug' => 'required|string',
            'page_content' => 'required',
            'page_status' => 'required',
        ]);

        WebPage::create([
            'name' => $request->page_name,
            'slug' => $request->page_slug,
            'html' => $request->page_content,
            'status' => $request->page_status,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('webpage.my')->with('success', 'Page created successfully.');
    }

    public function edit($id)
    {
        $data = WebPage::findOrFail($id);
        return view('AdminDashboard.WebPage.addEdit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'page_name' => 'required|string',
            'page_slug' => 'required|string',
            'page_content' => 'required',
            'page_status' => 'required',
        ]);

        $page = WebPage::findOrFail($id);
        $page->update([
            'name' => $request->page_name,
            'slug' => $request->page_slug,
            'html' => $request->page_content,
            'status' => $request->page_status,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('webpage.my')->with('success', 'Page updated successfully.');
    }

    public function viewDelete($id)
    {
        return view('AdminDashboard.WebPage.delete');
    }

    public function delete($id)
    {
        WebPage::findOrFail($id)->delete();
        return redirect()->route('webpage.my')->with('success', 'Page deleted successfully.');
    }

    public function landing()
    {
        $pages = WebPage::all();
        return view('index', compact('pages'));
    }

    public function viewPage($page)
    {
        $pages = WebPage::all();
        $data = WebPage::where('slug', $page)->first();
        return view('dynamic', compact('pages', 'data'));
    }
}
