<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parking_entries', function (Blueprint $table) {
            $table->id();
            $table->foreign('student_card')->references('student_card')->on('students')->onDelete('cascade');
            $table->foreignId('parking_lot_id')->constrained()->onDelete('cascade');
            $table->dateTime('entry_time');
            $table->dateTime('exit_time')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });


    DB::unprepared('
        CREATE TRIGGER increment_parking_lot_capacity AFTER INSERT ON parking_entries
        FOR EACH ROW
        BEGIN
        UPDATE parking_lots
        SET current_capacity = current_capacity + 1
        WHERE id = NEW.parking_lot_id;
        END
    ');

    DB::unprepared('
        CREATE TRIGGER decrement_parking_lot_capacity AFTER UPDATE ON parking_entries
        FOR EACH ROW
        BEGIN
        IF NEW.exit_time IS NOT NULL THEN
            UPDATE parking_lots
            SET current_capacity = current_capacity - 1
            WHERE id = NEW.parking_lot_id;
        END IF;
        END
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_entries');
    }
};
