<x-layout>
    <x-slot:header>{{$headers}}</x-slot:header>
    <x-slot:title>{{$title}}</x-slot:title>
    <h3 class="text-xl">Ini adalah Halaman Home Page</h3>
    <h3 class="text-xl">WPU LARAVEL11 - 11. Eloquent Relationship</h3>
    <h3 class="text-xl">WPU LARAVEL11 - 12. Post Category</h3>
    - Membuat factory post berelasi dengan category table dan user <br>
    "php artisan tinker : App\Models\Post::factory(100)->recycle([App\Model\Category::factory(3)->create(),App\Models\User::factory(10)->create()])->create()"
    <h3 class="text-xl">WPU LARAVEL11 - 13. Database Seeder</h3>
    <p>- Laravel dapat melakukan seeding (Mengisi data didalam database), File DatabaseSeeder.php </p>
    <div>
        <p>$admin = User::create([
            'name' => 'Administrator',
            'username' => 'Admin',
            'email' => 'administrator@gmail.com',
            'nik' => '140303070048',
            'email_verified_at' => now(),
            'is_admin' => 'True',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
            ]);</p>
            <p>//DATABASE SEEDING </p>
            <p>Post::factory(100)->recycle([
                Category::factory(3)->create(),
                User::factory(5)->create()
                ])->create();
            </p>
        </div>
        <p>PS C:\laragon\www\wpularavel11> php artisan migrate:fresh --seed</p>
    <h3 class="text-xl">WPU LARAVEL11 - 14. N+1 </h3>
    <p>// Eager Loading Code di Post Models
        protected $with=['author','category'];</p>
    <h3 class="text-xl">WPU LARAVEL11 - 15. Redesign UI </h3>
    <article>
        - Install flowbite using NPM:
               npm install -D flowbite </br>
        - Tambahkan the view path and flowbite as a plugin inside tailwind.config.js :</br>   
               content: ["./node_modules/flowbite/**/*.js"]  </br>
               plugins: [require('flowbite/plugin')],  </br>
        - Import 'flowbite'; inside resources/js/app.js</br>
        - Tambahkan list ini di tailwind.config.js
            safelist: ["bg-red-100","bg-green-100","bg-yellow-100", "bg-blue-100"],

    </article>
    <h3 class="text-xl">WPU LARAVEL11 - 16. Searching </h3>
    
        - Form search ambil di : "https://flowbite.com/blocks/marketing/newsletter/"</br>
        
        - Tambahkan the view path and flowbite as a plugin inside tailwind.config.js :</br>   
               content: ["./node_modules/flowbite/**/*.js"]  </br>
               plugins: [require('flowbite/plugin')],  </br>
        - Import 'flowbite'; inside resources/js/app.js</br>
        - Tambahkan list ini di tailwind.config.js
            safelist: ["bg-red-100","bg-green-100","bg-yellow-100", "bg-blue-100"],

   
</x-layout>