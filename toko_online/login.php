<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        customGreen: "#88D498",
                        customOrange: "#FF7043",
                        customPink: "#F06292",
                        customBlue: "#42A5F5"
                    },
                    fontFamily: {
                        'body': ['Nunito', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-r from-customBlue via-customGreen to-customPink min-h-screen flex items-center justify-center p-6">
    <!-- Container -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full max-w-md">

        <!-- Header -->
        <div class="bg-customOrange text-white text-center py-5">
            <h2 class="text-3xl font-bold">Login to Continue</h2>
        </div>

        <!-- Form Section -->
        <div class="p-6 space-y-6">
            <form action="proses_login.php" method="post" class="space-y-4">

                <!-- Username -->
                <div>
                    <label for="username" class="block text-gray-700 font-semibold mb-1">Username</label>
                    <input type="text" name="username" id="username" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-customGreen focus:outline-none transition duration-200" placeholder="Enter your username" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-1">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-customGreen focus:outline-none transition duration-200" placeholder="Enter your password" required>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="w-4 h-4 text-customGreen border-gray-300 rounded focus:ring-customGreen">
                    <label for="remember" class="ml-2 text-gray-600">Remember me</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="login" class="w-full bg-customBlue text-white py-3 rounded-lg hover:bg-customPink transition duration-300 ease-in-out transform hover:scale-105">
                    Login
                </button>
            </form>

            <!-- Links -->
            <div class="text-center">
                <p class="text-gray-600">Don’t have an account? <a href="tambah_pelanggan.php" class="text-customPink hover:underline">Sign up</a></p>
                
                <!-- Login as Staff Button -->
                <a href="login_petugas.php" class="inline-block mt-4 w-full text-center text-white bg-customBlue py-2 rounded-lg hover:bg-customOrange transition duration-300 ease-in-out transform hover:scale-105">
                    Login sebagai petugas
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-customGreen py-4">
            <p class="text-center text-white">Your trusted online store.</p>
        </div>
    </div>

    <!-- Optional Bootstrap JS (If needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
