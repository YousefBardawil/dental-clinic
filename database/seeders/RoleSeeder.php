<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //PERMISSIONS - Client AUTH
         Permission::create(['name' => 'Create-Role', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Role', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Role', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Role', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Admin', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Admin', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Admin', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Admin', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-permission', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-permission', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-permission', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-permission', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Client', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Client', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Client', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Client', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-City', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-City', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-City', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-City', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Room', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Room', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Room', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Room', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Appointment', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Appointment', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Appointment', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Appointment', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Service', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Service', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Service', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Service', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-OpeningHour', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-OpeningHour', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-OpeningHour', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-OpeningHour', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Dentist', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Dentist', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Dentist', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Dentist', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-MedicalHistory', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-MedicalHistory', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-MedicalHistory', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-MedicalHistory', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Review', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Review', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Review', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Review', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-ContactUs', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-ContactUs', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-ContactUs', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-ContactUs', 'guard_name' => 'client', 'created_at' => now(), 'updated_at' => now()]);



         //PERMISSIONS - dentist AUTH
         Permission::create(['name' => 'Create-Role', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Role', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Role', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Role', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Admin', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Admin', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Admin', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Admin', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-permission', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-permission', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-permission', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-permission', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Client', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Client', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Client', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Client', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-City', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-City', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-City', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-City', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Room', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Room', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Room', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Room', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Appointment', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Appointment', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Appointment', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Appointment', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Service', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Service', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Service', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Service', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-OpeningHour', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-OpeningHour', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-OpeningHour', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-OpeningHour', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Dentist', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Dentist', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Dentist', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Dentist', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-MedicalHistory', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-MedicalHistory', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-MedicalHistory', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-MedicalHistory', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Review', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Review', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Review', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Review', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-ContactUs', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-ContactUs', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-ContactUs', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-ContactUs', 'guard_name' => 'dentist', 'created_at' => now(), 'updated_at' => now()]);



         //PERMISSIONS - admin AUTH
         Permission::create(['name' => 'Create-Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Dentist', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Dentist', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Dentist', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Dentist', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Room', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Room', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Room', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Room', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Appointment', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Appointment', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Appointment', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Appointment', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Service', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Service', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Service', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Service', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-OpeningHour', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-OpeningHour', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-OpeningHour', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-OpeningHour', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Client', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Client', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Client', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Client', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-MedicalHistory', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-MedicalHistory', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-MedicalHistory', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-MedicalHistory', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-Review', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-Review', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-Review', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-Review', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

         Permission::create(['name' => 'Create-ContactUs', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Index-ContactUs', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Edit-ContactUs', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
         Permission::create(['name' => 'Delete-ContactUs', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);


    }
}
