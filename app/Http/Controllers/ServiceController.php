<?php

    namespace App\Http\Controllers;

    use App\Models\Service;
    use Illuminate\Http\Request;

    class ServiceController extends Controller
    {
        public function index()
        {
            $services = Service::all(); // Haal alle diensten op (je moet een Service-model hebben)

            return response()->json($services, 200);
        }
    }
