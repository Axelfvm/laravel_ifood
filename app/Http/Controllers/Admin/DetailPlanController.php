<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;
    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }
    public function index($idPlan){
        if(!$plan = $this->plan->where('id', $idPlan)->first()){
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index',[
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    public function create($idPlan){
        if(!$plan = $this->plan->where('id', $idPlan)->first()){
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create',[
            'plan' => $plan,
        ]);
    }

    public function store(Request $request, $idPlan){

        if(!$plan = $this->plan->where('id', $idPlan)->first()){
            return redirect()->back();
        }
$plan->details()->create($request->all());
        return redirect()->route('details.plan.index', $plan->id);
    }
}
