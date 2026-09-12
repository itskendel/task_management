<?php

namespace Database\Seeders;

use App\Models\Priority;
use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $statuses = [
            ['name' => 'In Progress', 'desc' => ''],
            ['name' => 'Planning', 'desc' => ''],
            ['name' => 'On Hold', 'desc' => ''],
            ['name' => 'Completed', 'desc' => ''],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }

        $priorities = [
            ['name' => 'High', 'desc' => ''],
            ['name' => 'Medium', 'desc' => ''],
            ['name' => 'Low', 'desc' => ''],
        ];

        foreach ($priorities as $priority) {
            Priority::create($priority);
        }

        $status_ids = Status::pluck('id', 'name');
        $priority_ids = Priority::pluck('id', 'name');

        $tasks = [
            [
                'client_name' => 'Acme Corporation',
                'project_name' => 'Corporate Website Redesign',
                'desc' => 'Redesign and modernize the company\'s corporate website.',
                'status_id' => $status_ids['In Progress'],
                'priority_id' => $priority_ids['High'],
                'start_date' => '2026-06-01',
                'due_date' => '2026-07-15',
            ],
            [
                'client_name' => 'GreenLeaf Cafe',
                'project_name' => 'Online Ordering System',
                'desc' => 'Develop an online ordering platform for customers.',
                'status_id' => $status_ids['Planning'],
                'priority_id' => $priority_ids['Medium'],
                'start_date' => '2026-06-10',
                'due_date' => '2026-08-01',
            ],
            [
                'client_name' => 'Bright Realty',
                'project_name' => 'Property Listing Portal',
                'desc' => 'Build a portal for managing property listings.',
                'status_id' => $status_ids['On Hold'],
                'priority_id' => $priority_ids['Medium'],
                'start_date' => '2026-05-15',
                'due_date' => '2026-07-30',
            ],
            [
                'client_name' => 'Nova Fitness',
                'project_name' => 'Mobile App MVP',
                'desc' => 'Develop the first version of the fitness tracking app.',
                'status_id' => $status_ids['In Progress'],
                'priority_id' => $priority_ids['High'],
                'start_date' => '2026-06-05',
                'due_date' => '2026-08-20',
            ],
            [
                'client_name' => 'Blue Ocean Travel',
                'project_name' => 'Booking Platform Enhancement',
                'desc' => 'Improve search and booking functionalities.',
                'status_id' => $status_ids['Completed'],
                'priority_id' => $priority_ids['Medium'],
                'start_date' => '2026-04-01',
                'due_date' => '2026-05-30',
            ],
            [
                'client_name' => 'TechVision Solutions',
                'project_name' => 'CRM Dashboard',
                'desc' => 'Develop an internal CRM dashboard.',
                'status_id' => $status_ids['Planning'],
                'priority_id' => $priority_ids['High'],
                'start_date' => '2026-06-15',
                'due_date' => '2026-08-15',
            ],
            [
                'client_name' => 'Urban Living',
                'project_name' => 'Property Management System',
                'desc' => 'Create a platform for managing rental properties.',
                'status_id' => $status_ids['In Progress'],
                'priority_id' => $priority_ids['Medium'],
                'start_date' => '2026-05-20',
                'due_date' => '2026-08-10',
            ],
            [
                'client_name' => 'Elite Events',
                'project_name' => 'Event Registration Portal',
                'desc' => 'Develop a registration and ticketing portal.',
                'status_id' => $status_ids['Planning'],
                'priority_id' => $priority_ids['Low'],
                'start_date' => '2026-06-20',
                'due_date' => '2026-09-01',
            ],
            [
                'client_name' => 'HealthFirst Clinic',
                'project_name' => 'Patient Appointment System',
                'desc' => 'Build an appointment scheduling application.',
                'status_id' => $status_ids['Completed'],
                'priority_id' => $priority_ids['High'],
                'start_date' => '2026-03-01',
                'due_date' => '2026-05-01',
            ],
            [
                'client_name' => 'MarketPro',
                'project_name' => 'Marketing Campaign Dashboard',
                'desc' => 'Track and manage digital marketing campaigns.',
                'status_id' => $status_ids['In Progress'],
                'priority_id' => $priority_ids['Medium'],
                'start_date' => '2026-06-01',
                'due_date' => '2026-07-31',
            ],
            [
                'client_name' => 'Sunrise Education',
                'project_name' => 'Learning Management Portal',
                'desc' => 'Develop a portal for students and instructors.',
                'status_id' => $status_ids['Planning'],
                'priority_id' => $priority_ids['High'],
                'start_date' => '2026-07-01',
                'due_date' => '2026-09-30',
            ],
            [
                'client_name' => 'FreshFarm',
                'project_name' => 'Inventory Management System',
                'desc' => 'Track inventory across multiple locations.',
                'status_id' => $status_ids['On Hold'],
                'priority_id' => $priority_ids['Low'],
                'start_date' => '2026-05-01',
                'due_date' => '2026-08-01',
            ],
        ];

        foreach ($tasks as $task) {
            Project::create($task);
        }
    }
}
