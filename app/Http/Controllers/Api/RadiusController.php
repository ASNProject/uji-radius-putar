<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Radius;
use App\Http\Resources\RadiusResource;

class RadiusController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index()
    {
        // get all radius
        $radius = Radius::latest()->paginate(10);

        return new RadiusResource(true, 'List of all radius', $radius);
    }

    /**
     * store
     * 
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $radius = Radius::create([
            'mode' => $request->mode,
            'calcMode' => $request->calcMode,
            'radius' => $request->radius,
            'result' => $request->result,
        ]);
        return new RadiusResource(true, 'Radius created successfully', $radius);
    }

    public function latest()
    {
        $data = Radius::latest()->first();
        return new RadiusResource(true, 'Latest radius', $data);
    }

    public function getChartData()
    {
        $data = Radius::select('radius', 'created_at')->get();

        $chartData = $data->map(function ($item) {
            return [
                'timestamp' => $item->created_at->toDateTimeString(),
                'radius' => $item->radius,
            ];
        });

        return new RadiusResource(true, 'Chart data', $chartData);
    }
}
