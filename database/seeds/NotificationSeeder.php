<?php

    use App\Category;
    use App\Notification;
    use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warning = Category::where('slug','warnings')->first();
        $success = Category::where('slug','success')->first();
        $error = Category::where('slug','errors')->first();

        $notification1 = new Notification();
        $notification1->title = 'Warning notification';
        $notification1->description = 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...';
        $notification1->save();
        $notification1->categories()->attach($warning);

        $notification2 = new Notification();
        $notification2->title = 'Success notification';
        $notification2->description = 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...';
        $notification2->save();
        $notification2->categories()->attach($success);

        $notification3 = new Notification();
        $notification3->title = 'Error notification';
        $notification3->description = 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...';
        $notification3->save();
        $notification3->categories()->attach($error);

        $notification4 = new Notification();
        $notification4->title = 'Unknown notification';
        $notification4->description = 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...';
        $notification4->save();
        $notification4->categories()->attach($error);
        $notification4->categories()->attach($warning);
    }
}
