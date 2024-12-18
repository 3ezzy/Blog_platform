<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="flex">
        <div class="w-64 bg-blue-900 text-white h-screen shadow-lg">
            <div class="p-6 text-2xl font-bold tracking-wide">Admin Panel</div>
            <ul class="mt-12 space-y-6">
                <li><a href="#" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Dashboard</a></li>
                <li><a href="#" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Users</a></li>
                <li><a href="#" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Articles</a></li>
                <li><a href="#" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Orders</a></li>
                <li><a href="#" class="block py-3 px-6 text-lg hover:bg-blue-700 transition duration-200">Settings</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div class="text-3xl font-semibold text-gray-800">Dashboard</div>
                <div class="flex items-center space-x-6">
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition duration-200">Log out</button>
                    
                </div>
            </div>

            <!-- Stats Section -->
            <div class="grid grid-cols-3 gap-8 mb-8">
                <div class="bg-white shadow-xl p-8 rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-700">Total Users</h3>
                    <p class="text-4xl text-blue-600">1200</p>
                </div>
                <div class="bg-white shadow-xl p-8 rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-700">Total Articles</h3>
                    <p class="text-4xl text-green-600">300</p>
                </div>
                <div class="bg-white shadow-xl p-8 rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-700">Total Admins</h3>
                    <p class="text-4xl text-orange-600">450</p>
                </div>
            </div>

            <!-- Latest Articles Table -->
            <div class="bg-white shadow-xl rounded-lg p-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Latest Articles</h3>
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-4 px-6 text-left text-gray-600">Article ID</th>
                            <th class="py-4 px-6 text-left text-gray-600">Title</th>
                            <th class="py-4 px-6 text-left text-gray-600">Author</th>
                            <th class="py-4 px-6 text-left text-gray-600">Status</th>
                            <th class="py-4 px-6 text-left text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 px-6">#001</td>
                            <td class="py-3 px-6">Understanding Tailwind CSS</td>
                            <td class="py-3 px-6">John Doe</td>
                            <td class="py-3 px-6 text-green-600">Published</td>
                            <td class="py-3 px-6">
                                <button class="bg-yellow-500 text-white px-6 py-2 rounded-full mr-3 hover:bg-yellow-400 transition duration-200">Edit</button>
                                <button class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-400 transition duration-200">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-6">#002</td>
                            <td class="py-3 px-6">The Future of Web Development</td>
                            <td class="py-3 px-6">Jane Smith</td>
                            <td class="py-3 px-6 text-yellow-600">Draft</td>
                            <td class="py-3 px-6">
                                <button class="bg-yellow-500 text-white px-6 py-2 rounded-full mr-3 hover:bg-yellow-400 transition duration-200">Edit</button>
                                <button class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-400 transition duration-200">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-6">#003</td>
                            <td class="py-3 px-6">How to Manage Users in Your App</td>
                            <td class="py-3 px-6">Alice Johnson</td>
                            <td class="py-3 px-6 text-red-600">Archived</td>
                            <td class="py-3 px-6">
                                <button class="bg-yellow-500 text-white px-6 py-2 rounded-full mr-3 hover:bg-yellow-400 transition duration-200">Edit</button>
                                <button class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-400 transition duration-200">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>
