<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // STATIC VALUE FOR OFFICE TABLE
        $offices = [
            ['name' => 'Office of the Mayor'],
            ['name' => 'Office of the City Administrator'],
            ['name' => 'Office of the Secretary of the Mayor'],
            ['name' => 'Internal Audit Services'],
            ['name' => 'Barangay Secretariat'],
            ['name' => 'General Services Office'],
            ['name' => 'City Legal Department'],
            ['name' => 'City Development and Planning Department'],
            ['name' => 'Human Resource and Management Office'],
            ['name' => 'City Accounting Department'],
            ['name' => 'City Budget Department'],
            ['name' => 'City Assessors Office'],
            ['name' => 'Business Permit and Licensing Office'],
            ['name' => 'City Auditors Office'],
            ['name' => 'City Treasurers Office'],
            ['name' => 'DPSTM'],
            ['name' => 'City Enviromental Management Office'],
            ['name' => 'Public Information Office'],
            ['name' => 'City Engineers Office'],
            ['name' => 'Office of City Building Official'],
            ['name' => 'City Legal Officer'],
            ['name' => 'Cultural Affairs and Tourism Office'],
            ['name' => 'Community Relations Office'],
            ['name' => 'Oversight Commitee for Brgy. Affairs'],
            ['name' => 'City Veterinarian'],
            ['name' => 'Parks Administration Services'],
            ['name' => 'Civil Registrar'],
            ['name' => 'Information Technology Development Office'],
            ['name' => 'Caloocan City Public Library'],
            ['name' => 'Caloocan Health Department'],
            ['name' => 'Caloocan City Medical Center'],
            ['name' => 'CCDRRMO'],
            ['name' => 'Office of the Senior Citizens Affairs'],
            ['name' => 'Peoples Law Enforcement Board'],
            ['name' => 'Sports Development Services'],
            ['name' => 'Labor and Industrial Relations Office'],
            ['name' => 'Social Welfare Department'],
            ['name' => 'Urban Poor Affairs Office']
        ];

        foreach($offices as $office) {
            Office::create($office);
        }
    }
}
