<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Registration Form</title>
</head>
<body>

<div class="container mt-5">
    <h2>Your Information</h2>
    <form>
        <!-- Personal Information Section -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="First Name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Last Name" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="you@yourdomain.com" required>
        </div>
        <div class="form-group">
            <label for="confirmEmail">Email (Confirm)</label>
            <input type="email" class="form-control" id="confirmEmail" placeholder="Confirm Email" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Password (Confirm)</label>
            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
        </div>

        <!-- Company Information Section -->
        <h2 class="mt-4">Company Information</h2>
        <!-- Add the rest of the form fields for company information here -->

        <!-- Promotional Information Section -->
        <h2 class="mt-4">Promotional Information</h2>
        <!-- Add the rest of the form fields for promotional information here -->

        <!-- Agreements Section -->
        <h2 class="mt-4">Agreements</h2>
        <!-- Add the rest of the form fields for agreements here -->

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-4">Sign Up</button>
    </form>
</div>

<!-- Bootstrap JavaScript and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
