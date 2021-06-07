<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCateggory($currentParent = 0, $id = '')
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        return $recusive->categoryRecusive($currentParent, $id);
    }

    public function create()
    {
        $htmlOption = $this->getCateggory();
        return view('category.add', compact('htmlOption'));
    }

    public function index()
    {
        $data = $this->category->latest()->paginate(5);
        return view('category.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::of($request->name)->slug('-')
        ]);

        return redirect()->route('categories');
    }


    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCateggory($category->parent_id, $category->id);
        return view('category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
//        update
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::of($request->name)->slug('-')
        ]);

        return redirect()->route('categories');
    }

    public function delete($id)
    {
        // nếu không soft delete thì xóa thẳng
        $this->category->find($id)->delete();
        return redirect()->route('categories');
    }
}
