<?php
require './../../utils/db.php';
require './../../guards/authGuard.php';

if(!isAuth('client')){
  header('Location: ./../auth/login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="./../../assets/css/output.css">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen pb-12">
    <div class="max-w-3xl mx-auto px-4 mt-12">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header Banner -->
            <div class="h-32 bg-gradient-to-r from-blue-500 to-purple-600"></div>
            
            <div class="px-8 pb-8">
                <!-- Profile Picture Section -->
                <div class="relative -mt-16 mb-8">
                    <div class="relative inline-block">
                        <img src="/api/placeholder/150/150" alt="Profile picture" 
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                        <label class="absolute bottom-2 right-2 bg-white p-2 rounded-full shadow-lg cursor-pointer 
                            hover:bg-gray-50 transition-colors duration-200 group">
                            <input type="file" class="hidden" accept="image/*">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </label>
                    </div>
                </div>

                <!-- Form Section -->
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="fullName" value="John Doe" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white">
                        </div>

                        <!-- Email -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" value="john.doe@example.com" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white">
                        </div>

                        <!-- Phone -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="tel" name="phone" value="+1 (555) 123-4567" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white">
                        </div>

                        <!-- Location -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" name="location" value="San Francisco, CA" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white">
                        </div>
                    </div>

                    <!-- Bio -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" rows="4" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                        >I love building great software and contributing to open source projects.</textarea>
                    </div>

                    <!-- Social Links -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                            <input type="url" name="linkedin" placeholder="https://linkedin.com/in/username" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white">
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Twitter Handle</label>
                            <input type="text" name="twitter" placeholder="@username" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4 pt-6">
                        <button type="button" 
                            class="px-6 py-3 rounded-lg text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 transition-all duration-200">
                            Cancel
                        </button>
                        <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-md hover:shadow-lg">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>