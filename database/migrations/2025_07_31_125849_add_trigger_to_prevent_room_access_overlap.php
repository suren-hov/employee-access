<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        DB::unprepared("
            CREATE TRIGGER prevent_room_access_overlap
            BEFORE INSERT ON room_accesses
            FOR EACH ROW
            BEGIN
                IF EXISTS (
                    SELECT 1 FROM room_accesses
                    WHERE day_of_week = NEW.day_of_week
                      AND (
                        employee_id = NEW.employee_id OR room_id = NEW.room_id
                      )
                      AND (
                        NEW.start_time < end_time AND NEW.end_time > start_time
                      )
                ) THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Overlapping room access not allowed (DB-level)';
                END IF;
            END;
        ");
    }

    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS prevent_room_access_overlap;");
    }
};

