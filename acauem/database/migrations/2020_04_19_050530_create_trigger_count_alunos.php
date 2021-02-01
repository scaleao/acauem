<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggerCountAlunos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER tgr_countAlunos_Insert AFTER INSERT
            ON turma_alunos
            FOR EACH ROW
            UPDATE turmas
            SET quantidade = quantidade + 1
            WHERE id = NEW.turma_id;

            CREATE TRIGGER tgr_countAlunos_Delete AFTER DELETE
            ON turma_alunos
            FOR EACH ROW
            UPDATE turmas
            SET quantidade = quantidade - 1
            WHERE id = OLD.turma_id;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("
            DROP TRIGGER tgr_countAlunos_Insert;
            DROP TRIGGER tgr_countAlunos_Delete;
        ");
    }
}
