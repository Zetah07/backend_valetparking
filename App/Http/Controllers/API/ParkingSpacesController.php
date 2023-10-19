<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParkingSpaces;

class ParkingSpacesController extends Controller
{
    public function get() {
        try {
            $parkingSpaces = ParkingSpaces::get();
                        return response()->json([
                                'message' => 'Success when getting parkingSpaces',
                                'data' => $parkingSpaces
                        ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error when getting parkingSpaces',
                'error' => $th->getMessage()
            ], 500);
        }
    }

        public function create (Request $request) {
            try{
                $parkingSpace['parkingSpaceNumber'] = $request['parkingSpaceNumber'];
                $parkingSpace['parkingSpaceStatus'] = $request['parkingSpaceStatus'];
                $parkingSpace = ParkingSpaces::create($parkingSpace);
                return response()->json([
                    'message' => 'Success when creating parkingSpace',
                    'data' => $parkingSpace
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Error when creating parkingSpace',
                    'error' => $th->getMessage()
                ], 500);
            }
    }

        public function getById($id) {
            try {
                $parkingSpace = ParkingSpaces::find($id);
                return response()->json([
                    'message' => 'Success when getting parkingSpace',
                    'data' => $parkingSpace
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Error when getting parkingSpace',
                    'error' => $th->getMessage()
                ], 500);
            }
        }

        public function update (Request $request, $id){
            try {
                $parkingSpace = ParkingSpaces::find($id);
                $parkingSpace['parkingSpaceNumber'] = $request['parkingSpaceNumber'];
                $parkingSpace['parkingSpaceStatus'] = $request['parkingSpaceStatus'];
                $parkingSpace->save();
                return response()->json([
                    'message' => 'Success when updating parkingSpace',
                    'data' => $parkingSpace
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Error when updating parkingSpace',
                    'error' => $th->getMessage()
                ], 500);
            }
        }

        public function delete($id) {
            try {
                $parkingSpace = ParkingSpaces::find($id);
                $parkingSpace->delete();
                return response()->json([
                    'message' => 'Success when deleting parkingSpace',
                    'data' => $parkingSpace
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Error when deleting parkingSpace',
                    'error' => $th->getMessage()
                ], 500);
            }
        }
}
