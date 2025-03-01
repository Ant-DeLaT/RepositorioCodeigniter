<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenameUsersTable extends Migration
{
  public function up()
  {
    $this->db->query('RENAME TABLE users TO userbase');
  }

  public function down()
  {
    $this->db->query('RENAME TABLE userbase TO users');
  }
}
