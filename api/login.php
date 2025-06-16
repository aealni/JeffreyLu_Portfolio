<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body class="h-screen" style="background: radial-gradient(circle, #dae0eb, #F0FFFF);">
    <div id="signUpForm" class="container bg-[#F5F5DC] w-[500px] p-8 mx-auto my-12 rounded-xl shadow-2xl border border-gray-300">
        <h1 class="form-title text-center font-bold py-4 mb-2 text-4xl">Register</h1>
        <form method="post" action="register.php" class="space-y-6">
            <!-- First Name -->
            <div class="input-group relative w-full">
                <input type="text" name="fName" id="fName" placeholder="First Name" required class="peer w-full bg-transparent border-b border-gray-300 pl-2.5 pt-2 text-sm focus:outline-none placeholder-transparent z-10 font-['Roboto'] text-lg "> 
                <label for="fName" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-600 text-base transition-all duration-200 peer-focus:-translate-y-8 peer-focus:text-hsl-327 peer-focus:text-sm peer-focus:underline z-0 peer-placeholder-shown:translate-y--2 peer-valid:-translate-y-8 peer-valid:text-hsl-327 peer-valid:text-sm peer-valid:underline cursor-text">First Name</label>
            </div>
    
            <!-- Last Name -->
            <div class="input-group relative w-full">
                <input type="text" name="lName" id="lName" placeholder="Last Name" required class="peer w-full bg-transparent border-b border-gray-300 pl-2.5 pt-2 text-sm focus:outline-none placeholder-transparent z-10 font-['Roboto'] text-lg "> 
                <label for="lName" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-600 text-base transition-all duration-200 peer-focus:-translate-y-8 peer-focus:text-hsl-327 peer-focus:text-sm peer-focus:underline z-0 peer-placeholder-shown:translate-y--2 peer-valid:-translate-y-8 peer-valid:text-hsl-327 peer-valid:text-sm peer-valid:underline cursor-text">Last Name</label>
            </div>
    
            <!-- Username -->
            <div class="input-group relative w-full">
                <input type="text" name="username" id="username" placeholder="Username" required class="peer w-full bg-transparent border-b border-gray-300 pl-2.5 pt-2 text-sm focus:outline-none placeholder-transparent z-10 font-['Roboto'] text-lg "> 
                <label for="username" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-600 text-base transition-all duration-200 peer-focus:-translate-y-8 peer-focus:text-hsl-327 peer-focus:text-sm peer-focus:underline z-0 peer-placeholder-shown:translate-y--2 peer-valid:-translate-y-8 peer-valid:text-hsl-327 peer-valid:text-sm peer-valid:underline cursor-text">Username</label>
            </div>
    
            <!-- Password -->
            <div class="input-group relative w-full">
                <input type="password" name="password" id="password" placeholder="Password" required class="peer w-full bg-transparent border-b border-gray-300 pl-2.5 pt-2 text-sm focus:outline-none placeholder-transparent z-10 font-['Roboto'] text-lg"> 
                <label for="password" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-600 text-base transition-all duration-200 peer-focus:-translate-y-8 peer-focus:text-hsl-327 peer-focus:text-sm peer-focus:underline z-0 peer-placeholder-shown:translate-y--2 peer-valid:-translate-y-8 peer-valid:text-hsl-327 peer-valid:text-sm peer-valid:underline cursor-text">Password</label>
                <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-600 text-xl" id="togglePassword" aria-label="Show password">
                    <i class="fas fa-eye" id="eyeIcon"></i>
                </button>
            </div>
    
            <input type="submit" class="button w-full py-2 bg-blue-600 text-white rounded-md cursor-pointer transition duration-200 hover:bg-blue-500" value="Sign Up" name="signUp">
        </form>
    
        <p class="or text-center text-lg my-4">-----or-----</p>
    
        <div class="icons text-center mb-4">
            <i class="fab fa-google px-4 py-2 border-2 border-blue-600 rounded-full cursor-pointer transition duration-200 hover:bg-blue-100"></i>
            <i class="fab fa-facebook px-4 py-2 border-2 border-blue-600 rounded-full cursor-pointer transition duration-200 hover:bg-blue-100"></i>
        </div>
    
        <div class="links text-center mt-4 font-bold">
            <p>Already Have Account? <button id="signIn" class="text-blue-600 hover:underline">Sign In</button></p>
        </div>
    </div>
    
    <!-- Sign In Form -->
    <div id="signInForm" class="container bg-[#F5F5DC] w-[500px] p-8 mx-auto my-12 rounded-xl shadow-2xl border border-gray-300 hidden">
        <h1 class="form-title text-center font-bold text-4xl py-4 mb-2">Sign In</h1>
        <form method="post" action="register.php" class="space-y-6">
            <!-- Username -->
            <div class="input-group relative w-full">
                <input type="text" name="username" id="username1" placeholder="Username" required class="peer w-full bg-transparent border-b border-gray-300 pl-2.5 pt-2 text-sm focus:outline-none placeholder-transparent z-10 font-['Roboto'] text-lg "> 
                <label for="username1" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-600 text-base transition-all duration-200 peer-focus:-translate-y-8 peer-focus:text-hsl-327 peer-focus:text-sm peer-focus:underline z-0 peer-placeholder-shown:translate-y--2 peer-valid:-translate-y-8 peer-valid:text-hsl-327 peer-valid:text-sm peer-valid:underline cursor-text">Username</label>
            </div>
    
            <!-- Password -->
            <div class="input-group relative w-full">
                <input type="password" name="password" id="password1" placeholder="Password" required class="peer w-full bg-transparent border-b border-gray-300 pl-2.5 pt-2 text-sm focus:outline-none placeholder-transparent z-10 font-['Roboto'] text-lg "> 
                <label for="password1" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-600 text-base transition-all duration-200 peer-focus:-translate-y-8 peer-focus:text-hsl-327 peer-focus:text-sm peer-focus:underline z-0 peer-placeholder-shown:translate-y--2 peer-valid:-translate-y-8 peer-valid:text-hsl-327 peer-valid:text-sm peer-valid:underline cursor-text">Password</label>
                <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-600 text-xl" id="togglePassword1" aria-label="Show password">
                    <i class="fas fa-eye" id="eyeIcon1"></i>
                </button>
            </div>
    
            <p class="recover text-right text-sm mb-4">
                <a href="#" class="text-blue-600 hover:underline">Recover Password</a>
            </p>
    
            <input type="submit" class="button w-full py-2 bg-blue-600 text-white rounded-md cursor-pointer transition duration-200 hover:bg-blue-500" value="Sign In" name="signIn">
        </form>
    
        <p class="or text-center text-lg my-4">-----or-----</p>
    
        <div class="icons text-center mb-4">
            <i class="fab fa-google px-4 py-2 border-2 border-blue-600 rounded-full cursor-pointer transition duration-200 hover:bg-blue-100"></i>
            <i class="fab fa-facebook px-4 py-2 border-2 border-blue-600 rounded-full cursor-pointer transition duration-200 hover:bg-blue-100"></i>
        </div>
    
        <p class="links text-center mt-4 font-bold">
            Don't have an account yet? <button id="signUp" class="text-blue-600 hover:underline">Sign Up</button>
        </p>
    </div>

    <script src="/api/script.js"></script>
</body>
</html>
