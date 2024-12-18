<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../../assets/css/output.css">
</head>
<body>
<div class="flex min-h-screen bg-gray-50">
  <!-- Sidebar -->
  <div class="w-64 bg-indigo-600 text-white">
    <!-- Logo Section -->
    <div class="flex items-center h-16 px-4">
      <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
      </svg>
      <span class="ml-2 text-xl font-bold">Dashboard</span>
    </div>

    <!-- Navigation Menu -->
    <nav class="mt-8 px-4 space-y-2">
      <a href="#" class="flex items-center px-4 py-2.5 bg-indigo-700 rounded-lg text-white group">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="ml-3">Dashboard</span>
      </a>

      <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors group">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <span class="ml-3">Users</span>
      </a>

      <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors group">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        <span class="ml-3">Analytics</span>
      </a>

      <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors group">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
        </svg>
        <span class="ml-3">Documents</span>
      </a>
    </nav>

    <!-- Teams Section -->
    <div class="mt-8 px-4">
      <h3 class="px-4 text-xs font-semibold text-indigo-200 uppercase tracking-wider">Teams</h3>
      <div class="mt-4 space-y-2">
        <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors">
          <span class="w-8 h-8 rounded-lg bg-indigo-800 flex items-center justify-center text-sm font-medium">D</span>
          <span class="ml-3">Design Team</span>
        </a>
        <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors">
          <span class="w-8 h-8 rounded-lg bg-indigo-800 flex items-center justify-center text-sm font-medium">E</span>
          <span class="ml-3">Engineering</span>
        </a>
        <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors">
          <span class="w-8 h-8 rounded-lg bg-indigo-800 flex items-center justify-center text-sm font-medium">M</span>
          <span class="ml-3">Marketing</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="flex-1">
    <!-- Top Navigation -->
    <div class="bg-white shadow">
      <div class="px-8 h-16 flex items-center justify-between">
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </span>
          <input type="text" placeholder="Search..." class="w-64 pl-10 pr-4 h-10 bg-gray-50 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>
        
        <div class="flex items-center space-x-4">
          <button class="p-2 text-gray-400 hover:text-gray-500">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button>
          <div class="flex items-center">
            <img src="/api/placeholder/32/32" alt="Profile" class="w-8 h-8 rounded-full">
            <span class="ml-3 font-medium text-gray-700">John Doe</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Content -->
    <div class="p-8">
      <div class=" mx-auto bg-white rounded-xl shadow-sm">
        <div class="px-8 py-6 border-b border-gray-200">
          <h2 class="text-xl font-semibold text-gray-900">Personal Information</h2>
          <p class="mt-1 text-sm text-gray-500">Update your personal information and profile photo.</p>
        </div>
        
        <div class="px-8 py-6">
          <form class="space-y-6">
            <!-- Profile Photo -->
            <div class="flex items-center space-x-6">
              <div class="shrink-0">
                <img src="" alt="Profile photo" class="h-24 w-24 rounded-full object-cover ring-4 ring-gray-100">
              </div>
              <label class="block">
                <span class="sr-only">Choose profile photo</span>
                <input type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100"/>
              </label>
            </div>

            <!-- Form Grid -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                <input type="text" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                <input type="text" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
              <input type="email" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
              <input type="tel" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div class="border-t border-gray-200 pt-6">
              <div class="flex justify-end">
                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 mr-3">
                  Cancel
                </button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Save Changes
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>