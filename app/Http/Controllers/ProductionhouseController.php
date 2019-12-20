<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productionhouse;

class ProductionhouseController extends Controller
{
    public function index()
    {
        $contents = [
            'productions' => Productionhouse::all(),
        ];


        $pagecontent = view('productions.index',$contents ); 

        // masterpage
        $pagemain = array(
            'title' => 'Production',
            'menu' => 'master',
            'submenu' => 'productions',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
    
        $contents = [
            'productions' => Productionhouse::all(),
        ];

      $pagecontent = view('productions.create',$contents);
  
      // masterpage
      $pagemain = array(
        'title' => 'Production',
        'menu' => 'master',
        'submenu' => 'productions',
        'pagecontent' => $pagecontent
    );
  
      return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
        ]);

        $saveProduct = new Productionhouse;
        $saveProduct->name = $request->name;
        $saveProduct->save();
        // return $saveProduct;
        return redirect('productions')->with('status_success','Created productions house');
    }

    public function update_page(Productionhouse $production)
    {
        // return $production;
        $contents = [
            'productions' => Productionhouse::find($production->idproductionhouse),
        ];

        // return $contents;


        $pagecontent = view('productions.update',$contents);
  
        // masterpage
        $pagemain = array(
          'title' => 'Production',
          'menu' => 'master',
          'submenu' => 'productions',
          'pagecontent' => $pagecontent
      );
    
        return view('masterpage', $pagemain);
    }

    public function save_update(Request $request, Productionhouse $production)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
        ]);

        $saveProduct = Productionhouse::find($production->idproductionhouse);
        $saveProduct->name = $request->name;
        $saveProduct->save();
        // return $saveProduct;
        return redirect('productions')->with('status_success','Updated productions house');
    }

    public function delete(Productionhouse $production)
    {
        $deleteProduct = Productionhouse::find($production->idproductionhouse);
      //   return $deleteCategories;
      $deleteProduct->delete();
      return redirect('productions')->with('status_success','Deleted productions house');
  
    }
}
