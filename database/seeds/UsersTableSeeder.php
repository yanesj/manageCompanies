<?php

use App\Helpers\CustomProgressBar;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		$this->command->info("Truncating users  Table");
		User::truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		$data = File::get('database/data/admins.json');
		$data = json_decode($data);
		$total = count((array) $data);
		$progress = new CustomProgressBar($this->command->getOutput()->createProgressBar($total));
		foreach ($data as $admins) {
			 $progress->setMessage("Guardando Administradores: " . $admins->name, 'status');
			 $admin =  User::create(['name'=>$admins->name,
				'email'=>$admins->email,
				'password'=>bcrypt($admins->password),
				'isadmin'=>1
			]);
			 $admin->save();
			 $progress->advance();
			//var_dump($countries);

		}
		$progress->finish();
		$this->command->info("\nFinished\n");
    }
}
