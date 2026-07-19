<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Accounting & Financial Services', 'description' => 'Accountants, auditors, tax consultants, and financial advisors.', 'icon' => 'fas fa-calculator', 'is_active' => true],
            ['name' => 'Agriculture & Farming', 'description' => 'Farms, agro-processing, livestock, and agricultural supplies.', 'icon' => 'fas fa-tractor', 'is_active' => true],
            ['name' => 'Automotive & Mechanics', 'description' => 'Car repairs, auto parts, dealerships, and vehicle services.', 'icon' => 'fas fa-car', 'is_active' => true],
            ['name' => 'Beauty & Personal Care', 'description' => 'Salons, spas, barbershops, makeup artists, and nail techs.', 'icon' => 'fas fa-cut', 'is_active' => true],
            ['name' => 'Building & Construction', 'description' => 'Contractors, architects, builders, and construction supplies.', 'icon' => 'fas fa-hard-hat', 'is_active' => true],
            ['name' => 'Cleaning & Sanitation', 'description' => 'Cleaning services, fumigation, laundry, and waste management.', 'icon' => 'fas fa-broom', 'is_active' => true],
            ['name' => 'Clothing & Fashion', 'description' => 'Tailors, fashion designers, boutiques, and shoe makers.', 'icon' => 'fas fa-tshirt', 'is_active' => true],
            ['name' => 'Computers & IT', 'description' => 'Computer repairs, software development, IT consulting, and tech support.', 'icon' => 'fas fa-laptop', 'is_active' => true],
            ['name' => 'Education & Training', 'description' => 'Schools, tutoring centers, training institutes, and vocational training.', 'icon' => 'fas fa-graduation-cap', 'is_active' => true],
            ['name' => 'Electrical & Electronics', 'description' => 'Electricians, electronics repairs, and electrical supplies.', 'icon' => 'fas fa-bolt', 'is_active' => true],
            ['name' => 'Entertainment & Recreation', 'description' => 'Cinemas, event centers, gaming cafes, and recreational parks.', 'icon' => 'fas fa-film', 'is_active' => true],
            ['name' => 'Fashion & Tailoring', 'description' => 'Custom tailoring, fashion design, bridal wear, and fabric stores.', 'icon' => 'fas fa-tshirt', 'is_active' => true],
            ['name' => 'Food & Beverages', 'description' => 'Restaurants, fast food, cafes, bakeries, catering services, and beverage stores.', 'icon' => 'fas fa-utensils', 'is_active' => true],
            ['name' => 'Furniture & Home Decor', 'description' => 'Furniture makers, interior decorators, and home furnishing stores.', 'icon' => 'fas fa-couch', 'is_active' => true],
            ['name' => 'Health & Medical', 'description' => 'Hospitals, clinics, pharmacies, doctors, dentists, and opticians.', 'icon' => 'fas fa-heartbeat', 'is_active' => true],
            ['name' => 'Home Services', 'description' => 'Plumbers, painters, carpenters, handymen, and home repairs.', 'icon' => 'fas fa-tools', 'is_active' => true],
            ['name' => 'Hotels & Accommodation', 'description' => 'Hotels, lodges, guest houses, shortlets, and hostels.', 'icon' => 'fas fa-hotel', 'is_active' => true],
            ['name' => 'Legal Services', 'description' => 'Lawyers, solicitors, legal advisors, and notaries.', 'icon' => 'fas fa-gavel', 'is_active' => true],
            ['name' => 'Logistics & Transportation', 'description' => 'Delivery services, courier, haulage, moving services, and transport.', 'icon' => 'fas fa-truck', 'is_active' => true],
            ['name' => 'Marketing & Advertising', 'description' => 'Digital marketing, branding, PR, and advertising agencies.', 'icon' => 'fas fa-bullhorn', 'is_active' => true],
            ['name' => 'Media & Photography', 'description' => 'Photographers, videographers, graphic designers, and content creators.', 'icon' => 'fas fa-camera', 'is_active' => true],
            ['name' => 'Mobile Phones & Accessories', 'description' => 'Phone repairs, accessories, and mobile device sales.', 'icon' => 'fas fa-mobile-alt', 'is_active' => true],
            ['name' => 'Painting & Decoration', 'description' => 'Painters, interior decorators, wallpaper installers, and painting supplies.', 'icon' => 'fas fa-paint-roller', 'is_active' => true],
            ['name' => 'Pet Services', 'description' => 'Pet grooming, veterinary services, pet stores, and animal care.', 'icon' => 'fas fa-paw', 'is_active' => true],
            ['name' => 'Photography & Videography', 'description' => 'Event photography, portrait studios, videography, and photo editing.', 'icon' => 'fas fa-camera-retro', 'is_active' => true],
            ['name' => 'Printing & Stationery', 'description' => 'Printing presses, photocopy centers, stationery stores, and branding materials.', 'icon' => 'fas fa-print', 'is_active' => true],
            ['name' => 'Real Estate', 'description' => 'Property agents, estate agents, property management, and real estate developers.', 'icon' => 'fas fa-building', 'is_active' => true],
            ['name' => 'Religious Organizations', 'description' => 'Churches, mosques, ministry outfits, and religious supply stores.', 'icon' => 'fas fa-church', 'is_active' => true],
            ['name' => 'Security Services', 'description' => 'Security guards, surveillance, alarm systems, and security consulting.', 'icon' => 'fas fa-shield-alt', 'is_active' => true],
            ['name' => 'Sports & Fitness', 'description' => 'Gyms, sports clubs, fitness trainers, and sports equipment stores.', 'icon' => 'fas fa-dumbbell', 'is_active' => true],
            ['name' => 'Supermarkets & Groceries', 'description' => 'Supermarkets, grocery stores, convenience stores, and wholesale supplies.', 'icon' => 'fas fa-shopping-cart', 'is_active' => true],
            ['name' => 'Telecommunications', 'description' => 'Mobile network providers, internet services, and telecommunication equipment.', 'icon' => 'fas fa-satellite-dish', 'is_active' => true],
            ['name' => 'Travel & Tourism', 'description' => 'Travel agencies, tour operators, flight booking, and travel consulting.', 'icon' => 'fas fa-plane', 'is_active' => true],
            ['name' => 'Wedding & Event Planning', 'description' => 'Event planners, wedding planners, MCs, DJs, and event decorators.', 'icon' => 'fas fa-ring', 'is_active' => true],
            ['name' => 'Others', 'description' => 'Other businesses not listed in any category above.', 'icon' => 'fas fa-ellipsis-h', 'is_active' => true],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
