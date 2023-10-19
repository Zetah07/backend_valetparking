<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicles;

class VehiclesController extends Controller
{
    public function get() {
        try {
            $vehicles = Vehicles::get();
						return response()->json([
								'message' => 'Success when getting vehicles',
								'data' => $vehicles
						], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error when getting vehicles',
                'error' => $th->getMessage()
            ], 500);
        }
    }

		public function create (Request $request) {
			try {
				$vehicle['driverName'] = $request['driverName'];
				$vehicle['licensePlate'] = $request['licensePlate'];
				$vehicle['entryTime'] = $request['entryTime'];
				$vehicle['exitTime'] = $request['exitTime'];
				$vehicle = Vehicles::create($vehicle);
				return response()->json([
					'message' => 'Success when creating vehicle',
					'data' => $vehicle
				], 200);
			} catch (\Throwable $th) {
				return response()->json([
					'message' => 'Error when creating vehicle',
					'error' => $th->getMessage()
				], 500);
			}
		}

		public function getById($id) {
			try {
				$vehicle = Vehicles::find($id);
				return response()->json([
					'message' => 'Success when getting vehicle',
					'data' => $vehicle
				], 200);
			} catch (\Throwable $th) {
				return response()->json([
					'message' => 'Error when getting vehicle',
					'error' => $th->getMessage()
				], 500);
			}
		}

		public function update (Request $request, $id){
			try{
				$vehicle['driverName'] = $request['driverName'];
				$vehicle['licensePlate'] = $request['licensePlate'];
				$vehicle['entryTime'] = $request['entryTime'];
				$vehicle['exitTime'] = $request['exitTime'];
				Vehicles::find($id)->update($vehicle);
				return response()->json([
					'message' => 'Success when updating vehicle',
					'data' => $vehicle
				], 200);
			}catch(\Throwable $th){
				return response()->json([
					'message' => 'Error when updating vehicle',
					'error' => $th->getMessage()
				], 500);
			}
		}

		public function delete($id){
			try{
				Vehicles::find($id)->delete();
				return response()->json([
					'message' => 'Success when deleting vehicle'
				], 200);
			}catch(\Throwable $th){
				return response()->json([
					'message' => 'Error when deleting vehicle',
					'error' => $th->getMessage()
				], 500);
			}
		}
}
