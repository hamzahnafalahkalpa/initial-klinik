<?php

namespace Projects\Klinik\Commands;

use Hanafalah\LaravelSupport\Concerns\Support\HasRequestData;
use Hanafalah\ModulePatient\Contracts\Data\PatientData;

class InstallMakeCommand extends EnvironmentCommand
{
    use HasRequestData;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'klinik:install';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used for initial installation of this module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // for ($i=0; $i < 1000; $i++) { 
        //     request()->merge([
        //         "id" => null,
        //         "card_identity" => [
        //             "old_mr" => null,
        //             "ihs_number" => null,
        //             "bpjs" => null
        //         ],
        //         "patient_type_id" => "01k0f1zgx0ag7wvcepv8ykgsqn", //GET AUTOLIST - PATIENT TYPE LIST
        //         "profile" => null,
        //         "payer_id" => null, //GET AUTOLIST - PAYER LIST
        //         'reference_type' => 'People',
        //         "reference" => [
        //             "first_name" => "yos darso 2",
        //             "last_name" => "afero",
        //             "email" => "yos@mail.com",
        //             "country_id" => 2,
        //             "phone_1" => "081255555555",
        //             "phone_2" => "081266666666",
        //             "father_name" => "Father Rando",
        //             "blood_type" => "O", //nullable, in =>A,B,AB,O,A-,B-,AB-,O-,A+,B+,AB+,O+
        //             "pob" => "Bandung City",
        //             "dob" => "1990-05-03",
        //             "sex" => "Male",
        //             "last_education_id" => "01k0f1zghcc0tfwkk02e0fycs0", //nullable, GET FROM AUTOLIST - EDUCATION LIST
        //             "marital_status_id" => "01k0f1zgfwgxf0xmh85gj9yeae", //nullable, GET FROM AUTOLIST - MARITAL STATUS LIST
        //             "family_relationship" => [
        //                 "id" => null,
        //                 "family_role_id" => "01k0f1zgjw6zfr94bwnzwdaexb", //require, GET FROM AUTOLIST - FAMILY ROLES LIST
        //                 "name" => "Toni Junior",
        //                 "phone" => "121215241521"
        //             ],
        //             "address" => [
        //                 "ktp" => [
        //                     "name" => "Jl.Kepatihan Gg.Warung Bata No.24",
        //                     "rt" => "012",
        //                     "rw" => "008",
        //                     "zip_code" => "45117",
        //                     "province_id" => 1,
        //                     "district_id" => 1,
        //                     "subdistrict_id" => 1,
        //                     "village_id" => 1
        //                 ],
        //                 "residence" => [
        //                     "name" => "Jl.Kepatihan Gg.Warung Bata No.24",
        //                     "rt" => "012",
        //                     "rw" => "008",
        //                     "zip_code" => "45117",
        //                     "province_id" => 1,
        //                     "district_id" => 1,
        //                     "subdistrict_id" => 1,
        //                     "village_id" => 1,
        //                     "same_as_ktp" => true
        //                 ]
        //             ],
        //             "card_identity" => [
        //                 "nik" => null,
        //                 "sim" => null,
        //                 "passport" => "13214231423143241",
        //                 "kk" => null
        //             ]
        //         ]
        //     ]);
        //     app(config('app.contracts.Patient'))->prepareStorePatient(
        //         $this->requestDTO(PatientData::class)
        //     );
        // }
        
        $provider = 'Projects\Klinik\KlinikServiceProvider';

        $this->comment('Installing Module...');
        $this->callSilent('vendor:publish', [
            '--provider' => $provider,
            '--tag'      => 'config'
        ]);
        $this->info('✔️  Created config/klinik.php');

        $this->callSilent('vendor:publish', [
            '--provider' => $provider,
            '--tag'      => 'migrations'
        ]);
        $this->info('✔️  Created migrations');

        $this->comment('projects/klinik installed successfully.');
    }
}
