<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SaleRequest;
use App\Model\Product;
use App\Model\Sale;
use Illuminate\Http\Request;
use Mockery\Exception;

class SaleController extends BackendBaseController
{

    protected $base_route  = 'backend.sale';
    protected $view_path   = 'backend.sale';
    protected $panel       = 'Sale';
    protected  $page_title,$page_method;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->page_title = 'List';
        $this->page_method = 'index';
        $data['sold'] = Sale::all()->where('status', '=', 1);
        try{
            $data['rows'] = Sale::all();
            return view($this->loadDataToView($this->view_path.'.index'),compact('data'));
//            return view('backend.sale.index',compact('data'));
        }catch (Exception $e) {
            redirect()->route('home')->flash('exception', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->page_title = 'Create';
        $this->page_method = 'create';
        $data['rows'] = Product::pluck('name','id');
        return view($this->loadDataToView($this->view_path.'.create'),compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
//        dd($request->all());
        try{
            $request->request->add(['created_by' => auth()->user()->id]);
            $sale = Sale::create($request->all());
            if ($sale){
                return redirect()->route($this->base_route . '.index')->with('success',$this->panel . ' created successfully');

            } else {
                return back()->with('error', $this->panel . ' creation failed');
            }
        } catch(Exception $e){
            return redirect()->route($this->base_route . '.index')->with('exception',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->page_title = 'View';
        $this->page_method = 'show';
        $data['row'] = Sale::find($id);
        return view($this->loadDataToView($this->view_path.'.show'),compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->page_title = 'Edit';
        $this->page_method = 'edit';
        $data['row'] = Sale::find($id);
        $data['rows'] = Product::pluck('name','id');
        return view($this->loadDataToView($this->view_path.'.edit'),compact('data'));
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
        $data['row'] = Sale::find($id);
        $request->request->add(['updated_by' => auth()->user()->id]);
        $data['row']->update($request->all());
        return redirect()->route($this->base_route . '.index')->with('success',$this->panel . ' updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Sale::destroy($id);
            return redirect()->route($this->base_route . '.index')->with('success',$this->panel . ' deleted successfully');
        } catch (Exception $exception){
            return redirect()->route($this->base_route . '.index')->with('exception',$exception->getMessage());
        }

    }
/*
    public function print()
    {
        dd('test');
        $this->page_title = 'Print';
        $this->page_method = 'get';
            $data['row'] = Sale::all()->where('status', '=', 1)->get();
        return view($this->loadDataToView($this->view_path.'.print'),compact('data'));
    }
*/
}
