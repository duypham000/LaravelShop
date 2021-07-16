<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function index()
    {
        $data = $this->menu->latest()->paginate(5);
        return view('menu.index', compact('data'));
    }

    public function create()
    {
        $htmlOption = $this->getMenu();
        return view('menu.add', compact('htmlOption'));
    }

    public function getMenu($currentParent = 0, $id = '')
    {
        $data = $this->menu->all();
        $recusive = new Recusive($data);
        return $recusive->categoryRecusive($currentParent, $id);
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);

        return redirect()->route('menus');
    }

    public function delete($id)
    {
        $this->menu->find($id)->delete();
        return redirect()->route('menus');
    }

    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $htmlOption = $this->getMenu($menu->parent_id, $id);
        return view('menu.edit', compact('menu', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect()->route('menus');
    }

}
