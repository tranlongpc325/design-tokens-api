<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('theme_tokens')->truncate();
        
        DB::table('theme_tokens')->insert([
            [
                'theme_name' => 'light',
                'is_active' => true,
                'tokens' => json_encode([
                    '--brand-primary' => '#2563EB',
                    '--surface-main' => '#F1F5F9',
                    '--surface-card' => '#FFFFFF',
                    '--text-title' => '#0F172A',
                    '--text-body' => '#64748B',
                    '--status-success-bg' => '#DCFCE7',
                    '--status-success-text' => '#166534',
                    '--status-warning-bg' => '#FEF3C7',
                    '--status-warning-text' => '#78350F',
                    '--sidebar-bg' => '#1E3A8A',
                    '--sidebar-text-inactive' => '#CBD5E1',
                    '--sidebar-text-active' => '#FFFFFF',
                    '--sidebar-item-active-bg' => '#1E40AF'               
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'theme_name' => 'dark',
                'is_active' => false,
                'tokens' => json_encode([
                    '--brand-primary' => '#3B82F6',
                    '--surface-main' => '#0F172A',
                    '--surface-card' => '#1E293B',
                    '--text-title' => '#F8FAFC',
                    '--text-body' => '#94A3B8',
                    '--status-success-bg' => '#064E3B',
                    '--status-success-text' => '#4ADE80',
                    '--status-warning-bg' => '#78350F',
                    '--status-warning-text' => '#FBBF24',
                    '--sidebar-bg' => '#0F172A',
                    '--sidebar-text-inactive' => '#94A3B8',
                    '--sidebar-text-active' => '#FFFFFF',
                    '--sidebar-item-active-bg' => '#1E293B'               
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
