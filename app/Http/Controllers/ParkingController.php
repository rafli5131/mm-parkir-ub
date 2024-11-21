<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    static function store(Request $request)
    {
        $request->validate([
            'student_card' => 'required',
            'parking_lot_id' => 'required',
        ]);

        $activeEntry = DB::table('parking_entries')
            ->where('student_card', $request->student_card)
            ->whereNull('exit_time')
            ->first();

        if ($activeEntry) {
            DB::table('parking_entries')
                ->where('id', $activeEntry->id)
                ->update(['exit_time' => now(), 'status' => 0]);

            return response()->json(['message' => 'Sucsess Tap Out'], 200);
        } else {
            $parkingLot = DB::table('parking_lots')
                ->where('id', $request->parking_lot_id)
                ->first();

            if ($parkingLot && $parkingLot->capacity > $parkingLot->current_capacity) {
                $student = DB::table('students')
                    ->where('student_card', $request->student_card)
                    ->first();

                if (!$student) {
                    return response()->json(['message' => 'Student card not found'], 400);
                }

                DB::table('parking_entries')->insert([
                    'student_card' => $request->student_card,
                    'parking_lot_id' => $request->parking_lot_id,
                    'entry_time' => now(),
                ]);

                return response()->json(['message' => 'Sucsess Tap In'], 200);
            } else {
                return response()->json(['message' => 'No parking quota available'], 400);
            }
        }
    }
}
